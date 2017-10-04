<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class SiteController extends GlobalController
{
    /*
     * 轮播图列表
     * */
    public function index(){
        $list=M("banner")->select();
        $imgtype=M("imgtype")->select();
        foreach($imgtype as $key=>$vo){
            $arr[$vo['id']]=$vo;
        }
        foreach($list as $key =>$v){
            $list[$key][name]=$arr[$v['type']]['name']?$arr[$v['type']]['name']:"顶级分类";
        }
        $this->assign("list",$list);
        $this->display();
    }
    /*
    * 添加轮播图
    * */
    public function add_banner(){
        if($_POST){
            $info=$this->upload("banner");
            $info['title']=I("title",'',trim);
            $info['url']=I("url",'',trim);
            $info['type']=I("pid",'',trim);
            $info['img']="banner/".$info['photo']['savepath'].$info['photo']['savename'];
            $info['sort']=I("sort","",intval);
            $info['create_time']=time();
            $id=M("banner")->add($info);
            if($id){
                $this->admin_log("名称:".$info['title']);
                $this->success("添加成功！" ,U('site/index'));
            }else{
                $this->error("添加失败!");
            }
        }else{
            $menu=M("imgtype")->select();
            $menu=$this->tree_node($menu);
            $this->assign("list",$menu);
            $this->display();
        }
    }
    /*
     * 删除轮播图
     * */
    public function del_banner(){
        $id=I("id",'',intval);
        $cid=M("banner")->where(array('id'=>$id))->delete();
        if($cid){
            $this->admin_log("id:".$id);
            $this->success("删除成功！");
        }else{
            $this->success("删除失败！");
        }
    }
    /*
     * 修改轮播图
     * */
    public function edit_banner(){
        if($_POST){
            $id=I("id","",intval);
            if(!empty($_FILES['photo']['tmp_name'])){
                $info=$this->upload("banner");
                $info['img']="banner/".$info['photo']['savepath'].$info['photo']['savename'];
            }
            $info['type']=I("pid",'',trim);
            $info['title']=I("title",'',trim);
            $info['url']=I("url",'',trim);
            $info['sort']=I("sort","",intval);
            $info['create_time']=time();
            $cid=M("banner")->where(array('id'=>$id))->save($info);
            if($cid){
                $this->admin_log("名称:".$info['title']);
                $this->success("修改成功！",U('site/index'));
            }else{
                $this->error("修改失败！");
            }
        }else{
            $menu=M("imgtype")->select();
            $list=$this->tree_node($menu);
            $this->assign("list",$list);

            $id=I("id","",intval);
            $info=M("banner")->where(array('id'=>$id))->find();
            $this->assign('info',$info);
            $this->display();
        }
    }
    /*
     *  图片分类
     * */
    public function img_type(){
        $list=M("imgtype")->where(array('pid'=>0))->select();
        //id作为健名
        $list1=M("imgtype")->where("pid>0")->select();
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
     * 添加图片分类
     * */
    public function add_imgtype(){
        if($_POST){
            $info['pid']=I("pid","",intval);
            $info['name']=I("name","",trim);
            $id=M("imgtype")->add($info);
            if($id){
                $this->success("添加成功！");
            }else{
                $this->error("添加失败！");
            }
        }else{
            $list=M("imgtype")->where(array('pid'=>0))->select();
            $this->assign("list",$list);
            $this->display();
        }

    }
    /*
     * 修改图片分类
     * */
    public function edit_imgtype(){
        if($_POST){
            $id=I("id","",intval);
            $info['name']=I("name","",trim);
            $info['pid']=I("pid","",intval);
            $cid=M("imgtype")->where(array('id'=>$id))->save($info);
            if($cid){
                $this->success("修改成功！");
            }else{
                $this->error("修改失败！");
            }
        }else{
            $list=M("imgtype")->where(array('pid'=>0))->select();
            $this->assign("list",$list);
            $id=I("id","",intval);
            $info=M("imgtype")->where(array('id'=>$id))->find();
            $this->assign("info",$info);
            $this->display();
        }
    }
    /*
    * 删除栏目
    * */
    public function del_imgtype(){
        $id=I("id","",intval);
        if($id){
            $str=M("imgtype")->where(array('pid'=>$id))->find();
            $str1=M("banner")->where(array('type'=>$id))->find();
            if($str||$str1){
                $this->error("请先删除该栏目下的子栏目或图片");
            }else{
                $cid=M("imgtype")->where(array('id'=>$id))->delete();
                if($cid){
                    $this->success("删除成功！");
                }else{
                    $this->error("删除失败！");
                }
            }
        }
    }

    /*
     * 在线留言
     * */
    public function guestbook(){
        $User = M('guestbook'); // 实例化User对象
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板

    }
    /*
     *删除留言
     * */
    public function del_book(){
        $id=I("id","",intval);
        if($id){
            $cid=M("guestbook")->where(array('id'=>$id))->delete();
            if($cid){
                $this->success("删除成功！");
            }else{
                $this->error("删除失败！");
            }
        }
    }
    /*
     * 操作日志
     * */
    public function log_list(){
        $User = M('admin_log'); // 实例化User对象
        $map="";
        if(I("title")){
            $map['u_name']=array('like',"%".I("title","",trim)."%");
            $this->assign("title",I("title"));
        }
        $count      = $User->where($map)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where($map)->order('update_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $total['sum']=$count;
        $total['s']=$Page->firstRow?$Page->firstRow:1;
        $total['e']=$Page->firstRow+count($list);
        $this->assign("total",$total);
        $this->display(); // 输出模板
    }

}