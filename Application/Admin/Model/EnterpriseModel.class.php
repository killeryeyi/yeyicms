<?php
namespace Admin\Model;
use Think\Model;
class EnterpriseModel extends Model{
    protected $_validate = array(
        array('ban', 'require', '楼栋名称不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('floor', 'require', '所在楼层不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('floor', '/^[0-9]*$/', '所在楼层必须为数字!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('number', '', '房号已经存在!', 1, 'unique', self::MODEL_BOTH),
        array('number', 'require', '房号不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('acreage', '/^[0-9]+\.?[0-9]*/', '面积只能为数字!', 2, 'regex', self::MODEL_BOTH),

        //array('unit_price', '/^[0-9]+\.?[0-9]*/', '租房单价只能为数字!', 2, 'regex', self::MODEL_BOTH),
    );
}