<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场  - 用户注册</title>
    <{include file="meta.php"}>
    <{include file="style.php"}>
    <{include file="script.php"}>
  </head>
  <body>
     <!-- load head tpl -->
    <{include file="head.php"}>
    <div class="section" align="center">
      <div class="container box std-container" align="left" style="padding:20px 40px;">
         <form>
            <div id="legend" >
                <h3 class="title">用户注册</h3>
                <div class="row-fluid" style="padding:5px;font-size:12px;">
                  <div class="span4">
                    <span class="badge badge-success">
                    1.
                    </span><i class=" icon-edit"></i>&nbsp;填写基本信息
                    </div>
                  <div class="span4"><span class="badge" id="second">2.</span>
                    <i class=" icon-legal"></i>&nbsp;验证邮箱</div>
                  <div class="span4"><span class="badge">3.</span>
                    <i class=" icon-check"></i>&nbsp;完成注册</div>
                </div>
                <div class="progress active">
                  <div class="bar" style="width:30%;"></div>
                </div>
            </div>
            <div class="row-fluid">
              <div class="span6">
                <div  class="control-group">
                      <!-- Text input-->
                      <label class="control-label" for="input01">邮箱：</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on"><i class="icon-envelope"></i></span>
                          <input id="email" type="text" placeholder="输入您的邮箱地址" class="input-xlarge">
                        </div>
                        <p class="help-block" id="email-msg">请输入有效邮箱</p>
                      </div>
                </div>
                <div  class="control-group">
                      <!-- Text input-->
                      <label class="control-label" for="input01">手机号码：</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on"><i class="icon-mobile-phone icon-large"></i></span>
                          <input id="phone" type="text" placeholder="输入您的手机号码" class="input-xlarge">
                        </div>
                        <p class="help-block" id="phone-msg">请输入有效手机号码</p>
                      </div>
                </div>
                <div class="control-group">

                  <!-- Prepended text-->
                  <label class="control-label">密码：</label>
                  <div class="controls">
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-lock"></i></span>
                      <input class="input-xlarge" placeholder="设置您的登录密码" id="password" type="password">
                      <i class="icon-ok ok" id="password-ok" style="">dfs</i>
                    </div>
                    <p class="help-block" id="password-msg">请输入6-20位字母和数字组合</p>
                  </div>
                </div>

                <div class="control-group">

                  <!-- Prepended text-->
                  <label class="control-label">确认密码：</label>
                  <div class="controls">
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-lock"></i></span>
                      <input class="input-xlarge" placeholder="请再次输入密码" id="repassword" type="password">
                      <i class="icon-ok ok" id="repassword-ok" style="">dfs</i>
                    </div>
                    <p class="help-block" id="repassword-msg">与上面的密码保持一致</p>
                  </div>
                </div>
               
          <div class="control-group">

                <!-- Textarea -->
                <label class="control-label">注册条款：</label>
                <div class="controls">
                  <div class="textarea">
                        <textarea type="" class="input-xlarge" rows="5" style="font-size:12px;width:90%;">
      九尾狐公司非常重视对您隐私的保护，在您使用九尾狐提供的服务前，请您仔细阅读如下声明。

      为了给您提供更准确、更有针对性的服务，九尾狐可能会以如下方式，使用您提交的个人信息。但九尾狐会以高度的勤勉义务对待这些信息，在未征得您许可的情况下，不会将这些信息对外公开或向第三方提供。

      保有您提供的信息
      九尾狐会在您自愿选择服务或提供信息的情况下收集您的个人信息，并将这些信息进行整合，以便向您提供更好的用户服务。请您在注册时及时、详尽及准确的提供个人资料，并不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用为注册资料。如果因注册信息不真实而引起的问题，由您自行承担相应的后果。请您不要将您的帐号、密码转让或出借予他人使用。如您发现您的帐号遭他人非法使用，应立即通知九尾狐。因黑客行为或用户的保管疏忽导致帐号、密码遭他人非法使用，九尾狐不承担责任。

      cookies等技术的使用
      九尾狐网站使用cookies，以便您能登录我们的服务，并允许设定您特定的服务选项。
      运用cookies技术，九尾狐网站能够为您提供更加周到的个性化服务。同时，当您通过九尾狐的联盟网站访问九尾狐时，我们允许将位于九尾狐域的cookies发送给九尾狐的Web服务器。通过使用cookies所收集的任何内容均以集合的、匿名的方式进行。
      您可以选择接受或拒绝 cookies。您可以通过修改浏览器设置的方式拒绝cookies。如果您选择拒绝cookies，则您可能无法登录或使用依赖于cookies 的九尾狐服务或功能。
      如果您不希望九尾狐联盟网站基于您的cookie信息在您访问九尾狐联盟网站时，向您推送个性化的推广信息，可以通过隐私保护工具限制我们对cookie信息的使用。

      保有您的使用记录
      当您使用九尾狐的服务时，服务器会自动记录一些信息，包括URL、IP地址、浏览器的类型和使用的语言以及访问日期和时间等。 

      在如下情况下，九尾狐会遵照您的意愿或法律的规定披露您的个人信息，由此引发的问题将由您个人承担：
      （1）事先获得您的授权；
      （2）只有透露你的个人资料，才能提供你所要求的产品和服务；
      （3）根据有关的法律法规要求；
      （4）按照相关政府主管部门的要求；
      （5）为维护九尾狐的合法权益。
      （6）您同意让第三方共享资料。
      （7）我们发现您违反了九尾狐公司服务条款或任何其他产品服务的使用规定。
      （8）我们需要向代表我们提供产品或服务的公司提供资料（除非我们另行通知你，否则这些公司无权使用你的身份识别资料）。
      隐私权政策的修订：
      九尾狐公司时常会对隐私权政策进行修改。如果在使用用户个人信息政策方面有修改时，我们会在网页中显著的位置发布相关规定以便及时通知用户。

      问题与建议：
      如果您还有其他问题和建议，请告知我们。

      九尾狐会始终致力于在充分保护您隐私的前提下，为您提供更优质的体验和服务。
                         </textarea>

                  </div>
                  <label class="checkbox inline" style="width:100px;margin-left:10px;">
                  <input type="checkbox" checked="checked" disabled="disabled" id="inlineCheckbox2" value="option2"> 同意注册条款
                </label>
                </div>
              </div>

              <div class="control-group">
                    <label class="control-label"></label>

                    
              </div>
            </div>
            <div class="span5" style="padding-left:40px;border-radius:5px;">
              <div class="box">
                <legend><h5>提现账户</h5></legend>
                <label>真实姓名：</label>
                <div class="input-prepend">
                  <span class="add-on" style="font-weight:bold;">
                    <i class="icon-user"></i>
                  </span>
                  <input type="text" id="name" placeholder="输入您的真实姓名"/>
                </div>
                <p>
                  <span class="help-block" id="name-msg">请务必填写真实姓名，否则影响提现</span>
                </p>
                <label>账号：</label>
                <div class="input-prepend">
                  <span class="add-on" style="font-weight:bold;">&yen;</span>
                  <input type="text" id="account" placeholder="输入您的提现账号">
                </div>
                <p>
                  <span class="help-block" id="account-msg">请输入与下面提现方式相应的账号</span>
                </p>

                  <label>提现方式：</label>

                    <label class="radio inline" style="font-size:12px;">
                      <input type="radio" name="payment" id="payment1" value="0" checked>
                      <img src="/img/alipay.ico" alt="支付宝" width="20" height="20" style="width:20px;height:20px;"/>
                      &nbsp;支付宝&nbsp;
                    </label>
                   
                    <label class="radio inline" style="font-size:12px;">
                    <input type="radio" name="payment" id="payment3" value="1">
                    <img src="/img/Unionpay.ico"  alt="银联" width="20" height="20" style="width:20px;height:20px;"/>
                    &nbsp;银联卡&nbsp;
                    </label>


              </div>
                <div style="padding:0 10px;">
                   <h5>您的身份：</h5>
                    <div style="padding:0 0 10px 10px;">
                      <label class="radio inline  blue-color tip" title="购买广告位">
                         <input type="radio" name="type" id="type1" value="0">
                        <i class="icon-user"></i>&nbsp;我是买家 &nbsp;
                      </label>
                      <label class="radio  inline  green-color tip" title="发布、出售广告位">
                         <input type="radio" name="type" id="type1" value="1">
                        <i class="icon-user"></i>&nbsp;我是站长  &nbsp;
                      </label>
                     
                    </div>
                     <p>
                      <span class="help-block red-color" style="display:none;color:red;" id="type-msg">请选择您的身份</span>
                    </p>
                    <h5>邀请码（可选）：</h5>
                    <div class="input-prepend">
                      <span class="add-on" ><i class="icon-hand-right"></i></span>
                      <input type="text" id="invite-code" placeholder="输入邀请码，获得本站分红">
                    </div>
                    <p>
                      <span class="help-block" id="code-msg">请输入邀请人为您提供的邀请码</span>
                    </p>
                  </div>
            </div>
               
              
            </div>
        </form>
        <!-- Button -->
              <div class="controls" align="center">
                <a class="btn btn-success" style="width:100px;" id="btn-register" data-toggle="button"  data-loading-text="正在注册...">
                  立刻注册
                </a>
              </div>
      </div>
    </div>
    <!--footer content-->
    <!-- load foot tpl -->
    <{include file="foot.php"}>

    <!-- load modal dialog  -->
    <div class="modal hide fade" data-backdrop="static">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="verifyTitle">下一步，验证邮箱</h4>
      </div>
      <div class="modal-body">
        <p id="verifyContent">我们已经发送了一封验证邮件到您的注册邮箱，请查看邮箱进行验证，完成注册…</p>
      </div>
      <div class="modal-footer">
        <a href="#" id="verifyAddress" class="btn btn-primary">立刻去验证</a>
        <a href="<{spUrl c=main a=login}>"  class="btn btn-success">先登录再说</a>
      </div>
    </div>

    <script type="text/javascript">
    $('.tip').tooltip();
      var emailcheck=false;
      var passwordcheck=false;
      var repasswordcheck=false;
      var namecheck=false;
      var accountcheck=false;
      var phonecheck=false;
      var typecheck=false;
      function checkEmail(){
        if($.trim($("#email").val())==""){
                      $("#email-msg").html("邮箱不能为空！");
                      $("#email-msg").css("color","red");
                       return false;
                  }
       else{
        var reg =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!reg.test($.trim($("#email").val()))){
            $("#email-msg").html("邮箱格式不正确！");
            $("#email-msg").css("color","red");
            return false;
        }else{
          
          $.post("<{spUrl c=cuser a=isExistEmail}>", { email: $.trim($("#email").val())},
             function(data){
               if(data=="1"){
                  $("#email-msg").html("该邮箱已经被注册！");
                  $("#email-msg").css("color","red");
                  return false;
               }else{
                  emailcheck=true;
                  return true;
               }
             });
        }
       }
      }
      function checkPhone(){
        if($.trim($("#phone").val())==""){
                      $("#phone-msg").html("手机号码不能为空！");
                      $("#phone-msg").css("color","red");
                       return false;
                  }
       else{
        var reg =  /^[1][0-9]\d{9}$/;
        if(!reg.test($.trim($("#phone").val()))){
            $("#phone-msg").html("手机号码格式不正确！");
            $("#phone-msg").css("color","red");
            return false;
        }else{
          
          $.post("<{spUrl c=cuser a=isExistPhone}>", { phone: $.trim($("#phone").val())},
             function(data){
               if(data=="1"){
                  $("#phone-msg").html("该手机号码已经被注册！");
                  $("#phone-msg").css("color","red");
                  return false;
               }else{
                  phonecheck=true;
                  return true;
               }
             });
        }
       }
      }
      function checkPassword(){
        passwordcheck=false;
        if($.trim($("#password").val())==""){
                      $("#password-msg").html("密码不能为空！");
                      $("#password-msg").css("color","red");
                       return false;
                  }
       else{
        var reg = /^[A-Za-z0-9]+$/; //验证密码的正则表达式
        if(!reg.test($.trim($("#password").val()))){
            $("#password-msg").html("密码必须是由数字和字符组成");
            $("#password-msg").css("color","red");
            return false;
        }else{
               if($.trim($("#password").val()).length<6||$.trim($("#password").val()).length>20){
                  $("#password-msg").html("密码长度必须是6-20位");
                  $("#password-msg").css("color","red");
                  return false;
               }else{
                  $('#password-ok').css("display","inline");
                  passwordcheck=true;
                  return true;
               }
             }
        }
      }
      function checkRepassword(){
        repasswordcheck=false;
         if($.trim($("#repassword").val())!=$.trim($("#password").val())){
              $("#repassword-msg").html("密码与之前输入不一致！");
              $("#repassword-msg").css("color","red");
               return false;
          }
          else{
            repasswordcheck=true;
            return true;
          }
      }
      function checkName(){
        namecheck=false;
         if($.trim($("#name").val())==""){
              $("#name-msg").html("真实姓名不能为空！");
              $("#name-msg").css("color","red");
               return false;
          }
          else if($.trim($("#name").val()).length>20){
              $("#name-msg").html("真实姓名长度不能大于20！");
              $("#name-msg").css("color","red");
               return false;
          }
          else{
            namecheck=true;
            return true;
          }
      }
      function checkAccount(){
        accountcheck=false;
         if($.trim($("#account").val())==""){
              $("#account-msg").html("账号不能为空！");
              $("#account-msg").css("color","red");
               return false;
          }
          else if($.trim($("#account").val()).length>40){
              $("#account-msg").html("账号长度不能大于40！");
              $("#account-msg").css("color","red");
               return false;
          }
          else{
            accountcheck=true;
            return true;
          }
      }
       function checkType(){
        typecheck=false;
         if($('input[name="type"]:checked').val()==undefined){
              $("#type-msg").show();
               return false;
          }
          else{
           $("#type-msg").hide();
            typecheck=true;
            return true;
          }
      }
      $("#email").blur(function(){//验证
        checkEmail();
      }); 
      $("#email").focus(function(){//恢复初始状态
          emailcheck=false;
          $("#email-msg").html("请输入有效邮箱");
          $("#email-msg").css("color","#999");
         }); 
      $("#phone").blur(function(){//验证
        checkPhone();
      }); 
      $("#phone").focus(function(){//恢复初始状态
          phonecheck=false;
          $("#phone-msg").html("请输入有效手机号码");
          $("#phone-msg").css("color","#999");
         });

      $("#password").blur(function(){//验证
        checkPassword();
      }); 
      $("#password").focus(function(){//恢复初始状态
          passwordcheck=false;
          $("#password-msg").html("请输入6-20位字母和数字组合");
          $("#password-msg").css("color","#999");
         }); 

      $("#repassword").blur(function(){//验证
        checkRepassword();
      }); 
      $("#repassword").focus(function(){//恢复初始状态
          repasswordcheck=false;
          $("#repassword-msg").html("与上面的密码保持一致");
          $("#repassword-msg").css("color","#999");
         }); 
      $("#name").blur(function(){//验证
        checkName();
      })
      $("#name").focus(function(){//恢复初始状态
          namecheck=false;
          $("#name-msg").html("请务必填写真实姓名，否则影响提现");
          $("#name-msg").css("color","#999"); 
      });
      $("#account").blur(function(){//验证
        checkAccount();
      })
      $("#account").focus(function(){//恢复初始状态
          accountcheck=false;
          $("#account-msg").html("请输入与下面提现方式相应的账号");
          $("#account-msg").css("color","#999"); 
      });

      $("#btn-register").click(function(){
        if($('#btn-register').attr("disabled")!="disabled"){//如果按钮是可用状态，则触发点击事件
          checkEmail();
          checkPassword();
          checkRepassword();
          checkName();
          checkAccount();
          checkPhone();
          checkType();
          if(emailcheck&&phonecheck&&passwordcheck&&repasswordcheck&&namecheck&&accountcheck&&typecheck){//如果检查通过
            
            $("#btn-register").button('loading');
            $(".bar").animate({ 
                    width: "66%"
                  }, 1000 );
             $("#second").attr("class",'badge badge-success');
            $.post("<{spUrl c=cuser a=register}>", { email: $.trim($("#email").val()),phone: $.trim($("#phone").val()), password:$.trim($("#password").val()),name: $.trim($("#name").val()),account: $.trim($("#account").val()),payment: $('input[name="payment"]:checked').val(),type: $('input[name="type"]:checked').val(),invite: $.trim($("#invite-code").val().replace(/[\r\n]/g,""))},
             function(data){
               if(data){
                  $('#btn-register').attr('class',"btn btn-success disabled");
                  $('#btn-register').attr("disabled","disabled");
                  $.post("<{spUrl c=main a=email}>",{email:$.trim($("#email").val())},function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                  });
                  $('#verifyAddress').attr("href","http://www."+$.trim($("#email").val().split("@")[1]));
                  $('.modal').modal('show');

               }else{
                  alert("网络问题导致发送邮件失败");
               }
             });
          }else{
            $('#btn-register').button('toggle');
            $('#btn-register').button('reset'); 
          }
        }
      });
    </script>
  </body>
</html>
