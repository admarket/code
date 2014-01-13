<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 - 用户中心 - 广告位管理</title>
   <{include file="meta.php"}>
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <!--[if lte IE 6]>
  <!-- bsie css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-ie6.css">

  <!-- bsie 额外的 css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/ie.css">
  <![endif]-->
    <link href="/css/bootstrap-fileupload.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    
    <link href="/css/user.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/css/bootstrap-editable.css" rel="stylesheet">
    <style  type="text/css">
    .textarea{font-size: 12px;}
    </style>
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <script src="/js/bootstrap-fileupload.min.js" defer></script>
    <script src="/js/bootstrap-editable.js"></script>
  </head>
  <body>
     <!-- load head tpl -->
    <{include file="./user/inner-head.php"}>

    <!-- main section -->
    <div class="section">
      <div class="container">
        <div class="row-fluid">
          <div class="span3 left-bar" >
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
                    <p><{$adCount}></p>
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
                    <div class=" title">&nbsp;已售：</div>
                    <p><{$soldAd}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label orange"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;未售：</div>
                    <p><{$unsoldAd}></p>
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
                    <div class=" title">&nbsp;待审核：</div>
                    <p><{$beVerified|number_format}></p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                   <div class="span10">
                    <div class=" title">&nbsp;收益：</div>
                    <p><{(0.01*$profits)|string_format:"%.2f"}>&nbsp;&yen;</p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
              
            </div>
          </div>
          <div class="span9 main-body" >
            <div id="chart"  style="width:100%; height: 300px; margin: 0 auto"></div>
             <div class="tabbable"> <!-- Only required for left/right tabs -->
              <ul class="nav nav-tabs" style="position:relative;">
              <{foreach from=$projects item=project name=projectCount}>   
              
                  <{if $smarty.foreach.projectCount.index == 0}>
                    <li class="active">
                     <a class="sec" data-index="<{$smarty.foreach.projectCount.index}>" href="#tab<{$smarty.foreach.projectCount.index}>" data-toggle="tab"><{$project.name}> </a>
                     </li>
                  <{else}>
                     <li>
                      <a class="sec"  data-index="<{$smarty.foreach.projectCount.index}>" href="#tab<{$smarty.foreach.projectCount.index}>" data-toggle="tab"><{$project.name}> </a>
                    </li>
                  <{/if}>
              <{/foreach}>
                      <span class="btn-group" style="position:absolute;right:0;">
                        <a class="btn btn-small tip" id="btn-addAdvertise" title="添加广告位">
                          <i class="icon-plus"></i> 添加
                        </a>
                         <a class="btn btn-small tip" data-toggle="button" id="editable" title="切换表格编辑状态">
                          <i class="icon-edit" ></i> 编辑
                        </a>
                      </span>
              </ul> 
              <div class="tab-content">
                <{foreach from=$projects item=project name=projectCount}> 
                  <{if $smarty.foreach.projectCount.index == 0}>
                      <div class="tab-pane active" id="tab<{$smarty.foreach.projectCount.index}>">
                  <{else}>
                      <div class="tab-pane" id="tab<{$smarty.foreach.projectCount.index}>">
                  <{/if}>
                  <table class="table">
                    <thead>
                      <tr>
                        
                        <th>广告位</th>
                        <th>格&nbsp;式</th>
                        <th>宽&nbsp;*&nbsp;高</th>
                        <th>空闲代码</th>
                        <th>价格 &yen;/天</th>
                        <th>状态</th>
                        <th>交易进度</th>
                        <th>累计收入</th>
                        <th>出售代码</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{foreach from=$project.detail item=advertise name=adCount}> 
                        <{if $advertise.project == $project.id}>
                        <tr>
                          <td>
                              <p class="title" ><a class="editable"
                               data-pk="<{$advertise.id}>"
                               data-name="advertiseName"><{$advertise.title}></a>
                             </p>
                              <div>
                                <a  class="textarea-editable"
                               data-pk="<{$advertise.id}>"
                               data-type="textarea"
                               data-name="advertiseContent"><{$advertise.content}>
                                </a>
                              </div>
                          </td>
                          <td>
                            <a href="#" class="select-editable"  data-type="select" data-pk="<{$advertise.id}>" data-value="<{$advertise.format}>" data-name="format">
                             <{if $advertise.format == 0}>
                             
                            <i class="icon-font tip" title="文字"></i>
                             <{else if $advertise.format == 1}>
                             <i class="icon-picture tip" title="图片"></i>
                              <{else}>
                              <i class="icon-film tip" title="视频"></i>
                              <{/if}>
                              </a>
                          </td>
                          <td>
                             <{if $advertise.format == 0}>
                             字体大小：
                             <a class="number-editable" data-pk="<{$advertise.id}>"
                               data-name="advertiseWidth"><{$advertise.width}></a><br/>
                             字数：<a  class="number-editable" data-pk="<{$advertise.id}>"
                               data-name="advertiseHeight"><{$advertise.height}>
                             </a>
                              <{else}>
                              <a class="number-editable" data-pk="<{$advertise.id}>"
                               data-name="advertiseWidth"><{$advertise.width}></a> * <a  class="number-editable" data-pk="<{$advertise.id}>"
                               data-name="advertiseHeight"><{$advertise.height}>
                             </a>
                              <{/if}>
                            
                          </td>
                          <td style="width:50px;overflow:hidden;"> 
                            <a  class="textarea-editable"
                               data-pk="<{$advertise.id}>"
                               data-type="textarea"
                               data-name="defaultDisplay"
                               data-value=" <{$advertise.default_display_content}>">
                               <{$advertise.default_display_content|truncate:30}></span>
                                </a>

                          </td>
                          <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a  class="number-editable" data-pk="<{$advertise.id}>"
                               data-name="advertisePrice"><span class="signPrice"><{(0.01*$advertise.price)}></span></a>&nbsp;&yen;  
                             <div>+<span class="fee"><{$advertise.fee}></span>%&nbsp;手续费&nbsp;=&nbsp;<span class="realPrice"><{(0.01*(0.01*$advertise.fee+1)*$advertise.price)|string_format:"%.2f"}></span>&yen; </div></td>
                          <td>
                               <{if $advertise.state == 0}>
                              <span class="label label-success"> 
                                未出售
                              </span>
                               <{elseif $advertise.state == 1}>
                              <span class="label label-important"> 
                                已出售
                              </span>
                               <{else}>
                              <span class="label label-primary tip" title="该广告位尚未添加代码激活"> 
                                未激活
                              </span>
                            <{/if}> 
                          </td>
                          <td>
                            <div class="progress tip" style="margin-top:20px;border:solid 1px #ddd;color:#ccc;"
                             <{if $advertise.state == 1}>
                                 title="<{$advertise.startTime|date_format:'%Y-%m-%d'}>&nbsp;到
                                &nbsp;<{$advertise.endTime|date_format:'%Y-%m-%d'}>"
                              <{else}>
                                title="尚未出售"
                              <{/if}>
                            
                                >
                              <div class="bar bar-success" style="width: <{$advertise.process}>%;">
                               <{$advertise.process}>%
                             </div>
                            </div>
                            
                          </td>
                          <td>
                             
                            <{(0.01*$advertise.profit)|string_format:"%.2f"}> &yen; 
                          </td>
                          <td>
                            <a class="btn btn-mini btn-success copy"
                             data-title="复制以下代码到您的网站" data-placement="top" data-html="true" 
                             data-content='<textarea class="textarea"><div class="admarket_ad" style="display:inline;" aid="<{$advertise.id}>" id="admarket_box_<{$advertise.id}>"><a href="http://www.eadmarket.com/?c=main&a=detail&project=<{$project.id}>"></a></div>
                             <script type="text/javascript" charset="utf-8" id="admarket_shell" src="http://<{$smarty.server.HTTP_HOST}>:8080/advertise/view_advertise.htm?aid=<{$advertise.id}>"></script>
                             <script type="text/javascript" charset="utf-8" id="admarket_js_<{$advertise.id}>" src="http://<{$smarty.server.HTTP_HOST}>/js/adshell.js?aid=<{$advertise.id}>"></script>
                             </textarea>'>
                              <i class="icon-shopping-cart"></i> 
                            </a>
                          </td>
                          <td>
                           
                            <{if $advertise.state == 0}>
                           
                             <a url="<{spUrl c=cadvertise a=RemoveAdvertise advertiseID=$advertise.id}>"
                              class="btn btn-mini btn-danger tip remove" title="删除">
                              <i class=" icon-trash"></i>
                            </a>
                             <{else if $advertise.state == 1}>
                             <a url="<{spUrl c=cadvertise a=RemoveAdvertise advertiseID=$advertise.id}>" class="btn btn-mini btn-danger disabled tip" title="已出售广告位无法删除">
                              <i class=" icon-trash"></i>
                            </a>
                             <{else}>
                              <a url="<{spUrl c=cadvertise a=RemoveAdvertise advertiseID=$advertise.id}>"
                              class="btn btn-mini btn-danger tip remove" title="删除">
                                <i class=" icon-trash"></i>
                              </a>
                            <{/if}>
                            
                          </td>
                        </tr>
                         <{/if}>
                      <{/foreach}>   
                    </tbody>
                  </table>    
                </div>
                 <{/foreach}>   
               
              </div>
            <div style="position:relative;font-size:12px;padding:20px;border-top:solid 1px #eee;">
                  
                  <strong><i class="icon-info-sign"></i>&nbsp;&nbsp;怎样激活广告位？</strong> 点击出售代码列的&nbsp;
                  <a class="btn btn-mini btn-success">
                    <i class="icon-shopping-cart"></i>
                  </a>&nbsp;按钮，复制代码到您需要添加广告位的位置即可。<br/>
                  <strong><i class="icon-info-sign"></i>&nbsp;&nbsp;设置广告空闲时展示内容：</strong> 点击编辑按钮，
                  复制您希望展示的代码到“空闲代码列”即可，<span class="red-color">支持广告联盟代码</span>。
           </div>
           
          </div>
          
        </div>
      </div>
    </div>
    <!--footer content-->
     <!-- load foot tpl -->
    <{include file="foot.php"}>
    
