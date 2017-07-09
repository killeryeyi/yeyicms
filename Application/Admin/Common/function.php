<?php
/*
 * info 提示信息
 * status 状态码
 * url
 * ajax读取
 * */
function ajaxjump($message, $status = 1, $jumpUrl = '')
{
    $data['info'] = $message;
    $data['status'] = $status;
    $data['url'] = $jumpUrl;
    echo json_encode($data);
}


?>