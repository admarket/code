<!DOCTYPE html>
<html>
  <head>
    <title>九尾狐 - 网络广告位交易市场 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!--I definition-->
    <link href="css/style2.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="/favicon.ico">
  </head>
  <body>
    <!--header content-->
    <div class="header" style="padding-bottom:0;margin-bottom:0;">
      <div class="container">
        <div class="row-fluid">
          <div class="span4"><a href="/"><img src="img/budgetup.png"/></a></div>
          <div class="span3 offset1">如果您有任何疑问，请关注我们的<a class="tip" title="关注我们的新浪微博">新浪微博</a>,与我们进行互动。</div>
          <div class="span3 offset1">
            <{if $smarty.session.user eq '' }>
              <a class="btn btn-success" href="<{spUrl c=main a=register}>">注册</a>
              <a class="btn" href="<{spUrl c=main a=login}>">登录</a>
            <{else}>
              <a class="btn btn-success" style="width:80px;" href="<{spUrl c=sub a=dashboard}>">
                <i class="icon-user icon-white"></i> 用户中心</a>
                <a class="btn" href="<{spUrl c=sub a=logout}>">退出</a>
            <{/if}>
            
          </div>
        </div>
        <!--nav-head content-->
        <ul class="nav nav-tabs nav-head">
          <li class="active" >
            <a href="#" style="font-weight:bold;background-color:#fdfdfd;">热点</a>
          </li>
          <li><a  href="#">网站</a></li>
          <li><a  href="#">博客</a></li>
          <li><a  href="#">应用</a></li>
          <li><a  href="#">微博</a></li>
          <li><a  href="#">邮件</a></li>
          <li><a  href="#">订阅</a></li>
        </ul>
      </div>
    </div>
    <!--section content-->
    <div class="section">
      <div class="container">
        <!--intro content-->
        <div class="alert alert-info intro">
          如果您有任何疑问，请关注我们的新浪微博,与我们进行互动。
          <a href="#" class="close" data-dismiss="alert">&times;</a>
        </div>
        <div class="row-fluid">
          <div class="span3  nav-bar" >
            <!--nav-bar content-->
              <ul class="nav nav-list side-bar" id="nav-bar">
                <li class="nav-header">
                    <div class="input-append">
                      <input class="span10" id="appendedInputButton" type="text"  placeholder="输入关键词查找…">
                      <button class="btn" type="button"><i class="icon-search"></i></button>
                    </div>
                </li>
                <li class="active"><a href="#">所有分类</a></li>
                <li><a href="#">小说文学</a></li>
                <li><a href="#">游戏娱乐</a></li>
                <li><a href="#">社区论坛</a></li>
                <li><a href="#">博客空间</a></li>
                <li><a href="#">视频音乐</a></li>
                <li><a href="#">查询搜索</a></li>
                <li><a href="#">资源下载</a></li>
                <li><a href="#">网盘空间</a></li>
                <li><a href="#">其他类别</a></li>
              </ul>
          </div>
          <div class="span9 main-body">
            <!--Body content-->
            <div class="page-header">
              <h5><span class="badge badge-important">Hot</span> 热门广告位</h5>
            </div>
            <div>
              <div class="banner">
                  <ul>
                      <li>
                        <div class="row-fluid">
                        <ul class="thumbnails ads">
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/3.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label blue">博客</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/6.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/5.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                         
                        </ul>
               </div>  
                      </li>
                      <li>
                        <div class="row-fluid">
                        <ul class="thumbnails ads">
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/3.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label blue">博客</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/6.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/5.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          
                        </ul>
               </div>  
                      </li>
                      <li>
                        <div class="row-fluid">
                        <ul class="thumbnails ads">
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/3.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label blue">博客</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/6.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/5.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          
                        </ul>
               </div>  
                      </li>
                  </ul>
              </div>
            </div>
            <div class="page-header">
              <h5><span class="badge badge-warning">New</span> 最新加入</h5>
            </div>
            <div class="row-fluid">
                        <ul class="thumbnails ads">
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/3.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label blue">博客</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/6.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/5.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/4.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label blue">网站</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
               </div>   
               <div class="row-fluid">
                        <ul class="thumbnails ads">
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/3.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label  blue"><i class="icon-envelope  icon-white"></i></span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/6.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label green">博客</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/5.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label  yellow">微博</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="span3">
                            <div class="thumbnail ad">
                              <div class="row">
                                <div class="span4 offset2">
                                  <img class="img-rounded img-polaroid" src="/img/ads/4.png" alt="">
                                  <h6 align="center" style="color:#0088cc;">站酷</h6>
                                </div>
                                
                                <div class="span6">
                                  <h6><span class="label  red">应用</span></h6>
                                  <p>全球排名：11,123,100</p>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="pagination" align="center" >
                        <ul>
                          <li><a href="#">Prev</a></li>
                          <li><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">Next</a></li>
                        </ul>
                      </div>     
          </div>

        </div>
      </div>
    </div>
    <!--footer content-->
    <div class="footer">
      <div class="container">
        <div class="row-fluid">
          <div class="span8">
            ©2013 九尾狐 — 版权所有.<a>隐私声明</a>. 
          </div>
          <div class="span4">
            鸣谢：<a>Glyphicons</a> | <a>BootStramp</a> | <a>BootCss</a> | <a>Jquery</a>
          </div>
        </div>
      </div>
    </div>
    <!--script content-->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="//unslider.com/unslider.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('.tip').tooltip();
      $(function() {
          $('.banner').unslider({
            arrows: false,
            fluid: true,
            dots: true              //  Support responsive design. May break non-responsive designs
          });
      });
    </script>
  </body>
</html>