<div class="modal hide fade" id="form-addAdvertise">
  
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>添加广告位</h5>
    </div>
    <form action="<{spUrl c=cadvertise a=AddAdvertise}>" id="form-advertise" method="post">
    <div class="modal-body" style="padding:10px 20px;">
        <fieldset>
          <div class="controls">
             <label class="control-label" >广告位名称：</label>
            <div class="input-prepend">
               <span class="add-on"><i class="icon-home"></i></span>
              <input id="advertiseName" name="advertiseName"   type="text"  placeholder="输入广告位名称"> 
            </div>
            <div id="advertiseName-msg" class="msg">不能为空，长度小于10</div>
          </div>
          <label class="control-label" for="input01">广告格式：</label>
          <p class="controls">
            <label class="radio inline">
              <input type="radio" onclick="changeName()" name="format" id="format0" value="0">  
              <i class="icon-font tip" title="文字"></i>
            </label>
            <label class="radio inline">
              <input type="radio" onclick="changeNameBack()" name="format" id="format1" value="1" checked> 
              <i class="icon-picture tip" title="图片"></i>
            </label>
            <label class="radio inline">
              <input type="radio" onclick="changeNameBack()" name="format" id="format2" value="2"> 
              <i class="icon-film tip" title="视频"></i>
            </label>
          </p>
          <div class="controls row-fluid">
            <div class="span3">
               <div class="input-prepend">
                 <label class="control-label"><span id="width-name">宽：</span></label>
                 <span class="add-on"><i class="icon-exchange tip" title="广告位宽度"></i></span>
                 <input class="input-mini"   id="advertiseWidth" name="advertiseWidth" type="text" placeholder="0">
              </div>
              <div id="advertiseWidth-msg" class="msg">不能为空，正数数字</div>
            </div>
            <div class="span3  offset1">
              <div class="input-prepend">
                 <label class="control-label"><span id="height-name">高：</span></label>
                 <span class="add-on"><i class="icon-sort tip" title="广告位高度"></i></span>
                 <input class="input-mini"  id="advertiseHeight" name="advertiseHeight"  type="text" placeholder="0">
              </div>
              <div id="advertiseHeight-msg" class="msg">不能为空，正数数字</div>
            </div>
            <div class="span3 offset1">
              <div class="input-append input-prepend">
                <label class="control-label" for="input01">价格：</label>
                <span class="add-on">&yen;</span>
                <input class="input-mini"  id="advertisePrice" name="advertisePrice" type="text" placeholder="0.00">
                <span class="add-on">/天</span>
              </div>
               <div id="advertisePrice-msg" class="msg">不能为空，正数数字</div>
            </div>
          </div> 
          
          <label class="control-label">所属网站：</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-list"></i></span>
              <select name="advertiseProject">
               <{foreach from=$projects item=project name=projectCount}>
                <option value="<{$project.id}>"><{$project.name}></option>
               <{/foreach}>   
              </select>
            </div>
          </div>
          <label><i class="icon-info-sign"></i> 广告位描述：</label>
          <textarea rows="3" id="advertiseContent" name="advertiseContent" class="input-xlarge" placeholder="少于100字"></textarea>
          <div id="advertiseContent-msg" class="msg">不能为空，少于100字</div>
        </fieldset>
    </div>
      </form>
    <div class="modal-footer" style="padding:20px;">
      <a  class="btn btn-success btn-small submit" id="btn-saveAddAdvertise">
        <i class="icon-save"></i> 保存</a>
    </div>

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

