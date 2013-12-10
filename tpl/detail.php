<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 -  <{$project.name}>的所有广告位招租</title>
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
                  <div class="span6 row">
                    <img class="span3 img-rounded img-polaroid" style="width:60px;height:60px;" src="/img/ads/<{$project.logo}>" alt="<{$project.name}>">
                    <div class="span8">
                      <h4  style="color:#555;"><{$project.name}></h4>
                      <span>
                        <a target="_blank" style="color:#ccc;font-weight:normal;" href="<{$project.url}>"><{$project.url}> <i class="icon-eye-open"></i> </a></span>
                    </div> 
                  </div>
                 
                  <div class="span3" style="padding-top:10px;">
                    <div>
                        <i class="icon-globe icon-large icon-spin" style="color:#058DC7;"></i>
                         <span><{$project.alexa|number_format}></span>
                    </div>
                    <div style="color:#666;font-weight:normal;font-size:12px;letter-spacing:3px;">世界网站排名</div>
                  </div>
                  <div class="span3" style="padding-top:10px;">
                    <div>
                        <i class="icon-flag icon-large " style="color:#EC4F4F;"></i>
                        <span> <{$project.localRank|number_format}></span>
                    </div>
                    <div style="color:#666;font-weight:normal;font-size:12px;letter-spacing:3px;">中国网站排名</div>
                  </div>
                </div>
              
            </div>
                <div style="padding:10px;border-bottom:dashed 1px #eee;font-size:12px;margin:0px 0px 10px 0px;">
                  <span>所属类别：</span>
                  <span class="label"><{$project.type.name}></span>
                  <span class="label"><{$project.kind.name}></span>
                </div>
                <p>
                            <i class="icon-quote-left" ></i>
                 </p>
                 <p style="text-indent:30px;line-height:30px;">
                     <{$project.description}>
                 </p>
                 <p align="right">
                        <i class="icon-quote-right"></i>
                </p>
                  
                <div style="padding:10px;border-top:dashed 1px #eee;font-size:12px;margin:0px 0px 10px 0px;">
                    <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        
                        <th>广告位</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;格式</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;宽*高</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;价格 (&yen;)/天</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{foreach from=$project.detail item=advertise name=adCount}> 
                        <{if $advertise.project == $project.id}>
                        <tr>
                         
                          <td>
                              <h6><{$advertise.title}></h6>
                             
                              <div>
                               <{$advertise.content}>
                                
                              </div>
                          </td>
                          <td style="padding-top:10px;">
                             <div style="padding:10px;">
                             <{if $advertise.format == 0}>
                            <i class="icon-font tip" title="文字"></i> 文字
                             <{else if $advertise.format == 1}>
                             <span>
                             <i class="icon-picture tip" title="图片"></i> 图片</span>
                              <{else}>
                              <i class="icon-film tip" title="视频"></i> 视频
                              <{/if}>
                            </div>
                          </td>
                          <td>
                            <div style="padding:10px;">
                           <{$advertise.width}> * 
                            <{$advertise.height}>
                            </div>
                          </td>
                          <td>
                            <div style="padding:10px;">
                           <{(0.01*(0.01*$advertise.fee+1)*$advertise.price)|string_format:"%.2f"}> &yen;
                              </div>
                            </td>
                          
                          
                          <td>
                           <div style="padding:10px;">

                                <{if $advertise.state == 0}>
                                  <{if $smarty.session.user eq '' }>
                                  <a class="btn btn-small btn-success disabled tip"   title="请先登录">
                                   <{else}>
                                   <a class="btn btn-small btn-success" href="<{spUrl c=main a=buy id=$advertise.id}>">
                                    <{/if}>
                                  <i class=" icon-shopping-cart"></i>&nbsp;购买
                                </a>
                                 <{elseif $advertise.state == 1}>
                                 <a url="<{spUrl c=cadvertise a=BuyAdvertise advertiseID=$advertise.id seller=$advertise.project.owner }>" class="btn btn-small btn-danger disabled tip" title="已出售广告位无法购买">
                                  <i class=" icon-shopping-cart"></i>&nbsp;已售
                                </a>
                                 <{elseif $advertise.state == 2}>
                                    <a  class="btn btn-small btn-warning tip"  href="<{spUrl c=main a=booking id=$advertise.id}>" class="btn btn-small btn-danger  tip" title="预订的购买成功率为80%">
                                      <i class=" icon-shopping-cart"></i>&nbsp;预订
                                    </a>
                                <{/if}>
 
                            </div>
                          </td>
                        </tr>
                         <{/if}>
                      <{/foreach}>   
                    </tbody>
                  </table>    
                </div> 
                <div class="alert" style="border:solid 1px #c09853;display:block;width:92%;position:relative;left:0;font-size:12px;">
                  
                  <strong><i class="icon-info-sign"></i>&nbsp;&nbsp;小提示：</strong> 禁止传播违反国家法律法规、社会道德以及虚假广告信息。广告位购买成功后，将无法退订，请谨慎选择。
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
