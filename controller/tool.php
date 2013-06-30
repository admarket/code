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
}