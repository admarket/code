<!DOCTYPE html> <html>   <head>     <title>广告市场  - 购买此广告位</title>     <meta
name="viewport" content="width=device-width, initial-scale=1.0">      <meta
http-equiv="Content-Type" content="text/html; charset=utf-8" />     <meta
name="keywords" content="广告市场,广告位招租,广告位出售,广告位管理"/>     <meta
name="description"
content="广告市场是全球首家中文网络广告位交易平台，在此发布、管理网站广告位，进行广告位招租、交易买卖，并进行科学的分析和管理。"/>
<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">     
<link href="/css/bootstrap-responsive.css" rel="stylesheet">     
 <link rel="stylesheet" href="/css/font-awesome.min.css">     <!--[if IE 7]>
<link rel="stylesheet" href="/css/font-awesome-ie7.min.css">     <![endif]-->
<!-- Bootstrap -->
    
    <link href="/css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">


     <style>
    #image-shortcut{height: 100px;width:90%;}
    #image-shortcut .active img{border:solid 2px #7ab900;width: 50px;height: 50px;}
    #image-shortcut  img{border-radius:10px;margin:10px;}
    </style>
  </head>
  <body>
     <!-- load head tpl -->
    <{include file="head.php"}>
              
<div class="section" align="center">
      <div class="container box std-container" align="left" style="padding:20px 40px;position:relative;">
          <h3 class="title">广告位购买</h3>
          <div class="progress active" style="border:solid 1px #aaa;height:40px;border-radius:15px;">
            <div class="bar" style="width:15%;text-align:center;padding:10px;">
              1.&nbsp;选择广告位&nbsp;<i class="icon-double-angle-right icon-large"></i>
            </div>
            <div class="bar" style="width:55%;text-align:center;padding:10px;">
              2.&nbsp;绑定推广产品&nbsp;<i class="icon-double-angle-right icon-large"></i>
            </div>
            <div class="bar" style="width:15%;text-align:center;padding:10px;opacity:0.3;">
              3.&nbsp;支付购买&nbsp;<i class="icon-double-angle-right icon-large"></i>
            </div>
            <div class="bar" style="width:15%;text-align:center;padding:10px;opacity:0.3;border-radius:0 15px 15px 0;">
              4.&nbsp;完成&nbsp;<i class="icon-double-angle-right icon-large"></i>
            </div>
          </div>
          <div class="content">

              <div class="row-fluid" style="padding:0 0px 10px 10px;vertical-align:bottom;font-size:12px;">
                   <h5>绑定产品与广告位：</h5> 
                  
                  <div id="bindProduct" class="span6 row-fluid" style="border:dashed 1px #ccc;padding:10px 30px;border-radius:5px;">
                      <h6>请选择推广产品：</h6> 
                      <{if $products eq ""}>
                         <div>
                            <i class="icon-info-sign"></i>&nbsp;&nbsp;您尚未添加推广产品，请先产品管理页面
                            <a class="btn btn-danger" href="<{spUrl c=sub a=product}>">添加推广产品</a>。
                        </div>     
                      <{/if}>
                      <{foreach from=$products item=product}>
                            <label class="radio span5" style="font-size:12px;">
                              <input style="margin-top:10px;" class="product" type="radio" name="product" id="product<{$product.id}>" value="<{$product.id}>" data-show="<{$product.show}>" data-name="<{$product.name}>" data-url="<{$product.url}>"  data-txt="<{$product.txt}>" data-image="<{$product.image}>" data-video="<{$product.video}>">
                              <img src="/img/show/<{$product.shown}>" width="40" height="40" style="width:40px;height:40px;"/>
                              &nbsp;<{$product.name}>&nbsp;
                            </label>
                      <{/foreach}>
                  </div>
                   
                  <div class="span5 row-fluid" style="border:dashed 1px #ccc;padding:10px;border-radius:5px;">
                    <div class="span4" style="text-align:center;">
                      <img class="img-rounded img-polaroid" style="width:60px;height:60px;" src="/img/ads/<{$ad.base.logo}>" alt="">
                      <h6  style="color:#555;"><{$ad.base.name}></h6>
                    </div>
                    
                    <div class="span8" style="line-height:25px;">
                        <h6><{$ad.title}></h6>
                        <div><{$ad.content}></div>
                        <div><strong>价格：</strong><{(0.01*(0.01*$ad.fee+1)*$ad.price)|number_format}> &yen;/天&nbsp;</div>
                         <div> <{if $ad.format==0}>
                              <strong>字体大小：</strong><{$ad.width}>&nbsp;像素
                              &nbsp;<strong>字数：</strong><{$ad.height}>
                          <{else}>
                              <strong>大小：</strong><{$ad.width}>*<{$ad.height}>&nbsp;像素
                          <{/if}>
                          </div>
                        <div><strong>最近三个月平均展示次数：</strong>
                          <span class="red-color"><{$adCount|number_format}> </span>&nbsp;次/月
                        </div>
                    </div> 
                    
                  </div>
              </div>
              <div class="row-fluid" style="padding:0 0px 10px 10px;vertical-align:bottom;font-size:12px;">
                        <br/>
                        
                        <{if $ad.format==0}>
                            <h5>选择广告内容：</h5>
                            <div id="txt-shortcut" class=" row-fluid tip" title="点击切换广告文字" style="background-color:#eee;border:dashed 1px #ccc;border-radius:5px;padding:10px;width:90%;">

                              <label class="radio" style="font-size:12px;">
                              <input class="txt-preview"  type="radio" name="txt-adcontent" checked="checked">
                              &nbsp;广告位招租&nbsp;
                              </label>
                           
                            </div>
                        <{elseif $ad.format==1}>
                            <h5>选择广告内容：</h5>
                            <div id="image-shortcut" class=" row-fluid tip" title="点击切换图片" style="background-color:#eee;border:dashed 1px #ccc;border-radius:5px;">
                              <a class="span2 active image-preview">
                                <img src="/img/adcontent/image/default.jpg"  class="img-rounded img-polaroid  thumbnail " data-index="0">
                              </a>
                              <a class="span1 image-preview">
                                <img src="/img/adcontent/image/default.jpg"  class="img-rounded img-polaroid  thumbnail " data-index="0">
                              </a>
                              <a class="span1 image-preview">
                                <img src="/img/adcontent/image/default.jpg"  class="img-rounded img-polaroid  thumbnail " data-index="0">
                              </a>
                              <a class="span1 image-preview">
                                <img src="/img/adcontent/image/default.jpg"  class="img-rounded img-polaroid  thumbnail " data-index="0">
                              </a>
                              <a class="span1 image-preview">
                                <img src="/img/adcontent/image/default.jpg"  class="img-rounded img-polaroid  thumbnail " data-index="0">
                              </a>
                           
                            </div>
                        <{elseif $ad.format==2}>
                            
                        <{else}>
                            <h5>选择广告内容：</h5>
                            <p>无法识别的广告格式！请选择其他的广告位购买</p>
                        <{/if}>
                         
                        <h5>选择购买时间：</h5>
                        <div id="day" style="padding:0 20px;">
                         <label class="radio inline"  style="font-size:12px;">
                              <input  type="radio" class="number" name="number"  value="7">
                              &nbsp;7天&nbsp;
                         </label>
                          <label class="radio inline"  style="font-size:12px;">
                              <input  type="radio" class="number"  name="number"  value="15">
                              &nbsp;15天&nbsp;
                          </label>
                          <label class="radio inline"  style="font-size:12px;">
                              <input  type="radio" class="number"  name="number"  value="30">
                              &nbsp;30天&nbsp;
                          </label>
                          <label class="radio inline"  style="font-size:12px;">
                              <input  type="radio" class="number"  name="number" value="60">
                              &nbsp;60天&nbsp;
                          </label>
                          <label class="radio inline"  style="font-size:12px;">
                              <input  type="radio" class="number"  name="number" value="90">
                              &nbsp;90天&nbsp;
                          </label>
                        </div>
                        <br/>
                        <h5>广告位效果预览：(请留意广告位要求。效果不佳可在购买后自行更换广告内容)</h5>
                        <div style="padding:10px 20px;">
                          <span class="admarket_ad" style="display:inline;" aid="<{$ad.id}>" id="admarket_box_<{$ad.id}>"></span>
                             <script type="text/javascript" id="admarket_shell" src="http://www.eadmarket.com/?c=cadvertise&a=GetADCode&aid=<{$ad.id}>"></script>
                             <script type="text/javascript" id="admarket_js_<{$ad.id}>" src="http://www.eadmarket.com/js/ad.js?aid=<{$ad.id}>"></script>
                        </div>
                        <br/>
                        <div class="controls" align="center" style="padding:20px;">
                          
                          <a class="btn btn-success" id="btn-buy" style="width:100px;"  >
                            确认付款
                          </a>
                          &nbsp;&nbsp;价格总计：<span class="finalNumber">1</span>
                          &nbsp;*&nbsp;<span class="finalPrice">
                          <{(0.01*(0.01*$ad.fee+1)*$ad.price)|number_format}>
                          </span>&nbsp;=&nbsp;
                          <span class="sumPrice" class="red-color" style="font-size:16px;font-weight:bold;color: #EC4F4F;">
                            <{(0.01*(0.01*$ad.fee+1)*$ad.price)|number_format}> &yen;
                          </span>&nbsp;&nbsp;(当前余额：<span id="balance">正在加载...</span>&nbsp;&yen;)
                        </div>
               </div>
              
          </div>
              
      </div>
