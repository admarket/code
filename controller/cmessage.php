<?php
class cmessage extends spController
{
	
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