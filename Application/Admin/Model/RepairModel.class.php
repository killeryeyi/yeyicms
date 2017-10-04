<?php

namespace Admin\Model;

use Think\Model;

class RepairModel extends Model
{
    protected $_validate = array(
        //array('name', 'require', '姓名不能为空!', 1, 'regex', 3),
        array('content', 'require', '报修内容不能为空！', 1, 'regex', 3),
        array('contact','require', '联系方式不能为空！',1,'regex',3),
        array('address','require', '地址不能为空！',1,'regex',3),

    );

}