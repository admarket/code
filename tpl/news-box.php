
       <{if $newsCount.index%3==0}>
        <div><{$newsCount.index}>
       <{/if}>
        <li class="span4" style="padding:0;width:30%;">
          <div class="ad" style="height:160px;position:relative;cursor:text;" >
             
                <div style="padding:20px;position:relative;overflow-hidden;">
                  <div align="left">
                    <h6><a href="<{spUrl c=main a=news}>?id=<{$news.id}>" class="blue-color" target="_blank"><{$news.title}></a></h6>
                    <div style="overflow:hidden; height:80px; width:200px;text-overflow:ellipsis;word-break:keep-all">
                      <{$news.content|strip_tags}>
                    </div>
                  </div>
                </div>
          </div>
        </li>
         <{if $newsCount.index%3==0}>
            <{$newsCount.index}></div>
          <{/if}>
         