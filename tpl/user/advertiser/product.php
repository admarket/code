<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 - 用户中心 - 产品管理</title>
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
    <script src="/js/bootstrap-fileupload.min.js"></script>
    <script src="/js/bootstrap-editable.js"></script>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="row-fluid">
           <div class="span6">
            <a href="/" title="网站首页"><img class="logo-small" src="/img/logo-small.png"/></a>
          </div>
          <div class="span6">
             <ul class="nav nav-pills nav-head">
                <li class="active"><a href="<{spUrl c=sub a=product}>">产品管理</a></li>
                <li ><a href="<{spUrl c=sub a=effect}>">
                  统计分析</a></li>
                <li>
                  <a href="<{spUrl c=sub a=inbox}>">站内信箱<span class="title">(<{$smarty.session.unread}>)</span>
                  </a>
                </li>
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
                    <div class=" title">&nbsp;产品总数：</div>
                    <p><{$productCount}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label green"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;推广费用：</div>
                    <p><{$sumFee|number_format}>&nbsp;&yen;</p>
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
                    <div class=" title">&nbsp;展示次数：</div>
                    <p><{$sumImpression|number_format}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;点击次数：</div>
                    <p><{$sumClick|number_format}></p>
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
                    <div class=" title">&nbsp;展示单价：</div>
                    <p><{$impressPrice|string_format:'%.2f'}>&nbsp;&yen;/次</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;点击单价：</div>
                    <p><{$clickPrice|number_format}>&nbsp;&yen;/次</p>
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
            <div class="row-fluid">
              <div id="chart1" class="span7" style="min-width: 200px; height: 250px; margin: 0 auto"></div>
              <div id="chart2" class="span5" style="min-width: 200px; height: 250px; margin: 0 auto"></div>
            </div>
             
             <div class="tabbable"> <!-- Only required for left/right tabs -->
              <ul class="nav nav-tabs" style="position:relative;">
                    <li class="active">
                     <a href="#tab" data-toggle="tab">全部产品</a>
                     </li>

                      <span class="btn-group" style="position:absolute;right:0;">
                        <a class="btn btn-small" id="btn-addProject">
                          <i class="icon-plus" title="添加"></i> 添加
                        </a>
                         <a class="btn btn-small" data-toggle="button"  id="editable">
                          <i class="icon-edit" title="编辑"></i> 编辑
                        </a>
                      </span>
              </ul> 
              <div class="tab-content">
                
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>产品</th>
                        <th>名称</th>
                        <th>展示</th>
                        <th>点击</th>
                        <th>点击率</th>
                        <th>推广费</th>
                        <th>点击单价</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{foreach from=$products item=product name=projectCount}> 
                        <tr>
                          <td>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="border:solid 1px #ccc;width: 50px; height: 50px;background-color:#ededed;">
                                <img src="/img/show/<{$product.shown}>" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="width: 50px; height: 50px;"></div>
                              <div>
                                <form method="post" action="<{spUrl c=cproduct a=updateShown}>" enctype="multipart/form-data">
                                  <span class="btn btn-small btn-file tip btn-upload-logo" title="更新logo">
                                    <span class="fileupload-new" style="font-size:12px;">
                                      <i class="icon-upload"></i> logo</span>
                                    <span class="fileupload-exists" style="font-size:12px;">
                                      <i class="icon-upload"></i> logo</span>
                                    <input type="file" name="shown" class="upload-logo" />
                                    <input type="hidden" name="id"  value="<{$product.id}>"/>
                                  </span>
                                </form>
                              </div>
                            </div>
                          </td>
                          <td>
                              <p class="title" ><a class="editable"
                               data-pk="<{$product.id}>"
                               data-name="productName"> 
                               <{$product.name}></a>
                             </p>
                              <div>
                                <a  class="url-editable"
                               data-pk="<{$product.id}>"
                               data-type="text"
                               data-name="productUrl">
                                <{$product.url}>
                                </a>
                              </div>
                          </td>
                          <td>
                            <{$product.impression|number_format}>
                          </td>
                           <td>
                           
                            <{$product.click|number_format}>
                          </td>
                          <td>
                           
                            <{(($product.click/$product.impression)*100)|string_format:'%.2f'}>%
                          </td>
                          <td>
                           
                            <{$product.fee|number_format}>&yen;
                          </td>
                          <td>
                           
                            <{($product.fee/$product.click)|string_format:'%.2f'}> &yen;/次
                          </td>
                          <td>
                           <{if $product.trades|@count eq 0}>
                           
                             <a url="<{spUrl c=cproduct a=removeProduct productID=$product.id}>"
                              class="btn btn-mini btn-danger tip remove" title="删除">
                              <i class=" icon-trash"></i>
                            </a>
                             <{else}>
                             <a url="<{spUrl c=cproduct a=removeProduct productID=$product.id}>" class="btn btn-mini btn-danger disabled tip" title="正在推广的产品无法删除">
                              <i class=" icon-trash"></i>
                            </a>
                            <{/if}>
                           
                            
                          </td>
                        </tr>
                      <{/foreach}>   
                    </tbody>
                  </table>  
                   <div class="alert" style="border:solid 1px #c09853;display:block;width:92%;position:relative;left:0;font-size:12px;">
                  
                  <strong><i class="icon-info-sign"></i>&nbsp;&nbsp;小提示：</strong> 本站禁止传播违反国家法律法规、社会道德以及虚假的产品信息，一旦发现将进行删除处理。
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
            ©2013 北京九尾狐科技有限公司 — 版权所有.<a>隐私声明</a>. 
          </div>
          <div class="span4">
            致谢：<a>Glyphicons</a> | <a>BootStramp</a> | <a>BootCss</a> | <a>Jquery</a>
          </div>
        </div>
      </div>
    </div>
