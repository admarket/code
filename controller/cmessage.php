<?php
class cmessage extends spController
{
	 public function __construct(){
        parent::__construct(); // 要先启动父类的构造函数
        if($_SESSION['user']==""){
            $this->jump(spUrl('main', 'login'));
        }
    }
    function getUnreadJsonBySessionID(){
		$message = spClass("message");
		$conditions = array(
			"receiver" => $_SESSION['user']['id'],
			"state"=>0,
			);
		$records = $message->findAll($conditions); 
		if($records){
			echo count($records);
		}else{
			echo "0";
		}
		
	}
    function removeMessage(){
    	$message = spClass("message");
		$conditions=" id=".$this->spArgs('id');
		$result=$message->delete($conditions);
		if($result) {
			echo 1;
		}
		else{
			echo 0;
		}
    }
     function removeAll(){
    	$message = spClass("message");
		$receiver=0;
		if($_SESSION['user']['id']!=""){
			$receiver=$_SESSION['user']['id'];
		}
		$conditions=" receiver=".$receiver;
		$result=$message->delete($conditions);
		if($result) {
			echo 1;
			$_SESSION['unread']=0;
		}
		else{
			echo 0;
		}
    }
    //全部设为已读
    function readAll(){
		$message = spClass("message");
		$receiver=0;
		if($_SESSION['user']['id']!=""){
			$receiver=$_SESSION['user']['id'];
		}
		$conditions=" receiver=".$receiver;
		$row = array('state'=>'1');
		$result=$message->update($conditions, $row);
		if($result) {
			echo 1;
            $_SESSION['unread']=0;
		}
		else{
			echo 0;
		}
	}
	function updateUnread(){
		$message = spClass("message");
		$conditions=" id=".$this->spArgs('id');
		$row = array('state'=>'1');
		$result=$message->update($conditions, $row);
		if($result) {
			echo true;
			if($_SESSION['unread']>0){
                    $_SESSION['unread']--;
            }
		}
		else{
			echo false;
		}
	}

    
}