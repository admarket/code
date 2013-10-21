<?php
class cmessage extends spController
{
	 public function __construct(){
        parent::__construct(); // 要先启动父类的构造函数
        if($_SESSION['user']==""){
            $this->jump(spUrl('main', 'login'));
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