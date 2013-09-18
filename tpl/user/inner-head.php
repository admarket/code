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
                <li>
                  <a href="<{spUrl c=sub a=inbox}>">站内信箱<span class="title">(<{$smarty.session.unread}>)</span>
                  </a>
                </li>
                <li><a href="<{spUrl c=sub a=finance}>">财务统计</a></li>
                <li class="active"><a href="<{spUrl c=sub a=setting}>">基本设置</a></li>
                <li><a href="<{spUrl c=sub a=logout}>">退出</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>