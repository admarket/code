<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 - 管理员后台 - 审核中心</title>
   <{include file="meta.php"}>
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/css/user.css" rel="stylesheet" media="screen">
    <style type="text/css">
    #editor {height:100px;padding: 10px;border: solid 1px #ccc;border-radius:5px;
    overflow: scroll; }
    </style>
    <link rel="shortcut icon" href="/favicon.ico">  
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

  </head>
  <body>
     <!-- load head tpl -->
    <{include file="./user/inner-head.php"}>

    <!-- main section -->
    <div class="section">
      <div class="container">
        <div class="row-fluid">
          <div class="span3 left-bar">
              <!-- load user tpl -->
            <{include file="./user/inner-user.php"}>
            <!-- Bootstrap -->
            <div class="categories">
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label blue"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;广告收益：</div>
                    <p><{(0.01*$adIncome)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label green"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;广告支出：</div>
                    <p><{(0.01*$adOutcome)|string_format:"%.2f"}>&nbsp;&yen;</p>
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
                    <div class=" title">&nbsp;累计充值：</div>
                    <p><{(0.01*$handIncome)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;累计提现：</div>
                    <p><{(0.01*$handOutcome)|string_format:"%.2f"}>&nbsp;&yen;</p>
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
                    <div class=" title">&nbsp;总收入：</div>
                    <p><{(0.01*$sumIncome)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;总支出：</div>
                    <p><{(0.01*$sumOutcome)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
            
            </div>
          </div>
          <div class="span9 main-body" >
           
            <div class="tabbable"> <!-- Only required for left/right tabs -->
              
              <ul class="nav nav-tabs" style="position:relative;">
                <li class="active"><a href="#sec-sum" data-toggle="tab" id="tab-sum">广告位审核</a></li>
                <span class="btn-group" style="position:absolute;right:0;">
                        
                </span>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active"  id="sec-sum">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>标题</th>
                        <th >简介</th>
                        <th>网站</th>
                        <th>状态</th>
                        <th style="width:100px;">操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{foreach from=$records item=ad}>
                        <tr>
                        
                        <td>
                           <{$ad.title}>
                        </td>

                         <td>
                           <{$ad.content}>
                        </td>
                        <td>
                           <a class="tip" target="_blank" style="text-decoration:underline;color:#333;" href="<{$ad.base.url}>">
                            <{$ad.base.name}>
                           </a>
                        </td>
                        <td>
                          <{if $ad.verify==0}>
                              <span class="label ">待审核</span>
                          <{elseif $ad.verify==1}>
                               <span class="label  label-success">已通过</span>
                          <{else}>
                               <span class="label label-important">未通过</span>
                          <{/if}>
                        </td>
                        <td>

                          <{if $ad.verify!=1}>
                          <a class="btn btn-mini btn-success tip btn-pass" data-key="<{$ad.id}>">
                            通过</a>
                          <a class="btn btn-mini btn-danger tip btn-refuse" data-key="<{$ad.id}>">
                            拒绝</a>

                          <{/if}>
                        </td>
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
                          <a href="<{spUrl  c=cadmin a=verify page=$pager.first_page}>">首页</a>
                        </li> 
                        <li>
                          <a href="<{spUrl  c=cadmin a=verify page=$pager.prev_page}>">上一页</a> 
                        </li>
                        <{/if}>
                        <!--开始循环页码，同时如果循环到当前页则不显示链接-->
                        <{foreach from=$pager.all_pages item=thepage}>
                                <{if $thepage != $pager.current_page}>
                                        <li>
                                          <a href="<{spUrl  c=cadmin a=verify page=$thepage}>"><{$thepage}></a>
                                        </li>
                                <{else}>
                                        <li><a><b><{$thepage}></b></a></li>
                                <{/if}>
                        <{/foreach}>
                        <!--在当前页不是最后一页的时候，显示下一页和后页-->
                        <{if $pager.current_page != $pager.last_page}> 
                        <li>
                          <a href="<{spUrl c=cadmin a=verify page=$pager.next_page}>">下一页</a>
                        </li>
                        <li>
                          <a href="<{spUrl c=cadmin a=verify page=$pager.last_page}>">末页</a>
                        </li>
                        <{/if}>
                        <{/if}>
                        </ul>
                      </div>  
                       
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!--footer content-->
     <!-- load foot tpl -->
    <{include file="foot.php"}>

  



<script src="/js/jquery.message.js"></script>
<script>
$(".btn-pass").click(function(){
    var id=$(this).attr('data-key');
  
        $.post("<{spUrl c=cadvertise a=verify}>", {  id:$.trim(id)},
             function(data){
               if(data==1){
                  $.msg('审核成功！','color:green;');
                  window.location.reload();
               }
               else{
                  $.msg(data);
                  //window.location.reload();
               }
             });
});
$(".btn-refuse").click(function(){
    var id=$(this).attr('data-key');
  
        $.post("<{spUrl c=cadvertise a=refuse}>", {  id:$.trim(id)},
             function(data){
               if(data==1){
                  $.msg('审核成功！','color:green;');
                  window.location.reload();
               }
               else{
                  $.msg(data);
                  //window.location.reload();
               }
             });
});
</script>
  </body>
</html>
