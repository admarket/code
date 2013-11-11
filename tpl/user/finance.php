<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 - 用户中心 - 财务管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    <link href="/css/user.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">  
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
      <!--[if lte IE 6]>
    <!-- bsie js 补丁只在IE6中才执行 -->
    <script type="text/javascript" src="/js/bootstrap-ie.js"></script>
    <![endif]-->
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
                    <div class=" title">&nbsp;广告收益：</div>
                    <p><{(0.01*$adIncome)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label green"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;广告支出：</div>
                    <p><{(0.01*$adOutcome)|string_format:"%.2f"}>&nbsp;&yen;</p>
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
                    <div class=" title">&nbsp;累计充值：</div>
                    <p><{(0.01*$handIncome)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;累计提现：</div>
                    <p><{(0.01*$handOutcome)|string_format:"%.2f"}>&nbsp;&yen;</p>
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
                    <div class=" title">&nbsp;总收入：</div>
                    <p><{(0.01*$sumIncome)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;总支出：</div>
                    <p><{(0.01*$sumOutcome)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
            
            </div>
          </div>
          <div class="span9 main-body" >
           
            <div id="chart" style="min-width: 400px; height: 300px; margin: 0 auto"></div>
            <div class="tabbable"> <!-- Only required for left/right tabs -->
              
              <ul class="nav nav-tabs" style="position:relative;">
                <li class="active"><a href="#sec-sum" data-toggle="tab" id="tab-sum">全部记录</a></li>
                <li><a href="#sec-income" data-toggle="tab" id="tab-income">收入</a></li>
                <li><a href="#sec-outcome" data-toggle="tab" id="tab-outcome">支出</a></li>
                <span class="btn-group" style="position:absolute;right:0;">
                        <a id="btn-income" class="btn btn-small btn-success tip" id="btn-addAdvertise" title="充值">
                          <i class="icon-plus"></i> 充值
                        </a>
                         <a  id="btn-outcome"   class="btn btn-small btn-danger tip"  id="editable" title="提现">
                          <i class="icon-hand-left" ></i> 提现
                        </a>
                </span>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active"  id="sec-sum">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>类型</th>
                        <th>金额</th>
                        <th>时间</th>
                        <th>说明</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{if $records eq ""}>
                         <div class="alert" style="border:solid 1px #c09853;display:block;width:92%;position:relative;left:0;font-size:12px;">
                  
                        <i class="icon-info-sign"></i>&nbsp;&nbsp;暂无数据内容。
                        </div>     
                    <{/if}>
                      <{foreach from=$records item=record}>
                        <tr>
                        <td>
                            <{if $record.type == 00}>
                            广告收益
                            <{elseif  $record.type == "01"}>
                            充值
                             <{elseif  $record.type == "10"}>
                            广告支出
                              <{elseif  $record.type == "11"}>
                            提现
                            <{else}>
                            未知类型
                            <{/if}>
                        </td>

                        <td>
                          <{if  substr($record.type,0,1) == 0}>
                          +
                          <{elseif  substr($record.type,0,1) == "1"}>
                            -
                            <{else}>
                            未知类型
                             <{/if}>
                          <{(0.01*$record.number)|string_format:"%.2f"}> &yen;
                        </td>
                        <td><{$record.time}></td>
                        <td><{$record.remark}></td>
                      </tr>
                      <{/foreach}>  
                    </tbody>
                  </table>   
                </div>
                <div class="tab-pane" id="sec-income">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>类型</th>
                        <th>金额</th>
                        <th>时间</th>
                        <th>说明</th>
                      </tr>
                    </thead>
                    <tbody>
                       <{foreach from=$records item=record}>
                         <{if  substr($record.type,0,1) == 0}>
                            <tr>
                               <{if $record.type == "00"}>
                              <td>广告收益</td>
                               <{elseif  $record.type == "01"}>
                              <td>充值</td>
                               <{/if}>
                              <td>+ <{(0.01*$record.number)|string_format:"%.2f"}> &yen;</td>
                              <td><{$record.time}></td>
                              <td><{$record.remark}></td>
                          </tr>
                        <{/if}>
                      <{/foreach}>
                       
                    </tbody>
                  </table>   
                </div>
                <div class="tab-pane" id="sec-outcome">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>类型</th>
                        <th>金额</th>
                        <th>时间</th>
                        <th>说明</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                       <{foreach from=$records item=record}>
                         <{if substr($record.type,0,1) == "1"}>
                          <tr>
                              <{if $record.type == "10"}>
                              <td>广告支出</td>
                             <{elseif  $record.type == "11"}>
                              <td>提现</td>
                             <{/if}>
                            <td>- <{(0.01*$record.number)|string_format:"%.2f"}> &yen;</td>
                            <td><{$record.time}></td>
                            <td><{$record.remark}></td>
                          </tr>
                        <{/if}>
                      <{/foreach}>
                      
                       
                    </tbody>
                  </table>   
                </div>
                      <div class="pagination" align="center" > 
                        <ul>
                        <{if $pager}>
                        <!--在当前页不是第一页的时候，显示前页和上一页-->
                        <{if $pager.current_page != $pager.first_page}>
                        <li>
                          <a href="<{spUrl c=sub a=finance page=$pager.first_page}>">首页</a>
                        </li> 
                        <li>
                          <a href="<{spUrl c=sub a=finance page=$pager.prev_page}>">上一页</a> 
                        </li>
                        <{/if}>
                        <!--开始循环页码，同时如果循环到当前页则不显示链接-->
                        <{foreach from=$pager.all_pages item=thepage}>
                                <{if $thepage != $pager.current_page}>
                                        <li>
                                          <a href="<{spUrl c=sub a=finance page=$thepage}>"><{$thepage}></a>
                                        </li>
                                <{else}>
                                        <li><a><b><{$thepage}></b></a></li>
                                <{/if}>
                        <{/foreach}>
                        <!--在当前页不是最后一页的时候，显示下一页和后页-->
                        <{if $pager.current_page != $pager.last_page}> 
                        <li>
                          <a href="<{spUrl c=sub a=finance page=$pager.next_page}>">下一页</a>
                        </li>
                        <li>
                          <a href="<{spUrl c=sub a=finance page=$pager.last_page}>">末页</a>
                        </li>
                        <{/if}>
                        <{/if}>
                        </ul>
                      </div> 
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!--footer content-->
     <!-- load foot tpl -->
    <{include file="foot.php"}>

<div class="modal hide fade" id="form-income">
   
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>账户充值</h3>
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
<div class="modal hide fade" id="form-outcome">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>账户提现</h3>
  </div>
  <div class="modal-body">
    <form name="alipayment" action="<{spUrl c=ccash a=addCash}>" method="post">
        <div>
                <p>
                  <label>提现方式：</label>
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
                  <label>提现金额：</label>
                </p>
                <p>
                    <input size="30" id="cash-txt" class="input-large" name="amount" />
                        <span id="cash-msg">必填，请输入大于0的整数</span>
                </p>
                <p>
                  <button class="btn btn-danger" type="button" id="btn-cash">申请提现</button>
                </p>
                         <div style="display:block;width:85%;position:relative;left:0;font-size:12px;">
                  
                        <i class="icon-info-sign"></i>&nbsp;&nbsp;小提示：广告收入默认在当月月底下月月初提现到您的默认提现账号，手动申请提现需要等待1-3个工作日才能到账，请耐心等待，如有疑问，请联系本站客服QQ。
                        </div>     
        </div>
          </form>
  </div>
  <div class="modal-footer">

  </div>
</div>

    <script src="/js/highcharts.js"></script>
<script src="/js/jquery.message.js"></script>
<script type='text/javascript'>//<![CDATA[ 
 $('.tip').tooltip();
 Highcharts.setOptions({ 
            colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#EC4F4F'] 
        });
 var income=0;
 var incomes=[0];
 var outcome=0;
 var outcomes=[0];
 var sum=0;
 var sums=[0];
 var chartBox;
 var datas=[[0],[0],[0]];
function stringToJSON(obj){   
  return eval('(' + obj + ')');   
} 
$("#btn-income").click(function(){
  $('#form-income').modal();
});
$("#btn-outcome").click(function(){
  $('#form-outcome').modal();
});
//验证提现金额
$("#btn-cash").click(function(){
  var flag=false;
  var reg= / ^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$ /;
  if($.trim($("#cash-txt").val())==""){
            $("#cash-msg").html("提现金额不能为空");
            $("#cash-msg").css("color","red");
            flag=false;
        }else{
            if(isNaN($.trim($("#cash-txt").val()))||$.trim($("#cash-txt").val())<=0){
                  $("#cash-msg").html("提现金额必须大于0");
                  $("#cash-msg").css("color","red");
                  flag=false;
              }else{
                  $.post("<{spUrl c=ccash a=checkCash}>",{amount:$.trim($("#cash-txt").val())},function(data,status){
                     if(data!="1"){

                         $("#cash-msg").html("提现金额超出您的账户余额！");
                        $("#cash-msg").css("color","red");
                        flag=false;
                     }else{
                        $('#form-outcome').modal('hide');
                         flag=true;
                         if(flag){
                             $.post("<{spUrl c=ccash a=addCash}>",{amount:$.trim($("#cash-txt").val())},function(data,status){
                                         if(data==1){
                                              $("#cash-msg").html("验证通过！");
                                              $("#cash-msg").css("color","green");
                                              var balance=parseFloat($("#user-balance").html());
                                              var cold=parseFloat($("#user-cold").html());
                                              var amount=parseFloat($.trim($("#cash-txt").val()));
                                              $("#user-balance").html(balance-amount);
                                              $("#user-cold").html(cold+amount);
                                              $.msg('申请提现成功，请耐心等待1-3个工作日。','color:green;');

                                         }else{
                                              $.msg(data);
                                         }
                                      });
                         }
                     }
                  });
                  
              }
        }
   
     
});

//验证充值金额
$("#btn-recharge").click(function(){
    var reg= /^[0-9]*$/;
  if($.trim($("#recharge-txt").val())==""){
            $("#recharge-msg").html("充值金额不能为空");
            $("#recharge-msg").css("color","red");
            return false;
        }else{
           if(isNaN($.trim($("#recharge-txt").val()))||$.trim($("#recharge-txt").val())<=0){
            $("#recharge-msg").html("充值金额必须大于0的数字");
            $("#recharge-msg").css("color","red");
            return false;
            }else{
                    $("#recharge-msg").html("验证通过！");
                    $("#recharge-msg").css("color","green");
                    return true;
            }
        }


});

function loadData(data){
   if(data){//从客户端异步获取数据，然后处理
    var records=data;
    for(var i in records){
      records[i].number=0.01*parseFloat(records[i].number);
        if(records[i].type.substring(0,1)=="0"){

          income+=records[i].number;
          incomes.push(records[i].number);
          // if(i>0){
          //   outcomes.push(parseFloat(outcomes[i-1]));
          // }else{
          //   outcomes.push(0);
          // }
          sum+=records[i].number;
          
        }
        else if(records[i].type.substring(0,1)=="1"){
          outcome+=records[i].number;
          // if(i>0){
          //   incomes.push(parseFloat(incomes[i-1]));
          // }else{
          //   incomes.push(0);
          // }
          outcomes.push(0-records[i].number);
          sum-=records[i].number;
          
        }
        sums.push(sum);
      }
      var data1={
          name: '账户余额',
          data: sums,
          type: 'spline',
          shadow:true
      };
      var data2={
                      name: '收入',
                      data: incomes,
                      type: 'spline',
                      visible:false,
                      shadow:true
                  };
      var data3={
                      name: '支出',
                      data: outcomes,
                      type: 'spline',
                      visible:false,
                      shadow:true
                  };
       datas=[data1,data2,data3];
   
   }
 
}
$(function () {
  $.ajax({ url: "<{spUrl c=cfinance a=getJsonData}>", success: function(data){
        loadData(stringToJSON(data));
        $('#chart').highcharts({
                title: {
                    text: '财务统计报表',
                    x: -20 //center
                },
                yAxis: {
                    title: {
                        text: '人民币 (元)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: '¥'
                },
                credits: {
                        enabled: false
                    },
                series: datas
            });

          // the button action
          var chartBox = $('#chart').highcharts();
              
          $("#tab-income").click(function(){
            chartBox.series[0].hide();
            chartBox.series[1].show();
            chartBox.series[2].hide();
          });
          $("#tab-outcome").click(function(){
            chartBox.series[0].hide();
            chartBox.series[1].hide();
            chartBox.series[2].show();
          });
          $("#tab-sum").click(function(){
            chartBox.series[0].show();
            chartBox.series[1].hide();
            chartBox.series[2].hide();
          });
      }
    });
    
});
//]]>  

</script>
  </body>
</html>
