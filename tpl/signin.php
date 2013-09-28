<!DOCTYPE html>
<html>
  <head>
    <title>广告市场  - 用户登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="/css/font-awesome.min.css">-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- Bootstrap -->
    
    <link href="/css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
  </head>
  <body>
    <!-- load head tpl -->
    <{include file="head.php"}>
    <div class="section">
      <div class="container"  style="width:500px; padding:60px 0 100px 0;">
         <form class="form-horizontal" action="<{spUrl c=user a=login}>" method="POST">
          <fieldset>
            <div id="legend" align="center">
                <h3>用户登录</h3>
            </div>
            

          <div class="control-group">
                <div id="alert-msg" class="alert alert-error ">
                  <strong><i class="icon-info-sign"></i>&nbsp;&nbsp;验证失败！</strong> 用户邮箱或密码错误!请重新输入.
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
                    <span class="add-on"><i class="icon-key"></i></span>
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
                    <a class="btn btn-primary" data-toggle="button"  data-loading-text="正在验证..." >
                      登录</a>
                  </span>
                  <span class="checkbox inline" style="margin-left:20px;">
                    <input type="checkbox" checked="checked" id="cookieCheck" value="option2"> 
                    <span style="margin-right:20px;">记住我</span>
                    <a href="<{spUrl c=main a=forget}>">忘记密码？</a>
                  </span>
                  
                </div>
              </div>

          

          

          </fieldset>
        </form>
        
      </div>
    </div>
    <!--footer content-->
    <!-- load foot tpl -->
    <{include file="foot.php"}>
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.message.js"></script>
    <script type="text/javascript">
    var CookieStr = document.cookie;
    if(CookieStr.indexOf('email')>=0){
      var GetName = '';
      if(CookieStr.indexOf('=')>=0&&CookieStr.indexOf(';')>=0){
        GetName =CookieStr.split('=')[1].split(';')[0]; //获取到cookie中 的值
      }
      
       $("#txt-email").val(GetName);
    } 
    
      $(".btn").click(function(){
          $(".btn").button('loading');
          $.post("<{spUrl c=cuser a=login}>", { email: $("#txt-email").val(), password: $("#txt-password").val() },
           function(data){
             if(data){
              //$("#alert-msg").hide();
              if($("#cookieCheck").attr("checked")){//添加cookie
                document.cookie="email="+$("#txt-email").val();
              }
              $.msg("验证成功！正在跳转中...",'color:green;');
                window.location.href="<{spUrl c=sub a=dashboard}>";
             }else{
              $.msg("用户名或密码错误！");
              //$("#alert-msg").show();
              $('.btn').button('toggle');
              $('.btn').button('reset');
             }
           });
          
      });
    </script>
  </body>
</html>
