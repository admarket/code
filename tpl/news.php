<!DOCTYPE html>
<html>
  <head>
    <title><{$news.title}> -  广告位市场</title>
    <{include file="meta.php"}>
    <{include file="style.php"}>
    <{include file="script.php"}>
  </head>
  <body>
   <!-- load head tpl -->
    <{include file="head.php"}>
    <!--section content-->
    <div class="section">
      <div class="container">
        <!--intro content-->
       
        <div class="row-fluid">
         <!-- load head tpl -->
            <{include file="side-bar.php"}>
          <div class="span8 main-body" style="padding:10px;">
            <!--Body content-->
            
            <div class="page-header" style="margin-bottom:0px;border-bottom:dashed 1px #eee;font-size:12px;">
              
                <div class="row" style="padding:0 0px 10px 30px;vertical-align:bottom;">
                      <h4  style="color:#555;text-align:center;"><{$news.title}></h4>
                </div>
              
            </div>
                <div style="padding:10px;border-bottom:dashed 1px #eee;font-size:12px;margin:0px 0px 10px 0px;">
                  <span>作者：<{$news.author.name}> &nbsp;&nbsp;发布时间：<{$news.createTime}></span>
                  <span style="float:right;">新闻来源：<a href="<{$news.src}>" target="_blank"><{$news.src}></a></span>
                </div>
                <p>
                            <i class="icon-quote-left" ></i>
                 </p>
                 <p style="text-indent:30px;line-height:30px;">
                     <{$news.content}>
                 </p>
                 <p align="right">
                        <i class="icon-quote-right"></i>
                </p>
                  
                <div style="padding:10px;border-top:dashed 1px #eee;font-size:12px;margin:0px 0px 10px 0px;">
                       
                </div> 
                <div class="alert" style="border:solid 1px #c09853;display:block;width:92%;position:relative;left:0;font-size:12px;">
                  
                  <strong><i class="icon-info-sign"></i>&nbsp;&nbsp;小提示：</strong> 本站部分行业新闻来源于网络转载，如果您发现侵犯了您的权利，请联系我们删除，我们会在第一时间进行处理。
                </div>  
          </div>

        </div>
      </div>
    </div>
    <!--footer content-->
    <!--footer content-->
    <{include file="foot.php"}>
    <!--script content-->

    <script src="/js/jquery.message.js"></script>
    <script type="text/javascript">
      $('.tip').tooltip();


    </script>
  </body>
</html>
