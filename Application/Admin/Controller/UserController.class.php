<?php

namespace Admin\Controller;

use Think\Page;

class UserController extends GlobalController
{
    public function index()
    {
        $this->display();
    }

    //管理员列表
    public function u_list()
    {
        $Data = M('admin'); // 实例化Data数据对象  date 是你的表名
        $map = "";
        $count = $Data->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count, 15);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询
        $list = $Data->where($map)->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
        //获取所属角色
        $node = M("admin_group")->select();
        foreach ($node as $key => $vo) {
            $arr[$vo['id']] = $vo;
        }
        foreach ($list as $key => $voo) {
            $list[$key]['juese'] = $arr[$voo['group_id']]['name'];
        }
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('name', '管理员列表');
        $this->display(); // 输出模板
    }

    /*
     * 管理员信息修改
     * */
    public function edit_user()
    {
        $id = I("id", intval);
        $this->assign('name', '管理员修改');
        if ($_POST) {
            //不修改密码时提交的信息
            if (I("pass") == "" && I("newpass") == "" && I("rnewpass") == "") {
                //$info['username'] = I("name", "", trim);
                $info['email'] = I("email", "", trim);
                $info['phone'] = I("phone", "", trim);
                $info['group_id'] = I("gid", "1", intval);
                $cid = M("admin")->where(array('id' => $id))->save($info);
                if ($cid) {
                    $this->success("修改成功！", U('user/u_list'));
                } else {
                    $this->error("修改失败！");
                }
            } else {//修改密码时提交的信息
                $pass = I("pass", "", md5);
                $check_pass = M("admin")->where(array("id" => $id, "password" => $pass))->find();
                if ($check_pass) {
                    if (strlen(I("newpass")) < 6) {
                        $this->error("新密码的长度不够!");
                    }
                    if (I("newpass", "", intval) != I("rnewpass", "", intval)) {
                        $this->error("两次输入的密码不一致！");
                    }
                    //$info['username'] = I("name", "", trim);
                    $info['password'] = I("rnewpass", "", md5);
                    $info['email'] = I("email", "", trim);
                    $info['phone'] = I("phone", "", trim);
                    $info['group_id'] = I("gid", "1", intval);
                    $cid = M("admin")->where(array('id' => $id))->save($info);
                    if ($cid) {
                        $this->success("修改成功！", U('user/u_list'));
                    } else {
                        $this->error("修改失败！");
                    }
                } else {
                    $this->error("原始密码输入错误！");
                }
            }

        } else {
            $info = M("admin")->where(array('id' => $id))->find();

            $g_list = M("admin_group")->select();
            $this->assign("info", $info);
            $this->assign("glist", $g_list);
            $this->display();
        }

    }

    /*
     * 添加管理员
     * */
    public function add_user()
    {
        $this->assign('name', '添加管理员');
        if ($_POST) {
            if (I("name", "", trim)=="") {
                $this->error("用户名不能为空！");
            }
            //判断用户名是否存在
            $check_name = M("admin")->where(array('name' => I("name", "", trim)))->find();
            if ($check_name) {
                $this->error("该用户名已存在！");
            }
            if (strlen(I("newpass")) < 6||strlen(I("newpass"))>12) {
                $this->error("密码的长度6到12位！");
            }
            if (I("newpass", "", intval) != I("rnewpass", "", intval)) {
                $this->error("两次输入的密码不一致！");
            }
            $info['username'] = I("name", "", trim);
            $info['password'] = I("rnewpass", "", md5);
            $info['email'] = I("email", "", trim);
            $info['phone'] = I("phone", "", trim);
            $info['group_id'] = I("gid", "1", intval);
            $info['login_time'] = time();
            $id = M("admin")->add($info);
            if ($id) {
                $this->success("添加成功！", U("user/u_list"));
            } else {
                $this->error("添加失败！");
            }
        } else {
            $g_list = M("admin_group")->select();
            $this->assign("glist", $g_list);
            $this->display();
        }
    }

    /*
     *  删除用户
     * */
    public function del_user()
    {
        $id = I("id", "", intval);
        if ($id) {
            $cid = M("admin")->where(array('id' => $id))->delete();
            if ($cid) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        }
    }


}