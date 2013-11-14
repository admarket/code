<div class="header">
      <div class="container">
        <div class="row-fluid">
           <div class="span2">
            <a href="/" title="网站首页"><img class="logo-small" alt="广告位市场-logo" src="/img/logo-small.png"/></a>
          </div>
          <div class="span9 offset1">
              <ul class="nav nav-pills nav-head" style="text-align:right;">
                <li style="padding-right:15%;font-weight:bold;">
                  <a  href="<{spUrl c=main a=index}>">网站首页</a>
                </li>
              
                 
               
                    <{if $smarty.session.user.type==1}>
                      <li <{if $current=="sitemanage"}>class="active"<{/if}>><a href="<{spUrl c=sub a=sitemanage}>">网站管理</a></li>
                      <li <{if $current=="admanage"}>class="active"<{/if}>><a href="<{spUrl c=sub a=admanage}>">广告位管理</a></li>
                     <{else }>
                        <li <{if $current=="product"}>class="active"<{/if}>><a href="<{spUrl c=sub a=product}>">产品管理</a></li>
                        <li <{if $current=="effect"}>class="active"<{/if}>><a href="<{spUrl c=sub a=effect}>">购买记录</a></li>
                      <{/if}>
                   
              
                <li <{if $current=="inbox"}>class="active"<{/if}>>
                  <a href="<{spUrl c=sub a=inbox}>">站内信箱<span class="title" >(<span id="unread-number">0</span>)</span>
                  </a>
                </li>
                <li <{if $current=="finance"}>class="active"<{/if}>><a href="<{spUrl c=sub a=finance}>">财务中心</a></li>
                <li <{if $current=="setting"}>class="active"<{/if}>><a href="<{spUrl c=sub a=setting}>">基本设置</a></li>
                <li <{if $current=="logout"}>class="active"<{/if}>><a href="<{spUrl c=sub a=logout}>">退出</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  $('.dropdown-toggle').dropdown();
var messages;
 $.post("<{spUrl c=cmessage a=getUnreadJsonBySessionID}>",
             function(data){
               if(data!="0"){
                 $("#unread-number").html(data);
                
               }
             });
</script>
    