<script src="/js/highcharts.js" defer></script>
<script src="/js/jquery.form.js" defer></script>
<script src="/js/jquery.message.js" defer></script>
<script type="text/javascript">
$('.tip').tooltip();
function changeName(){
  $('#width-name').html('字体大小(像素)：');
  $('#height-name').html('字数：');
}
function changeNameBack(){
  $('#width-name').html('宽度：');
  $('#height-name').html('高度：');
}
$('.select-editable').editable({
        disabled:true,  
        url: '<{spUrl c=cadvertise a=UpdateAdvertise}>',
        success: function(response, newValue) {
          if(!response.success) 
            $.msg("编辑成功！",'color:green;');
        }, 
        source: {
                0:"文字",
                 1:"图片",
                2:"视频"
           }
    }); 
 $('.textarea-editable').editable({
        type: 'textarea',
        disabled:true,
        emptytext:'空数据',
        url: '<{spUrl c=cadvertise a=UpdateAdvertise}>',
        success: function(response, newValue) {
          if(!response.success) 
            $.msg("编辑成功！",'color:green;');
        },
        validate: function(value) {
          if($.trim(value).length>1000) {
              return '长度不能超过1000';
          }
        }
  });
  $('.number-editable').editable({
        type: 'text',
        disabled:true,
        emptytext:'空数据',
        url: '<{spUrl c=cadvertise a=UpdateAdvertise}>',
        success: function(response, newValue) {
          if(!response.success) 
            $.msg("编辑成功！",'color:green;');
          var fee=parseFloat($(this).parent().find('.fee').html()).toFixed(2);
          newValue=parseFloat(newValue).toFixed(2);
          $(this).parent().find('.realPrice').html(parseFloat((0.01*fee+1)*newValue).toFixed(2));
        },
        validate: function(value) {
            if(isNaN($.trim(value))) {
                return '该字段必须是数字';
            }
            else if($.trim(value)<=0||$.trim(value)>100000000) {
                return '该字段必须是数字，且为正数';
            }
        }
  });
  $('.url-editable').editable({
        type: 'text',
        disabled:true,
        emptytext:'空数据',
        url: '<{spUrl c=cadvertise a=UpdateAdvertise}>',
        success: function(response, newValue) {
          if(!response.success) 
            $.msg("编辑成功！",'color:green;');
        },
        validate: function(value) {
            var reg="^((https|http|ftp|rtsp|mms)?://)"  
          +"?(([0-9a-z_!~*'().&=+$%-]+: )?[0-9a-z_!~*'().&=+$%-]+@)?"//ftp的user@  
          +"(([0-9]{1,3}\.){3}[0-9]{1,3}"// IP形式的URL- 199.194.52.184  
          +"|"// 允许IP和DOMAIN（域名） 
          +"([0-9a-z_!~*'()-]+\.)*"// 域名- www.  
          +"([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\."// 二级域名  
          +"[a-z]{2,6})"// first level domain- .com or .museum  
          +"(:[0-9]{1,4})?"// 端口- :80  
          +"((/?)|"// a slash isn't required if there is no file name  
          +"(/[0-9a-z_!~*'().;?:@&=+$,%#-]+)+/?)$";
          if(isNaN($.trim(value))) {
              return '该字段必须是数字';
          }
          else if(!reg.test($.trim(value))) {
              return '该字段url格式不正确';
          }
      }
  });
 //enable / disable
