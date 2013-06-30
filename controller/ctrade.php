<?php
class ctrade extends spController
{
	
	function getJsonData(){
		$trade = spClass("trade");
		$conditions = array("user_id" => $_SESSION['user']['id']);
		$records = $trade->findAll($conditions); 
		echo json_encode($records);
	}

	function BuyAd(){
		$trade = spClass("trade");
		$advertiseID=$this->spArgs("advertise"); // 用spArgs接收spUrl传过来的ID
		$product=$this->spArgs("product");
		$price=intval($this->spArgs("price"));
		$number=intval($this->spArgs("number"));
		$buyer=$_SESSION['user']['id'];
		$seller=$this->spArgs("seller");
		$newTrade = array(
                        "advertise" => $advertiseID , 
                        "product" => $product,
                        "price" => $price,
                        "number" => $number ,
                        "buyer" => $buyer,
                        "seller"=>$seller
                );
		//检查账户余额
		$user = spClass("user");
		$conditions=array("id" => $_SESSION['user']['id']);
		$moneyCheck=$user->find($conditions);
		$balance=intval($moneyCheck["balance"]);//用户当余额
		//dump($balance);
		$newBalance=$balance-($price*$number);//购买后的余额
		if($newBalance<0){
			echo '您的账户余额不足，请先充值';
		}else{
			//检查广告位出售状态
			$advertise = spClass("advertise");
			$conditions=array("id" => $advertiseID);
			$adCheck=$user->find($conditions);
			if($adCheck["state"]==1){
				echo '该广告位已经出售，请选择其他广告位';
			}else{
				//更新广告位状态为出售
				 $newrow = array(
                	'state' => 1,  // 更新状态为为已经出售（1）
		        );
		        $advertise->update($conditions, $newrow); // 更新记录

		        //收取广告费用，更新到session
		        $conditions=array("id" => $_SESSION['user']['id']);
		         $newrow = array(
                	'balance' => $newBalance,  // 收取用户广告费用
		        );
		        $user->update($conditions, $newrow); // 更新记录
		        $_SESSION['user']['balance']=$newBalance;
		        

		        //添加交易记录
				$result = $trade->create($newTrade); //添加交易记录

				//添加财务记录
		        $finance = spClass("finance");
				$newFinance = array(
					"user_id" => $_SESSION['user']['id'],
					"type"=>"10",
					"number"=>($price*$number),
					"balance"=>$newBalance,
					"remark"=>"广告收入。交易编号：#".$result
					);
				$records = $finance->create($newFinance);

				if($result){
					echo 1;
				}else{
					echo 0;
				}
			}
			
		}
		
	}

    
}