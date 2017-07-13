<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Page;

class MenuController extends GlobalController
{
    public function index()
    {
        $this->display();
    }

    //菜单列表
    public function m_list()
    {
        $Data = M('admin_rule'); // 实例化Data数据对象  date 是你的表名
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

    //添加菜单
    public function m_add()
    {
        if ($_POST) {
            //判断菜单名称是否为空
            if(I("title","", trim)==""){
                $this->error("菜单标题不能为空");
            }
            if(I("url","", trim)==""){
                $this->error("url不能为空");
            }
            //判断url标识是否存在
            $url = M("admin_rule")->where(array('url' => I("url","", trim)))->find();
            if ($url) {
                $this->error("url已经存在");
            }
            $data['pid'] = I("pid", "",intval) ? I("pid","", intval) : 0;
            $data['url'] = I("url", "",trim);
            $data['title'] = I("title", "",trim);
            $data['level'] = I("level","", intval);
            $data['sort'] = I("sort","", intval);
            $data['status'] = I("status","", intval);
            $data['update_time'] = time();
            $id = M("admin_rule")->add($data);
            if ($id) {
                $this->success("添加成功！", U('menu/m_list'));
            } else {
                $this->error("添加失败！");
            }

        } else {
            $node = M("admin_rule")->select();
            $menu_list = $this->tree_node($node);
            $this->assign("menu_list", $menu_list);
            $this->display();
        }


    }

    //删除菜单
    public function m_del()
    {
        $id = I("id", "",intval);
        $pid = M("admin_rule")->where(array('pid' => $id))->find();
        if ($pid) {
            $this->error("请先删除子栏目！");
        } else {
            $info = M("admin_rule")->where(array('id' => $id))->delete();
            if ($info) {
                $this->success("删除成功！", U('menu/m_list'));
            } else {
                $this->error("删除失败！");
            }
        }

    }

    //修改菜单
    public function m_edit()
    {
        $id = I("id", "",intval);
        if ($_POST) {
            $data['pid'] = I("pid", "",intval);
            $data['url'] = I("url","", trim);
            $data['title'] = I("title","", trim);
            $data['level'] = I("level","", intval);
            $data['sort'] = I("sort","", intval);
            $data['status'] = I("status","", intval);
            $data['update_time'] = time();

            $url1 = I("url1", "",trim);
            //判断url标识是否存在
            if ($data['url'] != $url1) {
                $url = M("admin_rule")->where(array('url' => $data['url']))->find();
                if ($url) {
                    $this->error("url已经存在");
                }
            }
            //判断上级菜单是否符合规则
            if ($id == $data['pid']) {
                $this->error("上级菜单不能是当前菜单！");
            }
            $id = M("admin_rule")->where(array('id' => $id))->save($data);
            if ($id) {
                $this->success("修改成功！", U('menu/m_list'));
            } else {
                $this->error("修改失败！");
            }

        } else {
            $node = M("admin_rule")->select();
            $menu_list = $this->tree_node($node);
            //获取当前菜单
            $c = M("admin_rule")->where(array('id' => $id))->find();
            $this->assign('info', $c);
            $this->assign("menu_list", $menu_list);
            $this->display();
        }
    }

    /*
     * 多选删除菜单
     * */
    public function m_del_all()
    {
        $id = trim($_POST['id'], ",");
        if (empty($id)) {
            $this->error("请选择要删除的项目!");
        }
        $cid = M("admin_rule")->where("id in($id)")->delete();
        if ($cid) {
            $this->success("删除成功！");
        } else {
            $this->error("删除失败！");
        }
    }

}