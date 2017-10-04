<?php

namespace Admin\Model;

use Think\Model;

class StaffinfoModel extends Model
{
    protected $_validate = array(
        array('name', 'require', '姓名不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('phone', '/^\d{11}$/', '手机号长度必须11位！', 1, 'regex', 3),
    );

}

?>