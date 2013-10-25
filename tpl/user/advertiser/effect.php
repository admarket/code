<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 - 用户中心 - 购买记录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/css/bootstrap-fileupload.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    
    
    <link href="/css/user.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/css/bootstrap-editable.css" rel="stylesheet">

    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

  </head>
  <body>
     <!-- load head tpl -->
    <{include file="./user/inner-head.php"}>

    <!-- main section -->
    <div class="section">
      <div class="container">
        <div class="row-fluid">
          <div class="span3 left-bar">
              <!-- load user tpl -->
            <{include file="./user/inner-user.php"}>
            <!-- Bootstrap -->
            <div class="categories">
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label blue"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;交易量：</div>
                    <p><{$tradeCount|number_format}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label green"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;交易总额：</div>
                    <p><{(0.01*$sumFee)|number_format}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
              </div>
              <!-- Bootstrap -->
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label a"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;图片广告：</div>
                    <p><{$picNum|number_format}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;文字广告：</div>
                    <p><{$textNum|number_format}></p>
                  </div>
                  
                </div>
              </div>
              <!-- Bootstrap -->
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label label-warning"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;视频广告：</div>
                    <p><{$videoNum|number_format}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                   <div class="span10">
                    <div class=" title">&nbsp;已经到期：</div>
                    <p><{$expire|number_format}></p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
              <div style="padding-left:0px;">
                <p class="btn-group">
                  <a id="share" class="btn  btn-danger tip"  title="分享我们的网站"><i class=" icon-heart icon-white"></i></a>
                  <a class="btn tip" title="切换身份" href="<{spUrl c=cuser a=changeIdentity}>"><i class="icon-refresh"></i></a>
                  <a class="btn tip" title="设置" href="<{spUrl c=sub a=setting}>"><i class="icon-cog"></i></a>
                  <a class="btn tip" title="退出" href="<{spUrl c=sub a=logout}>"><i class="icon-off"></i></a>
                </p>
              </div>
            </div>
          </div>
          <div class="span9 main-body" >
             <div style="position:relative;"  class="btn-toolbar" align="right">
               
                <div class="btn-group" data-toggle="buttons-checkbox">
                  <a class="btn btn-mini active" id="btn-impress">展示</a>
                  <a class="btn btn-mini" id="btn-click">点击</a>
                </div>
                <div class="btn-group" data-toggle="buttons-radio">
                  <a class="btn btn-mini active" id="btn-day">今日24小时</a>
                  <a class="btn btn-mini" id="btn-week">最近7天</a>
                  <a class="btn btn-mini" id="btn-month">本月</a>
                  <a class="btn btn-mini" id="btn-year">今年</a>
                </div>
             </div>
             <div id="chart"  style="width:100%; height: 300px; margin: 0 auto"></div>
            
             <div class="tabbable"> <!-- Only required for left/right tabs -->
              <ul class="nav nav-tabs" style="position:relative;">
                 <{foreach from=$trades item=trade name=tradeCount}> 
                    <{if $smarty.foreach.tradeCount.index == 0}>
                    <li class="active">
                     <a id="first-trade" class="sec" data-key="<{$trade.id}>" data-index="<{$smarty.foreach.tradeCount.index}>" href="#tab<{$smarty.foreach.tradeCount.index}>" data-toggle="tab"><{$trade.project.name}></a>
                     </li>
                  <{else}>
                     <li>
                      <a class="sec" data-key="<{$trade.id}>"  data-index="<{$smarty.foreach.tradeCount.index}>" href="#tab<{$smarty.foreach.tradeCount.index}>" data-toggle="tab"><{$trade.project.name}></a>
                    </li>
                  <{/if}>
                 <{/foreach}>   
              </ul> 
              <div class="tab-content">
                <{foreach from=$trades item=trade name=tradeCount}> 
                  <{if $smarty.foreach.tradeCount.index == 0}>
                      <div class="tab-pane active" id="tab<{$smarty.foreach.tradeCount.index}>">
                  <{else}>
                      <div class="tab-pane" id="tab<{$smarty.foreach.tradeCount.index}>">
                  <{/if}>
                  <div style="background-color:#f3f3f3;border:solid 1px #dcdcdc;border-radius:5px;box-shadow:0px 0px 1px #ccc;margin:10px 0px;position:relative;text-align:center;" align="center" class="row-fluid">
                     
                      <div style="padding:15px 0;text-align:center;" class="span2">
                        <div>
                            <img class="img-rounded img-polaroid" width="50" height="50" style="width:50px;height:50px;" src="/img/ads/<{$trade.project.logo}>" />
                            <p>
                              <{$trade.project.name}>
                            </p>
                        </div>
                     </div>
                     <div class="span3" style="padding-top:30px;z-index:-1;border-bottom:dashed 2px #555;">
                      <{if $trade.state==0}>
                       <marquee direction=right scrollamount=5>
                          <i class="icon-user" ></i>
                          <i class="icon-group" style="margin-left:100%;"></i>
                        </marquee>
                        <{else}>
                           <i class="icon-user" ></i>
                          <i class="icon-group" style="margin-left:10%;"></i>
                        <{/if}>
                      </div>
                      <div style="padding:15px 0;text-align:center;" class="span2">
                        <div>
                            <img class="img-rounded img-polaroid" width="50" height="50"  style="width:50px;height:50px;" src="/img/show/<{$trade.product.shown}>" />
                            <p>
                              <{$trade.product.name}>
                            </p>
                        </div>
                        
                     </div>
                     <div style="padding:25px 0;text-align:center;" class="span2">
                        <div>
                            <p><i class="icon-eye-open icon-large"></i>&nbsp; &nbsp;浏览效果：
                             </p>
                              <h4 class="blue-color" >
                              
                              <{($trade.impression)|number_format}> 
                              </h4>
                        </div>
                        
                     </div>
                      <div style="padding:25px 0;text-align:center;" class="span2">
                        <div>
                             <p><i class="icon-user icon-large"></i>&nbsp; &nbsp;点击效果：
                             </p>
                              <h4 class="red-color" >
                              
                              <{($trade.click)|number_format}>
                              </h4>
                        </div>
                        
                     </div>
                  </div>
                  <table class="table table-bordered" style="margin:10px 0px;">
                  
                        <tr>
                          
                          <td style="padding:10px 20px;">
                              <p>购买价格：
                             </p>
                              <h5 class="red-color" >
                               <{(0.01*$trade.price)|number_format}> &yen;/天
                              
                              </h5>
                          </td>
                           <td>
                              <p>购买数量：
                             </p>
                              <h5 class="green-color" >
                              
                              <{$trade.number|number_format}>天
                              </h5>
                           </td>
                          
                         
                          <td>
                            <p>推广费用：
                             </p>
                              <h5 class="blue-color" >
                              
                              <{(0.01*($trade.price*$trade.number))|number_format}> &yen; 
                              </h5>
                          </td>
                         
                      </tr>
                      <tr>
                          <td>
                            <p>状态：
                             </p>
                              <h5 class="red-color" >
                              
                                <{if $trade.state == 0}>
                                  <span class="label label-success"> 
                                    正常显示
                                  </span>
                                   <{else}>
                                  <span class="label label-danger"> 
                                    已经到期
                                  </span>
                                  <{/if}>
                              </h5>
                            
                          </td>
                          <td>
                             <p>格式：
                             </p>
                              <h5 class="orange-color" >
                              
                               <{if $trade.advertise.format==0}>
                                  <i class="icon-font icon-large tip" title="文字"></i>
                               <{elseif $trade.advertise.format==1}>     
                                  <i class="icon-picture icon-large tip" title="图片"></i>
                               <{else}>
                                  <i class="icon-film icon-large tip" title="Flash视频"></i>                            
                               <{/if}>
                              </h5>
                            
                          </td>
                          
                          <td>
                            <p>到期时间：
                             </p>
                              <h5 class="orange-color" >
                              
                               <{$trade.endTime|date_format:'%Y-%m-%d'}>
                              </h5>
                            
                          </td>
                         
                        </tr>
                        <tr>
                          <td colspan="3">
                            <p>广告位效果预览：(如果效果不佳，可在产品管理页面更换广告内容)</p>
                            <div>
                              <div class="admarket_ad" style="display:inline;" aid="<{$trade.advertise.id}>" id="admarket_box_<{$trade.advertise.id}>"></div>
                                 <script type="text/javascript" id="admarket_shell" src="http://www.eadmarket.com/?c=cadvertise&a=GetADCode&aid=<{$trade.advertise.id}>"></script>
                                 <script type="text/javascript" id="admarket_js_<{$trade.advertise.id}>" src="http://www.eadmarket.com/js/ad.js?aid=<{$trade.advertise.id}>"></script>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3">
                            <p>推广进度：
                             </p>
                            <div class="progress tip" style="margin-top:20px;border:solid 1px #ddd;color:#ccc;" title="<{$trade.process}>%">
                               <{if $trade.process < 90 &&  $trade.state==0}>
                              <div class="bar bar-success" style="width: <{$trade.process}>%;">
                                <{elseif ($trade.process >=90 && $trade.process < 100)}>
                                <div class="bar bar-warning" style="width: <{$trade.process}>%;">
                                 <{else}> 
                                 <div class="bar bar-danger" style="width: 100%;">
                                <{/if}>
                                <{$trade.process}>%
                             </div>
                               
                            </div>
                          </td>
                        </tr>
                     
                  </table>
                  
                </div>
                 <{/foreach}>   
                     
                </div>
                
              </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <!--footer content-->
     <!-- load foot tpl -->
    <{include file="foot.php"}>
    
