<?php
namespace Admin\Model;
use Think\Model;
class SchedulingModel extends Model{
    protected $_validate = array(
        array('name', 'require', '姓名不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('work_time', 'require', '工作时间不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('contact', 'require', '联系方式不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('address', 'require', '值班地点不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
}