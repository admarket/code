<!DOCTYPE html>
<html>
  <head>
    <title>广告市场  - 找回密码</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="广告市场,广告位招租,广告位出售,广告位管理"/>
    <meta name="description" 
    content="广告市场是全球首家中文网络广告位交易平台，在此发布、管理网站广告位，进行广告位招租、交易买卖，并进行科学的分析和管理。"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <!--[if lte IE 6]>
  <!-- bsie css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-ie6.css">

  <!-- bsie 额外的 css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/ie.css">
  <![endif]-->
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
      <div class="container"  style="width:600px; padding:60px 0 100px 0;">
         <form class="form-horizontal" >
          <h3 align='center'>找回密码</h3>
          <div class="control-group">
              
                <!-- Text input-->
                <label class="control-label" for="input01">邮箱：</label>
                <div class="controls">
                   <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                    <input type="text" placeholder="输入您的邮箱地址" class="input-xlarge" id="email">
                    <a id="btn-forget" class="btn btn-primary" data-toggle="button"  data-loading-text="正在发送..." > 立刻找回</a>
                    
                  </div>
                  <div  style="display:block;padding:20px 0px;font-size:14px;">
                  
                        <i class="icon-info-sign"></i>&nbsp;&nbsp;我们会把密码发送到您的注册邮箱，如果您未能及时收到邮件，请联系客服。
                  </div>
                </div>

              </div>
            
        </form>
        
      </div>
    </div>
    <!--footer content-->
    <!-- load foot tpl -->
    <{include file="foot.php"}>
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!--[if lte IE 6]>
    <!-- bsie js 补丁只在IE6中才执行 -->
    <script type="text/javascript" src="/js/bootstrap-ie.js"></script>
    <![endif]-->
    <script src="/js/jquery.message.js"></script>
    <script type="text/javascript">
      $("#btn-forget").click(function(){
          if(checkEmail()){
            $("#btn-forget").button('loading');
            $.post("<{spUrl c=cuser a=forget}>", { email: $("#email").val()},
             function(data){
              //alert(data);
               if(data.indexOf("successful")>=0){
                //$("#alert-msg").hide();
                $.msg("密码已经发送到您的邮箱！",'color:green;');
               }else{
                $.msg(data);
                //$("#alert-msg").show();
                
               }
               $('#btn-forget').button('toggle');
               $('#btn-forget').button('reset');
             });
          }else{
              $('#btn-forget').button('toggle');
               $('#btn-forget').button('reset');
          }
          
          
      });
      function checkEmail(){
        if($.trim($("#email").val()).length==0){
                      $.msg("邮箱不能为空！");
                       return false;
        }else{
            var reg =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!reg.test($.trim($("#email").val()))){
                $.msg("邮箱格式不正确！");
                return false;
            }else{
                return true;
            }
         }
      }
    </script>
  </body>
</html>