</div>
    <!--footer content-->
    <!-- load foot tpl -->
    <{include file="foot.php"}>

    <!--modal dialog content-->
<div class="modal hide fade" id="form-verify">
   
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4>确认购买信息</h4>
  </div>
  
  <div class="modal-body" style="padding:10px 20px;">
    <form name="alipayment" action="<{spUrl c=cuser a=changePassword}>" method="post" target="_blank">
        <div>
                <p>
                  <h5>广告位:</h5>
                </p>
                <p>
                    <{$ad.title}>
                </p>
                <p>
                  <div><strong>价格：</strong><{(0.01*(0.01*$ad.fee+1)*$ad.price)|number_format}> &yen;/天&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>大小：</strong><{$ad.width}>*<{$ad.height}>&nbsp;像素</div>
                </p>
                <div class="row-fluid">
                  <div class="span4">
                    <p>
                      <h5>绑定产品:</h5>
                    </p>
                    <p>
                      <span id="modal-product" class="red-color">暂未绑定</span>
                    </p>
                  </div>
                  <div class="span4">
                    <p>
                      <h5>购买时间:</h5>
                    </p>
                    <p>
                      <span id="modal-number" class="red-color">尚未选择</span>
                    </p>
                  </div>
                </div>
        </div>
          </form>
  </div>

  <div class="modal-footer">
    价格总计：<span class="finalNumber">1</span>
                          &nbsp;*&nbsp;<span class="finalPrice">
                          <{(0.01*(0.01*$ad.fee+1)*$ad.price)|number_format}>
                          </span>&nbsp;=&nbsp;
                          <span class="sumPrice" class="red-color" style="font-size:16px;font-weight:bold;color: #EC4F4F;">
                            <{(0.01*(0.01*$ad.fee+1)*$ad.price)|number_format}> &yen;
                          </span>&nbsp;&nbsp;
    <a class="btn btn-success"  id="btn-pay" data-toggle="button"  data-loading-text="正在付款...">确认购买</a>
    <a class="btn" id="btn-back">返回修改</a>
  </div>
