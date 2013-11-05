<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 - 用户中心 - 基本设置</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <!--[if lte IE 6]>
  <!-- bsie css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-ie6.css">

  <!-- bsie 额外的 css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/ie.css">
  <![endif]-->
     <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/css/bootstrap-fileupload.min.css" rel="stylesheet">
    <link href="/css/user.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico"> 
    <script src="/js/jquery-1.9.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
    <!-- bsie js 补丁只在IE6中才执行 -->
    <script type="text/javascript" src="/js/bootstrap-ie.js" defer></script>
    <![endif]-->
<script src="/js/jquery.form.js"  defer></script>
  </head>
  <body>
    <!-- load head tpl -->
    <{include file="./user/inner-head.php"}>

    <!-- main section -->
    <div class="section">
      <div class="container">
        <div class="row-fluid">
          <div class="span3 left-bar">
             <!-- load user tpl -->
            <{include file="./user/inner-user.php"}>
            <!-- Bootstrap -->
            <div class="categories">
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label blue"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;当前身份：</div>
                    <p>
                       <{if $user.type==0}>
                         广告客户
                         <{else}>
                         广告商
                        <{/if}>
                    </p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label green"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;验证状态：</div>
                    <p>
                         <{if $user.verify==0}>
                        未验证
                         <{else}>
                         已验证
                        <{/if}>
                    </p>
                  </div>
                  
                </div>
              </div>
              <!-- Bootstrap -->
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label a"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;网站：</div>
                    <p><{$projectCount}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;广告位：</div>
                    <p><{$adCount}></p>
                  </div>
                  
                </div>
              </div>
              <!-- Bootstrap -->
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label label-warning"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;已出售：</div>
                    <p><{$soldAd}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;广告收入：</div>
                    <p><{(0.01*$profits)|number_format}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
      
            </div>
          </div>
          <div class="span9 main-body">
            <div class="row-fluid">
              
              <div class="span6">
               
                <form>
                  <fieldset>
                    <legend><h4>基本信息</h4></legend>
                    <label>真实姓名：</label>
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-user"></i></span>
                      <span id="user-name" class="input-xlarge uneditable-input tip" title="如需修改请联系客服人员">
                        <{$user.name}>
                      </span>
                    </div>
                    <label>邮箱：</label>
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-envelope"></i></span>
                      <span  id="user-email" class="input-xlarge uneditable-input"><{$user.email}></span>
                    </div>
                    <label>手机：</label>
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-mobile-phone icon-large"></i></span>
                      <input type="text" class="input-xlarge " id="phone" value="<{$user.mobilephone}>"/>
                      
                    </div>
                    <p class="help-block" id="phone-msg">请输入有效手机号码</p>
                    <label>密码：</label>
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-lock"></i></span>
                      <span class="input uneditable-input">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span>
                      <a id="btn-changePwd" class="btn btn-primary">修改密码</a>
                    </div>
                   <label>默认界面：</label>
                    <div class="box tip" style="width:70%;" title="选择登录后默认界面">
                      
                      <label class="radio" style="font-size:12px;">
                        <{if $user.type==0}>
                        <input type="radio" name="type" id="type1" value="0" checked>
                         <{else}>
                         <input type="radio" name="type" id="type1" value="0">
                        <{/if}>
                        <i class="icon-user"></i>&nbsp;我是买家 - 购买广告位&nbsp;
                      </label>
                      <label class="radio"  style="font-size:12px;">
                        <{if $user.type==1}>
                        <input type="radio" name="type" id="type1" value="1" checked>
                         <{else}>
                         <input type="radio" name="type" id="type1" value="1">
                        <{/if}>
                        <i class="icon-user"></i>&nbsp;我是卖家 - 出售广告位 &nbsp;
                      </label>
                      
                    </div>
                    <a class="btn btn-success" id="btn-save"  data-toggle="button"  data-loading-text="正在保存...">保存设置</a>
                  </fieldset>
                </form>
              </div>

              <div class="span6" align="center">
                <p>
                  <img src="/img/head/<{$user.headimg}>" id="head-img" class="img-rounded img-polaroid  thumbnail" style="width:80px;height:80px;">
                  <div>
                    <form id="headimgform" method="post" action="<{spUrl c=cuser a=uploadHeadimg}>" enctype="multipart/form-data"> 
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div>
                        <span class="btn btn-file btn-small" id="btn-upload">
                          <span class="fileupload-new">更换头像</span>                   
                          <input type="file" name="file" id="file" />
                        </span>
                      </div>
                    </form>
                  </div>
                </p>
                <div class="box" style="width:70%;" align="left">
                    <form>
                      <fieldset>
                        <legend><h5>提现账户</h5></legend>
                        <label>账号：</label>
                        <div class="input-prepend">
                          <span class="add-on" style="font-weight:bold;">&yen;</span>
                          <input type="text" id="account" value="<{$user.account}>">
                        </div>
                        <p>
                          <p class="help-block" id="account-msg">请输入与下面提现方式相应的账号</p>
                        </p>
                        <div>
                          <label>提现方式：</label>
                          <div class="span5">
                           <label class="radio" style="font-size:12px;">
                               <{if $user.payment==0}>
                              <input type="radio" name="payment" id="payment1" value="0" checked/>
                               <{else}>
                               <input type="radio" name="payment" id="payment1" value="0"/>
                              <{/if}>
                              
                              <img src="/img/alipay.ico" width="20" height="20" style="width:20px;height:20px;"/>
                              &nbsp;支付宝&nbsp;
                            </label>
                            <label class="radio" style="font-size:12px;">
                             <{if $user.payment==1}>
                              <input type="radio" name="payment" id="payment1" value="1" checked/>
                               <{else}>
                               <input type="radio" name="payment" id="payment1" value="1"/>
                              <{/if}>
                            <img src="/img/Unionpay.ico" width="20" height="20" style="width:20px;height:20px;"/>
                            &nbsp;银联卡&nbsp;
                            </label>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                </div>
              </div>
                
            </div>
          </div>  
      </div>
    </div>
    <!--footer content-->
     <!-- load foot tpl -->
    <{include file="foot.php"}>
