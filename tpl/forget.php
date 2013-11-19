<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场  - 找回密码</title>
    <{include file="meta.php"}>
    <{include file="style.php"}>
    <{include file="script.php"}>
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
