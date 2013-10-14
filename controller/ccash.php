<?php
class ccash extends spController
{
	function addCash(){
		$newrow = array(
                        'user'=> $_SESSION['user']['id'],
                        'amount'=>$this->spArgs('amount')*100,
                );
        $cash = spClass("cash");
        $result=$cash->create($newrow);
        if($result){
            echo 1;
          } else{
            echo 0;
          } 
	}

    function checkCash(){
        $flag="0";
        $user = spClass("user");
        $amount=intval($this->spArgs("amount"))*100; // 用spArgs接收spUrl传过来的ID
        $conditions = array("id" => $_SESSION['user']['id']);
        $result = $user->findAll($conditions); 
        
        if($amount){
            $balance=intval($result[0]["balance"]);
            if($balance-$amount>=0){
                $flag="1"; 
            }
           
        }
        echo $flag;
    }
	

    
}