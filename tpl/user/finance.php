<!DOCTYPE html>
<html>
  <head>
    <title>九尾狐 - 账户概况</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/css/user.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">  
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/highcharts.js"></script>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row-fluid">
          <div class="span6">
            <a href="/"><img src="/img/budgetup-small.png"/></a>
          </div>
          <div class="span6">
              <ul class="nav nav-pills nav-head">
                <li>
                  <a href="<{spUrl c=sub a=dashboard}>">账户概况</a>
                </li>
                <li><a href="<{spUrl c=sub a=sitemanage}>">网站管理</a></li>
                <li><a href="<{spUrl c=sub a=admanage}>">广告位管理</a></li>
                <li class="active"><a href="<{spUrl c=sub a=finance}>">财务统计</a></li>
                <li><a href="<{spUrl c=sub a=setting}>">基本设置</a></li>
                <li><a href="<{spUrl c=sub a=logout}>">退出</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row-fluid">
          <div class="span3 left-bar">
            <div class="row-fluid category">
                  <div class="span4" align="center">
                     <img src="/img/head/<{$smarty.session.user.headimg}>" class="img-rounded img-polaroid" style="margin:0;height:50px;width:50px;">
                    <p class="title"><{$smarty.session.user.name}></p>               
                  </div> 
                  <div class="span8" style="padding:10px;">
                    <div class="title">&nbsp;账户余额：</div>
                    <h4 style="color:#50B432;"><{$smarty.session.user.balance}> &yen;</h4>
                  </div>
                
              </div>
            <!-- Bootstrap -->
            <div class="categories">
              <div class="row-fluid category">
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label blue"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;广告位：</div>
                    <p>18</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label green"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;已售：</div>
                    <p>10</p>
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
                    <div class=" title">&nbsp;本月收入：</div>
                    <p>10,100 &yen;</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;累计收入：</div>
                    <p>20 &yen;</p>
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
                    <div class=" title">&nbsp;月流量：</div>
                    <p>36786 IP</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;点击率：</div>
                    <p>18%</p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
             <div style="padding-left:0px;">
                 <p class="btn-group">
                  <button class="btn  btn-danger tip"  title="分享我们的网站"><i class=" icon-heart icon-white"></i></button>
                  <button class="btn tip"   title="切换身份"><i class="icon-refresh"></i></button>
                  <button class="btn tip"   title="设置"><i class="icon-cog"></i></button>
                  <button class="btn tip" title="退出"><i class="icon-off"></i></button>
                </p>
              </div>
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
                        <th>余额</th>
                        <th>时间</th>
                        <th>说明</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{foreach from=$records item=record}>
                        <tr>
                        <td>
                            <{if $record.type == 0}>
                            收入
                            <{elseif $record.type == "1"}>
                            支出
                            <{else}>
                            未知类型
                            <{/if}>
                        </td>

                        <td>
                          <{if $record.type == 0}>
                          +
                          <{elseif $record.type == "1"}>
                            -
                            <{else}>
                            未知类型
                             <{/if}>
                          <{$record.number}> &yen;
                        </td>
                        <td><{$record.balance}> &yen;</td>
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
                        <th>余额</th>
                        <th>时间</th>
                        <th>说明</th>
                      </tr>
                    </thead>
                    <tbody>
                       <{foreach from=$records item=record}>
                         <{if $record.type == 0}>
                            <tr>
                            <td>收入</td>
                            <td>+ <{$record.number}> &yen;</td>
                            <td><{$record.balance}> &yen;</td>
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
                        <th>余额</th>
                        <th>时间</th>
                        <th>说明</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                       <{foreach from=$records item=record}>
                         <{if $record.type == 1}>
                            <tr>
                            <td>支出</td>
                            <td>- <{$record.number}> &yen;</td>
                            <td><{$record.balance}> &yen;</td>
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
<div class="modal hide fade" id="form-income">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>账户充值</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">关闭</a>
    <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>
<div class="modal hide fade" id="form-outcome">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>账户提现</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">关闭</a>
    <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>
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


function loadData(data){
   if(data){//从客户端异步获取数据，然后处理
    var records=data;
    for(var i in records){
        if(records[i].type==0){
          income+=parseFloat(records[i].number);
          incomes.push(parseFloat(records[i].number));
          // if(i>0){
          //   outcomes.push(parseFloat(outcomes[i-1]));
          // }else{
          //   outcomes.push(0);
          // }
          sum+=parseFloat(records[i].number);
          
        }
        else if(records[i].type==1){
          outcome+=parseFloat(records[i].number);
          // if(i>0){
          //   incomes.push(parseFloat(incomes[i-1]));
          // }else{
          //   incomes.push(0);
          // }
          outcomes.push(0-parseFloat(records[i].number));
          sum-=parseFloat(records[i].number);
          
        }
        sums.push(sum);
      }
      var data1={
          name: '账户余额：'+sum,
          data: sums,
          type: 'spline',
          shadow:true
      };
      var data2={
                      name: '收入：'+income,
                      data: incomes,
                      type: 'spline',
                      visible:false,
                      shadow:true
                  };
      var data3={
                      name: '支出：'+outcome,
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
