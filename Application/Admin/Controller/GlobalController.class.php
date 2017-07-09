<?php

namespace Admin\Controller;

use Think\Controller;

class GlobalController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->islogin()) {
            $this->redirect('Login/index');
        }
        $this->check_rule();

        //获取用户名
        $username = $_SESSION['user_id'];
        //获取用户角色信息
        $rule = $this->admin_rule();
        //获取当前登录用户可访问的菜单
        $node = M("admin_rule")->where("id in({$rule['node']}) and status=0")->order("sort asc")->select();
        $menu = $this->tree_node($node);
        //添加左侧栏目图标样式
        $this->assign("icon", C(icon));
        $this->assign("menu", $menu);
        $this->assign("username", $username);
    }

    /*
     * 判断用户是否登录
     * */
    public function islogin()
    {
        if ($_SESSION['user_id']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 上传图标
     * @return type
     */
    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            return $info;
        }
    }

    /*
    * 获取用户角色信息
    * */
    public function admin_rule()
    {
        $user = M("admin")->where(array('id' => $_SESSION['user_id']['userid']))->find();
        $list = M("admin_group")->where(array('id' => $user['group_id']))->find();
        return $list;
    }

    /*
    * 递归函数
    * */
    public function tree_node($data, $id = 0)
    {
        $arr = array();
        foreach ($data as $key => $vo) {
            if ($vo['pid'] == $id) {
                $vo['last'] = $this->tree_node($data, $vo['id']); //调用函数，传入参数，继续查询下级
                $arr[] = $vo; //组合数组
            }
        }
        return $arr;
    }

    /*
     * 获取权限
     * */
    public function check_rule()
    {
        $list = $this->admin_rule();
        if ($list) {
            $arr = explode(",", $list['node']);
            //获取当前控制器名称和方法名称
            $url = CONTROLLER_NAME . "/" . ACTION_NAME;
            $url = strtolower($url);
            if ($url != "index/index") {
                //判断url是否存在
                $rule=M("admin_rule")->field("id,pid")->where(array('url'=>$url))->find();
                if($rule){
                    //判断是否有权限
                    if (!in_array($rule['id'], $arr)) {
                        $this->error("您没有权限执行这个操作！");
                    }
                    $this->assign("id",$rule['id']);
                    $this->assign("pid",$rule['pid']);
                }else{
                    $this->error("不存在的链接！");
                }


            }

        }
    }


}