<?php
namespace Admin\Model;
use Think\Model;
class AdminApplyModel extends Model{
    protected $_validate = array(
        array('name', 'require', '注册姓名不能为空!', 1),
        array('name','2,4','注册姓名必须2-4位',1,'length'),
        array('reg_number', 'require', '注册号码不能为空!',1),
        array('reg_number', '1,10', '注册号码必须1-10位数!',1,'length'),
        array('username', 'email', '电子邮箱格式不正确!',1),
        array('username', '', '电子邮箱已经存在!', 1, 'unique', 3),
        array('phone','/^\d{11}$/','手机号码格式不正确',1),
        array('phone', '', '手机号码已经存在!', 1, 'unique', 3),
        array('password','checkPwd','密码格式不正确,必须6-12位',1,'callback',1), // 自定义函数验证密码格式
        array('rpassword','password','确认密码和密码不一致',1,'confirm',1), // 验证确认密码是否和密码一致
        array('company', 'require', '公司名称不能为空!', 1),
        array('company', '', '公司名称已经存在!', 1, 'unique', 3),
        array('nature', 'require', '公司性质不能为空!', 1),
        array('type',array(1,2,3,4,5,6),'供应商法定身份识别类型的范围不正确！',1,'in'),
        array('code', 'require', '组织机构代码不能为空!', 1),
    );
    function checkPwd($password){
        if(strlen($password)<6||strlen($password)>12){
            return false;
        }else{
            return true;
        }
    }
}