<div class="modal hide fade" id="form-changePwd">
   
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>修改密码</h3>
  </div>
  
  <div class="modal-body" style="padding:10px 20px;">
    <form name="alipayment" action="<{spUrl c=cuser a=changePassword}>" method="post" target="_blank">
        <div>
                <p>
                  <label>旧密码:</label>
                </p>
                <p>
                    <input size="30" type="password" placeholder="请输入旧的密码" id="oldPassword" class="input-large" name="oldPassword" />
                </p>
                <p>
                  <label>新密码:</label>
                </p>
                <p>
                    <input size="30" type="password"  placeholder="请输入新的密码" id="password" class="input-large" name="newPassword" />
                        <span id="password-msg">必填,6-20位数字字母组合</span>
                </p>
                <p>
                  <label>确认新密码:</label>
                </p>
                <p>
                    <input size="30" type="password"  placeholder="请再次输入新的密码" id="repassword" class="input-large" name="repassword" />
                        <span id="repassword-msg">输入与上面相同的密码</span>
                </p>
                <p>
                  <a class="btn btn-success"  id="btn-savePwd">确认修改</a>
                </p>
        </div>
          </form>
  </div>

  <div class="modal-footer">
    
  </div>
  
</div>

<script src="/js/jquery.message.js"  defer></script>
<script type="text/javascript">
$('#share').popover({
  placement:'right',
  title:'',
  content:'fuck',
  html:true
});
var passwordcheck=false;
var repasswordcheck=false;
var accountcheck=false;
var phonecheck=false;
var ajaxFlag=false;
$("#head-img").attr("src","/img/head/<{$user.headimg}>");
$('.tip').tooltip();
$('#password-msg').show();
$('#account-msg').hide();
$('#repassword-msg').show();
$("#password").focus(function(){//恢复初始状态
    passwordcheck=false;
    $('#password-msg').hide();
    $("#password-msg").html("请输入6-20位字母和数字组合");
    $("#password-msg").css("color","#999");
   }); 
$("#password").blur(function(){//恢复初始状态
   checkPassword();
   }); 
$("#repassword").focus(function(){//恢复初始状态
    repasswordcheck=false;
    $('#repassword-msg').hide();
    $("#repassword-msg").html("请再次输入新的密码");
    $("#repassword-msg").css("color","#999");
   });
$("#repassword").blur(function(){//恢复初始状态
   checkRepassword();
   }); 
$("#account").focus(function(){//恢复初始状态
    accountcheck=false;
    $('#account-msg').hide();
    $("#account-msg").html("请输入与下面提现方式相应的账号");
    $("#account-msg").css("color","#999"); 
});
$("#btn-changePwd").click(function(){//恢复初始状态
    $("#oldPassword").val('');
    $("#password").val('');
    $("#repassword").val('');
    $("#password-msg").html("请输入6-20位字母和数字组合");
    $("#password-msg").css("color","#999");
    $("#repassword-msg").html("请输入与上面相同的密码");
    $("#repassword-msg").css("color","#999");
    $('#form-changePwd').modal();
});
$("#btn-savePwd").click(function(){//恢复初始状态
    checkPassword();
    checkRepassword();
    if(passwordcheck&&repasswordcheck){//如果检查通过
          
            $.post("<{spUrl c=cuser a=changePassword}>", {  oldPassword:$.trim($("#oldPassword").val()),newPassword: $.trim($("#password").val())},
             function(data){
               if(data.indexOf("操作失败")<0){
                  $.msg('保存成功！','color:green;');
                  $('#form-changePwd').modal('hide');
               }
               else{
                  $.msg(data);
               }
             });
        }
});
function checkPhone(){
        if($.trim($("#phone").val())==""){
                      $("#phone-msg").html("手机号码不能为空！");
                      $("#phone-msg").css("color","red");
                      phonecheck=false;
                       return false;
                  }
       else{
        var reg =  /^[1][0-9]\d{9}$/;
        if(!reg.test($.trim($("#phone").val()))){
            $("#phone-msg").html("手机号码格式不正确！");
            $("#phone-msg").css("color","red");
            phonecheck=false;
            return false;
        }else{
                  phonecheck=true;
                  return true;
          
        }
       }
      }
