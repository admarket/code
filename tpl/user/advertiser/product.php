<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 - 用户中心 - 产品管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <!--[if lte IE 6]>
  <!-- bsie css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-ie6.css">

  <!-- bsie 额外的 css 补丁文件 -->
  <link rel="stylesheet" type="text/css" href="/css/ie.css">
  <![endif]-->
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
    <!--[if lte IE 6]>
    <!-- bsie js 补丁只在IE6中才执行 -->
    <script type="text/javascript" src="/js/bootstrap-ie.js"></script>
    <![endif]-->
    <script src="/js/bootstrap-fileupload.min.js"></script>
    <script src="/js/bootstrap-editable.js"></script>
    <style>
    #image-shortcut{height: 100px;}
    #image-shortcut .active img{border:solid 2px #7ab900;width: 50px;height: 50px;}
    #image-shortcut  img{border-radius:10px;margin:10px;}
    </style>
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
                    <p><{(0.01*$sumFee)|string_format:"%.2f"}>&nbsp;&yen;</p>
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
                    <p><{(0.01*$impressPrice)|string_format:'%.2f'}>&nbsp;&yen;/次</p>
                  </div>
                  
                </div>
                <div class="span6 row-fluid category">
                  <div class="span2">
                    <span class="label yellow"> &nbsp;&nbsp;&nbsp;</span>
                    <span>&nbsp;</span>                
                  </div> 
                  <div class="span10">
                    <div class=" title">&nbsp;点击单价：</div>
                    <p><{(0.01*$clickPrice)|string_format:"%.2f"}>&nbsp;&yen;/次</p>
                  </div>
                  
                </div>
              </div>
            <!-- Bootstrap -->
             
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
                              <p>
                                <a  class="url-editable"
                               data-pk="<{$product.id}>"
                               data-type="text"
                               data-name="productUrl">
                                <{$product.url}>
                                </a>
                              </p>
                              <p data-pk="<{$product.id}>"><strong>广告内容：</strong>
                                <a href="#txt-content" class="btn btn-mini tip btn-txt-content" title="文字格式"><i class="icon-font icon-small"></i></a>
                                <a href="#image-content-obj" class="btn btn-mini tip btn-image-content" title="图片格式"><i class="icon-picture icon-small"></i></a>
                                <a href="#video-content" class="btn btn-mini tip btn-video-content" title="视频格式"><i class="icon-film icon-small"></i></a>
                              </p>
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
                           
                            <{(0.01*$product.fee)|string_format:"%.2f"}>&yen;
                          </td>
                          <td>
                           
                            <{(0.01*$product.fee/$product.click)|string_format:'%.2f'}> &yen;/次
                          </td>
                          <td>
                           <{if $product.canRemove==1}>
                           
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
              <input id="productName" name="productName" type="text" placeholder="输入您的产品名称" class="input-xlarge">
            </div>
             <div id="productName-msg" class="msg">名称不能为空，长度小于20</div>
          </div> 
          <label class="control-label" for="input01">产品推广地址：</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-link"></i></span>
              <input id="productUrl" name="productUrl" type="text" value="http://" placeholder="http://输入您的产品推广地址" class="input-xlarge">
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
                    <img src="/img/ads/0.png" style="width: 50px; height: 50px;"/></div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="border:solid 1px #ccc;width: 50px; height: 50px;background-color:#ededed;padding:5px;"></div>
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

<div class="modal hide fade" id="form-confirm" style="top:10%;">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>是否确认删除数据？</h5>
  </div>
  <form action="<{spUrl c=cproduct a=removeProduct}>" id="form-delete" method="post">
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
<div class="modal hide fade" id="form-txt-content" style="top:10%;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>文字广告内容管理</h5>
    </div>
    <div class="modal-body">
      
                  <div>
                    <form id="txtform" method="post" action="<{spUrl c=cproduct a=upDateAdTxt}>" enctype="multipart/form-data"> 
                       <h6>
                        广告文字预览：
                      </h6>
                      <div style="background-color:#eee;border:dashed 1px #ccc;border-radius:5px;padding:10px;margin:10px 0;">
                          <input type="hidden" name="id" value="" class="currentProduct"/>
                          <textarea id="txt-content" name="txt" style="width:90%;height:200px;" ></textarea>
                          <div>
                            <a class="btn btn-success btn-small" id="btn-txt">
                              保存修改
                            </a>
                            <span style="margin-left:20px;"><i class="icon-exclamation-sign"></i>&nbsp;
                              <strong>提示：</strong>多个广告词，以换行分隔，总长度不超过300
                            </span>
                          </div>
                      </div>
                      
                    </form>
                  </div>
    </div>
    <div class="modal-footer row" style="text-align:left;margin:-10px 0;" align="left">

      

    </div>