<script src="/js/highcharts.js"></script>
<script src="/js/jquery.form.js"></script>
<script type="text/javascript">
$('.tip').tooltip();

function stringToJSON(obj){ 
//alert(currentTrade+obj); 
  return eval('(' + obj + ')');   
} 
var hours=['0:00','1:00','2:00','3:00','4:00','5:00','6:00','7:00','8:00','9:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'];
var days=['星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日'];
var weeks=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28];
var months=['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'];
var currentDatas1=[1,2,3,4,5,6,7,8,9,10,11,12,12,14,15,16,16,18,19,20,21,22,23,24];
var currentDatas2=[1,2,3,4,5,6,7,8,9,10,11,12,12,14,15,16,16,18,19,20,21,22,23,24];
var datas1=[];//图表1数据
var datas2=[];//图表2数据
var products=[];
var currentType="day";
var currentTrade=0;
var datas3=[];
var sums=0;
function loadData(jsonData){
  datas1=[];//图表1数据
  datas2=[];//图表2数据
   if(jsonData){//从客户端异步获取数据，然后处理
      var records=jsonData;
      var colors = Highcharts.getOptions().colors;
      for(var i in records){  
        var impression= parseInt(records[i].impression);
        var click=parseInt(records[i].click);
        datas1.push(impression);
        datas2.push(click);
        products.push(records[i].advertise.title);
      }//end for
      
    
   }//end if
 
}
function loadDataByHours(jsonData){
  datas1=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//图表1数据
  datas2=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//图表2数据
   if(jsonData){//从客户端异步获取数据，然后处理
      var records=jsonData;
      for(var i in records){  
        var impression= parseInt(records[i].impression);
        var click=parseInt(records[i].click);
        var date=records[i].date.split(" ")[0];
        var hour=parseInt(records[i].date.split(" ")[1].split(":")[0]);
        datas1[hour]+=impression;
        datas2[hour]+=click;
      }//end for
      
    
   }//end if
}
function loadDataByDays(jsonData){
  datas1=[0,0,0,0,0,0,0];//图表1数据
  datas2=[0,0,0,0,0,0,0];//图表2数据
  //alert(jsonData);
   if(jsonData){//从客户端异步获取数据，然后处理
      var records=jsonData;
      for(var i in records){  
        var impression= parseInt(records[i].impression);
        var click=parseInt(records[i].click);
        var date=records[i].date.split(" ")[0];
        for(var j in days){
          if(days[j]==date){
             datas1[j]+=impression;
             datas2[j]+=click;
          }
        }
       
      }//end for
      
    
   }//end if
} 
function loadDataByMonths(jsonData){
  datas1=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//图表1数据
  datas2=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//图表2数据
  //alert(jsonData);
   if(jsonData){//从客户端异步获取数据，然后处理
      var records=jsonData;
      for(var i in records){  
        var impression= parseInt(records[i].impression);
        var click=parseInt(records[i].click);
        var date=records[i].date.split(" ")[0];
        var day=date.split("-")[2];
        for(var j in weeks){
          if(parseInt(weeks[j])==parseInt(day)){
             datas1[j]+=impression;
             datas2[j]+=click;
          }
        }
       
      }//end for
      
    
   }//end if
} 
function loadDataByYear(jsonData){
  datas1=[0,0,0,0,0,0,0,0,0,0,0,0];//图表1数据
  datas2=[0,0,0,0,0,0,0,0,0,0,0,0];//图表2数据
  //alert(jsonData);
   if(jsonData){//从客户端异步获取数据，然后处理
      var records=jsonData;
      for(var i in records){  
        var impression= parseInt(records[i].impression);
        var click=parseInt(records[i].click);
        var date=records[i].date.split(" ")[0];
        var month=date.split("-")[1];
        for(var j in months){
          if(j==(parseInt(month)-1)){
             datas1[j]+=impression;
             datas2[j]+=click;
          }
        }
       
      }//end for
      
    
   }//end if
} 