</div>
<div class="modal hide fade" id="form-income">
   
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4>您的账户余额不足，请先充值</h4>
  </div>
  
  <div class="modal-body" style="padding:10px 20px;">
    <form name="alipayment" action="<{spUrl c=crecharge a=createRecharge}>" method="post" target="_blank">
        <div>
                <p>
                  <label>充值方式：</label>
                  <div class="row-fluid tip" style="width:90%;" title="目前仅支持支付宝">
                    <label class="radio-inline span4" style="font-size:12px;background-color:#e9e9e9;
                   border-radius:5px;padding:10px;border:solid 2px green;box-shadow:0px 0px 2px #ccc;">
                      <input type="radio" name="payment" id="payment1" value="0" checked/>
                      <img src="/img/alipay.ico" width="20" height="20"/>
                      &nbsp;支付宝&nbsp;
                    </label>
                    <label class="radio-inline span4" style="font-size:12px;background-color:#e9e9e9;
                   border-radius:5px;padding:10px;border:solid 1px #ccc;">
                      <input type="radio" name="payment" id="payment2" value="1" disabled="disabled"/>
                      <img src="/img/tenpay.ico" width="20" height="20"/>
                      &nbsp;财付通&nbsp;
                    </label>
                    <label class="radio-inline span4" style="font-size:12px;background-color:#e9e9e9;
                   border-radius:5px;padding:10px;border:solid 1px #ccc;">
                    <input type="radio" name="payment" id="payment3" value="2" disabled="disabled"/>
                    <img src="/img/Unionpay.jpg" width="20" height="20"/>
                    &nbsp;银联卡&nbsp;
                    </label>
                  </div>
                  <label>充值金额：</label>
                </p>
                <p>
                    <input size="30" id="recharge-txt" class="input-large" name="cash" />
                        <span id="recharge-msg">必填，请输入大于0的整数</span>
                </p>
                <p>
                  <button class="btn btn-success" type="submit" id="btn-recharge">确 认</button>
                </p>
        </div>
          </form>
  </div>

  <div class="modal-footer">
    
  </div>
  
