<!DOCTYPE html>
<html>
  <head>
    <title>广告市场  - 测试页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
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
    <div class="header" style="padding-bottom:20px;margin-bottom:0;">
  <div class="container">
        <div class="row-fluid">
          <div class="span4"><a href="/" title="网站首页"><img class="logo" src="/img/logo.png"/></a></div>
        </div>
       
  </div>
</div>
    <div class="section">
      <div class="container"  style="width:90%; padding:20px 0 100px 0;">
        <div class="row-fluid" style="padding:0px;">
        <!--nav bar content-->
          <div class="span3 bs-docs-sidebar" data-spy="affix" >
              
                             
          </div>
        </div>
        <div class="span9 offset3 box" style="margin-top:0px;border-radius:5px;box-shadow:0px 1px 1px #ddd;padding:20px;line-height:2;">
            <div id="privacy">
              <p> 
<div class="admarket_ad" style="display:inline;" aid="87" id="admarket_box_87"></div>
<script type="text/javascript" charset="utf-8" id="admarket_shell" src="http://localhost/?c=cadvertise&a=GetADCode&aid=87"></script>
<script type="text/javascript" charset="utf-8" id="admarket_js_87" src="http://localhost/js/ad.js?aid=87"></script>
<!--Eadmarket ad code-->
<script type="text/javascript" charset="utf-8">
(function(){
  var eadmarket=document.createElement('script');
  eadmarket.type="text/javascript";
  eadmarket.async=true;
  eadmarket.charset="utf-8";
  eadmarket.src="http://localhost/js/ad.js?aid=87";
});
</script>             
                            </div>
                             
                             
                             我们保证我们的雇员和我方服务人员依法正确获得、使用和处理用户个人信息。为此，我们保证严格遵守国际通行隐私保护标准。除当地法律对此有更严格的限制条款外，此条款适用于全球范围。</p>
<h5>我们承诺做到如下几点：</h5>
<p>1、严格遵守正确收集和使用用户个人信息条款；履行法律责任，明确使用用户信息目的；数据特殊保护说明中明确规定要保护用户个人信息；根据网站所需依法正确收集和处理用户个人信息；确保个人信息的正确；审核决定保存用户信息的时间限度；确保用户能依法行使个人权利；实施技术和组织安全措施保护用户个人信息。</p>
<p>2、用户在向网站提前个人信息前，我们努力确保让用户了解以下几点：收集信息的目的；信息的用途；任何接受信息一方的身份和他们使用信息的目的；如何申请复制提交的个人信息。</p>
<p>3、我们对我们所连链接的网站不负隐私保护的责任，此声明只适用于在本网站注册的个人用户。</p>
<p>4、我们的IP地址只用于分析趋势、管理网站、跟踪用户活动和收集信息，不用于可识别个人信息的查询。</p>
<p>5、此外，我们使用cookies用于用户兴趣追踪，以便提高网站的服务水平。即便您的浏览器拒绝cookies，您依然可以登陆我们的网站。</p>
            </div>
            <p id="about">
                <h5>联系我们</h5>
                公司地址：北京市昌平区青年创业大厦A座3A26<br/>
                联系电话：010-60739009<br/>
            </p>
        </div>
      </div>
    </div>
    <!--footer content-->
    <{include file="foot.php"}>

    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
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
      $(".nav-stacked li a").click(function(){
        $(".nav-stacked li a.active").removeClass("active");
          $(this).addClass("active");
          
      });
    </script>
  </body>
</html>