function checkPassword(){
        if($.trim($("#password").val())==""){
                      $('#password-msg').show();
                      $("#password-msg").html("密码不能为空！");
                      $("#password-msg").css("color","red");
                       return false;
                  }
       else{
        var reg = /^[A-Za-z0-9]+$/; //验证密码的正则表达式
        if(!reg.test($.trim($("#password").val()))){
            $('#password-msg').show();
            $("#password-msg").html("密码必须是由数字和字符组成");
            $("#password-msg").css("color","red");
            return false;
        }else{
               if($.trim($("#password").val()).length<6||$.trim($("#password").val()).length>20){
                  $('#password-msg').show();
                  $("#password-msg").html("密码长度必须是6-20位");
                  $("#password-msg").css("color","red");
                  return false;
               }else{
                  
                  passwordcheck=true;
                  return true;
               }
             }
        }
      }
      function checkRepassword(){
        repasswordcheck=false;
         if($.trim($("#repassword").val())!=$.trim($("#password").val())){
              $("#repassword-msg").show();
              $("#repassword-msg").html("密码与之前输入不一致！");
              $("#repassword-msg").css("color","red");
               return false;
          }
          else{
            repasswordcheck=true;
            return true;
          }
      }
 function checkAccount(){
         if($.trim($("#account").val())==""){
              $('#account-msg').show();
              $("#account-msg").html("账号不能为空！");
              $("#account-msg").css("color","red");
               return false;
          }
          else if($.trim($("#account").val()).length>40){
              $('#account-msg').show();
              $("#account-msg").html("账号长度不能大于40！");
              $("#account-msg").css("color","red");
               return false;
          }
          else{
            accountcheck=true;
            return true;
          }
      }
$("#btn-save").click(function(){
      //checkPassword();
      checkAccount();
      checkPhone();
      if(phonecheck&&accountcheck){//如果检查通过
          $("#btn-save").button('loading');
          
            $.post("<{spUrl c=cuser a=save}>", {  phone:$.trim($("#phone").val()),account: $.trim($("#account").val()),type: $('input[name="type"]:checked').val(),payment: $('input[name="payment"]:checked').val()},
             function(data){
               if(data.indexOf("操作失败")<0){
                  $.msg('保存成功！','color:green;');
               }
               else{
                  $.msg(data);
               }
             });
        }
     $('#btn-save').button('toggle');
     $('#btn-save').button('reset'); 
   });
var pre="";   //标记前一个上传的文件
$("#file").change(function(){
        $("#btn-upload").button('正在上传...');
        var obj = $("#file").val();
        var options = {  
            success : function(data) {  
                //alert(data); 
                if(data.indexOf("操作失败")<0) {
                  $.msg('上传成功！','color:green;'); 
                  location.reload(); 
                } 
                else{
                  $.msg(data);
                }
                 
            },  
            error : function(result) {  
                $.msg(result);  
            }  
        };  
        if(pre!=obj&&validateImage(obj)) {
            $('#headimgform').ajaxSubmit(options);
            
        }
        else{
            //alert("error");
        }
      });

 //校验图片格式及大小 Add Date 2012-6-14 LIUYI
    function validateImage(val) {
        var tmpFileValue = val.toLowerCase();
        var reg=/^.*?\.(gif|png|jpg|jpeg|bmp)$/;
        //校验图片格式
        if(reg.test(tmpFileValue)){
            return true;
        } else {
            $.msg("只能上传jpg、jpeg、png、bmp或gif格式的图片！"); 
            return false;
        }
        
        //校验图片大小,这段代码需调整浏览器安全级别(调到底级)和添加可信站点(将服务器站点添加到可信站点中)
        //var imgSize = 1024 * 100; //最大100K
        //var img = new Image();
        if(file.value != ""){
            
        //    img.onreadystatechange = function(){
        //        if(img.readyState == "complete"){
        //            if(img.fileSize <=0 || img.fileSize > imgSize){
        //                alert("当前文件大小" + img.fileSize / 1024 + "KB, 超出最大限制 " + imgSize / 1024 + "KB");
        //                return false;
        //            }else{
        //                alert("OK");
        //                return true;
        //            }
        //        }
        //    }
            
        //    img.src = file.value;
            //return true;
        }else{
            $.msg("请选择上传的文件!"); 
            return false;
        }
    }
</script>
</body>
</html>
