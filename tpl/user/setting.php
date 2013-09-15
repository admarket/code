<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 - 用户中心 - 广告位管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
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
    <script src="/js/jquery.form.js"></script>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row-fluid">
           <div class="span6">
            <a href="/" title="网站首页"><img class="logo-small" src="/img/logo-small.png"/></a>
          </div>
          <div class="span6">
              <ul class="nav nav-pills nav-head">
                <{if $smarty.session.user.type==1}>
                  <li><a href="<{spUrl c=sub a=sitemanage}>">网站管理</a></li>
                  <li><a href="<{spUrl c=sub a=admanage}>">广告位管理</a></li>
                <{else }>
                   <li><a href="<{spUrl c=sub a=product}>">产品管理</a></li>
                  <li><a href="<{spUrl c=sub a=effect}>">统计分析</a></li>
                <{/if}>
                <li>
                  <a href="<{spUrl c=sub a=inbox}>">站内信箱<span class="title">(<{$smarty.session.unread}>)</span>
                  </a>
                </li>
                <li><a href="<{spUrl c=sub a=finance}>">财务统计</a></li>
                <li class="active"><a href="<{spUrl c=sub a=setting}>">基本设置</a></li>
                <li><a href="<{spUrl c=sub a=logout}>">退出</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row-fluid">
          <div class="span3 left-bar">
            <div class="row-fluid category">
                  <div class="span4" align="center">
                     <img src="/img/head/<{$smarty.session.user.headimg}>" class="img-rounded img-polaroid" style="margin:0;height:50px;width:50px;">
                    <p class="title">
                      <{$smarty.session.user.name}>

                    </p>
                                
                  </div> 
                  <div class="span8" style="padding:10px;" >
                    <div class="title">&nbsp;账户余额：</div>
                    <h4 style="color:#50B432;" >
                    <{$smarty.session.user.balance}> &yen;</h4>
                  </div>
                
              </div>
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
                       <{if $smarty.session.user.type==0}>
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
                    <p><{$profits|number_format}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
             <div style="padding-left:0px;">
                 <p class="btn-group">
                  <a id="share" class="btn  btn-danger tip"  title="分享我们的网站"><i class=" icon-heart icon-white"></i></a>
                  <a class="btn tip" title="切换身份" href="<{spUrl c=cuser a=changeIdentity}>"><i class="icon-refresh"></i></a>
                  <a class="btn tip" title="设置" href="<{spUrl c=sub a=setting}>"><i class="icon-cog"></i></a>
                  <a class="btn tip" title="退出" href="<{spUrl c=sub a=logout}>"><i class="icon-off"></i></a>
                </p>
              </div>
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
                      <span class="input-xlarge uneditable-input tip" title="如需修改请联系客服人员">
                        <{$smarty.session.user.name}>
                      </span>
                    </div>
                    <label>邮箱：</label>
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-envelope"></i></span>
                      <span class="input-xlarge uneditable-input"><{$smarty.session.user.email}></span>
                    </div>
                    
                    <label>密码：</label>
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-lock"></i></span>
                      <input type="password" id="password" value="<{$smarty.session.user.password}>"></span>
                    </div>
                    <p class="help-block" id="password-msg">请输入6-20位字母和数字组合</p>
                   <label>默认身份：</label>
                    <div class="box tip" style="width:70%;" title="点击左侧按钮切换身份">
                      
                      <label class="radio" style="font-size:12px;">
                        <{if $user.type==0}>
                        <input type="radio" name="type" id="type1" value="0" checked>
                         <{else}>
                         <input type="radio" name="type" id="type1" value="0">
                        <{/if}>
                        <i class="icon-user"></i>&nbsp;广告客户 - 购买广告位&nbsp;
                      </label>
                      <label class="radio"  style="font-size:12px;">
                        <{if $user.type==1}>
                        <input type="radio" name="type" id="type1" value="1" checked>
                         <{else}>
                         <input type="radio" name="type" id="type1" value="1">
                        <{/if}>
                        <i class="icon-user"></i>&nbsp;广告商 - 出售广告位 &nbsp;
                      </label>
                      
                    </div>
                    <a class="btn btn-success" id="btn-save"  data-toggle="button"  data-loading-text="正在保存...">保存设置</a>
                  </fieldset>
                </form>
              </div>

              <div class="span6" align="center">
                <p>
                  <img src="/img/head/<{$smarty.session.user.headimg}>" id="head-img" class="img-rounded img-polaroid  thumbnail" style="width:80px;height:80px;">
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
                          <input type="text" id="account" value="<{$smarty.session.user.account}>">
                        </div>
                        <p>
                          <p class="help-block" id="account-msg">请输入与下面提现方式相应的账号</p>
                        </p>
                        <div>
                          <label>提现方式：</label>
                          <div class="span5 tip" title="目前仅支持支付宝">
                            <label class="radio" style="font-size:12px;">
                              <input type="radio" name="payment" id="payment1" value="0" checked>
                              <img src="/img/alipay.ico" width="20">
                              &nbsp;支付宝&nbsp;
                            </label>
                            <label class="radio" style="font-size:12px;">
                              <img src="/img/tenpay.ico" width="20">
                              <input type="radio" name="payment" id="payment2" value="1" disabled="disabled">
                              &nbsp;财付通&nbsp;
                            </label>
                            <label class="radio" style="font-size:12px;">
                            <input type="radio" name="payment" id="payment3" value="2" disabled="disabled">
                            <img src="/img/Unionpay.jpg" width="20">
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
    <div class="footer">
      <div class="container">
        <div class="row-fluid">
          <div class="span8">
            ©2013 北京九尾狐科技有限公司 — 版权所有.<a>隐私声明</a>. 
          </div>
          <div class="span4">
            致谢：<a>Glyphicons</a> | <a>BootStramp</a> | <a>BootCss</a> | <a>Jquery</a>
          </div>
        </div>
      </div>
    </div>
