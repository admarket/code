<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 -  <{$project.name}>的所有广告位</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    
    <!--I definition-->
    <link href="/css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
  </head>
  <body>
    <!--header content-->
    <div class="header" style="padding-bottom:0;margin-bottom:0;">
      <div class="container">
        <div class="row-fluid">
          <div class="span4"><a href="/" title="网站首页"><img class="logo" src="/img/logo.png"/></a></div>
          <div class="span3 offset1">如果您有任何疑问，请关注我们的<a class="tip" title="关注我们的新浪微博">新浪微博</a>,与我们进行互动。</div>
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
        <ul class="nav nav-tabs nav-head">
           <{foreach from=$types item=type name=typeCount}>
               <{if $smarty.foreach.typeCount.index == 0}>
                    <li  class="active">
                      <a   style="font-weight:bold;background-color:#fdfdfd;" 
                       href="#"><{$type.name}></a>
                    </li>
                  <{else}>
                      <li><a  href="#"><{$type.name}></a></li>
                  <{/if}>
           <{/foreach}>  
         
        </ul>
      </div>
    </div>
    <!--section content-->
    <div class="section">
      <div class="container">
        <!--intro content-->
       
        <div class="row-fluid">
          <div class="span3  nav-bar" >
            <div style="border-bottom:solid 1px #eee;">
                    <div class="input-append"  style="width:90%;margin:10px;">
                      <form action="<{spUrl c=main a=result}>" method="post">
                      <input  style="width:80%;" name="keyword"  type="text"  placeholder="输入关键词查找…" value="<{$keyword}>">
                      <input  name="category"  type="hidden" value="<{$currentCategory}>">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </div>
                </div>
            <!--nav-bar content-->
              <ul class="nav nav-list side-bar" id="nav-bar">
                
                 <{foreach from=$types item=type name=typeCount}>
                    <{foreach from=$type.categories item=category name=categoryCount}>
                         <{if $currentCategory==$category.id}>
                           
                        <li class="active">
                           <{else}>
                            <li>
                          <{/if}>
                          <a href="<{spUrl c=main a=result type=$type.id category=$category.id}>">
                            <{$category.name}></a></li>

                    <{/foreach}>  
                <{/foreach}>  
                
              </ul>
          </div>
          <div class="span9 main-body">
            <!--Body content-->
            
            <div class="page-header" style="margin-bottom:0px;border-bottom:dashed 1px #eee;font-size:12px;">
              
                <div class="row" style="padding:0 0px 10px 30px;vertical-align:bottom;">
                  <div class="span6 row">
                    <img class="span3 img-rounded img-polaroid" style="width:60px;height:60px;" src="/img/ads/<{$project.logo}>" alt="">
                    <div class="span8">
                      <h4  style="color:#555;"><{$project.name}></h4>
                      <span>
                        <a style="color:#ccc;font-weight:normal;" href="<{$project.url}>"><{$project.url}> <i class="icon-eye-open"></i> </a></span>
                    </div> 
                  </div>
                 
                  <div class="span3" style="padding-top:10px;">
                    <div>
                        <i class="icon-globe icon-large icon-spin" style="color:#058DC7;"></i> <{$project.alexa|number_format}>
                    </div>
                    <div style="color:#666;font-weight:normal;font-size:12px;letter-spacing:3px;">世界网站排名</div>
                  </div>
                  <div class="span3" style="padding-top:10px;">
                    <div>
                        <i class="icon-flag icon-large " style="color:#EC4F4F;"></i>
                        <span> <{$project.localRank|number_format}></span>
                    </div>
                    <div style="color:#666;font-weight:normal;font-size:12px;letter-spacing:3px;">地区网站排名</div>
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
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;长*宽</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;价格 (&yen;)/月</th>
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
                           <{$advertise.price|number_format}> &yen;
                              </div>
                            </td>
                          
                          
                          <td>
                           <div style="padding:10px;">
                            <{if $advertise.state == 0}>
                             <a  tabindex='<{$advertise.id}>' url="<{spUrl c=ctrade a=BuyAd advertise=$advertise.id seller=$advertise.project.owner price=$advertise.price}>"
                              class="btn btn-small btn-success buy" data-placement="top" data-html="true" data-price="<{$advertise.price}>">
                              <i class=" icon-shopping-cart"></i>&nbsp;购买
                            </a>
                             <{else}>
                             <a url="<{spUrl c=cadvertise a=BuyAdvertise advertiseID=$advertise.id seller=$advertise.project.owner }>" class="btn btn-small btn-danger disabled tip" title="已出售广告位无法购买">
                              <i class=" icon-shopping-cart"></i>&nbsp;已售
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
    <div class="footer">
      <div class="container">
        <div class="row-fluid">
          <div class="span8">
            ©2013 九尾狐 — 版权所有.<a>隐私声明</a>. 
          </div>
          <div class="span4">
            鸣谢：<a>Glyphicons</a> | <a>BootStramp</a> | <a>BootCss</a> | <a>Jquery</a>
          </div>
        </div>
      </div>
    </div>
    <!--script content-->
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.message.js"></script>
    <script type="text/javascript">
      $('.tip').tooltip();
      var txt="";
      var lastObj=null;
      <{if $smarty.session.user eq '' }>
              txt="请先&nbsp;&nbsp;<a href='<{spUrl c=main a=login}>'' class='btn-small btn title'>登录</a>&nbsp;&nbsp;后购买";
            <{elseif $products eq ''}>
            txt="请先&nbsp;&nbsp;<a href='<{spUrl c=sub a=product}>'' class='btn-small btn title'>添加产品</a>&nbsp;&nbsp;后购买";
            <{else}>
              txt='<form>购买数量：<div class="input-prepend input-append"><span class="add-on"  style="margin-top:10px;font-size:10px;"><i class="icon-legal"></i></span><select name="number" class="numberSelect" style="margin-top:10px;font-size:10px;width:70px;" class="input-mini"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option>   </select><span class="add-on"  style="margin-top:10px;font-size:10px;">个月</span></div><br/>推广产品：<div class="input-prepend input-append"><span class="add-on"  style="margin-top:10px;font-size:10px;"><i class="icon-calendar"></i></span><select name="productSelect" class="productSelect" style="margin-top:10px;font-size:10px;width:100px;" class="input-small">';
               <{foreach from=$products item=product name=prodCount}> 
              txt+='<option value="<{$product.id}>"><{$product.name}></option>';
                <{/foreach}>
              txt+='</select></div>&nbsp;&nbsp;<div style="font-size:12px;">总价：<span class="title blue-color"><span class="number">1</span>&nbsp;*&nbsp;<span class="price">0</span>&nbsp;&yen;</span>&nbsp;=&nbsp;<span class="title red-color">&nbsp;<span class="total">0</span>&nbsp;&yen;</span></div><div style="padding:10px 0;position:relative;"><a class="btn btn-mini btn-info yes">确定</a><a style="position:absolute;right:10px;" class="btn btn-mini btn-danger cancel">取消</a></div></form>';
            <{/if}>
       $('.buy').popover({
              content:txt,
              trigger:'click',
              cantainer:($(this))
            });
       $('.buy').click(function(){
              if(lastObj!=null&&lastObj!=this){
                  $(lastObj).popover('hide');
              }
              lastObj=this;
              var url=$(lastObj).attr('url');
              var price=$(lastObj).attr('data-price');
              $(lastObj).parent().find('.price').html(price);
              $(lastObj).parent().find('.total').html(price);

                $('.cancel').bind('click', function() {
                   if(lastObj!=null){
                      $(lastObj).popover('hide');
                    }
                });
                $('.yes').bind('click', function() {
                   var productVal=$(lastObj).parent().find('.productSelect').val();
                   var numberVal=$(lastObj).parent().find('.numberSelect').val();
                   $.post(url, { number: numberVal, product: productVal },
                      function(data){
                         if(data){
                            if(data=="1"){
                              $.msg('购买成功！','color:green;');
                              location.reload();
                            }else{
                              $.msg(data);
                            }
                         }else{
                            $.msg('发送请求失败！');
                         }
                     });
                });
                 $('.numberSelect').bind('change', function() {
                   $(lastObj).parent().parent().find('.number').html($(this).val());
                   $(lastObj).parent().parent().find('.total').html(parseInt($(this).val())*parseInt(price));
                });
            });
         $('.cancel').click(function(){
         
              if(lastObj!=null){
                  $(lastObj).popover('hide');
              }
            });
    </script>
  </body>
</html>