<div class="modal hide fade" id="form-addProject">
  <form action="<{spUrl c=cproduct a=addProduct}>" method="post" id="form-product" enctype="multipart/form-data"> 
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>添加推广产品</h5>
    </div>
    <div class="modal-body" style="padding:0px 20px;">
      <div class="row-fluid">
        <fieldset class="span8">
          <label class="control-label" >产品名称：</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-home"></i></span>
              <input id="productName" name="productName" type="text" placeholder="输入您的网站名称" class="input-xlarge">
            </div>
             <div id="productName-msg" class="msg">名称不能为空，长度小于20</div>
          </div> 
          <label class="control-label" for="input01">产品推广地址：</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-link"></i></span>
              <input id="productUrl" name="productUrl" type="text" placeholder="http://输入您的网站地址" class="input-xlarge">
            </div>
            <div id="productUrl-msg" class="msg">即广告链接的推广地址，且带有http://的网址，如http://www.baidu.com</div>
          </div>
        </fieldset>
        <div class="span3 offset1">
          <p>
            <div  align="center">
              <form id="headimgform" method="post" action="<{spUrl c=tool a=upFile}>" enctype="multipart/form-data"> 
                <div class="fileupload fileupload-new" data-provides="fileupload" data-uploadtype="image">
                  <div class="fileupload-new thumbnail" style="border:solid 1px #ccc;width: 50px; height: 50px;background-color:#ededed;padding:5px;">
                    <img src="/img/ads/0.png" style="width: 150px; height: 150px;"/></div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="border:solid 1px #ccc;width: 150px; height: 150px;background-color:#ededed;padding:5px;"></div>
                  <div>
                    <span class="btn btn-small btn-file tip" title="上传Logo">
                      <span class="fileupload-new" style="font-size:12px;">
                        <i class="icon-upload"></i> logo</span>
                      <span class="fileupload-exists" style="font-size:12px;">
                        <i class="icon-upload"></i> logo</span>
                      <input type="file" id="file-logo-add" name="show" />
                    </span>
                    <p>50*50 最佳大小</p>
                    <div id="file-logo-add-msg" class="msg">只能上传jpg、jpeg、png、bmp或gif格式的图片！</div>
                  </div>
                </div>
              </form>
            </div>
          </p>
        </div>
      </div>
    </div>
    
    <div class="modal-footer" style="padding: 20px;">
      <a  class="btn btn-success btn-small" id="btn-saveAddProject">        <i class="icon-save"></i> 保存</a>
    </div>
  </form>
</div>

<div class="modal hide fade" id="form-confirm" style="top:20%;">
  <form action="<{spUrl c=cadvertise a=AddAdvertise}>" id="form-delete" method="post">
    <div class="modal-body">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>是否确认删除数据？</h5>
    </div>
    
    <div class="modal-footer" style="margin:0;top:-20px;">
      <form action="post" method=""  id="action-confirm">
       <a  class="btn btn-small btn-danger" id="btn-confirm">
        <i class="icon-ok"></i> 确认
      </a>
      <a  class="btn btn-small cancel" id="btn-cancel">
        <i class="icon-remove"></i> 取消
      </a>
      </form>
    </div>
  