function strToDate(str){

  var a = str.toString().split(" ");
  var b=a[0].split("-");
  var c=a[1].split(":");
  return d = new Date(b[0], b[1]-1, b[2], c[0], c[1], c[2]);  
}

function DateToDateStr(date){
  return date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate());
}

function DateToDateTimeStr(){
  return date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate())+" "+(date.getHours())+":"+(date.getMinutes())+":"+(date.getSeconds());
}
function AddZero(val){
      if(parseInt(val)<10){
        val="0"+val;
      }
      return val;
}
 var chart;
$(function () {

    
    Highcharts.setOptions({ 
                    colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#EC4F4F'] 
                }); 
    
    var date=new Date();
    var today=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate());
    var startTime=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate())+" 00:00:00";
    var endTime=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate()+1)+" 00:00:00";
    currentTrade=$("#first-trade").attr("data-key");
    $.ajax({
       url: "<{spUrl c=creport a=GetJsonDataByTime}>", 
       data:{'startTime':startTime,'endTime':endTime,'trade':currentTrade},
        success: function(data){
          loadDataByHours(stringToJSON(data));
                  chart = $('#chart').highcharts({
                    chart: {
                         type: 'spline'
                    },
                    title: {
                        text: '推广效果概览',
                        style:{                     //样式
                        fontSize: '14px'
                        }
                    },
                    tooltip: {
                      valueSuffix: '次'
                   },
                   xAxis: {
                    categories: hours
                    },
                    yAxis: {
                       
                      title: {
                          text: ''
                      } 
                    },
                    plotOptions: {
                        column: {
                            cursor: 'pointer',
                            shadow:true,
                            dataLabels: {
                                enabled: true,
                                color: '#000000',
                                fontSize: '14px',
                                connectorColor: '#000000',
                                formatter: function() {
                                    return '<b>'+ this.y +' </b>';
                                }
                            }
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                    name: '展示次数',
                    data: datas1,
                    type: 'spline',
                    shadow:true

                    }, {
                        name: '点击次数',
                        visible:false,
                        data: datas2,
                        type: 'spline',
                        shadow:true
          
                    }]

                });
                chart = $('#chart').highcharts();
               
            }
        });//end ajax
       
    });

 $(".sec").click(function(){
      currentTrade=$(this).attr("data-key");
      if(currentType=="day"){
        $('#btn-day').trigger('click');  
      }
      if(currentType=="week"){
        $('#btn-week').trigger('click');  
      }
       if(currentType=="month"){
        $('#btn-month').trigger('click');  
      }
      if(currentType=="year"){
        $('#btn-year').trigger('click');  
      }

    });
