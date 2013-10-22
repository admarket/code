<?php
class ctrade extends spController
{
	 public function __construct(){
        parent::__construct(); // 要先启动父类的构造函数
        if($_SESSION['user']==""){
            $this->jump(spUrl('main', 'login'));
        }
    }
	function getJsonData(){
		$trade = spClass("trade");
		$conditions = array("user_id" => $_SESSION['user']['id']);
		$records = $trade->findAll($conditions); 
		echo json_encode($records);
	}
	
	//带有事务支持！！！
	function BuyAd(){
		$trade = spClass("trade");
		$advertiseID=$this->spArgs("advertise"); // 用spArgs接收spUrl传过来的ID
		$product=$this->spArgs("product");
		$price=intval($this->spArgs("price"))*100;
		$buyPrice=intval($this->spArgs("buyPrice"))*100;
		$number=intval($this->spArgs("number"));
		$startTime = time();  // 当前时间戳
   		$endTime =$startTime + ($number * 24 * 60 * 60);  // N天后的时间戳 
		$buyer=$_SESSION['user']['id'];
		$seller=$this->spArgs("seller");
		$newTrade = array(
                        "advertise" => $advertiseID , 
                        "product" => $product,
                        "price" => $buyPrice,
                        "originalPrice"=>$price,
                        "number" => $number ,
                        "endTime" =>date("Y-m-d H:i:s", $endTime), // 格式化日期
                        "buyer" => $buyer,
                        "seller"=>$seller
                );
		//检查账户余额
		$user = spClass("user");
		$conditions=array("id" => $_SESSION['user']['id']);
		$moneyCheck=$user->find($conditions);
		$balance=intval($moneyCheck["balance"]);//用户当余额
		//dump($balance);
		$newBalance=$balance-($buyPrice*$number);//购买后的余额
		if($newBalance<0){
			echo '您的账户余额不足，请先充值';
		}else{
			//检查广告位出售状态
			$trade->query("BEGIN");
			$advertise = spClass("advertise");
			$conditions=array("id" => $advertiseID);
			$adCheck=$user->find($conditions);
			if($adCheck["state"]==1){
				echo '该广告位已经出售，请选择其他广告位';
			}else if($product=""||$product==0){
				echo '请先添加您的产品！';
			}else{
				//更新广告位状态为出售
				 $newrow = array(
                	'state' => 1,  // 更新状态为为已经出售（1）
		        );
		        $result=$advertise->update($conditions, $newrow); // 更新记录
		        if(!$result){
					$trade->query("ROLLBACK");
					return false;
				}

		        //收取广告费用，更新到session
		        $conditions=array("id" => $_SESSION['user']['id']);
		         $newrow = array(
                	'balance' => $newBalance,  // 收取用户广告费用
		        );
		        $result=$user->update($conditions, $newrow); // 更新记录
		        if(!$result){
					$trade->query("ROLLBACK");
					return false;
				}
		        $_SESSION['user']['balance']=$newBalance;
		         
		        //把钱添加到官方账户
		        $conditions=array("id" => 0);
		        $root=$user->find($conditions);
		        $newrow = array(
                	'balance' => ($root['balance']+($buyPrice*$number)),  // 收取用户广告费用
		        );
		        $result=$user->update($conditions, $newrow); // 更新记录
		        if(!$result){
					$trade->query("ROLLBACK");
					return false;
				}

		        //添加交易记录
				$result = $trade->create($newTrade); //添加交易记录
				if(!$result){
					$trade->query("ROLLBACK");
					return false;
				}

				//添加财务记录
		        $finance = spClass("finance");
				$newFinance = array(
					"user_id" => $_SESSION['user']['id'],
					"type"=>"10",
					"number"=>($buyPrice*$number),
					"remark"=>"广告支出。交易编号：#".$result
					);
				$result=$records = $finance->create($newFinance);
				if(!$result){
					$trade->query("ROLLBACK");
					return false;
				}

				//发送站内通知
				$profit=intval($this->spArgs("price"))*intval($this->spArgs("number"));
				$msgContent="买家购买时间为：".$this->spArgs("number")."天。预计本次广告收入：".$profit."￥。";
				$message = spClass("message");
				$newMessage=array(
                        "sender" => 0,
                        "receiver" => $_SESSION['user']['id'],
                        "title"=>"恭喜您，您的广告位已经成功出售！",
                        "content"=>$msgContent,
                        "type" => 1,
				);
			$result=$message->create($newMessage); 
				//更新推广费用
				$product = spClass("product");
		        $conditions=array("id" => $this->spArgs("product"));
		        $result=$product->find($conditions);
		        $newrow = array(
                	'fee' => ($result['fee']+($buyPrice*$number)),  // 收取用户广告费用
		        );
		        $result=$product->update($conditions, $newrow); // 更新记录

				if($result){
					$trade->query("COMMIT");
					echo 1;
				}else{
					$trade->query("ROLLBACK");
					echo "操作失败！未知原因导致购买失败！";
				}
			}
			
		}
		
	}

    
}