</div>
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.message.js"></script>
    <script type="text/javascript">
    var numberFlag=false;
    var productFlag=false;
    var balanceFlag=false;
    var currentProduct="0";
    var currentNumber=0;
    var contentNumber=0;
    var user;
    $('.tip').tooltip();
     $.post("<{spUrl c=cuser a=getUserJsonBySessionID}>",
                 function(data){
                   if(data!="0"){
                     user=stringToJSON(data);
                     $("#balance").html(parseInt(user.balance)*0.01);
                   }
                 });
    function stringToJSON(obj){   
      return eval('(' + obj + ')');   
    } 
    $("#image-shortcut .image-preview").click(function(){
        //$("#image-content").attr("src",$(this).children(0).attr("src"));
        $(this).parent().children().each(function(){
          $(this).attr('class','span1 image-preview');
        });
        $(this).attr('class','span2 active image-preview');
    });

    $(".number").change(function() { 
        numberFlag=true;
        currentNumber=$(this).val();
        var sumPrice=parseInt($(this).val())*parseInt(<{(0.01*(0.01*$ad.fee+1)*$ad.price)}>);
        var balance=parseInt(user.balance)*0.01;
        if(sumPrice<=balance){
          balanceFlag=true;
        }
        $(".finalNumber").html($(this).val());
        $('#modal-number').html($(this).val()+"&nbsp;天");
        $(".sumPrice").html(sumPrice+"&nbsp;&yen;");
      }); 
    $(".product").change(function() { 
        productFlag=true;
        currentProduct=$(this).attr('value');
        currentTxtContent=$(this).attr('data-txt');
        currentImageContent=$(this).attr('data-image');
        currentVideoContent=$(this).attr('data-video'); 
        var baseURL="http://www.eadmarket.com/";
        var adBox=document.getElementById("admarket_box_"+<{$ad.id}>);//广告位容器
        var adcontent="";//广告位内容
        var imageURI="";//图片资源地址
        var videoURI="";//视频资源地址
        var txtURI="";//文字资源地址
        var targetURL=currentVideoContent=$(this).attr('data-url');//广告跳转地址
            txtURI=$(this).attr('data-txt').split('\n')[0];
            imageURI=baseURL+"img/adcontent/image/"+$(this).attr('data-image').split(';')[0];
            videoURI=baseURL+"img/adcontent/video/"+$(this).attr('data-video').split(';')[0];
            //targetURL=baseURL+'?c=cadvertise&a=clicked&aid='+<{$ad.id}>;
            //加载广告内容
            if(<{$ad.format}>==0){
                adcontent='<a id="txt-content" style="font-size:'+advertise.width+'px;" target="_blank" href="'+targetURL+'">'+txtURI.substring(0,parseInt(advertise.height))+'</a>';
                $("#txt-shortcut").empty();
                var count=0;
                if(currentTxtContent.split('\n').length>1){
                  count=currentTxtContent.split('\n').length - 1;
                }
                for (var i = 0; i <= count; i++) {
                  var shortcut='<label class="radio  inline span3" style="font-size:12px;"><input  data-index="'+i+'"  type="radio" class="txt-preview" name="txt-adcontent" data-value="'+currentTxtContent.split('\n')[i]+'"';
                  if(i==0){
                    shortcut+=' checked="checked"';
                  }
                  shortcut+='>&nbsp;'+currentTxtContent.split('\n')[i]+'&nbsp;</label>';
                  $("#txt-shortcut").append(shortcut);
                };
                 $("#txt-shortcut .txt-preview").bind("change",function(){
                  contentNumber=$(this).attr('data-index');
                  $("#txt-content").html($(this).attr("data-value").substring(0,parseInt(advertise.height)));
                  
                });
                adBox.setAttribute('style',"");
                adBox.removeAttribute('onclick');
            }
            else if(<{$ad.format}>==1){
               adcontent='<img id="image-content"  width="'+advertise.width+'" height="'+advertise.height+'"  style="width:'+advertise.width+'px;height:'+advertise.height+'px;"  src="'+imageURI+'"/>';
                // adcontent='<img id="image-content"  width="'+<{$ad.width}>+'" height="'+<{$ad.height}>+'"  style="width:'+<{$ad.width}>+'px;height:'+<{$ad.height}>+'px;"  src="'+imageURI+'"/>';
                $("#image-shortcut").empty();
                var count=0;
                if(currentImageContent.split(';').length>1){
                  count=currentImageContent.split(';').length - 1;
                }
                for (var i = 0; i <= count; i++) {
                  var shortcut='<a class="span1 image-preview"  data-index="'+i+'"><img src="/img/adcontent/image/'+currentImageContent.split(';')[i]+'"  class="img-rounded img-polaroid  thumbnail "/></a> '
                  $("#image-shortcut").append(shortcut);
                };
                $("#image-shortcut").children().first().attr('class','span2 active image-preview');
                $("#image-shortcut .image-preview").bind("click",function(){
                  contentNumber=$(this).attr('data-index');
                  $("#image-content").attr("src",$(this).children(0).attr("src"));
                  $(this).parent().children().each(function(){
                    $(this).attr('class','span1 image-preview');
                  });
                  $(this).attr('class','span2 active image-preview');
                });

            }
            else if(<{$ad.format}>==2){
                adcontent='<object style="display:inline-block;" width="'+<{$ad.width}>+'" height="'+<{$ad.height}>+'" type="application/x-shockwave-flash" data="'+videoURI+'"  codebase="../../../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0">';
                adcontent+='<embed  style="display:inline-block;" src="'+videoURI+'"  width="'+<{$ad.width}>+'" height="'+<{$ad.height}>+'"  pluginspage="http://www.macromedia.com/go/getflashplayer"/>';
                adcontent+='<span>浏览器插件缺失导致播放失败，请联系管理人员</span></object>';
                
                //adBox.setAttribute('onclick','goto(this)');
                //adBox.setAttribute('onmouseover','changeBGColor(this)');
                //adBox.setAttribute('style',style);
            }
        // adBox.setAttribute('url',targetURL);
        // adBox.setAttribute('onclick','goto(this)');
        // //adBox.setAttribute('onmouseover','changeBGColor(this)');
        // adBox.setAttribute('style',style);
        adBox.setAttribute('url',targetURL);
        adBox.innerHTML=adcontent;

        $('#modal-product').html($(this).attr('data-name'));

      }); 
     $("#btn-buy").click(function() {
         if(!productFlag){
          $.msg('请先选择推广产品');
        }else if(!numberFlag){
          $.msg('请先选择购买天数');
        }else if(!balanceFlag){
          $.msg('账户余额不足，请先充值');
          $("#form-income").modal();
        }else{
          $("#form-verify").modal();
        }
      });
     $("#btn-back").click(function() { 
        $("#form-verify").modal('hide');
      });
      $("#btn-pay").click(function() {
        if(!productFlag){
          $("#form-verify").modal('hide');
          $.msg('请先选择推广产品');
        }else if(!numberFlag){
          $("#form-verify").modal('hide');
          $.msg('请先选择购买天数');
        }else{
          //$.loading("正在支付");
          $("#btn-save").button('loading');
          
            $.post("<{spUrl c=ctrade a=BuyAd}>", {  advertise:<{$ad.id}>,price: <{0.01*$ad.price}>,buyPrice: <{(0.01*(0.01*$ad.fee+1)*$ad.price)}>,product:currentProduct,number:currentNumber,seller:<{$ad.base.owner}>,adcontentNumber:contentNumber},
             function(data){
              //alert(data);
               if(data.indexOf("操作失败")<0){
                  $.msg('购买成功！','color:green;');
                   window.location.href='<{spUrl c=sub a=effect}>';
               }
               else{
                  $.msg(data);
               }
             });
        }
        $('#btn-pay').button('toggle');
        $('#btn-pay').button('reset');  
        
      });
      //验证充值金额
$("#btn-recharge").click(function(){
    var reg= /^[0-9]*$/;
  if($.trim($("#recharge-txt").val())==""){
            $("#recharge-msg").html("充值金额不能为空");
            $("#recharge-msg").css("color","red");
            return false;
        }else{
           if(!reg.test($.trim($("#recharge-txt").val()))){
            $("#recharge-msg").html("充值金额必须为整数，且大于0");
            $("#recharge-msg").css("color","red");
            return false;
            }else{
                    $("#recharge-msg").html("验证通过！");
                    $("#recharge-msg").css("color","green");
                    return true;
            }
        }


});
    </script>
  </body>
</html>