</div>
<script src="/js/highcharts.js"></script>
<script src="/js/jquery.form.js"></script>
<script type="text/javascript">
$('.fileupload').fileupload({
  uploadtype:"image"
});
var d=false;
var pre="";   //标记前一个上传的文件
$("#file-logo-add").change(function(){
        var obj = $("#file-logo-add").val();
        var options = {  
            success : function(data) {  
                //alert('成功上传！');  
            },  
            error : function(result) {  
               
            }  
        };  
        if(pre!=obj&&validateImage(obj)) {
            d=true;
            pre=obj; 
            $('#file-logo-add-msg').css("display","none");  
        }
        else{
           $('#file-logo-add-msg').css("display","block");  
        }
      });
//校验图片格式及大小 Add Date 2012-6-14 LIUYI
    function validateImage(val) {
        var tmpFileValue = val.toLowerCase();
        var reg=/^.*?\.(gif|png|jpg|jpeg|bmp)$/;
        //校验图片格式
        if(reg.test(tmpFileValue)){
            return true;
        } else {
            alert("只能上传jpg、jpeg、png、bmp或gif格式的图片！");
            return false;
        }
        
        //校验图片大小,这段代码需调整浏览器安全级别(调到底级)和添加可信站点(将服务器站点添加到可信站点中)
        //var imgSize = 1024 * 100; //最大100K
        //var img = new Image();
        if(file.value != ""){
            
        //    img.onreadystatechange = function(){
        //        if(img.readyState == "complete"){
        //            if(img.fileSize <=0 || img.fileSize > imgSize){
        //                alert("当前文件大小" + img.fileSize / 1024 + "KB, 超出最大限制 " + imgSize / 1024 + "KB");
        //                return false;
        //            }else{
        //                alert("OK");
        //                return true;
        //            }
        //        }
        //    }
            
        //    img.src = file.value;
            //return true;
        }else{
            alert("请选择上传的文件!");
            return false;
        }
    }
 //enable / disable
$('#editable').click(function() {
       $('.editable').editable('toggleDisabled');
       $('.btn-upload-logo').toggle();
   }); 
$('.select-editable').editable({
        disabled:true,  
        url: '<{spUrl c=cproject a=UpdateProject}>',
        success: function(response, newValue) {
          if(!response.success) 
            alert(response);
        }, 
        source: [
               <{foreach from=$categories item=category name=categoryCount}>
                {value: <{$category.id}>, text:"<{$category.name}>"},
               <{/foreach}>
           ] 
    }); 
$('.textarea-editable').editable({
        type: 'textarea',
        disabled:true,
        emptytext:'空数据',
        url: '<{spUrl c=cproject a=UpdateProject}>',
        success: function(response, newValue) {
          if(!response.success) 
            alert(response);
        },
        validate: function(value) {
        if($.trim(value) == '') {
            return '该字段不能为空';
        }
        else if($.trim(value).length>200) {
            return '长度不能超过200';
        }
    }
  });
 $('.url-editable').editable({
        type: 'text',
        disabled:true,
        emptytext:'空数据',
        url: '<{spUrl c=cproduct a=updateProduct}>',
        success: function(response, newValue) {
          if(!response.success) 
            alert(response);
        },
        validate: function(value) {
          var reg=new RegExp("(https?|ftp|mms):\/\/([A-z0-9]+[_\-]?[A-z0-9]+\.)*[A-z0-9]+\-?[A-z0-9]+\.[A-z]{2,}(\/.*)*\/?");
        if($.trim(value) == '') {
            return '该字段不能为空';
        }
        else if($.trim(value).length>100) {
            return '长度不能超过100';
        }
        else if(!reg.test($.trim(value))) {
            return '该字段url格式不正确';
        }
    }
  });
$('.btn-upload-logo').hide();
$(".upload-logo").change(function(){
       var obj = $(this).val();
       var uploadForm = $(this).parent().parent();
        var options = {  
            success : function(data) {  
                //alert(data);  
            },  
            error : function(result) {  
                alert(result);  
            }  
        };  
        if(pre!=obj&&validateImage(obj)) {
            $(uploadForm).ajaxSubmit(options);
        }
        else{
            //alert("error");
        }
      });

