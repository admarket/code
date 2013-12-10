<!DOCTYPE html>
<html>
  <head>
    <title>广告位市场 - 管理员后台 - 新闻管理中心</title>
   <{include file="meta.php"}>
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/css/user.css" rel="stylesheet" media="screen">
    <style type="text/css">
    #editor {height:100px;padding: 10px;border: solid 1px #ccc;border-radius:5px;
    overflow: scroll; }
    </style>
    <link rel="shortcut icon" href="/favicon.ico">  
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
           
            <div class="tabbable"> <!-- Only required for left/right tabs -->
              
              <ul class="nav nav-tabs" style="position:relative;">
                <li class="active"><a href="#sec-sum" data-toggle="tab" id="tab-sum">全部新闻</a></li>
                <span class="btn-group" style="position:absolute;right:0;">
                        
                </span>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active"  id="sec-sum">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>标题</th>
                        <th>来源</th>
                        <th>时间</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                      <{foreach from=$records item=news}>
                        <tr>
                        <td>
                           <a href="<{spUrl c=main a=news}>?id=<{$news.id}>" class="blue-color" target="_blank"><{$news.title}></a>
                        </td>

                       <td><a href="<{$news.src}>" target="_blank"><{$news.src}></a></td>
                        <td><{$news.createTime}></td>
                        <td><a class="btn btn-mini btn-danger tip" href="<{spUrl c=cnews a=removeNews}>?id=<{$news.id}>" title="删除"><i class=" icon-trash"></i></a></td>
                      </tr>
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
                        <div class="modal-body" style="padding:10px 20px;border-top:dashed 1px #ccc">
    <form name="alipayment" action="<{spUrl c=crecharge a=createRecharge}>" method="post" target="_blank">
        <div>
                <p>
                  <label>标题：</label>
                </p>
                <p>
                    <input placeholder="请输入标题，长度5-40之间" type="text" class="input-xxlarge " id="txt-title"/>
                </p>
                <p>
                  <label>来源：</label>
                </p>
                <p>
                    <input placeholder="请输入新闻来源，拒绝盗用" type="text" class="input-xxlarge " id="txt-src" value="http://www.eadmarket.com/"/>
                </p>
                <p>
                  <label>内容：</label>
                </p>
                <p>
                    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class=" btn  btn-mini dropdown-toggle" data-toggle="dropdown" title="字体"><i class="icon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          </ul>
        </div>
      <div class="btn-group">
        <a class="btn  btn-mini dropdown-toggle" data-toggle="dropdown" title="字号"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">大</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">中</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">小</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn btn-mini" data-edit="bold" title="加粗 (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
        <a class="btn btn-mini" data-edit="italic" title="斜体 (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
        <a class="btn btn-mini" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
        <a class="btn btn-mini" data-edit="underline" title="下划线 (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn btn-mini" data-edit="insertunorderedlist" title="加点"><i class="icon-list-ul"></i></a>
        <a class="btn btn-mini" data-edit="insertorderedlist" title="编号"><i class="icon-list-ol"></i></a>
        <a class="btn btn-mini" data-edit="outdent" title="减少缩进 (Shift+Tab)"><i class="icon-indent-left"></i></a>
        <a class="btn btn-mini" data-edit="indent" title="缩进 (Tab)"><i class="icon-indent-right"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn btn-mini" data-edit="justifyleft" title="左对齐 (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
        <a class="btn btn-mini" data-edit="justifycenter" title="居中对齐 (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
        <a class="btn btn-mini" data-edit="justifyright" title="右对齐 (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
        <a class="btn btn-mini" data-edit="justifyfull" title="自适应 (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
      </div>
      <div class="btn-group">
      <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" title="超链接"><i class="icon-link"></i></a>
        <div class="dropdown-menu input-append">
          <input class="span2" placeholder="URL" width="100px" type="text" data-edit="createLink"/>
          <button class="btn" type="button">Add</button>
        </div>
        <a class="btn btn-mini" data-edit="unlink" title="移除超链接"><i class="icon-cut"></i></a>

      </div>
    </div>
    <div id="editor">
      请输入新闻内容&hellip;
    </div>
                </p>
                <p>
                  <a id="btn-publish" class="btn btn-small btn-success tip" id="btn-addAdvertise" title="发布新闻">
                          <i class="icon-plus"></i> 发布新闻
                        </a>
                </p>
        </div>
      </form>
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

  



<script src="/js/jquery.message.js"></script>
<script src="/js/jquery.hotkeys.js"></script>
<script src="/js/bootstrap-wysiwyg.js"></script>
<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
      $('.dropdown-menu input').click(function() {return false;})
        .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      $('#voiceBtn').hide();
      // if ("onwebkitspeechchange"  in document.createElement("input")) {
      //   var editorOffset = $('#editor').offset();
      //   $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      // } else {
      //   $('#voiceBtn').hide();
      // }
    };
    initToolbarBootstrapBindings();  
    $('#editor').wysiwyg();
     $('.tip').tooltip();
    //window.prettyPrint && prettyPrint();
  });
$("#btn-publish").click(function(){
    var title=$("#txt-title").val().replace("'","");
    var src=$("#txt-src").val();
    var content=$("#editor").html().replace("'","");
    var creator=<{$smarty.session.user.id}>;
    if(title.length<5||title.length>40){
        $.msg("标题长度必须为5-40之间！");
    }else{
        $.post("<{spUrl c=cnews a=addNews}>", {  title:$.trim(title),src: $.trim(src),content:content,creator:creator},
             function(data){
               if(data.indexOf("操作失败")<0){
                  $.msg('发布成功！','color:green;');
                  window.location.reload();
               }
               else{
                  $.msg(data);
               }
             });
    }
});
</script>
  </body>
</html>
