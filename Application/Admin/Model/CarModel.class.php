<?php
namespace Admin\Model;
use Think\Model;
class CarModel extends Model{
    protected $_validate = array(
        array('ban', 'require', '所在楼栋不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('number', 'require', '车位号不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('month', '/^[0-9]*$/', '月份只能为数字!', 0, 'regex', self::MODEL_BOTH),
    );
}