</div>
<div class="modal hide fade" id="form-image-content" style="top:10%;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>图片广告内容管理</h5>
    </div>
    <div class="modal-body">
      
                  <div>
                    <form id="imageform" method="post" action="<{spUrl c=cproduct a=uploadAdImage}>" enctype="multipart/form-data"> 
                       <h6>
                        图片缩略图：
                      </h6>
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
                       <h6>
                        图片预览：
                      </h6>
                      <div style="background-color:#eee;border:dashed 1px #ccc;border-radius:5px;padding:10px;margin:10px 0;">
                        
                      <input type="hidden" name="id" value="" class="currentProduct"/>
                        <div><img id="image-content" src="/img/adcontent/image/default.jpg"  class="img-rounded img-polaroid  thumbnail"></div>
                        <div class="fileupload fileupload-new" data-provides="fileupload"></div>
                        <div>
                          <span class="btn btn-success btn-file btn-small" id="btn-upload">
                            <span class="fileupload-new">更换广告图片</span>                   
                            <input type="file" name="file" id="file-image" />
                          </span>
                        </div>
                      </div>
                      <input type="hidden" value="0" name="adcontentNumber" id="image-adcontentNumber"/>
                    </form>
                  </div>
    </div>
    <div class="modal-footer row" style="text-align:left;margin:-10px 0;" align="left">

      

    </div>
