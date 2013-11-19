<div class="span3  nav-bar" style="border-radius:10px;width:24%;">
<!--nav-bar content-->
  <p></p>
  <ul class="nav nav-list side-bar" id="nav-bar" style="margin:10px 0;padding:10px;">
    <li><a></a></li>
  </ul>
</div>

<script  type="text/javascript">
var categories;
 $.post("<{spUrl c=ccategory a=getCategoryJsonByType type=1}>",
             function(data){
               if(data!="0"){
                 $("#nav-bar").html("");
                 categories=stringToJSON(data);

                 for(var i=0;i<categories.length;i++){
                  var newNode='<li data-key="'+categories[i].id+'"';

                  if(i==($('#currentCategory').val()-1)){
                    newNode+=' class="active "';
                  }
                 
                  if(i==categories.length){
                    newNode+='style="border-bottom:0;" ';
                  }
                  var url='<{spUrl c=main a=result}>?a=1';
                  if($('#currentCategory').val()!=""){
                      url+='&category='+categories[i].id;
                  }
                  
                  // if($('#currentPrice').val()!=""){
                  //     url+='&price='+$('#currentPrice').val();
                  // }
                  //  if($('#currentState').val()!=""){
                  //     url+='&state='+$('#currentState').val();
                  // }
                  
                  //  if($('#currentAlexa').val()!=""){
                  //     url+='&alexa='+$('#currentAlexa').val();
                  // }
                    newNode+=' onclick="submitSearch(this);"><a href="'+url+'">'
                    +categories[i].name+'</a></li>';
                  
                    $("#nav-bar").append(newNode);
                 }
               }else{
                  $("#nav-bar").html("<li>加载分类失败...</li>");
               }
             });
 $("#nav-bar li").bind("click",function(){
    $(this).attr('class','active');
    $('#currentCategory').val($(this).attr('data-key'));
    $("#search-form").submit(function(e){
      e.preventDefault();
    });
 });
 function submitSearch(obj){
    $(obj).attr('class','active');
     $('#currentCategory').val($(obj).attr('data-key'));
      $("#search-form").submit();
 }

function stringToJSON(obj){   
  return eval('(' + obj + ')');   
} 
</script>
         