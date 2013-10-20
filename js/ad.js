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
function goto(obj) { 
    window.open(obj.getAttribute("url"),'_blank');
};
function getsmall(a,b){
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
var ads=document.getElementsByClassName("admarket_ad");
var baseURL="http://www.eadmarket.com/";
if(ads!=null&&ads!="undefined"){
var style='width:'+advertise.width+'px;height:'+advertise.height+'px;cursor:pointer;'
            +'background-color:#eee;border:solid 1px #ccc;color:#515151;border-radius:5px;box-shadow:0 0 1px #ccc;'
            +'font-weight:bold;font-family:"微软雅黑";font-size:'+getsmall(advertise.width,advertise.height)/5+'px;over-flow:hidden;'
            +'vertical-align:text-bottom;text-align:center;position:relative;display:inline-block;';
  for(var i=0; i<ads.length; i++){
        var adBox=document.getElementById("admarket_box_"+advertise.id);//广告位容器
        var adcontent="";//广告位内容
        var imageURI="";//图片资源地址
        var videoURI="";//视频资源地址
        var txtURI="";//文字资源地址
        var targetURL="";//广告跳转地址
        if(advertise.state=="0"){//如果广告位没有被出售，则显示默认出售中
            txtURI="广告位出售中";
            adcontent='<span style="position:absolute;top:30%;bottom:30%;left:5%;right:5%;over-flow:hidden;">'+txtURI+'</span>';
            //imageURI=baseURL+"img/adcontent/image/selling.jpg";
            //videoURI=baseURL+"img/adcontent/video/selling.swf";
            targetURL=baseURL+"?c=main&a=detail&project="+advertise.base.id;
        }

        else if(advertise.state=="1"&&trade!="undefined"){//如果广告位已经被出售，则显示广告内容
            var product=trade.product;
            txtURI=product.txt;
            imageURI=baseURL+"img/adcontent/image/"+product.image;
            videoURI=baseURL+"img/adcontent/video/"+product.video;
            targetURL=baseURL+'?c=cadvertise&a=clicked&aid='+advertise.id;
            //加载广告内容
            if(advertise.format==0){
                adcontent=txtURI;
            }
            else if(advertise.format==1){
                adcontent='<img  width="'+advertise.width+'" height="'+advertise.height+'"  style="width:'+advertise.width+'px;height:'+advertise.height+'px;"  src="'+imageURI+'"/>';
            }
            else if(advertise.format==2){
                adcontent='<object style="display:inline-block;" width="'+advertise.width+'" height="'+advertise.height+'" type="application/x-shockwave-flash" data="'+videoURI+'"  codebase="../../../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0">';
                adcontent+='<embed  style="display:inline-block;" src="'+videoURI+'"  width="'+advertise.width+'" height="'+advertise.height+'"  pluginspage="http://www.macromedia.com/go/getflashplayer"/>';
                adcontent+='<span>浏览器插件缺失导致播放失败，请联系管理人员</span></object>';
            }
        }
        adBox.setAttribute('url',targetURL);
        adBox.setAttribute('onclick','goto(this)');
        //adBox.setAttribute('onmouseover','changeBGColor(this)');
        adBox.setAttribute('style',style);
        adBox.innerHTML=adcontent;
        
    }  
}
