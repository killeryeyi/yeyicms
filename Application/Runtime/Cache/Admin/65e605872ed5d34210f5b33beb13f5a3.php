<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title> 详情页</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/yeyicms/Public/assets/css/dpl-min.css" rel="stylesheet" type="text/css"/>
    <link href="/yeyicms/Public/assets/css/bui-min.css" rel="stylesheet" type="text/css"/>
    <link href="/yeyicms/Public/assets/css/page-min.css" rel="stylesheet" type="text/css"/>
    <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
    <link href="/yeyicms/Public/assets/css/prettify.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        code {
            padding: 0px 4px;
            color: #d14;
            background-color: #f7f7f9;
            border: 1px solid #e1e1e8;
        }
        .page .current,.page a,.page a:hover,.page span{display:inline-block;margin-right:2px;padding:0 10px;height:25px;line-height:25px;vertical-align:middle}
        .page a,.page span{color:#404548;border:1px solid #D7DBDC;background-color:#F6FFFF}
        .page .current,.page a:hover{text-decoration:none;color:#FFF;background-color:#337ab7;vertical-align:middle}
        .page .next,.page .prev{font-family:"宋体"}
        .page {text-align: center}
    </style>
</head>
<body>

<div class="container">


    <div class="detail-page">
        <a href="/yeyicms/admin.php/user/add_user"><button type="button" class="button button-small"><i class="icon-plus"></i>添加管理员</button></a>
        <div class="detail-section" style="margin-top: 10px">

            <h3>管理员列表</h3>
            <div class="row detail-row">
                <div class="span24">
                    <div id="grid">
                        <div class="bui-simple-grid bui-simple-list bui-grid-border" aria-disabled="false"
                             aria-pressed="false" style="width: 950px;">
                            <table cellspacing="0" class="bui-grid-table" cellpadding="0">
                                <thead>
                                <tr>
                                    <th class="bui-grid-hd " width="50">
                                        <div class="bui-grid-hd-inner"><span class="bui-grid-hd-title">id</span></div>
                                    </th>
                                    <th class="bui-grid-hd " width="200">
                                        <div class="bui-grid-hd-inner"><span class="bui-grid-hd-title">用户名</span></div>
                                    </th>
                                    <th class="bui-grid-hd " width="100">
                                        <div class="bui-grid-hd-inner"><span class="bui-grid-hd-title">email</span></div>
                                    </th>

                                    <th class="bui-grid-hd " width="100">
                                        <div class="bui-grid-hd-inner"><span class="bui-grid-hd-title">手机号</span></div>
                                    </th>
                                    <th class="bui-grid-hd " width="100">
                                        <div class="bui-grid-hd-inner"><span class="bui-grid-hd-title">最近登录ip</span>
                                        </div>
                                    </th>
                                    <th class="bui-grid-hd " width="100">
                                        <div class="bui-grid-hd-inner"><span class="bui-grid-hd-title">最近登录时间</span>
                                        </div>
                                    </th>
                                    <th class="bui-grid-hd " width="150">
                                        <div class="bui-grid-hd-inner"><span class="bui-grid-hd-title">操作</span>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="bui-grid-row bui-grid-row-odd">
                                    <td class="bui-grid-cell ">
                                        <div class="bui-grid-cell-inner"><span class="bui-grid-cell-text"><?php echo ($vo["id"]); ?></span>
                                        </div>
                                    </td>
                                    <td class="bui-grid-cell ">
                                        <div class="bui-grid-cell-inner"><span class="bui-grid-cell-text"><?php echo ($vo["username"]); ?></span>
                                        </div>
                                    </td>
                                    <td class="bui-grid-cell ">
                                        <div class="bui-grid-cell-inner"><span class="bui-grid-cell-text"><?php echo ($vo["email"]); ?></span>
                                        </div>
                                    </td>
                                    <td class="bui-grid-cell ">
                                        <div class="bui-grid-cell-inner"><span class="bui-grid-cell-text"><?php echo ($vo["phone"]); ?></span></div>
                                    </td>
                                    <td class="bui-grid-cell ">
                                        <div class="bui-grid-cell-inner"><span class="bui-grid-cell-text"><?php echo ($vo["login_ip"]); ?></span>
                                        </div>
                                    </td>
                                    <td class="bui-grid-cell ">
                                        <div class="bui-grid-cell-inner"><span class="bui-grid-cell-text"><?php echo (date("Y-m-d",$vo["login_time"])); ?></span>
                                        </div>
                                    </td>
                                    <td class="bui-grid-cell ">
                                        <div class="bui-grid-cell-inner"><span class="bui-grid-cell-text">
                                            <a href="/yeyicms/admin.php/user/ass_group/id/<?php echo ($vo["id"]); ?>">分配角色</a>
                                            <a href="/yeyicms/admin.php/user/edit_user/id/<?php echo ($vo["id"]); ?>">修改</a>
                                            <?php if($vo["id"] != 1): ?><a href="/yeyicms/admin.php/user/del_user/id/<?php echo ($vo["id"]); ?>">删除</a><?php endif; ?>
                                        </span>
                                        </div>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page"><?php echo ($page); ?></div>
        </div>
    </div>
</div>


<body>
</html>