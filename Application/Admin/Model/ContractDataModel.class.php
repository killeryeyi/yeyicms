<?php

namespace Admin\Model;

use Think\Model;

class ContractDataModel extends Model
{
    protected $_validate = array(
        array('number', 'require', '文件编号不能为空!', 1, 'regex', 3),
        array('company', 'require', '发文单位不能为空！', 1, 'regex', 3),
        array('share','/^[0-9]*$/', '份数必须为数字！',0,'regex',3),

    );

}
