<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 - 全球首家中文网络广告位交易平台 </title>
    <{include file="meta.php"}>
    <{include file="style.php"}>
    <{include file="script.php"}>
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
