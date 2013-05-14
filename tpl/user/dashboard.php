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
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row-fluid">
          <div class="span7"><a href="/"><img src="/img/budgetup-small.png"/></a></div>
          <div class="span5">
              <ul class="nav nav-pills nav-head">
                <li class="active">
                  <a href="<{spUrl c=sub a=dashboard}>">账户概况</a>
                </li>
                <li><a href="<{spUrl c=sub a=admanage}>">广告位管理</a></li>
                <li><a href="<{spUrl c=sub a=finance}>">财务统计</a></li>
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
                     <img src="/img/head/1.jpg" class="img-rounded img-polaroid" style="margin:0;height:50px;width:50px;">
                    <p class="title">
                      <{$smarty.session.user.name}>
                    </p>               
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
                  <a class="btn tip"  title="退出" href="<{spUrl c=sub a=logout}>">
                    <i class="icon-off"></i>
                  </a>
                </p>
              </div>
            </div>
          </div>
          <div class="span9 main-body" >
            <div id="chart" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
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
<script src="/js/highcharts.js"></script>

<script type="text/javascript">
$('.tip').tooltip();
$(function () {
  Highcharts.setOptions({ 
            colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#EC4F4F'] 
        }); 
        $('#chart').highcharts({
            chart: {
              layout: 'vertical',
              type:'column',
            },
            title: {
                text: '账户概览',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: ['1月', '2月', '3月', '4月', '5月', '6月',
                    '7月', '8月', '9月', '10月', '11月', '12月']
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
            legend: {
                
            },
            series: [{
                name: '账户余额：100',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
                type: 'spline',
                shadow:true

            }, {
                name: '收入：1802',
                data: [20, 28, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 5],
                type: 'spline',
                shadow:true
  
            }, {
                name: '支出：1702',
                data: [9, 4, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 10],
                type: 'spline',
                shadow:true
              
            }, {
                type: 'pie',
                shadow:true,
                name: '年度总计',
                data: [{
                    name: 'Jane',
                    y: 8,
                    color: Highcharts.getOptions().colors[0] // Jane's color
                }, {
                    name: '收入',
                    y: 23,
                    color: Highcharts.getOptions().colors[1] // John's color
                }, {
                    name: '支出',
                    y: 15,
                    color: Highcharts.getOptions().colors[2] // Joe's color
                }],
                center: [100, 80],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });
    
 
    </script>
  </body>
</html>
