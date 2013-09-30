<?php
class cuser extends spController
{

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
				echo "1";
				return;
			}else{
				echo false;
			}

		}
		echo false;
	}

	//校验密码是否一致
	function checkPass($password, $passwordInDb) {
		$passwordAfter = $this->hashPass($password);
		return $passwordAfter == $passwordInDb;
	}

	//充值
    function recharge() {
        $this->display("recharge.php");
    }

    //对原始密码加密
    function hashPass($originalPass) {
    	return md5($originalPass);
    }

    //注册
    function register(){
        $user = spClass("user");
		$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的ID
		$phone=$this->spArgs("phone");
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
                        "mobilephone"=>$phone,
                        "payment" => $payment,
                );
		$result = $user->findAll($conditions); //查询该邮箱是否已经被注册
		if(!$result){//如果未被注册，则注册
			$result = $user->create($newrow); 
			//dump($result); // 查看结果，
			if($result){
				$result = $user->findAll($conditions); 
				//dump($result); // 查看结果，
				if($result){
					//$_SESSION['user'] = $result[0];
					echo true;
				}else{
					echo false;
				}//登录	
			}else{
				echo false;
			} //注册//注册
		}else{
			echo false;
		}
		
    }

    //验证注册用户是否已注册
    function isExistEmail(){
    	$user = spClass("user");
		$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的ID
		$conditions = array("email" => $email);
		$result = $user->findAll($conditions); 
		//dump($result); // 查看结果，
		if($result){
			echo "1";
		}else{
			echo "0";
		} //检查email是否重复
    }
    //验证注册用户是否已注册
    function isExistPhone(){
    	$user = spClass("user");
		$phone=$this->spArgs("phone"); // 用spArgs接收spUrl传过来的ID
		$conditions = array("phone" => $phone);
		$result = $user->findAll($conditions); 
		//dump($result); // 查看结果，
		if($result){
			echo "1";
		}else{
			echo "0";
		} //检查email是否重复
    }

    //验证邮箱
    function verify(){
    	$user = spClass("user");
    	$email=$this->spArgs("ticket"); // 用spArgs接收spUrl传过来的email
    	$email=$this->decryptEmail($email);
    	$conditions = array("email"=>$email); // 查找email是$email的记录
        $newrow = array(
                'verify' => 1,  // 然后将这条记录的name改成“喜羊羊”
        );
        $user->update($conditions, $newrow); // 更新记录
        $this->jump(spUrl('sub', 'dashboard'));
    }
    //解密获取加密字符串中的email
    function decryptEmail($crypttedEmail) {
    	$emailContainer = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, "6461772803150152", urldecode(base64_decode($crypttedEmail)), MCRYPT_MODE_CBC,"8105547186756005");
    	$elements = explode("&", $emailContainer);
    	return $elements[0];
    }

    //保存设置
    function save(){
    	$user = spClass("user");
    	$id=$_SESSION['user']['id']; 
    	//$password=$this->spArgs("password"); // 用spArgs接收spUrl传过来的email// 用spArgs接收spUrl传过来的email
    	$account=$this->spArgs("account");//提现账号
		$type=$this->spArgs("type");//身份类型
    	$conditions = array("id"=>$id); // 查找email是$email的记录
        $newrow = array(
                //'password' => $this->hashPass($password),  // 然后将这条记录的name改成“喜羊羊”
                'account' => $account,
                'type' => $type,
        );
        $user->update($conditions, $newrow); // 更新记录
        //$_SESSION['user']['password'] = $password;
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
    //找回密码
    function forget(){
    	$user = spClass("user");
		$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的ID
		$conditions = array("email" => $email);
		$result = $user->find($conditions); 
		if($result){
			$mail = spClass('spEmail');
	        $email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的email
	        $addition="<p>此邮件为系统自动发送的邮件，请勿直接回复</p>";
	        $mailsubject = "广告市场-找回密码";//邮件主题
	        $password = $this->create_password(12);
		    $newPassword=$this->hashPass($password);
		    $newrow = array(
	                'password' => $newPassword,  // 然后将这条记录的name改成“喜羊羊”    
	        );
	        $user->update($conditions, $newrow); // 更新记录
	        $mailbody = "<h4> 您的账户当前密码是：</h4>"."<p> <a>".$password."<a></p>".$addition;//邮件内容
	        $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	        $result=$mail->sendmail($email, $mailsubject, $mailbody, $mailtype);
	        if($result){
	        	echo "successful";
	        }else{
	        	echo "未知原因导致邮件发送失败！";
	        }
		}else{
			echo "该邮箱尚未注册！";
		}
    	
    }
    function create_password($pw_length = 8)  
	{  
		$randpwd='';
	    for ($i = 0; $i < 12; $i++)  
		    {  
		        $randpwd .= chr(mt_rand(33, 126));  
		    } 
	    return $randpwd;  
	}  
}