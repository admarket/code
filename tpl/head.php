 <!--header content-->
    <div class="header" style="padding-bottom:0;margin-bottom:0;">
      <div class="container">
        <div class="row-fluid" style="padding:0px;margin:0;" >
          <div class="span4">
            <a href="/" title="网站首页">
              <img  border="0" width="264px" height="69px" title="广告位市场" alt="广告位市场" src="/img/logo.jpg"/>
            </a>
          </div>
          <div class="span4 input-prepend input-append" style="padding:15px 20px;margin-left:-30px;">
            
             <form id="search-form" name="search-form" action="<{spUrl c=main a=result}>" method="post">
                      
                      <input id="keyword"  name="keyword" style="width:90%;" type="text"  placeholder="输入关键词查找广告位…" value="<{$keyword}>"/>
                      <input id="currentCategory"  name="category"  type="hidden" value="<{$currentCategory}>"/>
                      <input id="currentPrice"  name="price"  type="hidden" value="<{$currentPrice}>"/>
                      <input id="currentAlexa"  name="alexa"  type="hidden" value="<{$currentAlexa}>"/>
                      <input id="currentState"  name="state"  type="hidden" value="<{$currentState}>"/>
                      <input id="currentPage"   type="hidden" value="<{$currentPage}>"/>
                      <input id="currentOrder"   type="hidden" value="<{$currentOrder}>"/>
                      <button class="btn" ><i class="icon-search"></i></button>
              </form>

          </div>
          <div class="span3 offset1">
            <{if $smarty.session.user eq '' }>
              <a class="btn btn-success" href="<{spUrl c=main a=register}>">注册</a>
              <a class="btn" href="<{spUrl c=main a=login}>">登录</a>
            <{else}>
              <a class="btn btn-success" style="width:80px;" href="<{spUrl c=sub a=dashboard}>">
                <i class="icon-user icon-white"></i> 用户中心</a>
                <a class="btn" href="<{spUrl c=sub a=logout}>">退出</a>
            <{/if}>
            
          </div>
        </div>
        <!--nav-head content-->
        
      </div>
    </div>
    