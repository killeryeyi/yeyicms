<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends GlobalController
{
    /*
     * 文章列表
     * */
    public function index(){
        //读取栏目
        $menu=M("menu")->where(array('pid'=>0,'single_page'=>2))->select();
        //id作为健名
        $menu1=M("menu")->where("pid>0 and single_page=2")->select();
        foreach($menu1 as $key =>$vo){
            $arr[$vo['pid']][$key]=$vo;
        }
        foreach($menu as $key =>$v){
            $menu[$key]['c']=$arr[$v['id']];
        }
        $this->assign("menu",$menu);

        //读取文章
        if($_POST['pid']){
            $where['type']=array('eq',I("pid","",intval));
            $this->assign("pid",I("pid","",intval));
        }
        if(I("title","",trim)){
            $where['title']=array('like',"%".I("title","",trim));
            $this->assign("title",I("title","",trim));
        }
        $User = M('article'); // 实例化User对象
        $count      = $User->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $menu=M("menu")->select();
        foreach($menu as $key =>$vo){
            $arr[$vo['id']]=$vo;
        }
        foreach($list as $key =>$v){
            $list[$key]['name']=$arr[$v['type']]['name']!=""?$arr[$v['type']]['name']:"顶级栏目";
        }
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    /*
     * 栏目列表
     * */
    public function menu(){
        $list=M("menu")->where(array('pid'=>0))->select();
        //id作为健名
        $list1=M("menu")->where("pid>0")->select();
        foreach($list1 as $key =>$vo){
            $arr[$vo['pid']][$key]=$vo;
        }
        foreach($list as $key =>$v){
            $list[$key]['c']=$arr[$v['id']];
        }
        $this->assign("list",$list);
        $this->display();
    }
    /*
     * 添加栏目
     * */
    public function add_menu(){
        if($_POST){
            $info['pid']=I("pid","",intval);
            $info['name']=I("name","",trim);
            $info['single_page']=I("single","",intval)?1:2;
            if($info['single_page']==1){
                $info['content']=I("content");
            }
            $id=M("menu")->add($info);
            if($id){
                $this->success("添加成功！");
            }else{
                $this->error("添加失败！");
            }
        }else{
            $list=M("menu")->where(array('pid'=>0))->select();
            $this->assign("list",$list);
            $this->display();
        }

    }
    /*
     * 删除栏目
     * */
    public function del_menu(){
        $id=I("id","",intval);
        if($id){
            $str=M("menu")->where(array('pid'=>$id))->find();
            $str1=M("article")->where(array("type"=>$id))->find();

            if($str||$str1){
                $this->error("请先删除该栏目下的子栏目或文章");
            }else{
                $cid=M("menu")->where(array('id'=>$id))->delete();
                if($cid){
                    $this->success("删除成功！");
                }else{
                    $this->error("删除失败！");
                }
            }

        }
    }
    /*
     * 修改栏目
     * */
    public function edit_menu(){
        if($_POST){
            $id=I("id","",intval);
            $info['name']=I("name","",trim);
            $info['pid']=I("pid","",intval);
            $cid=M("menu")->where(array('id'=>$id))->save($info);
            if($cid){
                $this->success("修改成功！");
            }else{
                $this->error("修改失败！");
            }
        }else{
            $list=M("menu")->where(array('pid'=>0))->select();
            $this->assign("list",$list);
            $id=I("id","",intval);
            $info=M("menu")->where(array('id'=>$id))->find();
            $this->assign("info",$info);
            $this->display();
        }
    }
    /*
     * 添加文章
     * */
    public function add_article(){
        if($_POST){
            $info['type']=I("pid","",intval);
            $info['title']=I("title","",trim);
            $info['author']=I("author","",trim);
            $info['status']=I("status","",intval)==1?1:2;
            $info['recommend']=I("re","",intval)==1?1:2;
            $info['create_time']=strtotime(I("time"));
            $info['content']=I("content");
            $id=M("article")->add($info);
            if($id){
                $this->success("添加文章成功！");
            }else{
                $this->error("添加文章失败！");
            }

        }else{
            $list=M("menu")->where(array('pid'=>0,'single_page'=>2))->select();
            //id作为健名
            $list1=M("menu")->where("pid>0 and single_page=2")->select();
            foreach($list1 as $key =>$vo){
                $arr[$vo['pid']][$key]=$vo;
            }
            foreach($list as $key =>$v){
                $list[$key]['c']=$arr[$v['id']];
            }
            $this->assign("list",$list);
            //当前日期
            $this->assign("time",date("Y-m-d",time()));
            $this->display();
        }

    }
    /*
     * 修改文章
     * */
    public function edit_article(){
        $id=I("id","",intval);
        if($_POST){
            $info['type']=I("pid","",intval);
            $info['title']=I("title","",trim);
            $info['author']=I("author","",trim);
            $info['status']=I("status","",intval)==1?1:2;
            $info['recommend']=I("re","",intval)==1?1:2;
            $info['create_time']=strtotime(I("time"));
            $info['update_time']=time();
            $info['content']=I("content");
            $info=M("article")->where(array('id'=>$id))->save($info);
            if($info){
                $this->success("修改成功！",U('article/index'));
            }else{
                $this->error("修改失败！");
            }
        }else{
            $list=M("menu")->where(array('pid'=>0,'single_page'=>2))->select();
            //id作为健名
            $list1=M("menu")->where("pid>0 and single_page=2")->select();
            foreach($list1 as $key =>$vo){
                $arr[$vo['pid']][$key]=$vo;
            }
            foreach($list as $key =>$v){
                $list[$key]['c']=$arr[$v['id']];
            }
            $this->assign("list",$list);

            $info=M("article")->where(array('id'=>$id))->find();
            if($info){
                $this->assign("info",$info);
            }else{
                $this->error("该文章不存在");
            }
            $this->display();
        }

    }
    /*
     * 删除文章
     * */
    public function del_article(){
        $id=I("id","",intval);
        if($id){
            $cid=M("article")->where(array('id'=>$id))->delete();
            if($cid){
                $this->error("删除成功！");
            }else{
                $this->success("删除失败！");
            }
        }
    }

}