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

    //管理人员专用
    function finishCash(){
        //查询对应提现记录
        $cash = spClass("cash");
        $id=intval($this->spArgs("id"));
        $cashRecord=$cash->spLinker()->find("id=".$id);
        //用户冻结金额变更
        $user = spClass("user");
        $newCold=$cashRecord['user']['cold']-$cashRecord['amount'];
        $newUserRow = array('cold' => $newCold);
        if($newCold<0){
            echo "操作失败:账户提现异常，金额超出冻结金额！";
        }else{
            $user->update("id=".intval($cashRecord['user']['id']),$newUserRow); 
            //提现记录状态变更
            $newCashRow = array('state' => 1);
            $cash->update("id=".$id,$newCashRow);
            //添加站内提醒信息
            $message = spClass("message");
            $newMessageRow = array(
                 'sender' =>0 , 
                 'receiver' =>intval($cashRecord['user']['id']), 
                 'title' =>"提现成功！", 
                 'type'=>1,
                 'content' =>"您在".$cashRecord['createtime']."申请提现"
                            .$cashRecord['amount']."￥已经成功划到您的提现账户中，请及时查收。", 
                );
            $message->create($newMessageRow);
            echo 1;
        }
        
    }
	

    
}