//切换图表点击和展示次数数据
  $("#btn-impress").click(function(){
      if(chart.series[0].visible){
        chart.series[0].hide();
      }else{
        chart.series[0].show();
      }
      
    });
   $("#btn-click").click(function(){
    if(chart.series[1].visible){
      chart.series[1].hide();
    }else{
      chart.series[1].show();
    }
  });

//切换图表时间数据
   $("#btn-day").click(function(){
    var date=new Date();
    currentType="day";
    var today=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate());
    var startTime=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate())+" 00:00:00";
    var endTime=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate()+1)+" 00:00:00";

    $.ajax({
       url: "<{spUrl c=creport a=GetJsonDataByTime}>", 
       data:{'startTime':startTime,'endTime':endTime,'trade':currentTrade},
        success: function(data){
          loadDataByHours(stringToJSON(data));
          setChart(hours,datas1,datas2,"spline");
        },
    });
    
 
  });
  $("#btn-week").click(function(){
    currentType="week";
    var date=new Date();
    days=[0,0,0,0,0,0,0];
    var today=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate());
    var startTime=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate()-6)+" 00:00:00";
    var endTime=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate()+1)+" 00:00:00";
    currentDatas=[1,2,3,4,5,6,7];
    var date=new Date();

    for(var i=days.length;i>=0;i--){
      days[days.length-i]=date.getFullYear()+"-"+AddZero(date.getMonth()+1)+"-"+AddZero(date.getDate()-i+1);
    }
    $.ajax({
       url: "<{spUrl c=creport a=GetJsonDataByTime}>", 
       data:{'startTime':startTime,'endTime':endTime,'trade':currentTrade},
        success: function(data){
          loadDataByDays(stringToJSON(data));
            setChart(days,datas1,datas2);
        },
    });
    
 
  });
  $("#btn-month").click(function(){
    currentType="month";
    var date=new Date();
    var date2=new Date(date.getFullYear(),date.getMonth()+1,0);
    days.length=31;
    var startTime=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(1)+" 00:00:00";
    var nextMonth=1;
    if(date.getMonth()!=11){
      nextMonth=date.getMonth()+2;
    }
    var endTime=date.getFullYear()+"-"+(nextMonth)+"-"+1+" 00:00:00";
    currentDatas=[1,2,3,4,5,6,7];
    var date=new Date();
    for(var i=0;i<date2.getDate();i++){
      weeks[i]=i+1;
    }

    $.ajax({
       url: "<{spUrl c=creport a=GetJsonDataByTime}>", 
       data:{'startTime':startTime,'endTime':endTime,'trade':currentTrade},
        success: function(data){
          loadDataByMonths(stringToJSON(data));
            setChart(weeks,datas1,datas2,"spline");
        },
    });
 
  });
  $("#btn-year").click(function(){
    currentType="year";

    datas1.length=12;
    datas2.length=12;
    var date=new Date();
    var today=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+(date.getDate());
    var startTime=date.getFullYear()+"-01-"+(1)+" 00:00:00";
    var nextMonth=1;
    if(date.getMonth()!=11){
      nextMonth=date.getMonth()+2;
    }
    
    var endTime=date.getFullYear()+1+"-"+(1)+"-"+(1)+" 00:00:00";
    $.ajax({
       url: "<{spUrl c=creport a=GetJsonDataByTime}>", 
       data:{'startTime':startTime,'endTime':endTime,'trade':currentTrade},
        success: function(data){
          loadDataByYear(stringToJSON(data));
          setChart(months,datas1,datas2);
        },
    });
 
  });
    //set chart
     function setChart( categories, data1,data2,type) {
      var defaultType='column';
      if(type!=null){
        defaultType=type;
      }
      chart.xAxis[0].setCategories(categories,true);
      chart.series[0].update({
                data: data1,
                type:defaultType
            },false);
      chart.series[1].update({
                data: data2,
                type:defaultType
            },false);
      chart.redraw();
    }
    </script>
  </body>
</html>
