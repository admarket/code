<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 - 全球首家中文网络广告位交易平台 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="广告市场,广告位招租,广告位出售,广告位管理,广告位购买，广告位交易，广告交易"/>
    <meta name="description" 
    content="广告市场是全球首家中文网络广告位交易平台，在此发布、管理网站广告位，进行广告位招租、交易买卖，并进行科学的分析和管理。"/>
    <meta name="baidu-site-verification" content="bVy9Kj2D0T" />
    <meta name="chinaz-site-verification" content="2e15194d-b5c9-4e51-b2fe-0932381ee6b7" />
    <meta name="chinaz-site-verification" content="081e7651-48c6-4c2f-a569-99321685eab1" />
   <meta name="360-site-verification" content="fff6bc5e51aeb2abd45918e6b1ad878b" />
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
        
        <div class="row-fluid">
           <div class="span3  nav-bar" >
            <!--nav-bar content-->
               <div style="border-bottom:solid 1px #eee;">
                    <div class="input-append"  style="width:90%;margin:10px;">
                      <form action="<{spUrl c=main a=result}>" method="post">
                      <input  style="width:80%;" name="keyword"  type="text"  placeholder="输入关键词查找…" value="<{$keyword}>">
                      <input  name="category"  type="hidden" value="<{$currentCategory}>">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </div>
                </div>
              <ul class="nav nav-list side-bar" id="nav-bar" style="margin:0;">
                 <{foreach from=$types item=type name=typeCount}>
                    <{foreach from=$type.categories item=category name=categoryCount}>
                         <{if $currentCategory==$category.id}>
                           
                        <li class="active">
                           <{else}>
                            <li>
                          <{/if}>
                          <a href="<{spUrl c=main a=result type=$type.id category=$category.id}>">
                            <{$category.name}></a></li>

                    <{/foreach}>  
                <{/foreach}>  
                
              </ul>
          </div>
          <div class="span9 main-body">
            <!--Body content-->
            <div class="page-header"  style="position:relative;">
              <h6><span class="badge badge-important">Hot</span> 热门网站</h6>
               <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=result type=$type.id category=1}>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            <div  class="row-fluid" style="padding:0px;margin:0px;">
              <ul class="ads slideshow"  style="width:100%;"> 
                    <{if $hots eq ""}>
                        暂无数据
                    <{/if}>
                   <{foreach from=$hots item=hot name=hotCount}>

                       <{if $smarty.foreach.hotCount.iteration % 4  == 1 }>
                          <{assign var=flag value=1}>
                        <div style="width:100%;">
                       <{/if}>
                           <div>
                       
                            <li class="span3">
                              <a class="ad"  title="<{$hot.description}>" href="<{spUrl c=main a=detail project=$hot.id}>">
                                <div class="row">
                                  <div class="span4 offset2">
                                    <img class="img-rounded img-polaroid" src="/img/ads/<{$hot.logo}>" alt="">
                                    <h6 align="center" style="color:#0088cc;white-space:nowrap; "><{$hot.name}></h6>
                                  </div>
                                  
                                  <div class="span5 offset1">
                                    <h6><span class="label label-important">热门</span></h6>
                                    <p><div>全球排名：</div><{$hot.alexa|number_format}></p>
                                  </div>
                                </div>
                              </a>
                            </li>
                      
                          </div>     
                        <{if $smarty.foreach.hotCount.iteration % 4  == 0}>
                        </div>
                       <{/if}>
                   <{/foreach}>
              </ul>
              
            </div>
            <div class="page-header"  style="position:relative;">
              <h6><span class="badge badge-warning">New</span> 最新加入</h6>
              <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=result type=$type.id category=1}>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            <div class="row-fluid" style="padding:0px;margin:0px;">
                        <ul class="ads">
                             <{if $projects eq ""}>
                                暂无数据
                            <{/if}>
                          <{foreach from=$projects item=project name=projectCount}>
                       
                            <div>
  
                            <li class="span3">
                              <a class="ad" title="<{$project.description}>"  href="<{spUrl c=main a=detail project=$project.id}>">
                                <div class="row">
                                  <div class="span4 offset2">
                                    <img class="img-rounded img-polaroid" src="/img/ads/<{$project.logo}>" alt="">
                                    <h6 align="center" style="color:#0088cc;white-space:nowrap;"><{$project.name}></h6>
                                  </div>
                                  
                                  <div class="span5 offset1">
                                    <h6><span class="label blue"><{$project.type.name}></span></h6>
                                    <p><div>全球排名：</div><{$project.alexa|number_format}></p>
                                  </div>
                                </div>
                              </a>
                            </li>
                           
                            </div>
                         
                          <{/foreach}>
                          
                        </ul>
                      </div>
                      <div class="pagination " align="center" style="font-size:12px;"> 
                        <ul>
                        <{if $pager}>
                        <!--在当前页不是第一页的时候，显示前页和上一页-->
                        <{if $pager.current_page != $pager.first_page}>
                        <li>
                          <a href="<{spUrl c=main a=index  page=$pager.first_page category=$currentCategory}>">首页</a>
                        </li> 
                        <li>
                          <a href="<{spUrl c=main a=index   page=$pager.prev_page category=$currentCategory}>">上一页</a> 
                        </li>
                        <{/if}>
                        <!--开始循环页码，同时如果循环到当前页则不显示链接-->
                        <{foreach from=$pager.all_pages item=thepage}>
                                <{if $thepage != $pager.current_page}>
                                        <li>
                                          <a href="<{spUrl c=main a=index   page=$thepage category=$currentCategory}>"><{$thepage}></a>
                                        </li>
                                <{else}>
                                        <li><a><b><{$thepage}></b></a></li>
                                <{/if}>
                        <{/foreach}>
                        <!--在当前页不是最后一页的时候，显示下一页和后页-->
                        <{if $pager.current_page != $pager.last_page}> 
                        <li>
                          <a href="<{spUrl c=main a=index  page=$pager.next_page category=$currentCategory}>">下一页</a>
                        </li>
                        <li>
                          <a href="<{spUrl c=main a=index  page=$pager.last_page category=$currentCategory}>">末页</a>
                        </li>
                        <{/if}>
                        <{/if}>
                        </ul>
                      </div>    
          </div>

        </div>
      </div>
    </div>
    <!--footer content-->
    <{include file="foot.php"}>
    <!--script content-->

    <script type="text/javascript">
      $('.tip').tooltip();
      $(function() {
           $('.slideshow').cycle({
                 fx:      'turnDown', 
                 delay:   -2000  
            });
      });
    </script>
  </body>
</html>
