<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 - 全球首家中文网络广告位交易平台 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="广告市场,广告位招租,广告位出售,广告位管理"/>
    <meta name="description" 
    content="广告市场是全球首家中文网络广告位交易平台，在此发布、管理网站广告位，进行广告位招租、交易买卖，并进行科学的分析和管理。"/>
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <!--[if lte IE 6]>
  <!-- bsie css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-ie6.css">

  <!-- bsie 额外的 css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/ie.css">
  <![endif]-->
     <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <!--I definition-->
    <link href="/css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
    <style type="text/css">
    </style>
  </head>
  <body>
    <!--header content-->
    <!-- load head tpl -->
    <{include file="head.php"}>
    <!--section content-->
    <div class="section">
      <div class="container">
        <!--intro content-->
        <{include file="intro.php"}>
           <!-- load head tpl -->
          <div class="row-fluid">
            <{include file="side-bar.php"}>

            <div class="span9 main-body">
              <!--Body content-->
              <div class="page-header" style="position:relative;font-size:12px;">
                <h5 style="border-bottom:solid 1px #eee;padding:10px 0;">筛选条件：</h5>
                <div class="conditions" style="padding:0 10px;line-height:30px;">
                    <div class="row-fluid" style="padding:0px;margin:0;">
                        <div class="span2 title" style="width:13%;">
                          全球排名：
                        </div>
                        <div class="span10 alexa-box" style="padding:0;margin:0;">
                          <a class="alexa" data-range="" style="margin-left:20px;" ><span class="condition">全部</span></a>
                          <a class="alexa" data-range="1,1000" style="margin-left:20px;" ><span class="condition">1-1,000</span></a>
                          <a class="alexa" data-range="1000,10000" style="margin-left:20px;" ><span  class="condition" >1,000-1万</span></a>
                          <a class="alexa" data-range="10000,100000" style="margin-left:20px;" ><span  class="condition" >1万-10万</span></a>
                          <a class="alexa" data-range="100000,1000000" style="margin-left:20px;" ><span  class="condition" >10万-100万</span></a>
                          <a class="alexa" data-range="1000000,5000000" style="margin-left:20px;" ><span  class="condition" >100万-500万</span></a>
                          <a class="alexa" data-range="5000000,50000000" style="margin-left:20px;" ><span  class="condition" >500万以上</span></a>
                        </div>
                    </div>

                    <div class="row-fluid" style="padding:0px;margin:0;">
                        <div class="span2 title" style="width:13%;">
                          价格（&yen;/天）：
                        </div>
                        <div class="span10 price-box" style="padding:0;margin:0;">
                          <a  class="price" data-range="" style="margin-left:20px;" ><span class="condition">全部</span></a>
                          <a  class="price" data-range="0,1" style="margin-left:20px;" ><span  class="condition">0-1&yen;</span></a>
                          <a class="price"  data-range="1,10" style="margin-left:20px;" ><span  class="condition" >1-10&yen;</span></a>
                          <a class="price" data-range="10,100" style="margin-left:20px;" ><span  class="condition" >10-100&yen;</span></a>
                          <a class="price" data-range="100,1000" data-range="0" style="margin-left:20px;" ><span  class="condition" >100-1000&yen;</span></a>
                          <a class="price" data-range="1000,10000" style="margin-left:20px;" ><span  class="condition" >1000&yen;以上</span></a>
                        </div>
                    </div>
                     <div class="row-fluid" style="padding:0px;margin:0;">
                        <div class="span2 title" style="width:13%;">
                          出售状态：
                        </div>
                        <div class="span10 state-box" style="padding:0;margin:0;">
                          <a class="state" data-range="" style="margin-left:20px;" ><span class="condition">全部</span></a>
                          <a class="state" data-range="0" style="margin-left:20px;" ><span class="condition">未出售</span></a>
                          <a class="state" data-range="1" style="margin-left:20px;" ><span class="condition">已出售</span></a>
                          <a class="state" data-range="2" style="margin-left:20px;" ><span class="condition">未激活</span></a>
                        </div>
                    </div>
                     <div class="row-fluid " style="padding:0px;margin:0;">
                        
                        <div class="span4 title" >
                          <span>总计：</span>
                          <span style="margin-left:20px;"><{$resultsCount|number_format}>个广告位</span>

                        </div>
                        <div class="span4 title" >
                          关键词：
                          <span style="margin-left:20px;">“<{$keyword}>”</span>
                        </div>
                        <div class="span3 title" >
                          当前页：
                          <span style="margin-left:20px;">第<{$currentPage}>页</span>

                        </div>
                    </div>
                    
                </div>
              </div>
               <!-- content box tpl-->  
               <div  class="row-fluid" style="padding:0px;margin:0px;">
                <ul class="ads slideshow"  style="width:100%;padding:0;"> 
                      <{if $results eq ""}>
                          暂无数据
                      <{/if}>
                     <{foreach from=$results item=advertise name=adCount}>
                         <{include file="content-box.php"}>
                     <{/foreach}>
                </ul>
              </div>  
                
                <div class="pagination pagination-small" align="center" > 
                          <ul>
                          <{if $pager}>
                          <!--在当前页不是第一页的时候，显示前页和上一页-->
                          <{if $pager.current_page != $pager.first_page}>
                          <li>
                            <a class="newpage" data-value="<{$pager.first_page}>">首页</a>
                          </li> 
                          <li>
                            <a class="newpage" data-value="<{$pager.prev_page}>">上一页</a> 
                          </li>
                          <{/if}>
                          <!--开始循环页码，同时如果循环到当前页则不显示链接-->
                          <{foreach from=$pager.all_pages item=thepage}>
                                  <{if $thepage != $pager.current_page}>
                                          <li>
                                            <a class="newpage" data-value="<{$thepage}>"><{$thepage}></a>
                                          </li>
                                  <{else}>
                                          <li><a id="current-Page" class="disabled" style="color:#777;cursor:text;"><{$thepage}></a></li>
                                  <{/if}>
                          <{/foreach}>
                          <!--在当前页不是最后一页的时候，显示下一页和后页-->
                            <{if $pager.current_page != $pager.last_page}> 
                            <li>
                              <a class="newpage" data-value="<{$pager.next_page}>">下一页</a>
                            </li>
                            <li>
                              <a class="newpage" data-value="<{$pager.last_page}>">末页</a>
                            </li>
                            <{/if}>
                          <{/if}>
                          </ul>
                </div> 

            </div>

        </div>
      </div>
    </div>
        <!--footer content-->
    <{include file="foot.php"}>
    <!--script content-->
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!--[if lte IE 6]>
    <!-- bsie js 补丁只在IE6中才执行 -->
    <script type="text/javascript" src="/js/bootstrap-ie.js"></script>
    <![endif]-->
    <script type="text/javascript">
      $('.tip').tooltip();
     
       $('.alexa').click(function(){
          var value=$(this).attr('data-range');
           $('#currentAlexa').val(value);
       });
       $('.price').click(function(){
          var value=$(this).attr('data-range');
           $('#currentPrice').val(value);

       });
       $('.state').click(function(){
          var value=$(this).attr('data-range');
           $('#currentState').val(value);

       });
      $('.newpage').click(function(){
          var value=$(this).attr('data-value');
           $('#currentPage').val(value);
           //$("#search-form").submit();
       });
      var conditionUrl="";
      loadCondition();
      function loadCondition(){

          var url="<{spUrl c=main a=result}>?a=1";
          var keyword=$.trim($('#keyword').val());
         
         
          var categoryUrl=url;
          if($('#currentCategory').val()!=""){
              categoryUrl=url+'&category='+$('#currentCategory').val();
           }
          var keywordUrl=categoryUrl;
          if(keyword!=""){
            keywordUrl=categoryUrl+'&keyword='+encodeURI(keyword);
          }

          conditionUrl=keywordUrl;
          //alert(keywordUrl);
          //keywordUrl=keywordUrl;
          //alexa url connect
            var alexaBaseUrl=keywordUrl;
            if($('#currentPrice').val()!=""){
                  alexaBaseUrl+='&price='+$('#currentPrice').val();
              }
               if($('#currentState').val()!=""){
                  alexaBaseUrl+='&state='+$('#currentState').val();
              }
           $('.alexa-box').children().each(function(){
              if($(this).attr('data-range')!=""){
                var currentAlexaBaseUrl=alexaBaseUrl+'&alexa='+$(this).attr('data-range');
                $(this).attr('href',currentAlexaBaseUrl);
              }else{
                $(this).attr('href',alexaBaseUrl);
              }
              if($(this).attr('data-range')==$('#currentAlexa').val()){
                $(this).attr('class','label condition');

              }
            });

           //price url connect
            var priceBaseUrl=keywordUrl;
            if($('#currentAlexa').val()!=""){
                  priceBaseUrl+='&alexa='+$('#currentAlexa').val();
              }
               if($('#currentState').val()!=""){
                  priceBaseUrl+='&state='+$('#currentState').val();
              }
           $('.price-box').children().each(function(){
              if($(this).attr('data-range')!=""){
                var currentPriceBaseUrl=priceBaseUrl+'&price='+$(this).attr('data-range');
                $(this).attr('href',currentPriceBaseUrl);
              }else{
                $(this).attr('href',priceBaseUrl);
              }
              if($(this).attr('data-range')==$('#currentPrice').val()){
                $(this).attr('class','label condition');

              }
            });
           //state url connect
           var stateBaseUrl=keywordUrl;
            if($('#currentAlexa').val()!=""){
                  stateBaseUrl+='&alexa='+$('#currentAlexa').val();
              }
               if($('#currentPrice').val()!=""){
                  stateBaseUrl+='&price='+$('#currentPrice').val();
              }
           $('.state-box').children().each(function(){
              if($(this).attr('data-range')!=""){
                var currentStateBaseUrl=stateBaseUrl+'&state='+$(this).attr('data-range');
                $(this).attr('href',currentStateBaseUrl);
              }else{
                $(this).attr('href',stateBaseUrl);
              }
               if($(this).attr('data-range')==$('#currentState').val()){
                  $(this).attr('class','label condition');
                }
            });
        
      }

      loadPage();
      function loadPage(){
            if($('#currentPrice').val()!=""){
                conditionUrl+='&price='+$('#currentPrice').val();
            }
             if($('#currentState').val()!=""){
                conditionUrl+='&state='+$('#currentState').val();
            }
            if($('#currentAlexa').val()!=""){
                conditionUrl+='&alexa='+$('#currentAlexa').val();
            }
            $('.newpage').each(function(){
              var value=$(this).attr('data-value');
              $(this).attr('href',conditionUrl+'&page='+value);
               //$("#search-form").submit();
            });
      }
    </script>
  </body>
</html>
