<!DOCTYPE html>
<html>
  <head>
    <title>广告市场 - 用户中心 - 网站管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap-fileupload.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    
    <link href="/css/user.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/css/bootstrap-editable.css" rel="stylesheet">

    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-fileupload.min.js"></script>
    <script src="/js/bootstrap-editable.js"></script>
  </head>
  <body>
     <!-- load head tpl -->
    <{include file="./user/inner-head.php"}>

    <!-- main section -->
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
                    <h4 style="color:#50B432;"><{(0.01*$smarty.session.user.balance)|number_format}> &yen;</h4>
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
                    <div class=" title">&nbsp;网站：</div>
                    <p><{$projectCount}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label green"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;广告位：</div>
                    <p><{$adCount|number_format}></p>
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
                    <div class=" title">&nbsp;最高收益：</div>
                    <p><{(0.01*$maxProfit)|number_format}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;最低收益：</div>
                    <p><{(0.01*$minProfit)|number_format}>&nbsp;&yen;</p>
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
                    <div class=" title">&nbsp;平均收益：</div>
                    <p><{(0.01*$avgProfit)|number_format}>&nbsp;&yen;/站</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;总收益：</div>
                    <p><{(0.01*$sumProfit)|number_format}>&nbsp;&yen;</p>
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
                     <a href="#tab" data-toggle="tab">全部网站</a>
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
                        <th>LOGO</th>
                        <th>名称</th>
                        <th>简介</th>
                        <th>类别</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{foreach from=$projects item=project name=projectCount}> 
                        <tr>
                          <td>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="border:solid 1px #ccc;width: 50px; height: 50px;background-color:#ededed;">
                                <img src="/img/ads/<{$project.logo}>" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="width: 50px; height: 50px;"></div>
                              <div>
                                <form method="post" action="<{spUrl c=cproject a=UpateLogo}>" enctype="multipart/form-data">
                                  <span class="btn btn-small btn-file tip btn-upload-logo" title="更新logo">
                                    <span class="fileupload-new" style="font-size:12px;">
                                      <i class="icon-upload"></i> logo</span>
                                    <span class="fileupload-exists" style="font-size:12px;">
                                      <i class="icon-upload"></i> logo</span>
                                    <input type="file" name="logo" class="upload-logo" />
                                    <input type="hidden" name="id"  value="<{$project.id}>"/>
                                  </span>
                                </form>
                              </div>
                            </div>
                          </td>
                          <td>
                              <p class="title" ><a class="editable"
                               data-pk="<{$project.id}>"
                               data-name="projectName"> 
                               <{$project.name}></a>
                             </p>
                              <div>
                                <a  class="url-editable"
                               data-pk="<{$project.id}>"
                               data-type="text"
                               data-name="projectUrl">
                                <{$project.url}>
                                </a>
                              </div>
                          </td>
                          <td style="width:40%;">
                            <a  class="textarea-editable"
                               data-pk="<{$project.id}>"
                               data-type="textarea"
                               data-name="projectDescription">
                            <{$project.description}>
                            </a>
                          </td>
                          <td>
                            <a href="#" class="select-editable"  data-type="select" data-pk="<{$project.id}>" data-value="<{$project.kind.id}>" data-name="category"><{$project.kind.name}></a>
                          </td>
                          
                          <td>
                           <{if $project.detail|@count eq 0}>
                           
                             <a url="<{spUrl c=cproject a=RemoveProject projectID=$project.id}>"
                              class="btn btn-mini btn-danger tip remove" title="删除">
                              <i class=" icon-trash"></i>
                            </a>
                             <{else}>
                             <a url="<{spUrl c=cproject a=RemoveProject projectID=$project.id}>" class="btn btn-mini btn-danger disabled tip" title="请先删除该网站下的广告位">
                              <i class=" icon-trash"></i>
                            </a>
                            <{/if}>
                           
                            
                          </td>
                        </tr>
                      <{/foreach}>   
                    </tbody>
                  </table>    
                </div> 
               
              </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <!--footer content-->
     <!-- load foot tpl -->
    <{include file="foot.php"}>
    
