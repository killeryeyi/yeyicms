<?php
namespace Admin\Model;
use Think\Model;

class VisitRecordModel extends Model
{
    protected $_validate = array(
        array('visit_name', 'require', '走访人员不能为空!', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
    );
}