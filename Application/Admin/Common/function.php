<?php
/*
 * 验证内容
 * */
function check_content($data)
{
    foreach ($data as $key => $vo) {
        $content = substr(rehtml(htmlspecialchars_decode($vo['content'])), 0,30);
        $content1=substr(htmlspecialchars_decode($vo['content']), 0,30);
        if (strstr($content1, "img")) {
            $data[$key]['content'] = "图片内容";
        } else {
            $data[$key]['content'] =$content;
        }
    }
    return $data;
}

    /*
     * 计算当月需要缴费房租的数据
     * data 数据
     * time 用户选择的日期
     * type 房屋情况
     * */
function compute_rent_date($data, $time)
{
    if ($data['type'] == 1||$data['type'] == 7) {
        $db_time = $data['lease_time'];
        $type = $data['rent_type'];
    } elseif ($data['type'] == 2) {
        $db_time = $data['buy_time'];
        $type = $data['property_type'];
    }
    $time = explode("-", $time);
    $se_m = $time[1];//当前选中的月份
    $se_y = $time[0];//当前选中的年
    $db_m = date("m", $db_time);//入住月
    $db_y = date("Y", $db_time);//入住年
    $se_ym = $se_y . $se_m;
    $db_ym = $db_y . $db_m;
    $c = $se_m - $db_m; //当前月与入住如的差值
    if ($c == 0) {//如果差值为0 改为1
        $c = 1;
    }
    if ($se_y != $db_y) {//如果当前年不等于入住年
        $db_yy = $se_y - $db_y;
        $c = $db_yy * 12 - $db_m + $se_m;
    }

    $db_day = date("d", $db_time);//获取入住当年当月的日期
    $now_day = date("t", strtotime($time));
    //$now_day = cal_days_in_month(CAL_GREGORIAN, $se_m, $se_y);//获取选择的月份有多少天
    /* if($db_day > $now_day){//如果入住日期大于 选择的月份天数 当前月减一月
         $dqm = date("m", strtotime("+$c month", $db_time))-1;
     }else{
         $dqm = date("m", strtotime("+$c month", $db_time));
     }*/
    switch ($type) {
        case 1:
            //echo $dqm . "==" . $se_m . "&&".$se_ym.">".$db_ym."||" . $db_day . ">" . $now_day . "<br>";
            if ($se_ym > $db_ym) {
                //如果入住的当月天数 大于当前月的天数 结果为当月最后一天
                if ($db_day > $now_day) {
                    $tm_pay_time = date("Y-", strtotime("+$c month", $db_time)) . $se_m . "-" . $now_day;
                } else {
                    $tm_pay_time = date("Y-m-d", strtotime("+$c month", $db_time));
                }
                return $tm_pay_time;
            }
            break;
        case 2:
            if ($c % 3 == 0 && $se_ym > $db_ym) {
                if ($db_day > $now_day) {
                    $tm_pay_time = date("Y-", strtotime("+$c month", $db_time)) . $se_m . "-" . $now_day;
                } else {
                    $tm_pay_time = date("Y-m-d", strtotime("+$c month", $db_time));
                }
                return $tm_pay_time;
            }
            break;
        case 3:
            if ($se_m == $db_m && $se_ym > $db_ym) {
                if ($db_day > $now_day) {
                    $tm_pay_time = date("Y-", strtotime("+$c month", $db_time)) . $se_m . "-" . $now_day;
                } else {
                    $tm_pay_time = date("Y-m-d", strtotime("+$c month", $db_time));
                }
                return $tm_pay_time;
            }
            break;
    }
}
function rehtml($data){
    $data=preg_replace("/(\<[^\<]*\>|\r|\n|\s|\[.+?\])/is","",$data);
    return $data;
}
/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}
?>