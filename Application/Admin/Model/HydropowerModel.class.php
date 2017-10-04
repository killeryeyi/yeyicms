<?php
namespace Admin\Model;
use Think\Model;
class HydropowerModel extends Model{
    protected $_validate = array(
        array('rate', '/^[0-9]+\.?[0-9]*/', '倍率只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('fm_dtotal', '/^[0-9]+\.?[0-9]*/', '上月抄电表只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('tm_dtotal', '/^[0-9]+\.?[0-9]*/', '本月抄电表倍率只能为数字!', 2, 'regex', self::MODEL_BOTH),

        array('power_rate', '/^[0-9]+\.?[0-9]*/', '动力倍率只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('fm_ptotal', '/^[0-9]+\.?[0-9]*/', '上月动力抄电表只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('tm_ptotal', '/^[0-9]+\.?[0-9]*/', '本月动力抄电表倍率只能为数字!', 2, 'regex', self::MODEL_BOTH),

        array('d_unit', '/^[0-9]+\.?[0-9]*/', '电费单价倍率只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('fm_stotal', '/^[0-9]+\.?[0-9]*/', '上月抄水表倍率只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('tm_stotal', '/^[0-9]+\.?[0-9]*/', '上月抄水表倍率只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('s_unit', '/^[0-9]+\.?[0-9]*/', '水费单价倍率只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('elevator_consume_total', '/^[0-9]+\.?[0-9]*/', '电梯用电只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('water_consume_total', '/^[0-9]+\.?[0-9]*/', '用水总量只能为数字!', 2, 'regex', self::MODEL_BOTH),
        array('date', 'require', '收费日期不能为空!', 1, 'regex', self::MODEL_BOTH),
    );
}