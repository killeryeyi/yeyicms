<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>后台管理系统</title>

    <!-- Bootstrap Core CSS -->
    <link href="/yeyicms/Public/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/yeyicms/Public/sbadmin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/yeyicms/Public/sbadmin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/yeyicms/Public/sbadmin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/yeyicms/Public/sbadmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/yeyicms/admin.php">后台管理系统</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo U('user/edit_admin',array('id'=>$username[id]));?>"><i class="fa fa-user fa-fw"></i> <?php echo ($username["username"]); ?></a>
                        </li>
                        <li><a href="<?php echo U('user/edit_admin',array('id'=>$username[id]));?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U("login/close");?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
             <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="/yeyicms/admin.php">后台首页</a>
                        </li>
						<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="/yeyicms/admin.php/<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<?php if(is_array($vo['last'])): $i = 0; $__LIST__ = $vo['last'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><li  <?php if($pid == $voo[pid]): ?>class="active"<?php endif; ?>>
                                    <a href="/yeyicms/admin.php/<?php echo ($voo["url"]); ?>"><?php echo ($voo["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo ($name); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href='javascript:;' onclick="optimize_repaire('<?php echo U('exportsql');?>')" class="add"><button type="button" class="btn btn-primary">立即备份</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form name="myform" id="myform" method="post">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="head1"><input type="checkbox" class="checkall" id="selectall" style="" value=""></th>
                                    <th>表名</th>
                                    <th>数据量</th>
                                    <th>数据大小</th>
                                    <th>描述</th>
                                    <th>引擎类型</th>
                                    <th>创建时间</th>
                                    <!-- <th>操作</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$datalist): $mod = ($i % 2 );++$i;?><tr>
                                        <td>
                                            <div class="checker1 check" id="uniform-undefined">
                                                <input name="tables[]" class='select_ids' value="<?php echo ($datalist["name"]); ?>" type="checkbox" >
                                            </div>
                                        </td>
                                        <td><?php echo ($datalist["name"]); ?></td>
                                        <td><?php echo ($datalist["rows"]); ?></td>
                                        <td><?php echo (format_bytes($datalist["data_length"])); ?></td>
                                        <td><?php echo ($datalist["comment"]); ?></td>
                                        <td><?php echo ($datalist["engine"]); ?></td>
                                        <td><?php echo ($datalist["create_time"]); ?></td>
                                        <!--<td>
                                                <a class="link-optimize" href="javascript:;"  onclick="postUrl('<?php echo U('optimize');?>','<?php echo ($datalist["name"]); ?>')">优化表</a>
                                                <a class="link-repair" href="javascript:;" onclick="postUrl('<?php echo U('repair');?>','<?php echo ($datalist["name"]); ?>')">修复表</a>
                                        </td>-->
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                                </tbody>
                            </table>
                            </form>
                        </div>
                        <!-- /.panel-body -->

                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                        <ul class="pagination">
                            <?php echo ($page); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
<script src="/yeyicms/Public/sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="/yeyicms/Public/layer/layer.js"></script>
<script src="/yeyicms/Public/js/system.js"></script>
<script type="text/javascript" src="/yeyicms/Public/laydate/laydate.js"></script>

<script>
    $("li .active").parent("ul").addClass("in");
</script>
<!-- Bootstrap Core JavaScript -->
<script src="/yeyicms/Public/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/yeyicms/Public/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/yeyicms/Public/sbadmin/vendor/raphael/raphael.min.js"></script>
<script src="/yeyicms/Public/sbadmin/vendor/morrisjs/morris.min.js"></script>
<script src="/yeyicms/Public/sbadmin/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/yeyicms/Public/sbadmin/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script type="text/javascript">

        /**
         * [optimize_repaire 批量修复优化表]
         * @param  {[string]} url [处理数据的url地址]
         * @return {[json]}       [返回json格式]
         */
        function optimize_repaire(url){
            var tables = [];
            $(".select_ids:checked").each(function(index, el) {
                tables.push($(this).val());
            });

            if(tables.length == 0){
                layer.open({
                    content:'请选择要操作的数据！',
                    yes:function(index){
                        layer.close(index);
                    },
                    icon:2
                });
                return false;
            }
            postUrl(url,tables);
        }
        function postUrl(url,sendData){
            layer.load(1);
            $.post(url, {data:sendData}, function(data){
                //弹出消息
                if(data.status){
                    layer.msg(data.info,{icon:1,time:2000,shade: [0.3,'#000']},function(){
                        if(data.url){
                            location.href = data.url;
                        } else {
                            location.reload();
                        }
                    });
                } else {
                    layer.open({
                        content:data.info,
                        yes:function(index){
                            layer.close(index);
                        },
                        icon:2
                    });
                    layer.closeAll('loading');
                    //layer.msg(data.info,{icon:2});
                }
            });
        }
    </script>

</body>

</html>