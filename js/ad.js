//添加对IE浏览器的兼容性支持
document.getElementsByClassName = function(){
var tTagName ="*";
if(arguments.length > 1){
tTagName = arguments[1];
}
if(arguments.length > 2){
var pObj = arguments[2]
}
else{
var pObj = document;
}
var objArr = pObj.getElementsByTagName(tTagName);
var tRObj = new Array();
for(var i=0; i<objArr.length; i++){
    if(objArr[i].className == arguments[0]){
    tRObj.push(objArr[i]);
    }
}
return tRObj;
} 
function admarket_goto(obj) { 
    window.open(obj.getAttribute("admarket_url"),'_blank');
};
function admarket_getsmall(a,b){
    if(parseInt(a)>=parseInt(b)){
        return parseInt(b);
    }else{
        return parseInt(a);
    }
}
// function changeBGColor(obj){
//     obj.setAttribute('style',style+'background-color:#ddd;');
// } 
//获取页面内的所有广告位
var admarket_ads=document.getElementsByClassName("admarket_ad");
var admarket_baseURL="http://www.eadmarket.com/";
if(admarket_ads!=null&&admarket_ads!="undefined"){
var style='width:'+admarket_advertise.width+'px;height:'+admarket_advertise.height+'px;cursor:pointer;'
            +'background-color:#eee;border:solid 1px #ccc;color:#515151;border-radius:5px;'
            +'font-weight:bold;font-family:"微软雅黑";font-size:'+admarket_getsmall(admarket_advertise.width,admarket_advertise.height)/6+'px;over-flow:hidden;'
            +'vertical-align:text-bottom;text-align:center;position:relative;display:inline-block;';
  for(var i=0; i<admarket_ads.length; i++){
        var admarket_adBox=document.getElementById("admarket_box_"+admarket_advertise.id);//广告位容器
        var admarket_adcontent="";//广告位内容
        var imageURI="";//图片资源地址
        var videoURI="";//视频资源地址
        var txtURI="";//文字资源地址
        var targetURL="";//广告跳转地址
        if(admarket_advertise.state!="1"){//如果广告位没有被出售，则显示默认出售中
             txtURI="广告位招租";
             targetURL=admarket_baseURL+"?c=main&a=detail&project="+admarket_advertise.base.id;
            if(admarket_advertise.format!=0){
                var mini_font_size=admarket_getsmall(admarket_advertise.width,admarket_advertise.height);
               if(mini_font_size<=50){
                admarket_adcontent='<span style="position:absolute;top:5px;bottom:5px;left:1%;right:1%;over-flow:hidden;">'+txtURI+'</span>';
                }
                else if(mini_font_size<80){
                admarket_adcontent='<span style="position:absolute;top:10px;bottom:10px;left:1%;right:1%;over-flow:hidden;">'+txtURI+'</span>';
                }else{
                    admarket_adcontent='<span style="position:absolute;top:30%;bottom:30%;left:1%;right:1%;over-flow:hidden;">'+txtURI+'</span>';
                }
                //imageURI=baseURL+"img/adcontent/image/selling.jpg";
                //videoURI=baseURL+"img/adcontent/video/selling.swf";

                admarket_adBox.setAttribute('style',style);
                
                admarket_adBox.setAttribute('title',txtURI);
                admarket_adBox.setAttribute('admarket_url',targetURL);
                admarket_adBox.setAttribute('onclick','admarket_goto(this);');
            }else{
                admarket_adcontent='<a href="'+targetURL+'" target="_blank" style="font-size:'+admarket_advertise.width+'px">'+txtURI+'</a>'
            }
           if(admarket_advertise.default_display_content!=""&&admarket_advertise.default_display_content!=undefined){
                admarket_adBox.setAttribute('style',"");
                admarket_adBox.setAttribute('title',"");
                admarket_adBox.setAttribute('onclick','');
                admarket_adcontent=admarket_advertise.default_display_content;
            }
            
        }

        else if(admarket_advertise.state=="1"&&admarket_trade!="undefined"){//如果广告位已经被出售，则显示广告内容
            var admarket_product=admarket_trade.product;
            var adcontentNumber=parseInt(admarket_trade.adcontentNumber);//广告内容编号
            if(admarket_product.txt.split('\n').length>adcontentNumber){
                 txtURI=admarket_product.txt.split('\n')[adcontentNumber];//文本以字符串分割
            }
            else{
                txtURI="默认广告内容";
            }
            imageURI=admarket_baseURL+"img/adcontent/image/"+admarket_product.image.split(';')[adcontentNumber];//图片以分号分割
            videoURI=admarket_baseURL+"img/adcontent/video/"+admarket_product.video.split(';')[0];//flash以分号分割
            targetURL=admarket_baseURL+'?c=cadvertise&a=clicked&aid='+admarket_advertise.id;
            //加载广告内容
            if(admarket_advertise.format==0){
                var txtLength=0;

                txtLength=parseInt(admarket_advertise.height);
                if(txtLength>txtURI.length){
                    txtLength=txtURI.length;
                }
                admarket_adcontent='<a target="_blank" style="font-size:'+admarket_advertise.width+'px;" href="'+targetURL+'">'+txtURI.substring(0,txtLength)+'</a>';
            }
            else if(admarket_advertise.format==1){
                admarket_adcontent='<a target="_blank" border="0" href="'+targetURL+'">'+'<img  width="'+admarket_advertise.width+'" height="'+admarket_advertise.height+'"  style="width:'+admarket_advertise.width+'px;height:'+admarket_advertise.height+'px;"  src="'+imageURI+'"/>'+'</a>';
            }
            else if(admarket_advertise.format==2){
                //adcontent='<div style="z-index:-1;"><!-- 设置z-index属性为-1 --> ';
                admarket_adcontent+='<object style="display:inline-block;cursor:pointer;" width="'+admarket_advertise.width+'" height="'+admarket_advertise.height+'" type="application/x-shockwave-flash" data="'+videoURI+'"  codebase="../../../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"> ';
                admarket_adcontent+='<param name="movie" value="fla/xxx.swf" /><!--此处添加flash--> '; 
                admarket_adcontent+='<embed  style="display:inline-block;cursor:pointer;" src="'+videoURI+'"  width="'+admarket_advertise.width+'" height="'+admarket_advertise.height+'"  pluginspage="http://www.macromedia.com/go/getflashplayer"/>';
                admarket_adcontent+='</object>';
                // adcontent+='</div>';
                //  adcontent+='<div id="masker"';   
                //  adcontent+='style="cursor: pointer; margin-top:-'+advertise.height+'px; width:'+advertise.width+'px; height:'+advertise.height+'px; z-index:1000; visibility: visible; border:0;"> '; 
                //     adcontent+='<!--此处添加链接-->';  
                //     adcontent+='<a href="'+targetURL+'" target="_blank" style="text-decoration:none;">  ';
                //     adcontent+='<!--此处添加遮盖flash的透明图片-->  ';
                //     adcontent+='<img src="images/flashMasker.gif" width="'+advertise.width+'" height="'+advertise.height+'" border="0" style=" width:"'+advertise.width+'px;" height:"'+advertise.height+'px;" /></a> '; 
                //adcontent+='</div>';
                admarket_adBox.setAttribute('admarket_url',targetURL);
                admarket_adBox.setAttribute('onclick','admarket_goto(this);');

               
            }
        }
       // adBox.setAttribute('url',targetURL);
       // adBox.setAttribute('onclick','goto(this);');
        //adBox.setAttribute('onmouseover','changeBGColor(this)');
        //adBox.setAttribute('style',style);
        while(admarket_adcontent.indexOf("<script")>-1){
            var startIndex=admarket_adcontent.indexOf("<script");
            var endIndex=admarket_adcontent.indexOf("</script>");
            var scriptStr=admarket_adcontent.substring(startIndex,endIndex+9);
            document.write(scriptStr);
            admarket_adcontent=admarket_adcontent.replace(scriptStr,"");
        }
        admarket_adBox.innerHTML=admarket_adcontent;

        //document.write(admarket_adcontent);
    }  
}

