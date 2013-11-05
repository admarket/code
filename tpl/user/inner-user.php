 <div class="row-fluid category" style="padding:20px 0;">
    <div class="span5" align="center">
       <img id="user-headimg" src="/img/head/default.jpg" class="img-rounded img-polaroid" style="margin:0;height:50px;width:50px;">
      <p id="user-name" class="title">
        正在加载...

      </p>         
    </div> 
    <div class="span7 title" style="line-height:25px;" >
      <div>&nbsp;账户余额：</div>
      <div style="color:#50B432;font-size:16px;padding-left:10px;" >
      <span id="user-balance">正在加载...</span> &yen;</div>
      <div >&nbsp;冻结金额：</div>
      <div style="color:#bd362f;font-size:14px;padding-left:10px;" >
      <span id="user-cold">正在加载...</span> &yen;</div>
    </div>
                
</div>

<script  type="text/javascript">
var user;
 $.post("<{spUrl c=cuser a=getUserJsonBySessionID}>",
             function(data){
               if(data!="0"){
                 user=stringToJSON(data);
                 $("#user-name").html(user.name);
                 var balance=parseInt(user.balance)/100;
                 var cold=parseInt(user.cold)/100;
                 $("#user-balance").html(balance);
                 $("#user-cold").html(cold);
                 $("#user-headimg").attr("src","/img/head/"+user.headimg);
               }
             });
function stringToJSON(obj){   
  return eval('(' + obj + ')');   
} 
</script>