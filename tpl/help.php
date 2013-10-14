<!DOCTYPE html>
<html>
  <head>
    <title>广告市场  - 用户使用帮助及常见问题</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="广告市场,广告位招租,广告位出售,广告位管理"/>
    <meta name="description" 
    content="广告市场是全球首家中文网络广告位交易平台，在此发布、管理网站广告位，进行广告位招租、交易买卖，并进行科学的分析和管理。"/>
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
    <{include "head.php"}>
    <div class="section">
      <div class="container"  style="width:90%; padding:20px 0 100px 0;">
        <div class="row-fluid" style="padding:0px;">
        <!--nav bar content-->
         <div class="span3 bs-docs-sidebar" data-spy="affix" >
          <ul class="nav nav-tabs nav-stacked" style="background-color:#fff;box-shadow:0px 1px 1px #ddd;border-radius:5px;">
            <li><a href="#seller" class="active"><i class="icon-chevron-right"></i> 我是卖家</a></li>
            <li><a href="#buyer"><i class="icon-chevron-right"></i> 我是买家</a></li>
            
            <li><a href="#question"><i class="icon-chevron-right"></i> 常见问题</a></li>
            <li><a href="#privacy"><i class="icon-chevron-right"></i> 隐私条款</a></li>
            <li><a href="#about"><i class="icon-chevron-right"></i> 关于我们</a></li>
            <li><a href="#top"><i class="icon-chevron-right"></i> 返回顶部</a></li>
          </ul>
        </div>
        <div class="span9 offset3 box" style="margin-top:0px;border-radius:5px;box-shadow:0px 1px 1px #ddd;padding:20px;line-height:2;">
            <div id="privacy">
              <p>我们保证我们的雇员和我方服务人员依法正确获得、使用和处理用户个人信息。为此，我们保证严格遵守国际通行隐私保护标准。除当地法律对此有更严格的限制条款外，此条款适用于全球范围。</p>
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