<div id="alert-msg" class="alert alert-success " style="position:absolute;top:30%;width:200px;left:40%;box-shadow:0px 0px 2px green;">
      
     <h5> 保存成功！</h5> 
     <p>如果需要更改真实姓名，请用注册邮箱发送邮件联系管理员更改.</p>
</div>
<script type="text/javascript">
$('#share').popover({
  placement:'right',
  title:'',
  content:'fuck',
  html:true
});
var passwordcheck=false;
var accountcheck=false;
$("#head-img").attr("src","/img/head/<{$smarty.session.user.id}>.jpg?id="+Math.random());
$('.tip').tooltip();
$('#password-msg').hide();
$('#account-msg').hide();
$('#alert-msg').hide();
$("#password").focus(function(){//恢复初始状态
    passwordcheck=false;
    $('#password-msg').hide();
    $("#password-msg").html("请输入6-20位字母和数字组合");
    $("#password-msg").css("color","#999");
   }); 
$("#account").focus(function(){//恢复初始状态
    accountcheck=false;
    $('#account-msg').hide();
    $("#account-msg").html("请输入与下面提现方式相应的账号");
    $("#account-msg").css("color","#999"); 
});

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
      checkPassword();
      checkAccount();
      if(passwordcheck&&accountcheck){//如果检查通过
        $("#btn-save").button('loading');
        $.post("<{spUrl c=cuser a=save}>", {  password:$.trim($("#password").val()),account: $.trim($("#account").val()),type: $('input[name="type"]:checked').val()},
           function(data){
             if(data){
                $('#alert-msg').show().delay(1500);
                $("#alert-msg").animate({ 
                  top: "-30px"
                }, 300 ,function(){
                  $('#alert-msg').hide();
                  $('#alert-msg').css('top',"30%");
                  $('#alert-msg').css('left',"40%");
                });
                
             }
             else{
                alert("网络问题导致保存失败");
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
            },  
            error : function(result) {  
                //alert(result);  
            }  
        };  
        if(pre!=obj&&validateImage(obj)) {
            $('#headimgform').ajaxSubmit(options);
            location.reload(); 
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
            alert("只能上传jpg、jpeg、png、bmp或gif格式的图片！");
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
            alert("请选择上传的文件!");
            return false;
        }
    }
</script>
</body>
</html>
