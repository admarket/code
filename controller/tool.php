<?php
class tool extends spController {
  //上传类测试
  function upFile(){
   
  $arg = array(
	APP_PATH.'/img/head/',
	$_SESSION["user"]["id"]
	);
	$upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
    $result=$upFlie->upload_file($_FILES['file']);
    $msg=$upFlie->errmsg;
    if($result){
     echo "true";
    }else {
     echo "false".$msg."123";
    }
	
  }
  function getAlexa(){
    $url='http://www.baidu.com/';//$this->spArgs('url');
    $prefixUrl='http://data.alexa.com/data/ezdy01DOo100QI?cli=10&dat=snba&ver=7.0&cdt=alx_vw=20&wid=16865&act=00000000000&ss=1024x768&bw=775&t=0&ttl=1125&vis=1&rq=2&url='.$url;
    $data = file_get_contents($prefixUrl);
    $result=simplexml_load_string($data);
    $alexa=(array)$result->SD[1]->REACH['RANK'];
    $local=(array)$result->SD[1]->COUNTRY['RANK'];
    dump($local);
    echo $alexa[0].','.$local[0];
  }
}
