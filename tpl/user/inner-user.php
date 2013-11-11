 <div class="row-fluid category" style="padding:0;">
    <div class="span5" align="center">
       <img id="user-headimg" src="/img/head/default.jpg" alt="用户头像" class="img-rounded img-polaroid" style="margin:0;height:50px;width:50px;">
      <p id="user-name" class="title">
        正在加载...

      </p>         
    </div> 
    <div class="span7 title" style="line-height:22px;" >
      <div>&nbsp;账户余额：</div>
      <div style="color:#50B432;font-size:16px;padding-left:10px;" >
        <span id="user-balance">正在加载...</span> &yen;
      </div>
      <div >&nbsp;冻结金额：</div>
      <div style="color:#bd362f;font-size:14px;padding-left:10px;" >
        <span id="user-cold">正在加载...</span> &yen;
      </div>
    </div>
    <div class="box span12 tip" style="padding:10px;word-wrap: break-word;" title="通过邀请他人加入本站，您将获得本站收益一定比例的分红。邀请越多，分红越多" data-placement="right">
      <span class="title">邀请码：</span>
      <span id="user-code" class="red-color">正在加载...</span>
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
                  $("#user-code").html(user.code);
                 $("#user-headimg").attr("src","/img/head/"+user.headimg);
               }
             });
function stringToJSON(obj){   
  return eval('(' + obj + ')');   
} 
</script>