<?php

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if ($_COOKIE['username'] && $_COOKIE['userpass']) {
            $cookie = array($_COOKIE['username'], md5($_COOKIE['userpass'].time()));
            $this->assign("data", $cookie);
        }
        $this->display();
    }

    /*
     * 后台登录
     * */
    public function login()
    {
        //判断是否是记住密码登录
        $this->remember_login();
        //检测账户是否存在
        $map['username'] = I("user", "", trim);
        $map['password'] = I("pass", '', md5);
        $user = M("admin")->where($map)->find();
        if ($user) {
            if($user){
                $this->action_login($user);
            }
        } else {
            $this->error("账号或密码错误,请重新登陆！");
        }
    }

    /*
     * 记住密码登录
     * */
    public function remember_login()
    {
        if ($_COOKIE['userpass']&&$_COOKIE['username']==I("user", "", trim)) {
            $user = M("admin")->where(array('token' => $_COOKIE['userpass']))->find();
            if ($user) {
                $this->action_login($user);
            }
        }else {
            cookie('username', null);
            cookie('userpass', null);
        }
    }

    /*
     * 执行login_action
     * */
    public function action_login($user){
        $_SESSION['user'] = $user;
        unset($_SESSION['user']['password']);
        $info['login_ip'] = get_client_ip();
        $info['login_time'] = time();
        //记住密码
        if (I("remember") == 1) {
            if (!$_COOKIE['userpass']&&$_COOKIE['username']!=I("user", "", trim)) {
                $time=3600 * 24 * 7;
                $data=array($user['id'],$user['username'],$user['password'],$time);
                $key = sha1(json_encode($data));
                $info['token'] = $key;
                cookie('username', $user['username'],$time);
                cookie('userpass', $key, $time);
            }

        } else {
            $info['token'] = "";
            cookie('username', null);
            cookie('userpass', null);
        }
        M("admin")->where(array("id" => $user['id']))->save($info);
        $this->success("登录成功!",U('index/index'));
    }
    /*
     * 退出
     * */
    public function close()
    {
        unset($_SESSION['user']);
        $this->redirect("login/index");
    }
}