</div>
<div class="modal hide fade" id="form-video-content" style="top:20%;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h5>视频广告内容管理</h5>
    </div>
    <div class="modal-body">
      
                  <div>
                    
                    <form id="videoform" method="post" action="<{spUrl c=cproduct a=uploadAdVideo}>" enctype="multipart/form-data"> 
                      <h6>
                          广告视频预览：
                      </h6>
                      <div style="background-color:#eee;border:dashed 1px #ccc;border-radius:5px;padding:20px;margin:10px 0;">
                        
                        <input type="hidden" name="id" value="" class="currentProduct"/>
                        <div>
                          <object style="background-color:#fff;padding:5px;border:solid 1px #ccc;border-radius:5px;" id="video-content-obj"  play="false"  type="application/x-shockwave-flash" data="/img/adcontent/video/default.swf"  codebase="../../../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"> 
                             <embed  id="video-content-emb"  src="/img/adcontent/video/default.swf" pluginspage="http://www.macromedia.com/go/getflashplayer"/>
                             <div>浏览器插件缺失导致播放失败，请联系管理人员</div>
                          </object>
                        </div>
                        <div class="fileupload fileupload-new" data-provides="fileupload"></div>
                        <div>
                          <span class="btn btn-success btn-file btn-small" id="btn-upload">
                            <span class="fileupload-new">更换广告视频</span>                   
                            <input type="file" name="file" id="file-video" />
                          </span>
                        </div>
                      </div>
                      
                    </form>
                  </div>
    </div>
    <div class="modal-footer row" style="text-align:left;margin:-10px 0;" align="left">

      

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
                $.msg('上传成功！','color:green;');
            },  
            error : function(result) {  
               $.msg('上传失败！'+result); 
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
            $.msg("仅支持jpg、png、bmp或gif格式！");
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
    function validateVideo(val) {
        var tmpFileValue = val.toLowerCase();
        var reg=/^.*?\.(swf)$/;
        //校验图片格式
        if(reg.test(tmpFileValue)){
            return true;
        } else {
            $.msg("仅支持swf格式的Flash视频！");
            return false;
        }
        
        //校验图片大小,这段代码需调整浏览器安全级别(调到底级)和添加可信站点(将服务器站点添加到可信站点中)
        //var imgSize = 1024 * 100; //最大100K
        //var img = new Image();
        if(file.value != ""){
            
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
                if(data.indexOf("操作失败")<0){ 
                 $.msg('上传成功！','color:green;'); 
                } else{
                  $.msg(data); 
                }
            },  
            error : function(result) {  
                $.msg('上传失败！'+result);  
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
//添加网站
$("#btn-addProject").click(function(){
  $('#form-addProject').modal();
});
$("#file-image").change(function(){

  //var pre=$("#image-content").attr("src");
  var prefix="/img/adcontent/";
  //$("#image-content").attr("src","file:///"+$("#file-image").val());
        //$("#btn-upload").button('正在上传...');
        var obj = $("#file-image").val();
        var options = {  
            success : function(data) { 
              if(data.indexOf("操作失败")<0){
                $.msg('上传成功！','color:green;'); 
                var fullName=prefix+"image/"+data;
                fullName=fullName.replace(/[\r\n]/g,"");
                $("#image-content").attr("src",fullName); 
                $('#image-shortcut').children('.span2').children('img').attr("src",fullName); 
              }else{
                $.msg(data); 
              }
                
            },  
            error : function(result) {   
                $.msg('上传失败！'+result);  
            }  
        };  
        if(validateImage(obj)) {
          var adcontentNumber=$('#image-shortcut').children('.span2').attr('data-index');
          $('#image-adcontentNumber').val(adcontentNumber);
            $('#imageform').ajaxSubmit(options);
        }
        else{
            //alert("error");
        }
      });
$("#file-video").change(function(){
  //var pre=$("#image-content").attr("src");
  var prefix="/img/adcontent/";
  //$("#image-content").attr("src","file:///"+$("#file-image").val());
        //$("#btn-upload").button('正在上传...');
        var obj = $("#file-video").val();
        var options = {  
            success : function(data) { 
              if(data.indexOf("操作失败")<0){
                  $.msg('上传成功！','color:green;'); 
                  var fullName=prefix+"video/"+data;
                  fullName=fullName.replace(/[\r\n]/g,"");
                  var newNode=' <object id="video-content-obj"  play="false"  type="application/x-shockwave-flash" data="'
                  +fullName+'"  codebase="../../../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"> <embed id="video-content-emb" play=false src="'
                  +fullName+'" pluginspage="http://www.macromedia.com/go/getflashplayer"/><div>浏览器插件缺失导致播放失败，请联系管理人员</div></object>';
                  var parent=$("#video-content-obj").parent();
                  parent.empty();
                  parent.html(newNode);
                }else{
                  $.msg(data);  
                }
              
                //$("#video-content-emb").attr("src",fullName);
                //$("#video-content-obj").attr("data",fullName);   
            },  
            error : function(result) {   
                $.msg('上传失败！'+result);  
            }  
        };  
        if(validateVideo(obj)) {
            $('#videoform').ajaxSubmit(options);
        }
        else{
            //alert("error");
        }
      });
$("#btn-txt").click(function(){
      var txt=$("#txt-content").val();
      var options = {  
            success : function(data) { 
              $.msg('保存成功！','color:green;'); 
                //$("#video-content-emb").attr("src",fullName);
                //$("#video-content-obj").attr("data",fullName);   
            },  
            error : function(result) {   
                $.msg('保存失败！'+result);  
            }  
        };
       if(txt.length<300&&txt.length>1) {
            $('#txtform').ajaxSubmit(options);
        }
        else{
            $.msg("广告字数是2-300之间！");
        }
  });
$(".image-preview").click(function(){
    $("#image-content").attr("src",$(this).children(0).attr("src"));
    $(this).parent().children().each(function(){
      $(this).attr('class','span1 image-preview');
    });
    $(this).attr('class','span2 active image-preview');
});
//管理广告内容
$(".btn-txt-content").click(function(){
  var prefix="/img/adcontent/";
  var key=$(this).parent().attr("data-pk");
  $(".currentProduct").val(key);
  var currentProduct;
  $.post("<{spUrl c=cproduct a=getJsonProduct}>",{id:key},function(data,status){
    currentProduct=stringToJSON(data);//数据转换为json格式
    if(currentProduct){//加载产品信息到弹出窗口
        $("#txt-content").html(currentProduct.txt);
    }
    else{
      $.msg("未能加载当前产品信息！");
    }
  });
  $('#form-txt-content').modal();
});
//管理广告内容
$(".btn-image-content").click(function(){
  var prefix="/img/adcontent/";
  var key=$(this).parent().attr("data-pk");
  $(".currentProduct").val(key);
  var currentProduct;
  $.post("<{spUrl c=cproduct a=getJsonProduct}>",{id:key},function(data,status){
    currentProduct=stringToJSON(data);//数据转换为json格式
    if(currentProduct){//加载产品信息到弹出窗口
        $("#image-shortcut").empty();
        $("#image-content").attr("src",prefix+"image/"+currentProduct.image.split(';')[0]);
        var count=0;
        if(currentProduct.image.split(';').length>1){
          count=currentProduct.image.split(';').length - 1;
        }
        for (var i = 0; i <= count; i++) {
          var shortcut='<a class="span1 image-preview"  data-index="'+i+'"><img src="/img/adcontent/image/'+currentProduct.image.split(';')[i]+'"  class="img-rounded img-polaroid  thumbnail "/></a> '
          $("#image-shortcut").append(shortcut);
        };
        $("#image-shortcut").children().first().attr('class','span2 active image-preview');
        $(".image-preview").bind("click",function(){
          $("#image-content").attr("src",$(this).children(0).attr("src"));
          $(this).parent().children().each(function(){
            $(this).attr('class','span1 image-preview');
          });
          $(this).attr('class','span2 active image-preview');
        });
        
    }
    else{
      $.msg("未能加载当前产品信息！");
    }
  });
  $('#form-image-content').modal();
});
//管理video广告内容
$(".btn-video-content").click(function(){
  var prefix="/img/adcontent/";
  var key=$(this).parent().attr("data-pk");
  $(".currentProduct").val(key);
  var currentProduct;
  $.post("<{spUrl c=cproduct a=getJsonProduct}>",{id:key},function(data,status){
    currentProduct=stringToJSON(data);//数据转换为json格式
    if(currentProduct){//加载产品信息到弹出窗口
        $("#video-content-obj").attr("data",prefix+"video/"+currentProduct.video);
        $("#video-content-emb").attr("src",prefix+"video/"+currentProduct.video);
    }
    else{
      $.msg("未能加载当前产品信息！");
    }
  });
  $('#form-video-content').modal();
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
                $.msg('删除成功！','color:green;'); 
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
                if(data.indexOf("操作失败")<0){
                  $.msg('添加成功！','color:green;');
                  location.reload();
                }else{
                  $.msg(data);  
                }
                
              },  
              error : function(result) {  
                  $.msg(result);  
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
        var data3=[records[i].name,parseFloat(records[i].fee)];
        datas3.push(data3);
        sums=sums+parseFloat(records[i].fee);
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