$('.tip').tooltip();
$("#btn-addProject").click(function(){
  $('#form-addProject').modal();
});
$(".remove").click(function(){
  var obj=this;//这时this指的就是$("#zz")对象 
  $("#form-delete").attr('action',$(obj).attr('url'));
  $('#form-confirm').modal();
});
$(".cancel").click(function(){
  $('#form-confirm').modal('hide');
});
$("#btn-confirm").click(function(){
  var options = {  
            success : function(data) {  
                if(data==1){
                   location.reload();
                } 
            },  
            error : function(result) {  
                alert(result);  
            }  
        }; 
  $('#form-delete').ajaxSubmit(options);
  $('#form-confirm').modal('hide');
});
$("#btn-saveAddProject").click(function(){
  var a,b,c=false;
  var reg=new RegExp("(https?|ftp|mms):\/\/([A-z0-9]+[_\-]?[A-z0-9]+\.)*[A-z0-9]+\-?[A-z0-9]+\.[A-z]{2,}(\/.*)*\/?");
  $(".msg").css("display","none");
  if($.trim($('#productName').val())==""||$.trim($('#productName').val()).length>20){
      $('#productName-msg').css("display","block");
      
  }else{
    a=true;
  }
  if($.trim($('#productUrl').val())==""||$.trim($('#productUrl').val()).length>100||!reg.test($.trim($('#productUrl').val()))){
      $('#productUrl-msg').css("display","block");
  }else{
    b=true;
  }
  
  if(!d){
     $('#file-logo-add-msg').css("display","block");  
  }
  if (a&&b&&d) {
      var options = {  
              success : function(data) {  
                alert(data);
                  if(data==1){
                     location.reload();
                  } 
              },  
              error : function(result) {  
                  alert(result);  
              }  
          }; 
    $('#form-product').ajaxSubmit(options);
    $('#form-addProject').modal('hide');
  };
   
});

function stringToJSON(obj){   
  return eval('(' + obj + ')');   
} 
var datas1=[];//图表1数据
var datas2=[];//图表2数据
var products=[];
var datas3=[];
var sums=0;
function loadData(jsonData){
   if(jsonData){//从客户端异步获取数据，然后处理
      var records=jsonData;
      for(var i in records){  
        datas1.push(parseInt(records[i].impression));
        datas2.push(parseInt(records[i].click));
        products.push(records[i].name);
        var data3=[records[i].name,records[i].fee];
        datas3.push(data3);
        sums=sums+parseInt(records[i].fee);
      }//end for
      var tempSum=0;
      for(var k in datas3){
          var temp=((datas3[k][1]/sums).toFixed(2))*100;
          datas3[k][1]=Math.round(temp);
          tempSum+=datas3[k][1];
      }
    
   }//end if
 
}
$(function () {
  $('.editable').editable({
      type: 'text',
      disabled:true,
      emptytext:'空数据',
      url: '<{spUrl c=cproduct a=updateProduct}>',
      success: function(response, newValue) {
        if(!response.success) 
          alert(response);
      },
      validate: function(value) {
          if($.trim(value) == '') {
              return '该字段不能为空';
          }
          else if($.trim(value).length>50) {
              return '长度不能超过20';
          }
        }
  });
  Highcharts.setOptions({ 
                colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#EC4F4F'] 
            });
  $.ajax({ url: "<{spUrl c=cproduct a=getJsonData}>", success: function(data){
            loadData(stringToJSON(data));
           
            
            $('#chart1').highcharts({
                chart: {
                     type: 'column'
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
                categories: products
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
                type: 'column',
                shadow:true

                }, {
                    name: '点击次数',
                    data: datas2,
                    type: 'column',
                    shadow:true
      
                }]

            });
            //-----------------------------

             $('#chart2').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: true
                    
                },
                title: {
                    text: '广告投入百分比',
                    style:{                     //样式
                    fontSize: '14px'
                    }
                },
                tooltip: {
                  pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                  percentageDecimals: 1
                },
                yAxis: {
                   
                  title: {
                      text: ''
                  } 
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        shadow:true,
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            fontSize: '14px',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                            }
                        }
                    }
                },
                credits: {
                        enabled: false
                    },
                series: [{
                    type: 'pie',
                    name: '收益比例',
                    shadow:true,
                    data:datas3
                }]
            });
        }
    });
});
 
    </script>
  </body>
</html>
