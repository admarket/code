<div class="header">
      <div class="container">
        <div class="row-fluid">
           <div class="span2">
            <a href="/" title="网站首页"><img class="logo-small" src="/img/logo-small.png"/></a>
          </div>
          <div class="span2 offset1" style="padding:5px;">
              <{if $smarty.session.user.type==1}>
                  <a  class="btn btn-mini btn-primary tip"  data-placement="bottom" title="点击切换为买家"    href="<{spUrl c=cuser a=changeIdentity}>">
                    <i class="icon-user"></i>&nbsp;卖家
                  </a>
                 <{else }>
                 <a  class="btn btn-mini btn-danger tip" data-placement="bottom" title="点击切换为卖家"  href="<{spUrl c=cuser a=changeIdentity}>">
                  <i class="icon-user"></i>&nbsp;买家
                </a>
               <{/if}>
          </div>
          <div class="span6">
              <ul class="nav nav-pills nav-head">
                <{if $smarty.session.user.type==1}>
                  <li <{if $current=="sitemanage"}>class="active"<{/if}> ><a href="<{spUrl c=sub a=sitemanage}>">网站管理</a></li>
                  <li <{if $current=="admanage"}>class="active"<{/if}>><a href="<{spUrl c=sub a=admanage}>">广告位管理</a></li>
                <{else }>
                   <li <{if $current=="product"}>class="active"<{/if}>><a href="<{spUrl c=sub a=product}>">产品管理</a></li>
                  <li <{if $current=="effect"}>class="active"<{/if}>><a href="<{spUrl c=sub a=effect}>">统计分析</a></li>
                <{/if}>
                <li <{if $current=="inbox"}>class="active"<{/if}>>
                  <a href="<{spUrl c=sub a=inbox}>">站内信箱<span class="title">(<{$smarty.session.unread}>)</span>
                  </a>
                </li>
                <li <{if $current=="finance"}>class="active"<{/if}>><a href="<{spUrl c=sub a=finance}>">财务统计</a></li>
                <li <{if $current=="setting"}>class="active"<{/if}>><a href="<{spUrl c=sub a=setting}>">基本设置</a></li>
                <li <{if $current=="logout"}>class="active"<{/if}>><a href="<{spUrl c=sub a=logout}>">退出</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>