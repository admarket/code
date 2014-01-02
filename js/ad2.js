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


var admarket_baseURL="http://www.eadmarket.com/";
var admarket_adcontentURL="http://192.168.0.101:8080/advertise/view_advertise.htm?aid=";
load_eadmarket_data();
window.onload=load_eadmarekt_adcontent;
 /** 
 * 向服务器请求广告数据
 **/ 
function load_eadmarket_data(){
    //获取页面内的所有广告位
    var admarket_ads=document.getElementsByClassName("admarket_ad");
    if(admarket_ads!=null&&admarket_ads!="undefined"){ 
      //循环从服务器获取广告内容
      for(var i=0; i<admarket_ads.length; i++){
            var aid=admarket_ads[i].getAttribute("aid");
            /** 
             * 动态引入JS文件 
             **/  
            var eadmarket_shell=document.createElement('script');
            eadmarket_shell.type="text/javascript";
            eadmarket_shell.async=true;
            eadmarket_shell.charset="utf-8";
            eadmarket_shell.src=admarket_adcontentURL+aid;
            var eadmarket_node = document.getElementsByTagName('script')[0];   
            eadmarket_node.parentNode.appendChild(eadmarket_shell);//自己决定要引入JS文件的位置          
        }  
    }
}
/** 
 * 根据服务器返回数据加载广告内容
 **/ 
function load_eadmarekt_adcontent(){
    
    //获取页面内的所有广告位
    var admarket_ads=document.getElementsByClassName("admarket_ad");
    if(admarket_ads!=null&&admarket_ads!=undefined){ 
      //循环加载广告内容
      for(var i=0; i<admarket_ads.length; i++){
            var aid=admarket_ads[i].getAttribute("aid");
            var adcontainer=document.getElementById("admarket_box_"+aid);
            var adcontent=eval("eadmarket_ad_detail_"+aid);
            if(adcontent!=undefined){
                if(adcontent.success=="true"){
                    //如果没有广告内容，做为广告位尚未出售,否则加载返回的内容
                    if(adcontent.content==""){
                        var style='width:'+adcontent.width+'px;height:'+adcontent.height+'px;cursor:pointer;'
                            +'background-color:#eee;border:solid 1px #ccc;color:#515151;border-radius:5px;'
                            +'font-weight:bold;font-family:"微软雅黑";font-size:'+admarket_getsmall(adcontent.width,adcontent.height)/6+'px;over-flow:hidden;'
                            +'vertical-align:text-bottom;text-align:center;position:relative;display:inline-block;';
                        var text='<span style="position:absolute;top:30%;bottom:30%;left:1%;right:1%;over-flow:hidden;color:#515151;">广告位招租</span>';
                        var mini_font_size=admarket_getsmall(adcontent.width,adcontent.height);
                       if(mini_font_size<=50){
                        text='<span style="position:absolute;top:5px;bottom:5px;left:1%;right:1%;over-flow:hidden;">广告位招租</span>';
                        }
                        else if(mini_font_size<80){
                        text='<span style="position:absolute;top:10px;bottom:10px;left:1%;right:1%;over-flow:hidden;">广告位招租</span>';
                        }
                        var defaultContent='<a href="'+adcontent.clickUrl+'"" target="_blank">'+text+'</a>';
                        
                        if(adcontent.type!=0){
                            adcontainer.setAttribute('style',style);
                            
                        } else{//如果是文字广告位
                            defaultContent='<a href="'+adcontent.clickUrl+'"" target="_blank">广告位招租</a>';
                        }
                        adcontainer.innerHTML=defaultContent; 
                    }else{
                        //根据广告格式加载广告内容代码
                        if(adcontent.type=="0"){//文字广告
                            adcontent.content=adcontent.content.substring(0,parseInt(adcontent.height)-1);
                            var textContent='<a style="font-size:'+adcontent.width+'px" href="'+adcontent.clickUrl+'" target="_blank">'+adcontent.content+'</a>';
                            adcontainer.innerHTML=textContent;
                        }else if(adcontent.type=="1"){//图片广告
                            var imageContent='<a href="'+adcontent.clickUrl+'" target="_blank">';
                            imageContent+='<img src="'+adcontent.content+'" width="'+adcontent.width+'px" height="'+adcontent.height+'px" border="0"/></a>';
                            adcontainer.innerHTML=imageContent;
                        }else if(adcontent.type=="2"){//视频广告
                            var videoContent='';
                             videoContent+='<object style="display:inline-block;cursor:pointer;" width="'+adcontent.width+'px" height="'+adcontent.height+'px" type="application/x-shockwave-flash" data="'+adcontent.content+'"  codebase="../../../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"> ';
                            videoContent+='<param name="movie" value="fla/xxx.swf" /><!--此处添加flash--> '; 
                            videoContent+='<embed  style="display:inline-block;cursor:pointer;" src="'+adcontent.content+'"  width="'+adcontent.width+'px" height="'+adcontent.height+'px"  pluginspage="http://www.macromedia.com/go/getflashplayer"/>';
                            videoContent+='</object>';
                            adcontainer.innerHTML=videoContent;
                            //adcontainer.setAttribute('admarket_url',adcontent.clickUrl);
                            //adcontainer.setAttribute('onclick','admarket_goto(this);');
                        }
                    } 
                }else{//获取广告内容失败
                    //alert("loaded failed");
                }
            }else{//获取广告内容失败
                //alert("loaded failed");
            }
            
               
        }  
    }
}

