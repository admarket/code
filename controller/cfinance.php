<?php
class cfinance extends spController
{
	 public function __construct(){
        parent::__construct(); // 要先启动父类的构造函数
        if($_SESSION['user']==""){
            $this->jump(spUrl('main', 'login'));
        }
    }
	function getJsonData(){
		$finance = spClass("finance");
		$conditions = array("user_id" => $_SESSION['user']['id']);
		$records = $finance->findAll($conditions); 
		echo json_encode($records);
	}

    
}