<!DOCTYPE html>
<html>
  <head>
    <title>九尾狐 - 用户登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="/css/font-awesome.min.css">-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row-fluid">
          <div class="span4 "><a href="/"><img src="/img/budgetup.png"/></a></div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container"  style="width:500px; padding:60px 0 100px 0;">
         <form class="form-horizontal" action="<{spUrl c=user a=login}>" method="POST">
          <fieldset>
            <div id="legend" align="center">
                <h3>用户登录</h3>
            </div>
            

          <div class="control-group">
                <div id="alert-msg" class="alert alert-error ">
                  <strong>验证失败！</strong> 用户邮箱或密码错误!请重新输入.
                </div>
                <!-- Text input-->
                <label class="control-label" for="input01">邮箱：</label>
                <div class="controls">
                   <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                    <input type="text" placeholder="输入您的邮箱地址" class="input-xlarge" id="txt-email">
                    <p class="help-block"></p>
                  </div>
                </div>
              </div>
              <div class="control-group">

                <!-- Prepended text-->
                <label class="control-label">密码：</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input class="input-xlarge" placeholder="输入您的登录密码" id="txt-password" type="password">
                  </div>
                  <p class="help-block"></p>
                </div>

              </div>

          <div class="control-group">
                <label class="control-label"></label>

                <!-- Button -->
                <div class="controls">
                  <span>
                    <a class="btn btn-primary" data-toggle="button"  data-loading-text="登录中..." >
                      登录</a>
                  </span>
                  <label class="checkbox inline" style="width:50%;margin-left:20px;">
                    <input type="checkbox" checked="checked" id="inlineCheckbox2" value="option2"> 
                    <span style="margin-right:20px;">记住我</span>
                    <a>忘记密码？</a>
                  </label>
                </div>
              </div>

          

          

          </fieldset>
        </form>
        
      </div>
    </div>
    <!--footer content-->
    <div class="footer">
      <div class="container">
        <div class="row-fluid">
          <div class="span8">
            ©2013 九尾狐 — 版权所有.<a>隐私声明</a>. 
          </div>
          <div class="span4">
            鸣谢：<a>Glyphicons</a> | <a>BootStramp</a> | <a>BootCss</a> | <a>Jquery</a>
          </div>
        </div>
      </div>
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(".btn").click(function(){
          $(".btn").button('loading');
          $.post("<{spUrl c=cuser a=login}>", { email: $("#txt-email").val(), password: $("#txt-password").val() },
           function(data){
             if(data){
              $("#alert-msg").hide();
                window.location.href="<{spUrl c=sub a=dashboard}>";
             }else{
              $("#alert-msg").show();
              $('.btn').button('toggle');
              $('.btn').button('reset');
             }
           });
          
      });
    </script>
  </body>
</html>
