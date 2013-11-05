<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 - 全球首家中文网络广告位发布、管理平台 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="广告市场,广告位招租,广告位出售,网络广告位,广告位购买，广告位发布"/>
    <meta name="description" 
    content="广告位市场是全球首家中文网络广告位交易平台，在此发布、管理网站广告位，进行广告位招租、交易买卖，并进行科学的分析和管理。"/>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link rel="stylesheet" href="/css/font-awesome.min.css">

  <!--[if lte IE 6]>
  <!-- bsie css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-ie6.css">

  <!-- bsie 额外的 css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/ie.css">
  <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <!--I definition-->
    <link href="/css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cycle.all.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!--[if lte IE 6]>
    <!-- bsie js 补丁只在IE6中才执行 -->
    <script type="text/javascript" src="/js/bootstrap-ie.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--header content-->
    <!-- load head tpl -->
    <{include file="head.php"}>
    <!--section content-->
    <div class="section">
      <div class="container">
        <!--intro content-->
        <{include file="intro.php"}>
        <div class="row-fluid">
            <!-- load head tpl -->
            <{include file="side-bar.php"}>
          <div class="span9  main-body">
            <!--Body content-->

            <div class="page-header"  style="position:relative;">
              <h5><span class="badge badge-important"><i class="icon-thumbs-up"></i></span>&nbsp; 推荐广告位</h5>
               <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=result  category=1}>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            <div  class="row-fluid" style="padding:0px;margin:0px;">
              <ul class="ads slideshow"  style="width:100%;padding:0;"> 
                    <{if $hots eq ""}>
                        暂无数据
                    <{/if}>
                   <{foreach from=$hots item=advertise name=adCount}>
                       <{include file="content-box.php"}>
                   <{/foreach}>
              </ul>
            </div>

             <div class="page-header"  style="position:relative;">
              <h5><span class="badge badge-warning">&yen;</span> 刚刚售出</h5>
              <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=result  category=1}>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            <!--footer content-->
             <div class="row-fluid" style="padding:0px;margin:0px;">
              <ul class="ads">
                <{if $solds eq ""}>
                    暂无数据
                <{/if}>
                <{foreach from=$solds item=advertise name=adCount}>
                  <{include file="content-box.php"}>
                <{/foreach}>
      
                </ul>
            </div> 

            <div class="page-header"  style="position:relative;">
              <h5><span class="badge badge-success"><i class="icon-random"></i></span>&nbsp;最新加入</h5>
              <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=result  category=1}>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            <!--footer content-->
             <div class="row-fluid" style="padding:0px;margin:0px;">
              <ul class="ads">
                <{if $advertises eq ""}>
                    暂无数据
                <{/if}>
                <{foreach from=$advertises item=advertise name=adCount}>
                  <{include file="content-box.php"}>
                <{/foreach}>
      
                </ul>
            </div> 


          </div>

        </div>
      </div>
    </div>
    <!--footer content-->
    <{include file="foot.php"}>
    <!--script content-->


    
  </body>
</html>