$('#editable').click(function() {
       $('.editable').editable('toggleDisabled');
   });
$('.copy').popover();
$('.copy').click(function(){
    $(".textarea").select();
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
   var options = {  
            success : function(data) {  
                if(data=="1"){
                   location.reload();
                } 
                else{
                  $.msg(data);  
                }
            },  
            error : function(result) {  
                $.msg(result);  
            }  
        }; 
  $('#form-project').ajaxSubmit(options);
  $('#form-addProject').modal('hide');
});
$("#btn-addAdvertise").click(function(){
  $('#form-addAdvertise').modal();
});
$("#btn-saveAddAdvertise").click(function(){
  var a,b,c,d,e=false;
  $(".msg").css("display","none");
  if($.trim($('#advertiseName').val())==""){
      $('#advertiseName-msg').css("display","block");
      
  }else{
    a=true;
  }
  if($.trim($('#advertiseWidth').val())==""||isNaN($.trim($('#advertiseWidth').val()))||$.trim($('#advertiseWidth').val())<=0){
      $('#advertiseWidth-msg').css("display","block");
  }else{
    b=true;
  }
  if($.trim($('#advertiseHeight').val())==""||isNaN($.trim($('#advertiseHeight').val()))||$.trim($('#advertiseHeight').val())<=0){
      $('#advertiseHeight-msg').css("display","block");
  }else{
    c=true;
  }
  if($.trim($('#advertisePrice').val())==""||isNaN($.trim($('#advertisePrice').val()))||$.trim($('#advertisePrice').val())<=0){
      $('#advertisePrice-msg').css("display","block");
  }else{
    d=true;
  }
  if($.trim($('#advertiseContent').val())==""||$.trim($('#advertiseContent').val()).length>100){
      $('#advertiseContent-msg').css("display","block");
  }else{
    e=true;
  }
  if(a&&b&&c&&d&&e){
    var options = {  
              success : function(data) { 
                  if(data==1){ 
                    $.msg('添加成功！','color:green;');
                     location.reload();
                  } 
              },  
              error : function(result) {  
                  $.msg(result);  
              }  
          }; 
    $('#form-advertise').ajaxSubmit(options);
    $('#form-addAdvertise').modal('hide');
  }
  else{
    //alert();
  }
});


