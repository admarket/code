<?php
class cuser extends spController
{
	
	function index(){
		$this->display("index.php"); // 首页
	}

	function login(){
		$user = spClass("user");
		$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的ID
		$password=$this->spArgs("password");
		$conditions = array("email" => $email , "password" => $password);
		$result = $user->findAll($conditions); 
		//dump($result); // 查看结果，
		if($result){
			$_SESSION['user'] = $result[0];
			echo true;
		}else{
			echo false;
		}//登录	
	}

    function register(){
        $user = spClass("user");
		$email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的ID
		$password=$this->spArgs("password");
		$name=$this->spArgs("name");
		$account=$this->spArgs("account");
		$payment=$this->spArgs("payment");
		$conditions = array("email" => $email , "password" => $password);
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
}