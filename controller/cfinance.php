<?php
class cfinance extends spController
{
	
	function getJsonData(){
		$finance = spClass("finance");
		$conditions = array("user_id" => $_SESSION['user']['id']);
		$records = $finance->findAll($conditions); 
		echo json_encode($records);
	}

    
}