<div class="modal hide fade" id="form-addProject">
  <form action="<{spUrl c=cproject a=AddProject}>" method="post" id="form-project" enctype="multipart/form-data"> 
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>添加广告网站</h5>
    </div>
    <div class="modal-body" style="padding:0px 20px;">
      <div class="row-fluid">
        <fieldset class="span8">
          <label class="control-label" >网站名称：</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-home"></i></span>
              <input id="projectName" name="projectName" type="text" placeholder="输入您的网站名称" class="input-xlarge">
            </div>
             <div id="projectName-msg" class="msg">名称不能为空，长度小于20</div>
          </div> 
          <label class="control-label" for="input01">网站地址：</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-link"></i></span>
              <input id="projectUrl" name="projectUrl" type="text" value="http://" placeholder="http://输入您的网站地址" class="input-xlarge">
            </div>
            <div id="projectUrl-msg" class="msg">网址不能为空，且带有http://的网址，如http://www.eadmarket.com</div>
          </div>
          <div class="controls row-fluid">
            <div class="span3">
               <div class="input-prepend">
                 <label class="control-label">世界排名：</label>
                 <span class="add-on"><i class="icon-globe tip" title="世界排名"></i></span>
                 <input type='hidden' id="alexa-txt" name='alexa' value='0'/>
                 <span class="input-mini uneditable-input"   id="alexa" name="advertiseWidth" type="text" placeholder="0">0</span>
              </div>
              <div id="advertiseWidth-msg" class="msg">不能为空，正数数字</div>
            </div>
            <div class="span3  offset1">
              <div class="input-prepend">
                 <label class="control-label">地方排名：</label>
                 <span class="add-on"><i class="icon-flag tip" title="地方排名"></i></span>
                 <input type='hidden' id="local-txt" name='local' value='0'/>
                 <span class="input-mini uneditable-input"  id="local" name="advertiseHeight"  type="text" placeholder="0">0</span>
              </div>
              <div id="advertiseHeight-msg" class="msg">不能为空，正数数字</div>
            </div>
          </div> 
          <label class="control-label" for="input01">分类：</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-list"></i></span>
              <select name="projectCategory">
               <{foreach from=$categories item=category name=categoryCount}>
                <option value="<{$category.id}>"><{$category.name}></option>
               <{/foreach}>   
              </select>
            </div>
          </div>
          <label><i class="icon-info-sign"></i> 网站简介：</label>
          <textarea rows="3" id="projectDescription" name="projectDescription" class="input-xlarge" placeholder="少于300字"></textarea>
          <div id="projectDescription-msg" class="msg">简介不能为空，且长度小于300</div>
        </fieldset>
        <div class="span3 offset1">
          <p>
            <div  align="center">
              <form id="headimgform" method="post" action="<{spUrl c=tool a=upFile}>" enctype="multipart/form-data"> 
                <div class="fileupload fileupload-new" data-provides="fileupload" data-uploadtype="image">
                  <div class="fileupload-new thumbnail" style="border:solid 1px #ccc;width: 50px; height: 50px;background-color:#ededed;padding:5px;">
                    <img src="/img/ads/0.png" style="width: 50px; height: 50px;"/></div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="border:solid 1px #ccc;width: 50px; height: 50px;background-color:#ededed;padding:5px;"></div>
                  <div>
                    <span class="btn btn-small btn-file tip" title="上传Logo">
                      <span class="fileupload-new" style="font-size:12px;">
                        <i class="icon-upload"></i> logo</span>
                      <span class="fileupload-exists" style="font-size:12px;">
                        <i class="icon-upload"></i> logo</span>
                      <input type="file" id="file-logo-add" name="logo" />
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
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>是否确认删除数据？</h5>
  </div>
  <form action="<{spUrl c=cadvertise a=AddAdvertise}>" id="form-delete" method="post">
    <div class="modal-body">
       <a  class="btn btn-small btn-danger" id="btn-confirm">
        <i class="icon-ok"></i> 确认
      </a>
      <a  class="btn btn-small cancel" id="btn-cancel">
        <i class="icon-remove"></i> 取消
      </a>
      
    </div>
    </form>
    <div class="modal-footer" style="margin:0;top:-20px;">
      
    </div>
  
</div>
<script src="/js/highcharts.js"></script>
<script src="/js/jquery.form.js"></script>
<script src="/js/jquery.message.js"></script>
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
              if(data.indexOf("操作失败")<0) {
                $.msg('上传成功！','color:green;'); 
              } 
               else{
                $.msg(data);
               }
            },  
            error : function(result) {  
               $.msg(result);
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
            $.msg("只能上传jpg、jpeg、png、bmp或gif格式的图片！");
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
            $.msg("请选择上传的文件!");
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
            $.msg('编辑成功！','color:green;');
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
           $.msg('编辑成功！','color:green;');
        },
        validate: function(value) {
        if($.trim(value) == '') {
            return '该字段不能为空';
        }
        else if($.trim(value).length>300) {
            return '长度不能超过300';
        }
    }
  });
 $('.url-editable').editable({
        type: 'text',
        disabled:true,
        emptytext:'空数据',
        url: '<{spUrl c=cproject a=UpdateProject}>',
        success: function(response, newValue) {
          if(!response.success) 
            $.msg('编辑成功！','color:green;');
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
                if(data.indexOf("操作失败")<0) {
                $.msg('上传成功！','color:green;'); 
                } 
               else{
                $.msg(data);
               }
            },  
            error : function(result) {  
                $.msg(result);  
            }  
        };  
        if(pre!=obj&&validateImage(obj)) {
            $(uploadForm).ajaxSubmit(options);
        }
        else{
            //$.msg('文件格式不正确！');
        }
      });