function stringToJSON(obj){   
  return eval('(' + obj + ')');   
} 
var datas=[];//图表数据
var sums=0;
function loadData(jsonData){
   if(jsonData){//从客户端异步获取数据，然后处理
      var records=jsonData;
      for(var i in records){ 

        var profits;
        if(i==0){
            profits={
              name:records[i].name,
              type: 'column',
              visible:true,
              shadow:true,
              data:[]
            };
        } else{
          profits={
            name:records[i].name,
            type: 'column',
            visible:false,
            shadow:true,
            data:[]
           };
        }
        
        for(var j in records[i].detail){
           records[i].detail[j].profit=0.01*records[i].detail[j].profit;
          var dataDetail={
            name:records[i].detail[j].title,
            y:records[i].detail[j].profit
          };
          profits.data.push(dataDetail);
          //profits.data=dataDetail;
        }
       datas.push(profits);
      }//end for
      var tempSum=0;
   }//end if
 
}
$(function () {
    $('.editable').editable({
        type: 'text',
        disabled:true,
        emptytext:'暂无数据',
        url: '<{spUrl c=cadvertise a=UpdateAdvertise}>',
        success: function(response, newValue) {
          if(!response.success) 
            $.msg("编辑成功！",'color:green;');
        },
        validate: function(value) {
          if($.trim(value) == '') {
              return '该字段不能为空';
          }
          else if($.trim(value).length>50) {
              return '长度不能超过50';
          }
        }
    });
    Highcharts.setOptions({ 
                    colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#EC4F4F'] 
                }); 
   
    $.ajax({ url: "<{spUrl c=cproject a=GetJsonData}>", success: function(data){
            loadData(stringToJSON(data));
                $('#chart').highcharts({
                    chart: {
                      layout: 'vertical',
                      type:'column'
                    },
                    title: {
                        text: '广告位收入',
                        x: -20 //center
                    },
                    subtitle: {
                        text: '',
                        x: -20
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
                    legend: {
                        
                    },
                    series: datas
                });
                
                // the button action
                var chartBox = $('#chart').highcharts();
                    
                $(".sec").click(function(){
                  var index=parseInt($(this).attr("data-index"));
                  for(var i in chartBox.series){
                      if(i!=index){
                        chartBox.series[i].hide();
                      }
                       else{
                        chartBox.series[i].show();
                       }
                  }
                   
                });
            }
        });//end ajax
       
    });
 
    </script>
  </body>
</html>
