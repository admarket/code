<?php
//date_default_timezone_set('PRC');//此句用于消除时间差
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
	
	function undoTrade(){
		$trade = spClass("trade");
		$user = spClass("user");
		$finance = spClass("finance");
		$advertise = spClass("advertise");
		$conditions = array("id" => $this->spArgs("id"));
		
		//恢复广告位状态
		$newrow= array('state' => 2);
		$advertise->update($newrow,"id=".$result['advertise']);
		//挂起交易状态
		$newrow = array('state' => 4);
		$trade->update($newrow,$conditions);
		//广告费用退还买家账户
		$userCondition="id=".$result['buyer'];
		$userResult=$user->find($userCondition);
		$newrow = array('balance' => $userResult+$result['price']*$result['number']);
		$user->update($newrow,$userCondition);
		//删除财务记录
		
		$result=$trade->find($conditions);
		echo 1;
	}
	function removeTrade(){
		$trade = spClass("trade");
		$conditions = array("id" => $this->spArgs("id"));
		$newrow = array('state' => 4);
		$trade->update($newrow,$conditions);
		echo 1;
	}
	//带有事务支持！！！
	function BuyAd(){
		$trade = spClass("trade");
		$advertiseID=$this->spArgs("advertise"); // 用spArgs接收spUrl传过来的ID
		$product=$this->spArgs("product");
		$price=intval(floatval($this->spArgs("price"))*100);
		$buyPrice=intval(floatval($this->spArgs("buyPrice"))*100);
		$number=intval($this->spArgs("number"));
		$adcontentNumber=intval($this->spArgs("adcontentNumber"));
		$startTime = time();  // 当前时间戳
   		$endTime =$startTime + ($number * 24 * 60 * 60);  // N天后的时间戳 
		$buyer=$_SESSION['user']['id'];
		$seller=$this->spArgs("seller");
		$newTrade = array(
                        "advertise" => $advertiseID , 
                        "adcontentNumber"=>$adcontentNumber,
                        "product" => $product,
                        "price" => $buyPrice,
                        "originalPrice"=>$price,
                        "number" => $number ,
                        "startTime"=>date("Y-m-d H:i:s", $startTime), 
                        "endTime" =>date("Y-m-d H:i:s", $endTime), // 格式化日期
                        "last_transfer_date"=>date("Y-m-d H:i:s", $startTime), 
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
			$conditions=array(
				"id" => $advertiseID,
				);
			$conditions2=array(
				"id" => $advertiseID,
				"state"=>1,
				);
			$adCheck=$advertise->find($conditions2);
			if($adCheck){
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
				$profit=floatval($this->spArgs("price"))*intval($this->spArgs("number"));
				$msgContent="买家购买时间为：".$this->spArgs("number")."天。预计本次广告收入：".$profit."￥。";
				$message = spClass("message");
				$newMessage=array(
                        "sender" => 0,
                        "receiver" =>$seller,
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
					echo "购买成功！";
				}else{
					$trade->query("ROLLBACK");
					echo "操作失败！未知原因导致购买失败！";
				}

				//发送邮件通知

				$conditions=array("id" => $seller);
				$emailAccount=$user->find($conditions);
				if($emailAccount){
					$advertise=spClass('advertise');
					$conditions=array("id" => $advertiseID);
					$adAccount=$advertise->spLinker()->find($conditions);
					if($adAccount){

					}
					$tool=spClass('tool');
	                $email=$emailAccount['email']; // 用spArgs接收spUrl传过来的email
	                $addition="<p>此邮件为系统自动发送的系统通知邮件，请勿直接回复</p>";
	                $mailsubject = "广告位出售成功！";//邮件主题
	                $msgContent="买家购买时间为：".$this->spArgs("number")."天。<br/>预计本次广告收入：".$profit."￥。<br/>";
	                $mailbody = '<h4> <span style="font-weight:bold;">恭喜您：</span></h4>
	                			<p>您的广告位已经成功出售！</p>
	                			<p>网站：&nbsp;<span style="font-weight:bold;">'.$adAccount['base']['name'].'</span>
	                			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                			广告位：&nbsp;<span style="font-weight:bold;">'.$adAccount['title'].'</span><br/>
	                			买家购买时间：<span style="font-weight:bold;">'.$this->spArgs("number").'天</span><br/>
	                			预计本次广告收入： <span style="font-weight:bold;">'.$profit.'&nbsp;￥</span>
	                			</p><p style="color:red;font-weight:bold;">请务必保证您的广告位代码有效性，否则无法付款到您的账户。</p>'.$addition;//邮件内容
	                $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	                $result=$tool->sendEmail($email, $mailsubject, $mailbody);
				}
				
			}
			
		}
		
	}

	function BookingAd(){
		$trade = spClass("trade");
		$advertiseID=$this->spArgs("advertise"); // 用spArgs接收spUrl传过来的ID
		$product=$this->spArgs("product");
		$price=intval(floatval($this->spArgs("price"))*100);
		$buyPrice=intval(floatval($this->spArgs("buyPrice"))*100);
		$number=intval($this->spArgs("number"));
		$adcontentNumber=intval($this->spArgs("adcontentNumber"));
		$startTime = time();  // 当前时间戳
   		$endTime =$startTime + ($number * 24 * 60 * 60);  // N天后的时间戳 
		$buyer=$_SESSION['user']['id'];
		$seller=$this->spArgs("seller");
		$newTrade = array(
                        "advertise" => $advertiseID , 
                        "adcontentNumber"=>$adcontentNumber,
                        "product" => $product,
                        "price" => $buyPrice,
                        "originalPrice"=>$price,
                        "number" => $number ,
                        "startTime"=>date("Y-m-d H:i:s", $startTime), 
                        "endTime" =>date("Y-m-d H:i:s", $endTime), // 格式化日期
                        "last_transfer_date"=>date("Y-m-d H:i:s", $startTime), 
                        "buyer" => $buyer,
                        "state"=>2,//预订的交易状态为2
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
			$conditions=array(
				"id" => $advertiseID,
				);
			$conditions2=array(
				"id" => $advertiseID,
				"state"=>1,
				);
			$adCheck=$advertise->find($conditions2);
			if($adCheck){
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
				$profit=floatval($this->spArgs("price"))*intval($this->spArgs("number"));
				$msgContent="买家预订时间为：".$this->spArgs("number")."天。预计本次广告收入：".$profit."￥。";
				$message = spClass("message");
				$newMessage=array(
                        "sender" => 0,
                        "receiver" =>$seller,
                        "title"=>"恭喜您，您的广告位已经成功被预订！",
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
					echo "预定成功！";
				}else{
					$trade->query("ROLLBACK");
					echo "操作失败！未知原因导致预订失败！";
				}

				//发送邮件通知

				$conditions=array("id" => $seller);
				$emailAccount=$user->find($conditions);
				if($emailAccount){
					$advertise=spClass('advertise');
					$conditions=array("id" => $advertiseID);
					$adAccount=$advertise->spLinker()->find($conditions);
					if($adAccount){

					}
					$tool=spClass('tool');
	                $email=$emailAccount['email']; // 用spArgs接收spUrl传过来的email
	                $addition="<p>此邮件为系统自动发送的系统通知邮件，请勿直接回复</p>";
	                $mailsubject = "广告位被预订成功！";//邮件主题
	                $msgContent="买家预订时间为：".$this->spArgs("number")."天。<br/>预计本次广告收入：".$profit."￥。<br/>";
	                $mailbody = '<h4> <span style="font-weight:bold;">恭喜您：</span></h4>
	                			<p>您的广告位已经成功被预订！</p>
	                			<p>网站：&nbsp;<span style="font-weight:bold;">'.$adAccount['base']['name'].'</span>
	                			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                			广告位：&nbsp;<span style="font-weight:bold;">'.$adAccount['title'].'</span><br/>
	                			买家预订时间：<span style="font-weight:bold;">'.$this->spArgs("number").'天</span><br/>
	                			预计本次广告收入： <span style="font-weight:bold;">'.$profit.'&nbsp;￥</span>
	                			</p><p style="color:red;font-weight:bold;">请务必保证您的广告位代码有效性，否则无法付款到您的账户。</p>'.$addition;//邮件内容
	                $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	                $result=$tool->sendEmail($email, $mailsubject, $mailbody);
				}
				
			}
			
		}
		
	}

    
}