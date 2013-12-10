<!DOCTYPE html>
<html>
  <head>
    <title>广告行业新闻 -  广告位市场</title>
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
                      <h4  style="color:#555;text-align:center;">广告行业新闻列表</h4>
                </div>
              
            </div>
                <div class="tab-content">
                <div class="tab-pane active"  id="sec-sum" style="font-size:12px;padding:20px;line-height:30px;">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>标题</th>
                        <th>作者</th>
                        <th>时间</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{foreach from=$records item=news}>
                        <tr>
                        <td>
                           <a href="<{spUrl c=main a=news}>?id=<{$news.id}>" class="blue-color" target="_blank"><{$news.title}></a>
                        </td>

                       <td><{$news.author.name}></td>
                        <td><{$news.createTime}></td>
                        
                      </tr>
                      <{/foreach}>  
                    </tbody>
                  </table>   
                </div>
                      <div class="pagination" align="center" > 
                        <ul>
                        <{if $pager}>
                        <!--在当前页不是第一页的时候，显示前页和上一页-->
                        <{if $pager.current_page != $pager.first_page}>
                        <li>
                          <a href="<{spUrl  c=main a=newslist page=$pager.first_page}>">首页</a>
                        </li> 
                        <li>
                          <a href="<{spUrl  c=main a=newslist page=$pager.prev_page}>">上一页</a> 
                        </li>
                        <{/if}>
                        <!--开始循环页码，同时如果循环到当前页则不显示链接-->
                        <{foreach from=$pager.all_pages item=thepage}>
                                <{if $thepage != $pager.current_page}>
                                        <li>
                                          <a href="<{spUrl  c=main a=newslist page=$thepage}>"><{$thepage}></a>
                                        </li>
                                <{else}>
                                        <li><a><b><{$thepage}></b></a></li>
                                <{/if}>
                        <{/foreach}>
                        <!--在当前页不是最后一页的时候，显示下一页和后页-->
                        <{if $pager.current_page != $pager.last_page}> 
                        <li>
                          <a href="<{spUrl c=main a=newslist page=$pager.next_page}>">下一页</a>
                        </li>
                        <li>
                          <a href="<{spUrl c=main a=newslist page=$pager.last_page}>">末页</a>
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
    <!--footer content-->
    <{include file="foot.php"}>
    <!--script content-->

    <script src="/js/jquery.message.js"></script>
    <script type="text/javascript">
      $('.tip').tooltip();


    </script>
  </body>
</html>
