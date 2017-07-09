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
     <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
     <script type="text/javascript" charset="utf-8" src="/yeyicms/Public/ueditor/ueditor.config.js"></script>
     <script type="text/javascript" charset="utf-8" src="/yeyicms/Public/ueditor/ueditor.all.min.js"> </script>
     <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
     <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
     <script type="text/javascript" charset="utf-8" src="/yeyicms/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
 </head>
 <body>
  <style>
      .span8{width:100%}
      </style>
  <div class="container">
    <div class="row">
      <form id="J_Form" class="form-horizontal span24" action="/yeyicms/admin.php/article/add_article" enctype="multipart/form-data" method="post">
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>所属栏目：</label>
                  <div class="controls">
                      <select name="pid" class="bui-form-field-select bui-form-field" aria-disabled="false" aria-pressed="false">
                          <option value="0">顶级栏目</option>
                          <?php if(is_array($list)): foreach($list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["name"]); ?></option>
                              <?php if(is_array($vo['c'])): $i = 0; $__LIST__ = $vo['c'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" >&nbsp;&nbsp;&nbsp;&nbsp;∟<?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; ?>
                      </select>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>文章标题：</label>
                  <div class="controls">
                      <input name="title" type="text" data-rules="{required:true}" class="input-normal control-text"  value="<?php echo ($info["title"]); ?>">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>作者：</label>
                  <div class="controls">
                      <input name="author" type="text" data-rules="{required:true}" class="input-normal control-text"  value="<?php echo ($info["author"]); ?>">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>是否显示：</label>
                  <div class="controls">
                          <label class="checkbox"><input name="status" type="radio" value="1" checked/>是</label>
                          <label class="checkbox"><input name="status" type="radio" value="2" />否</label>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>是否推荐：</label>
                  <div class="controls">
                      <label class="checkbox"><input name="re" type="radio" value="1" />是</label>
                      <label class="checkbox"><input name="re" type="radio" value="2" checked/>否</label>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>发布时间：</label>
                  <div class="controls">
                      <input class="calendar" name="time" data-rules="{date:true}" type="text" value="<?php echo ($time); ?>">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="control-group span8">
                  <label class="control-label"><s>*</s>内容：</label>
                  <div class="controls">
                      <textarea class="input-large bui-form-field" id="editor" style="width:800px;height:300px" name="content"><?php echo ($info["content"]); ?></textarea>
                  </div>
              </div>
          </div>

        <div class="row form-actions actions-bar" style="    margin-top: 400px;">
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
  var ue = UE.getEditor('editor',{
      nitialFrameHeight:250,
      scaleEnabled:true
  });

</script>

<body>
</html>