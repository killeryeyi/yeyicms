<?php

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {

        $this->display();
    }

    /*
     * 后台登录
     * */
    public function login()
    {
        //检测账户是否存在
        $user = M("admin")->where(array('username' => I("user", trim)))->find();
        if ($user) {
            //判断密码是否正确
            if ($user['password'] != I("pass", '', md5)) {
                $this->error("密码不正确!");

            } else {
                $_SESSION['user_id'] = array(
                    'userid' => $user['id'],
                    'username' => $user['username'],
                    'email'=>$user['email'],
                );
                $info['login_ip'] = get_client_ip();
                $info['login_time'] = time();
                M("admin")->where(array("id" => $user['id']))->save($info);
                $this->success("登录成功!");
            }
        } else {
            $this->error("不存在的用户名!");
        }
    }

    /*
     * 退出
     * */
    public function close()
    {
        unset($_SESSION['user_id']);
        $this->redirect("Login/index");
    }
}