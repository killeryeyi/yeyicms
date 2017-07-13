<?php

namespace Admin\Controller;

use Think\Page;

class GroupController extends GlobalController
{
    /*
         *  角色管理列表
         * */
    public function g_list()
    {

        $Data = M('admin_group'); // 实例化Data数据对象  date 是你的表名
        $map = "";
        $count = $Data->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count, 15);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询
        $list = $Data->where($map)->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
        //dump($this->tree_node($list)[0]);
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    /*
     * 添加角色
     * */
    public function add_group()
    {
        if ($_POST) {
            if(I("name", "", trim)==""){
                $this->error("角色名称不能为空！");
            }
            $info['name'] = I("name", "", trim);
            $info['node'] = implode(",", I("mid", "", intval));
            $id = M("admin_group")->add($info);
            if ($id) {
                $this->success("添加成功！", U("group/g_list"));
            } else {
                $this->error("添加失败！");
            }
        } else {
            $rule = M("admin_rule")->where(array("pid" => 0))->select();
            $rule1 = M("admin_rule")->where("pid>0")->select();
            foreach ($rule1 as $key => $vo) {
                $arr[$vo['pid']][$key] = $vo;
            }
            foreach ($rule as $key => $vo) {
                $rule[$key]['second'] = $arr[$vo['id']];
            }
            $this->assign("rule", $rule);
            $this->display();
        }

    }

    /*
     * 修改角色
     * */
    public function edit_group()
    {
        $id = I("id", "", intval);
        if ($_POST) {
            if(I("name", "", trim)==""){
                $this->error("角色名称不能为空！");
            }
            $info['name'] = I("name", "", trim);
            $info['node'] = implode(",", I("mid", "", intval));
            $id = M("admin_group")->where(array('id' => $id))->save($info);
            if ($id) {
                $this->success("修改成功！", U("group/g_list"));
            } else {
                $this->error("修改失败！");
            }
        } else {
            $rule = M("admin_rule")->select();
            $rule_data = $this->tree_node($rule);//递归循环
            $this->assign("rule", $rule_data);
            if ($id) {
                $info = M("admin_group")->where(array("id" => $id))->find();
                if ($info) {
                    $this->assign("info", $info);
                    $mid = explode(",", $info['node']);
                    //判断是否全选
                    if (count($rule) == count($mid)) {
                        $this->assign("c_all", "true");
                    }
                    $this->assign("mid", $mid);
                    $this->display();
                }
            }
        }

    }

    //删除角色
    public function del_group()
    {
        $id = I("id","", intval);
        $cid = M("admin_group")->where(array('id' => $id))->delete();
        if ($cid) {
            $this->success("删除成功！", U("group/g_list"));
        } else {
            $this->error("删除失败！");
        }
    }
}