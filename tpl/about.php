<!DOCTYPE html>
<html>
  <head>
    <title>广告市场  - 关于广告市场</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="广告市场,广告位招租,广告位出售,广告位管理"/>
    <meta name="description" 
    content="广告市场是全球首家中文网络广告位交易平台，在此发布、管理网站广告位，进行广告位招租、交易买卖，并进行科学的分析和管理。"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
     <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- Bootstrap -->
    
    <link href="/css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
    <!--引用百度地图API-->
    <style type="text/css">
        html,body{margin:0;padding:0;}
        .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
        .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
  </head>
  <body>
     <!-- load head tpl -->
    <{include file="head.php"}>
    <div class="section" align="center">
      <div class="container box std-container" align="left" style="padding:20px 40px;">
          <h3 class="title">关于广告市场</h3>
          <div class="content">
              <p class="p">
                广告市场是北京九尾狐科技有限公司于2013年7月创办，在短短的几个月时间里，以其优质的广告及完善的服务，已经与多个知名网站站长建立长久合作关系，并且也与数百家广告主建立信任关系，并且每天以几十家网站的速度发展。
              </p>

             <p>
              广告市场是国内领先的网络广告营销平台，利用完全自主研发的网络广告系统、效果监测评估系统、广告位交易系统、收益对比分析系统，以及精准广告投放系统，融合现有国内传统营销模式，兼并国外创新理念，以雄厚的资金，高素质的研发团队，先进的互联网技术，前沿的用户体验设计，规范的公司管理机制，为千千万万网络公司和传统企业广告主打造一个定时、定量、定区域、定行业的自由广告市场。
            </p>
            <p>
              我们拥有成熟而庞大的网站联盟流量，以精确的目标受众定位，丰富的线上广告营销经验与全面的技术支持，经济、优化的媒体采购方案与营销策略，详实、严谨的数据统计技术与依托，完善、严格的作弊检查，将您网站的每一个流量的价值最大化，将您每一分投入的效果最优化。
            </p>
            <p>
              经过长期的调研和经验的积累，我们以用户体验为前提，以用户利益为宗旨，为您提供最人性化的操作界面，最直观的监测效果。并且我们完善的付费机制与客户提醒机制，让广告商不必再为工作的繁忙忘记续费导致广告的下架而烦恼，站长也不必再为优质的广告商四处寻找而花费时间。我们也将以高标准、高要求、高效率、高效果为目标，与网站主一起成长，与广告商一起发展，让九尾狐广告市场成为国内最大的广告市场营销平台。
            </p>
            <div class="row-fluid" style="padding:0;margin:0;">

                <p class="span4" style="padding:20px 0;">
                  <span style="font-weight:bold;">联系我们：</span><br/>
                    公司地址：北京市昌平区青年创业大厦A座<br/>
                    联系电话：010-60739009<br/>
                    客服QQ: <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=4006776&site=qq&menu=yes"><img  border="0" src="http://wpa.qq.com/pa?p=2:4006776:52" alt="点击联系我们" title="点击联系我们"/>4006776</a><br/>
                    企业邮箱：support@eadmarket.com
                </p>
                  <!--百度地图容器-->
                <div class="well span7 offset1" style="height:250px;border:#ccc solid 1px;" id="dituContent">
                  
                </div>
            </div>

          </div>
              
      </div>
    </div>
    <!--footer content-->
    <!-- load foot tpl -->
    <{include file="foot.php"}>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(116.297804,40.15588);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
  var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
  map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
  var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
  map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
  var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
  map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"青年创业大厦",content:"北京九尾狐科技有限公司",point:"116.297579|40.155811",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
     ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
      var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
      var iw = createInfoWindow(i);
      var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
      marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
      
      (function(){
        var index = i;
        var _iw = createInfoWindow(i);
        var _marker = marker;
        _marker.addEventListener("click",function(){
            this.openInfoWindow(_iw);
          });
          _iw.addEventListener("open",function(){
            _marker.getLabel().hide();
          })
          _iw.addEventListener("close",function(){
            _marker.getLabel().show();
          })
        label.addEventListener("click",function(){
            _marker.openInfoWindow(_iw);
          })
        if(!!json.isOpen){
          label.hide();
          _marker.openInfoWindow(_iw);
        }
      })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
  </body>
</html>
