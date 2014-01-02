<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 - 网络广告位交易、发布、投放、管理平台 </title>
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
        <{include file="intro.php"}>
        <div class="row-fluid">
            <!-- load head tpl -->
            <{include file="side-bar.php"}>
          <div class="span8  main-body" >
            <!--Body content-->

            <div class="page-header" >
              <h5><span class="badge badge-important"><i class="icon-thumbs-up"></i></span>&nbsp; 推荐广告位</h5>
               <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=result  category=1}>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            <div  class="row-fluid" style="padding:0 15px;margin:0px;">
              <ul class="ads slideshow"  style="width:100%;"> 
                    <{if $hots eq ""}>
                        暂无数据
                    <{/if}>
                   <{foreach from=$hots item=advertise name=adCount}>
                       <{include file="content-box.php"}>
                   <{/foreach}>
              </ul>
            </div>
              <!--
             <div class="page-header">
              <h5><span class="badge badge-warning">&yen;</span> 刚刚售出</h5>
              <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=result  category=1}>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            
             <div class="row-fluid" style="padding:0 15px;margin:0px;">
              <ul class="ads">
                <{if $solds eq ""}>
                    暂无数据
                <{/if}>
                <{foreach from=$solds item=advertise name=adCount}>
                  <{include file="content-box.php"}>
                <{/foreach}>
      
                </ul>
            </div> 
            -->
            <div class="page-header"  style="position:relative;padding:0 10px;">
              <h5><span class="badge badge-success"><i class="icon-random"></i></span>&nbsp;最新加入</h5>
              <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=result  category=1}>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            <!--footer content-->
             <div class="row-fluid" style="padding:0 15px;margin:0px;">
              <ul class="ads">
                <{if $advertises eq ""}>
                    暂无数据
                <{/if}>
                <{foreach from=$advertises item=advertise name=adCount}>
                  <{include file="content-box.php"}>
                <{/foreach}>
      
                </ul>
            </div> 

            <p style="text-align:center;">
                <a href="<{spUrl c=main a=result  category=1}>" class="btn">
                  <i class="icon-eye-open"></i>&nbsp;查看更多广告位
                </a>
            </p>
            <{if $solds|count neq 0}>
            <div class="page-header">
              <h5><span class="badge badge-warning"><i class="icon-cloud"></i></span> &nbsp;行业新闻</h5>
              <div class="btn-group" style="position:absolute;right:20px;top:0px;">
                <a class="btn btn-mini" href="<{spUrl c=main a=newslist }>">
                  <i class="icon-circle-arrow-right"></i>&nbsp; 更多
                </a>
              </div>
            </div>
            
             <div class="row-fluid" style="padding:0 15px;margin:0px;">
              <ul class="ads">
                
                <{foreach from=$newsList item=news name=newsCount}>
                  <{include file="news-box.php"}>
                <{/foreach}>
      
                </ul>
              </div> 
            <{/if}>
             


          </div>

        </div>
      </div>
    </div>
    <!--footer content-->
    <{include file="foot.php"}>
    <!--script content-->
    
  </body>
</html>
