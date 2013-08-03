<?php
require_once('PasswordHash.php');
class cuser extends spController
{
	var $hash_cost_log2 = 8;
	var $hash_portable = FALSE;

	function index(){
		$this->display("index.php"); // 首页
	}

	//登录
	function login(){
		$user = spClass("user");
		$message = spClass("message");
		
		$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的ID
		$password=$this->spArgs("password");
		$conditions = array("email" => $email);

		$result = $user->findAll($conditions); 
		if($result){
			
			if ($this->checkPass($password,$result[0]['password'])) {
				$_SESSION['user'] = $result[0];
				$conditions2 = array(
	            "receiver" => $_SESSION['user']['id'],
	            "state" => 0,
	            );
				$unReadMessages=$message->findAll($conditions2);
		        $unRead=count($unReadMessages);
		        $_SESSION['unread'] = $unRead;
				echo true;
				return;
			}

		}
		echo false;
	}

	//校验密码是否一致
	function checkPass($password, $passwordInDb) {
		$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
		$loginResult = $hasher->CheckPassword($password, $passwordInDb);
		unset($hasher);
		return $loginResult;
	}

	//充值
    function recharge() {
        $this->display("recharge.php");
    }

    //对原始密码加密
    function hashPass($originalPass) {
    	$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
    	$pass =  $hasher->HashPassword($originalPass);
    	unset($hasher);
    	return $pass;
    }

    //注册
    function register(){
        $user = spClass("user");
		$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的ID
		$password=$this->spArgs("password");
		$name=$this->spArgs("name");
		$account=$this->spArgs("account");
		$payment=$this->spArgs("payment");
		$conditions = array("email" => $email);

    	$password = $this->hashPass($password);

		$newrow = array(
                        "email" => $email , 
                        "password" => $password,
                        "name" => $name,
                        "account" => $account ,
                        "payment" => $payment,
                );
		$result = $user->create($newrow); 
		//dump($result); // 查看结果，
		if($result){
			$result = $user->findAll($conditions); 
			//dump($result); // 查看结果，
			if($result){
				$_SESSION['user'] = $result[0];
				echo true;
			}else{
				echo false;
			}//登录	
		}else{
			echo false;
		} //注册//注册
    }

    //验证注册用户是否已注册
    function isExist(){
    	$user = spClass("user");
		$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的ID
		$conditions = array("email" => $email);
		$result = $user->findAll($conditions); 
		//dump($result); // 查看结果，
		if($result){
			echo true;
		}else{
			echo false;
		} //检查email是否重复
    }

    //验证邮箱
    function verify(){
    	$user = spClass("user");
    	$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的email
    	$conditions = array("email"=>$email); // 查找email是$email的记录
        $newrow = array(
                'verify' => 1,  // 然后将这条记录的name改成“喜羊羊”
        );
        $user->update($conditions, $newrow); // 更新记录
        $this->display("user/dashboard.php"); // 首页
    }
    //保存设置
    function save(){
    	$user = spClass("user");
    	$id=$_SESSION['user']['id']; 
    	$password=$this->spArgs("password"); // 用spArgs接收spUrl传过来的email// 用spArgs接收spUrl传过来的email
    	$account=$this->spArgs("account");//提现账号
		$type=$this->spArgs("type");//身份类型
    	$conditions = array("id"=>$id); // 查找email是$email的记录
        $newrow = array(
                'password' => $password,  // 然后将这条记录的name改成“喜羊羊”
                'account' => $account,
                'type' => $type,
        );
        $user->update($conditions, $newrow); // 更新记录
        $_SESSION['user']['password'] = $password;
        $_SESSION['user']['account'] = $account;
        $_SESSION['user']['type'] = $type;
        echo true; // 首页
    }

    //上传头像
    function uploadHeadimg(){
    	$filename=$_FILES['file']['name'];
        $ext=end(explode('.', $filename));
	  	$arg = array(
		APP_PATH.'/img/head/',
		$_SESSION["user"]["id"]
		);
		$upFlie=spClass("uploadFile", $arg); // 注意第二个参数是数组
	    $result=$upFlie->upload_file($_FILES['file']);
	    $msg=$upFlie->errmsg;
	    if($result){
	    	$user = spClass("user");
	    	$id=$_SESSION['user']['id']; 
	    	$conditions = array("id"=>$id); // 查找email是$email的记录
	        $newrow = array(
	                'headimg' => $id.".".$ext,  // 然后将这条记录的name改成“喜羊羊”    
	        );
	        $user->update($conditions, $newrow); // 更新记录
	        $_SESSION['user']['headimg'] = $id.".".$ext;
	     echo "true";
	    }else {
	     echo "false".$msg."123";
	    }
		
    }

    //切换身份
    function changeIdentity(){

    	if($_SESSION['user']['type']==0){
    		$_SESSION['user']['type'] = 1;
    		$this->jump(spUrl('sub', 'sitemanage')); // 跳转到首页
    	}else{
    		$_SESSION['user']['type'] = 0;
    		$this->jump(spUrl('sub', 'product')); // 跳转到首页
    	}
    	//$this->jump($_SERVER['HTTP_REFERER']);跳转到之前的页面
    	
    }
}