$('.tip').tooltip();
$("#btn-addProject").click(function(){
  $('#form-addProject').modal();
});
$("#projectUrl").blur(function(){
  $.post("<{spUrl c=cproject a=getAlexa}>",{'projectUrl':$.trim($("#projectUrl").val())}, 
      function(data){

          $("#alexa-txt").val(data.split(',')[0]);
          $("#alexa").html(data.split(',')[0]);
          $("#local-txt").val(data.split(',')[1]);
          $("#local").html(data.split(',')[1]);

      });
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
                  $.msg('删除成功！','color:green;');
                   location.reload();
                } 
            },  
            error : function(result) {  
                $.msg(result);  
            }  
        }; 
  $('#form-delete').ajaxSubmit(options);
  $('#form-confirm').modal('hide');
});
$("#btn-saveAddProject").click(function(){
  var a,b,c=false;
  var reg=new RegExp("(https?|ftp|mms):\/\/([A-z0-9]+[_\-]?[A-z0-9]+\.)*[A-z0-9]+\-?[A-z0-9]+\.[A-z]{2,}(\/.*)*\/?");
  $(".msg").css("display","none");
  if($.trim($('#projectName').val())==""||$.trim($('#projectName').val()).length>20){
      $('#projectName-msg').css("display","block");
      
  }else{
    a=true;
  }
  if($.trim($('#projectUrl').val())==""||$.trim($('#projectUrl').val()).length>100||!reg.test($.trim($('#projectUrl').val()))){
      $('#projectUrl-msg').css("display","block");
  }else{
    b=true;
  }
  if($.trim($('#projectDescription').val())==""||$.trim($('#projectDescription').val()).length>300){
      $('#projectDescription-msg').css("display","block");
  }else{
    c=true;
  }
  if(!d){
     $('#file-logo-add-msg').css("display","block");  
  }
  if (a&&b&&c&&d) {
      var options = {  
              success : function(data) { 
                  if(data.indexOf('操作失败')<0){
                     $.msg('添加成功！','color:green;');
                     location.reload();
                  } 
              },  
              error : function(result) {  
                  $.msg(result);  
              }  
          }; 
    $('#form-project').ajaxSubmit(options);
    $('#form-addProject').modal('hide');
  };
   
});

function stringToJSON(obj){   
  return eval('(' + obj + ')');   
} 
var datas1=[];//图表1数据
var datas2=[];//图表2数据
var sums=0;
function loadData(jsonData){
   if(jsonData){//从客户端异步获取数据，然后处理
      var records=jsonData;
      for(var i in records){  
        var sum=0;
        for(var j in records[i].detail){
          records[i].detail[j].profit=0.01*parseFloat(records[i].detail[j].profit);
          sum +=parseInt(records[i].detail[j].profit);
          sums+=parseInt(records[i].detail[j].profit);
        }
        var data1={
            name: records[i].name,
            shadow:true,
            data: [sum] 
        };
        var data2=[records[i].name,sum];
        datas2.push(data2);
        datas1.push(data1);
      }//end for
      var tempSum=0;
    for(var k in datas2){
        var temp=((datas2[k][1]/sums).toFixed(2))*100;
        datas2[k][1]=Math.round(temp);
        tempSum+=datas2[k][1];
    }
   }//end if
 
}
$(function () {
  $('.editable').editable({
      type: 'text',
      disabled:true,
      emptytext:'空数据',
      url: '<{spUrl c=cproject a=UpdateProject}>',
      success: function(response, newValue) {
        if(!response.success) 
          $.msg('编辑成功！','color:green;');
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
  $.ajax({ url: "<{spUrl c=cproject a=GetJsonData}>", success: function(data){
            loadData(stringToJSON(data));
            
            $('#chart1').highcharts({
                chart: {
                     type: 'column'
                },
                title: {
                    text: '广告收益概览',
                    style:{                     //样式
                    fontSize: '14px'
                    }
                },
                tooltip: {
                  valueSuffix: '¥'
               },
               
                yAxis: {
                   
                  title: {
                      text: '人民币 (元)'
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
                                return '<b>'+ this.y +' ￥</b>';
                            }
                        }
                    }
                },
                credits: {
                    enabled: false
                },
                series:datas1

            });
            //-----------------------------

             $('#chart2').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: true
                    
                },
                title: {
                    text: '收益百分比',
                    style:{                     //样式
                    fontSize: '14px'
                    }
                },
                tooltip: {
                  pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                  percentageDecimals: 1
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
                    data:datas2
                }]
            });
        }
    });
});
 
    </script>
  </body>
</html>
