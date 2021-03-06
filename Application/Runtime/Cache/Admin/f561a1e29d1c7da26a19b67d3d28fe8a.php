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
            <form action="<?php echo U('menu/m_list');?>" method="get" id="form">
                <div class="tableoptions" style="margin-bottom: 10px;">
                    <input type="text" placeholder="输入标题" class="form-control" name="title" value="<?php echo ($title); ?>" style="width: 10%;display: inline"/>
                    <select class="form-control" name="id" style="width: 10%;display: inline;margin-right: 10px">
                        <option value=""<?php if(is_null($id)): ?>selected<?php endif; ?>>全部</option>
                        <?php if(is_array($caidan)): $i = 0; $__LIST__ = $caidan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $id): ?>selected<?php endif; ?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <button type="submit" class="btn btn-outline btn-primary sousuo">搜索</button>
                    <button type="button" class="btn btn-outline btn-default quexiao">取消</button>

                </div><!--tableoptions-->
            </form>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo U('menu/m_add');?>" class="add"><button type="button" class="btn btn-primary">add</button></a>
                            <a href="javascript:void(0)" class="del"><button type="button" class="btn btn-warning">delete</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th> <input type="checkbox" class="checkall" ></th>
                                    <th class="sorting">id</th>
                                    <th class="head0">pid</th>
                                    <th class="head1">标题</th>
                                    <th class="head0">url</th>
                                    <th class="head1">等级</th>
                                    <th class="head1">排序</th>
                                    <th class="head1">状态</th>
                                    <th class="head0">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                        <td >
                                            <div class="checker1 check" id="">
                                                <input type="checkbox"  value="<?php echo ($vo["id"]); ?>">
                                            </div>
                                        </td>
                                        <td ><?php echo ($vo["id"]); ?></td>
                                        <td ><?php echo ($vo["pid"]); ?></td>
                                        <td ><?php echo ($vo["title"]); ?></td>
                                        <td ><?php echo ($vo["url"]); ?></td>
                                        <td ><?php echo ($vo["level"]); ?></td>
                                        <td ><?php echo ($vo["sort"]); ?></td>
                                        <td >
                                            <?php if($vo[status] == 0): ?>显示<?php else: ?><font color="red">隐藏</font><?php endif; ?>
                                        </td>
                                        <td >
                                            <a href="<?php echo U('menu/m_edit',array('id'=>$vo[id]));?>" class="edit">编辑</a>
                                            <a href="<?php echo U('menu/m_del',array('id'=>$vo[id]));?>" class="edit">删除</a>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                                </tbody>
                            </table>

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
<script src="/yeyicms/Public/mh/js/system.js"></script>
<script type="text/javascript" src="/yeyicms/Public/mh/js/laydate/laydate.js"></script>

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
    <script>
        $(".del").click(function () {
            var id = "";
            $(".check input:checkbox:checked").each(function () {
                id += $(this).val() + ",";
            })
            if(id==""){
                alert("请勾选要删除的项！");
            }else{
                $.post("<?php echo U('menu/m_del_all');?>",{id:id},function (data) {
                    if(data.status==1){
                        alert(data.info);
                        window.location.href="<?php echo U('menu/m_list');?>";
                    }else{
                        alert(data.info);
                    }
                },"json")
            }

        })
    </script>

</body>

</html>