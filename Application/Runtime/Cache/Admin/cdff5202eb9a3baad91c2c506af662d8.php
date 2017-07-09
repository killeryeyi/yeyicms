<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 资源文件结构</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="/yeyicms/Public/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/yeyicms/Public/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/yeyicms/Public/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="/yeyicms/Public/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   </style>
 </head>
 <body>
  <style>
      .span8{width:500px}
      </style>
  <div class="container">
    <div class="row">
      <form id="J_Form" class="form-horizontal span24" action="/yeyicms/admin.php/site/add_imgtype" enctype="multipart/form-data" method="post">
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>上级栏目：</label>
                  <div class="controls">
                      <select name="pid" class="bui-form-field-select bui-form-field" aria-disabled="false" aria-pressed="false">
                          <option value="0">顶级栏目</option>
                            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                      </select>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>栏目名称：</label>
                  <div class="controls">
                      <input name="name" type="text" data-rules="{required:true}" class="input-normal control-text" value="<?php echo ($info["name"]); ?>">
                  </div>
              </div>
          </div>
        <div class="row form-actions actions-bar">
            <div class="span13 offset3 ">
              <button type="submit" class="button button-primary">保存</button>
              <button type="reset" class="button">重置</button>
            </div>
        </div>
      </form>
    </div>
    

  </div>
  <script type="text/javascript" src="/yeyicms/Public/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/yeyicms/Public/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="/yeyicms/Public/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="/yeyicms/Public/assets/js/prettify.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script> 
<script type="text/javascript">
  BUI.use('bui/form',function (Form) {
    var form = new Form.HForm({
      srcNode : '#J_Form'
    });

    form.render();
  });
</script>

<body>
</html>