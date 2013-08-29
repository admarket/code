<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 - 用户中心 - 站内信箱（<{$smarty.session.unread}>未读信息）</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->

    <link href="/css/user.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">  
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row-fluid">
          <div class="span6">
            <a href="/" title="网站首页"><img class="logo-small" src="/img/logo-small.png"/></a>
          </div>
          <div class="span6">
              <ul class="nav nav-pills nav-head">
                <{if $smarty.session.user.type==1}>
                  <li><a href="<{spUrl c=sub a=sitemanage}>">网站管理</a></li>
                  <li><a href="<{spUrl c=sub a=admanage}>">广告位管理</a></li>
                <{else }>
                   <li><a href="<{spUrl c=sub a=product}>">产品管理</a></li>
                  <li><a href="<{spUrl c=sub a=effect}>">统计分析</a></li>
                <{/if}>
                <li class="active">
                  <a href="<{spUrl c=sub a=inbox}>">站内信箱<span class="title">(<{$smarty.session.unread}>)</span>
                  </a>
                </li>
                <li><a href="<{spUrl c=sub a=finance}>">财务统计</a></li>
                <li><a href="<{spUrl c=sub a=setting}>">基本设置</a></li>
                <li><a href="<{spUrl c=sub a=logout}>">退出</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row-fluid">
          <div class="span3 left-bar">
            <div class="row-fluid category">
                  <div class="span4" align="center">
                     <img src="/img/head/<{$smarty.session.user.headimg}>" class="img-rounded img-polaroid" style="margin:0;height:50px;width:50px;">
                    <p class="title"><{$smarty.session.user.name}></p>               
                  </div> 
                  <div class="span8" style="padding:10px;">
                    <div class="title">&nbsp;账户余额：</div>
                    <h4 style="color:#50B432;"><{$smarty.session.user.balance}> &yen;</h4>
                  </div>
                
              </div>
            <!-- Bootstrap -->
            <div class="categories">
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label blue"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;信件总计：</div>
                    <p><{$msgCount|number_format}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label green"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;系统通知：</div>
                    <p><{$notice|number_format}></p>
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
                    <div class=" title">&nbsp;已读：</div>
                    <p><{$read|number_format}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;私人信件：</div>
                    <p><{$personal|number_format}></p>
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
                    <div class=" title">&nbsp;未读：</div>
                    <p><{$unread|number_format}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;公告信息：</div>
                    <p><{$broadcast|number_format}></p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
             <div style="padding-left:0px;">
                 <p class="btn-group">
                  <a id="share" class="btn  btn-danger tip"  title="分享我们的网站"><i class=" icon-heart icon-white"></i></a>
                  <a class="btn tip" title="切换身份" href="<{spUrl c=cuser a=changeIdentity}>"><i class="icon-refresh"></i></a>
                  <a class="btn tip" title="设置" href="<{spUrl c=sub a=setting}>"><i class="icon-cog"></i></a>
                  <a class="btn tip" title="退出" href="<{spUrl c=sub a=logout}>"><i class="icon-off"></i></a>
                </p>
              </div>
            </div>
          </div>
          <div class="span9 main-body" >
           <div style="position:relative;"  class="btn-toolbar">
                <div class="btn-group" data-toggle="buttons-radio">
                   <{if $state eq ""||$state==2}>
                    <a class="btn btn-small active" id="btn-all">所有</a>
                    <a class="btn btn-small" id="btn-read">已读</a>
                    <a class="btn btn-small" id="btn-unread">未读</a>
                  <{elseif $state==0}>
                    <a class="btn btn-small" id="btn-all">所有</a>
                    <a class="btn btn-small" id="btn-read">已读</a>
                    <a class="btn btn-small active" id="btn-unread">未读</a>
                  <{elseif $state==1}>
                    <a class="btn btn-small" id="btn-all">所有</a>
                    <a class="btn btn-small active" id="btn-read">已读</a>
                    <a class="btn btn-small" id="btn-unread">未读</a>
                  <{/if}>
                </div>
                 <div class="btn-group" data-toggle="buttons-checkbox" style="position:absolute;right:10px;top:0px;">
                   <{if $type eq ""||$type==0}>
                    <a class="btn btn-small tip" id="btn-notice" title="系统通知">
                      <i class="icon-info-sign"></i>
                    </a>
                    <a class="btn btn-small tip" id="btn-personal" title="私人信息">
                      <i class="icon-comments-alt" ></i>
                    </a>
                    <a class="btn btn-small  tip" id="btn-broadcast" title="公告信息">
                      <i class="icon-volume-up" ></i>
                    </a>
                  <{elseif $type==1}>
                    <a class="btn btn-small active tip" id="btn-notice" title="系统通知">
                      <i class="icon-info-sign"></i>
                    </a>
                    <a class="btn btn-small tip" id="btn-personal" title="私人信息">
                      <i class="icon-comments-alt" ></i>
                    </a>
                    <a class="btn btn-small tip" id="btn-broadcast" title="公告信息">
                      <i class="icon-volume-up" ></i>
                    </a>
                  <{elseif $type==2}>
                    <a class="btn btn-small tip" id="btn-notice" title="系统通知">
                      <i class="icon-info-sign"></i>
                    </a>
                    <a class="btn btn-small active tip" id="btn-personal" title="私人信息">
                      <i class="icon-comments-alt" ></i>
                    </a>
                    <a class="btn btn-small tip" id="btn-broadcast" title="公告信息">
                      <i class="icon-volume-up" ></i>
                    </a>
                    <{elseif $type==3}>
                    <a class="btn btn-small tip" id="btn-notice" title="系统通知">
                      <i class="icon-info-sign"></i>
                    </a>
                    <a class="btn btn-small tip" id="btn-personal" title="私人信息">
                      <i class="icon-comments-alt" ></i>
                    </a>
                    <a class="btn btn-small active tip" id="btn-broadcast" title="公告信息">
                      <i class="icon-volume-up" ></i>
                    </a>
                  <{/if}>
                </div>
             </div>
            <div class="accordion" id="accordion2">
             
              <div class="  row-fluid" align="center">
                  <div class="span1 title">发件人：</div>
                  <div class="span10 title" align="left">内容：</div>
                  <div class="span1 title" align="left">时间</div>
              </div>
               <{if $messages eq ""}>
                         <div class="alert" style="border:solid 1px #c09853;display:block;width:92%;position:relative;left:0;font-size:12px;">
                  
                        <i class="icon-info-sign"></i>&nbsp;&nbsp;暂无数据内容。
                        </div>     
              <{/if}>
              <{foreach from=$messages item=message}>
              <div class="  row-fluid">
                   <div class="span1" align="center">
                        <img class="img-rounded img-polaroid" width="40" height="40"
                         src="/img/head/<{$message.sender.headimg}>"/>
                         <div class="title"><{$message.sender.name}></div>
                      </div>
                    <div class="accordion-group span11">
                     

                      <div class="accordion-heading" style="box-shadow:1px 1px 2px #ddd;border-radius:5px;position:relative;">
                        <div style="width:100%;background-color:#f6f6f6;">
                        <div style="position:absolute;top:10px;right:10px;color:#ccc;"><{$message.time}></div>
                        <a class="accordion-toggle message" style="color:#555" data-key="<{$message.id}>"
                        data-state="<{$message.state}>" data-toggle="collapse" data-parent="#accordion2" href="#<{$message.id}>">
                          <{if $message.type== 1}>
                           <i class=" icon-info-sign green-color tip" title="系统通知"></i>&nbsp;&nbsp;&nbsp;
                          <{elseif $message.type== 2}>
                              <i class=" icon-comments-alt blue-color tip" title="私人信息"></i>&nbsp;&nbsp;&nbsp;
                            <{elseif $message.type== 3}>
                             <i class=" icon-volume-up red-color tip" title="公告信息"></i>&nbsp;&nbsp;&nbsp;
                          <{/if}>
                          
                          <{if $message.state== 0}>
                            <span class="title" >
                            <{$message.title}>
                            </span>
                          <{else}>
                             <span>
                            <{$message.title}>
                            </span>
                          <{/if}>
                        </a>
                        </div>
                      </div>
                      <{if $message.state== 0}>
                           <div id="<{$message.id}>" class="accordion-body collapse">
                      <{else}>
                            <div id="<{$message.id}>" class="accordion-body collapse in">
                      <{/if}>
                     
                        <div class="accordion-inner">
                           <{$message.content}>
                        </div>
                      </div>

                    </div>
                </div>
             
              <{/foreach}>
            </div>
            <div class="pagination" align="center" > 
                        <ul>
                        <{if $pager}>
                        <!--在当前页不是第一页的时候，显示前页和上一页-->
                        <{if $pager.current_page != $pager.first_page}>
                        <li>
                          <a href="<{spUrl c=sub a=inbox page=$pager.first_page state=$state type=$type}>">首页</a>
                        </li> 
                        <li>
                          <a href="<{spUrl c=sub a=inbox page=$pager.prev_page state=$state type=$type}>">上一页</a> 
                        </li>
                        <{/if}>
                        <!--开始循环页码，同时如果循环到当前页则不显示链接-->
                        <{foreach from=$pager.all_pages item=thepage}>
                                <{if $thepage != $pager.current_page}>
                                        <li>
                                          <a href="<{spUrl c=sub a=inbox page=$thepage state=$state type=$type}>"><{$thepage}></a>
                                        </li>
                                <{else}>
                                        <li><a><b><{$thepage}></b></a></li>
                                <{/if}>
                        <{/foreach}>
                        <!--在当前页不是最后一页的时候，显示下一页和后页-->
                        <{if $pager.current_page != $pager.last_page}> 
                        <li>
                          <a href="<{spUrl c=sub a=inbox page=$pager.next_page state=$state type=$type}>">下一页</a>
                        </li>
                        <li>
                          <a href="<{spUrl c=sub a=inbox page=$pager.last_page state=$state type=$type}>">末页</a>
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
            ©2013 北京九尾狐科技有限公司 — 版权所有.<a>隐私声明</a>. 
          </div>
          <div class="span4">
            致谢：<a>Glyphicons</a> | <a>BootStramp</a> | <a>BootCss</a> | <a>Jquery</a>
          </div>
        </div>
      </div>
    </div>


<script type='text/javascript'>//<![CDATA[ 
 $('.tip').tooltip();
 $("#btn-all").click(function(){
    window.location.href="<{spUrl c=sub a=inbox}>";
 });
 $("#btn-unread").click(function(){
    window.location.href="<{spUrl c=sub a=inbox state=0 type=$type}>";
 });
 $("#btn-read").click(function(){
    window.location.href="<{spUrl c=sub a=inbox state=1 type=$type}>";
 });
 $("#btn-notice").click(function(){
    window.location.href="<{spUrl c=sub a=inbox state=$state type=1}>";
 });
 $("#btn-personal").click(function(){
    window.location.href="<{spUrl c=sub a=inbox state=$state type=2}>";
 });
 $("#btn-broadcast").click(function(){
    window.location.href="<{spUrl c=sub a=inbox state=$state type=3}>";
 });
 $(".message").click(function(){
    var key=$(this).attr("data-key");
    var state=$(this).attr("data-state");
    if($(this).children(".title").hasClass('title')){
       $(this).children(".title").attr('class',false);
    }
    if(state==0){
      $.post("<{spUrl c=cmessage a=updateUnread}>", { id:key});//更新状态为已读到数据库
    }
          
 });
</script>
  </body>
</html>
