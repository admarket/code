<?php
class ccash extends spController
{
     public function __construct(){
        parent::__construct(); // 要先启动父类的构造函数
        if($_SESSION['user']==""){
            $this->jump(spUrl('main', 'login'));
        }
    }
	function addCash(){

        $user = spClass("user");
        $cash = spClass("cash");
        
        $startTime=time()-7*24*60*60;
        $startTime=date("Y-m-d H:i:s", $startTime);
        $conditions = "user=".$_SESSION['user']['id']." and createtime>='".$startTime."'";
        $result=$cash->find($conditions);
        if($result){
             echo "7日之内只能申请一次提现";
        }else{
            $amount=intval($this->spArgs("amount")*100);
            $conditions = array("id" => $_SESSION['user']['id']);
            $result = $user->findAll($conditions); 
            if($amount){
                $balance=intval($result[0]["balance"]);
                $cold=intval($result[0]["cold"]);
                if($balance-$amount>=0){//检查账户余额
                    $newUserRow=array(
                            'balance'=>$balance-$amount,
                            'cold'=>$cold+$amount,
                        );
                    $user->update($conditions, $newUserRow);
                    $newrow = array(
                            'user'=> $_SESSION['user']['id'],
                            'amount'=>$this->spArgs('amount')*100,
                    );
                    
                    $result=$cash->create($newrow);
                    if($result){
                        echo 1;
                      } else{
                        echo "操作失败：网络异常！";
                      }  
                }else{
                    echo "操作失败：账户余额不足！";
                }
           
            }
        }
        
		
	}

    function checkCash(){
        $flag="0";
        $user = spClass("user");
        $amount=intval($this->spArgs("amount")*100); // 用spArgs接收spUrl传过来的ID
        $conditions = array("id" => $_SESSION['user']['id']);
        $result = $user->findAll($conditions); 
        
        if($amount){
            $balance=intval($result[0]["balance"]);
            if(($balance-$amount)>=0){
                $flag="1"; 
            }else{
                $flag= '0';
            }
           
        }else{
            echo "数据异常！";
        }
        echo $flag;
    }
	

    
}