
       <{if $adCount.index%3==0}>
        <div><{$adCount.index}>
       <{/if}>
        <li class="span4" style="padding:0;width:30%;">
          <div class="ad" style="height:160px;position:relative;"   href="<{spUrl c=main a=detail project=$advertise.base.id}>">
            <div class="row-fluid">
              <div class="span4" align="center">
                <img class="img-rounded img-polaroid" src="/img/ads/<{$advertise.base.logo}>" alt="<{$advertise.base.name}>广告位招租" title="<{$advertise.base.name}>广告位招租">
                <h6 align="center" style="color:#0088cc;">
                  <a href="<{spUrl c=main a=detail project=$advertise.base.id}>" class="blue-color"><{$advertise.base.name}></a>
                </h6>
              </div>
              
              <div class="span7">
                 <h6>
                    <span class="title">状态：</span>
                      <{if $advertise.state==1}>
                        <span class="label label-important">已售</span>
                      <{else}>
                        <span class="label label-success">未售</span>
                      <{/if}>
                 </h6>
                
                <{if $smarty.session.user eq '' }>
                  <{if $advertise.format==0}>
                    <div><span class="title">格式：</span><i class="icon-font tip" title="文字"></i>&nbsp;文字</div>
                  <{elseif $advertise.format==1}>
                    <div><span class="title">格式：&nbsp;</span><i class="icon-picture tip" title="图片"></i>&nbsp;图片</div>
                  <{else}>
                     <div><span class="title">格式：&nbsp;</span><i class="icon-film tip" title="视频"></i>视频</div>
                  <{/if}>
                    <div><span class="title">市场价：&nbsp;</span><{((1+0.1*rand(1,10))*0.01*(0.01*$advertise.fee+1)*$advertise.price)|number_format}>&yen;/天</div>
                    <div><span class="title">会员价：&nbsp;</span>登录可见</div>
                <{else}>
                  <{if $advertise.format==0}>
                    <div><span class="title">格式：</span><i class="icon-font tip" title="文字"></i>&nbsp;文字</div>
                    <div><span class="title">字号：&nbsp;</span><{$advertise.width}></div>
                  <{elseif $advertise.format==1}>
                    <div><span class="title">格式：&nbsp;</span><i class="icon-picture tip" title="图片"></i>&nbsp;图片</div>
                    <div><span class="title">大小：&nbsp;</span><{$advertise.width}>*<{$advertise.height}></div>
                  <{else}>
                     <div><span class="title">格式：&nbsp;</span><i class="icon-film tip" title="视频"></i>视频</div>
                     <div><span class="title">大小：&nbsp;</span> <{$advertise.width}>*<{$advertise.height}></div>
                  <{/if}>
                  <div><span class="title">会员价：&nbsp;</span><{(0.01*(0.01*$advertise.fee+1)*$advertise.price)}>&yen;/天</div>
                <{/if}>
                 
                 
                
              </div>
             
            </div>
             <div style="position:absolute;left:0;bottom:0;padding-left:5%;margin-bottom:10px;"> 
                <i class="icon-globe icon-large icon-spin" style="color:#058DC7;"></i>
                <span>&nbsp;&nbsp;<span class="title">全球排名：&nbsp;</span><{$advertise.base.alexa|number_format}></span>
            </div>
            <div class="buy-bar">
                <div style="padding:20px;position:relative;overflow-hidden;">
                  <div align="left">
                    <h6><{$advertise.title}></h6>
                    <div><{$advertise.content|truncate:30}></div>
                  </div>
                  <p style="padding:10px;">
                    <a class="btn btn-small  btn-primary" target="_blank" href="<{spUrl c=main a=go}>?url=<{$advertise.base.url}>">浏览网站</a>
                    <{if $advertise.state==2}>
                      <a class="btn btn-small  btn-warning" target="_blank"  href="<{spUrl c=main a=booking id=$advertise.id}>">预订广告位</a>
                    <{elseif $advertise.state==0}>
                      <a class="btn btn-small btn-success" target="_blank" href="<{spUrl c=main a=buy id=$advertise.id}>">购买广告位</a>
                    <{else $advertise.state==1}>
                      <a class="btn btn-small btn-danger disabled">已经出售</a>
                    <{/if}>
                  </p>
                </div>
            </div>
          </div>
        </li>
         <{if $adCount.index%3==0}>
            <{$adCount.index}></div>
          <{/if}>
     

<script>
$(".ad").mouseover(function(){
    $(this).children('.buy-bar').show();
  
});
$(".ad").mouseleave(function(){
  $(this).children('.buy-bar').hide();
});
</script>
         