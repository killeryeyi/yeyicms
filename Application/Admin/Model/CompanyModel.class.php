<?php

namespace Admin\Model;

use Think\Model;

class CompanyModel extends Model
{
    protected $_validate = array(
        array('name', 'require', '企业名称不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('name', '', '企业名称已经存在!', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
        array('legal_name', 'require', '法人代表不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('legal_phone', 'require', '法人电话不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        //array('company_email', 'email', '公司邮箱格式错误!', self::MUST_VALIDATE, 'regex', 1),
        //array('company_email', 'require', '公司邮箱不能为空!', self::MUST_VALIDATE, 'regex', 1),
        //array('company_email', '', '公司邮箱已经存在!', self::MUST_VALIDATE, 'unique', 1),

    );
}