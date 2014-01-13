<div class="header">
      <div class="container">
        <div   style="position:relative;">
          <div  >
            <a href="/" title="网站首页">
              <img class="logo-small" width="162px"  height="40px" alt="广告位市场-logo" src="/img/logo.jpg"/>
            </a>
          </div>
          <div style="position:absolute;right:0px;top:0px;">
              <ul class="nav nav-pills nav-head" style="text-align:right;">
               
                  <{if $smarty.session.user.id==0}>
                    <li>
                      <a   href="<{spUrl c=cadmin a=news}>" style="font-weight:bold;color:red;">新闻中心</a>
                    </li>
                     <li>
                      <a   href="<{spUrl c=cadmin a=trades}>" style="font-weight:bold;color:green;">交易中心</a>
                    </li>
                     <li>
                      <a   href="<{spUrl c=cadmin a=finance}>" style="font-weight:bold;color:blue;">财务中心</a>
                    </li>
                    <li>
                      <a   href="<{spUrl c=cadmin a=verify}>" style="font-weight:bold;color:red;">审核中心</a>
                    </li>
                   <{else}>
                       <li>
                        <a   href="<{spUrl c=main a=index}>" style="font-weight:bold;">网站首页</a>
                      </li>
                    <{if $smarty.session.user.type==1}>
                      <li <{if $current=="sitemanage"}>class="active"<{/if}>><a href="<{spUrl c=sub a=sitemanage}>">网站管理</a></li>
                      <li <{if $current=="admanage"}>class="active"<{/if}>><a href="<{spUrl c=sub a=admanage}>">广告位管理</a></li>
                     <{else }>
                        <li <{if $current=="product"}>class="active"<{/if}>><a href="<{spUrl c=sub a=product}>">产品管理</a></li>
                        <li <{if $current=="effect"}>class="active"<{/if}>><a href="<{spUrl c=sub a=effect}>">效果统计</a></li>
                         <li <{if $current=="material"}>class="active"<{/if}>><a href="<{spUrl c=sub a=material}>">广告素材</a></li>
                      <{/if}>
                       <li <{if $current=="inbox"}>class="active"<{/if}>>
                        <a href="<{spUrl c=sub a=inbox}>">站内信箱<span class="title">(<span id="unread-number">0</span>)</span>
                        </a>
                      </li>
                       <li <{if $current=="finance"}>class="active"<{/if}>><a href="<{spUrl c=sub a=finance}>">财务中心</a></li>
                   <{/if}>
               
               
                <li <{if $current=="setting"}>class="active"<{/if}>><a href="<{spUrl c=sub a=setting}>">基本设置</a></li>
                <li <{if $current=="logout"}>class="active"<{/if}>><a href="<{spUrl c=sub a=logout}>">退出</a></li>
              </ul>
          </div>

        </div>
      </div>
    </div>

<script type="text/javascript">
var messages;
 $.post("<{spUrl c=cmessage a=getUnreadJsonBySessionID}>",
             function(data){
               if(data!="0"){
                 $("#unread-number").html(data);
                
               }
             });
</script>
    