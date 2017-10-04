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
            <form action="<?php echo U('article/index');?>" method="get" id="form">
                <div class="tableoptions" style="margin-bottom: 10px;">
                    <input type="text" placeholder="输入关键字，如姓名" class="form-control" name="title" value="<?php echo ($title); ?>" style="width: 10%;display: inline"/>
                    所属栏目<select name="type" class="form-control" style="width: 10%;display: inline;margin-right: 10px">
                    <option value="">所有栏目</option>
                    <?php if(is_array($articletype)): foreach($articletype as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($type == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option>
                        <?php if(is_array($vo['last'])): $i = 0; $__LIST__ = $vo['last'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($type == $v['id']): ?>selected<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;∟<?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; ?>
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
                            <a href="<?php echo U('article/add_article');?>" class="add"><button type="button" class="btn btn-primary">add</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="head1" >id</th>
                                    <th class="head0">文章标题</th>
                                    <th class="head0">所属栏目</th>
                                    <th class="head1">作者</th>
                                    <th class="head0">是否显示</th>
                                    <th class="head0">是否推荐</th>
                                    <th class="head1">发布时间</th>
                                    <th class="head0" style="width: 15%;">操作</th>
                                </tr>
                                </thead>
                                <?php if($list != null): ?><tbody>
                                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                            <td><?php echo ($vo["id"]); ?></td>
                                            <td><?php echo (str_replace($title,"<font color='red'>$title</font>",$vo["title"])); ?></td>
                                            <td><?php echo ($vo["name"]); ?></td>
                                            <td><?php echo ($vo["author"]); ?></td>
                                            <td><?php if($vo["status"] == 1): ?>显示<?php else: ?>隐藏<?php endif; ?></td>
                                            <td><?php if($vo["recommend"] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
                                            <td><?php echo (date('Y-m-d',$vo["create_time"])); ?></td>
                                            <td>
                                                <a href="/yeyicms/admin.php/article/edit_article/id/<?php echo ($vo["id"]); ?>">修改</a>
                                                <a href="/yeyicms/admin.php/article/del_article/id/<?php echo ($vo["id"]); ?>">删除</a>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody><?php endif; ?>
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