<!DOCTYPE html>
<html>
  <head>
    <title>九尾狐 - 网络广告位交易市场 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <!--I definition-->
    <link href="/css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
  </head>
  <body>
    <!--header content-->
    <div class="header" style="padding-bottom:0;margin-bottom:0;">
      <div class="container">
        <div class="row-fluid">
          <div class="span4"><a href="/"><img src="/img/budgetup.png"/></a></div>
          <div class="span3 offset1">如果您有任何疑问，请关注我们的<a class="tip" title="关注我们的新浪微博">新浪微博</a>,与我们进行互动。</div>
          <div class="span3 offset1">
            <{if $smarty.session.user eq '' }>
              <a class="btn btn-success" href="<{spUrl c=main a=register}>">注册</a>
              <a class="btn" href="<{spUrl c=main a=login}>">登录</a>
            <{else}>
              <a class="btn btn-success" style="width:80px;" href="<{spUrl c=sub a=dashboard}>">
                <i class="icon-user icon-white"></i> 用户中心</a>
                <a class="btn" href="<{spUrl c=sub a=logout}>">退出</a>
            <{/if}>
            
          </div>
        </div>
        <!--nav-head content-->
        <ul class="nav nav-tabs nav-head">
           <{foreach from=$types item=type name=typeCount}>
               <{if $smarty.foreach.typeCount.index == 0}>
                    <li  class="active">
                      <a   style="font-weight:bold;background-color:#fdfdfd;" 
                       href="#"><{$type.name}></a>
                    </li>
                  <{else}>
                      <li><a  href="#"><{$type.name}></a></li>
                  <{/if}>
           <{/foreach}>  
         
        </ul>
      </div>
    </div>
    <!--section content-->
    <div class="section">
      <div class="container">
        <!--intro content-->
        <div class="alert alert-info intro">
          如果您有任何疑问，请关注我们的新浪微博,与我们进行互动。
          <a href="#" class="close" data-dismiss="alert">&times;</a>
        </div>
        <div class="row-fluid">
          <div class="span3  nav-bar" >
            <div style="border-bottom:solid 1px #eee;">
                    <div class="input-append"  style="width:90%;margin:10px;">
                      <form action="<{spUrl c=main a=result}>" method="post">
                      <input  style="width:80%;" name="keyword"  type="text"  placeholder="输入关键词查找…" value="<{$keyword}>">
                      <input  name="category"  type="hidden" value="<{$currentCategory}>">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </div>
                </div>
            <!--nav-bar content-->
              <ul class="nav nav-list side-bar" id="nav-bar">
                
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
            <div class="page-header" style="position:relative;">
              <h6><span class="badge badge-success">Result</span> 查询结果</h6>
              <div class="btn-group" style="position:absolute;right:0;top:0px;">
                <button class="btn btn-mini"><i class="icon-sort"></i>&nbsp; 排名</button>
                <button class="btn btn-mini"><i class="icon-sort"></i>&nbsp; 价格</button>
                <button class="btn btn-mini"><i class="icon-sort"></i>&nbsp; 时间</button>
              </div>
            </div>
            <div class="row-fluid" style="padding:0px;margin:0px;">
                        <ul class="ads">
                            <{if $projects eq ""}>
                                暂无数据
                            <{/if}>
                          <{foreach from=$projects item=project name=projectCount}>
                           <{if $projectCount.index%4==0}>
                            <div>
                             <{/if}>
                            <li class="span3">
                              <a class="ad"   href="<{spUrl c=main a=detail project=$project.id}>">
                                <div class="row">
                                  <div class="span4 offset2">
                                    <img class="img-rounded img-polaroid" src="/img/ads/<{$project.logo}>" alt="">
                                    <h6 align="center" style="color:#0088cc;"><{$project.name}></h6>
                                  </div>
                                  
                                  <div class="span5 offset1">
                                    <h6><span class="label blue"><{$project.type.name}></span></h6>
                                    <p><div>全球排名：</div><{$project.alexa|number_format}></p>
                                  </div>
                                </div>
                              </a>
                            </li>
                          <{/foreach}>
                           <{if $projectCount.index%4==0}>
                            </div>
                             <{/if}>
                        </ul>
                      </div>
                      <div class="pagination" align="center" > 
                        <ul>
                        <{if $pager}>
                        <!--在当前页不是第一页的时候，显示前页和上一页-->
                        <{if $pager.current_page != $pager.first_page}>
                        <li>
                          <a href="<{spUrl c=main a=result  page=$pager.first_page category=$currentCategory keyword=$keyword}>">首页</a>
                        </li> 
                        <li>
                          <a href="<{spUrl c=main a=result   page=$pager.prev_page category=$currentCategory keyword=$keyword}>">上一页</a> 
                        </li>
                        <{/if}>
                        <!--开始循环页码，同时如果循环到当前页则不显示链接-->
                        <{foreach from=$pager.all_pages item=thepage}>
                                <{if $thepage != $pager.current_page}>
                                        <li>
                                          <a href="<{spUrl c=main a=result   page=$thepage category=$currentCategory keyword=$keyword}>"><{$thepage}></a>
                                        </li>
                                <{else}>
                                        <li><a><b><{$thepage}></b></a></li>
                                <{/if}>
                        <{/foreach}>
                        <!--在当前页不是最后一页的时候，显示下一页和后页-->
                        <{if $pager.current_page != $pager.last_page}> 
                        <li>
                          <a href="<{spUrl c=main a=result  page=$pager.next_page category=$currentCategory keyword=$keyword}>">下一页</a>
                        </li>
                        <li>
                          <a href="<{spUrl c=main a=result  page=$pager.last_page category=$currentCategory keyword=$keyword}>">末页</a>
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
    <div class="footer">
      <div class="container">
        <div class="row-fluid">
          <div class="span8">
            ©2013 九尾狐 — 版权所有.<a>隐私声明</a>. 
          </div>
          <div class="span4">
            鸣谢：<a>Glyphicons</a> | <a>BootStramp</a> | <a>BootCss</a> | <a>Jquery</a>
          </div>
        </div>
      </div>
    </div>
    <!--script content-->
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cycle.all.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('.tip').tooltip();
      $(function() {
          
      });
    </script>
  </body>
</html>
