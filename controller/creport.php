<?php
class creport extends spController
{
	
	function GetJsonData(){
		$report = spClass("report");
		$conditions = array("buyer" => $_SESSION['user']['id']);
		$records = $report->spLinker()->findAll($conditions); 
		echo json_encode($records);
	}

	function GetJsonDataByTime(){
		$report = spClass("report");
		$conditions=" buyer=".$_SESSION['user']['id'];
		$trade=$this->spArgs('trade');
		if(isset($trade)){
			$conditions=$conditions." and trade='".$this->spArgs('trade')."' ";
		}
		//dump($trade);
		$conditions=$conditions." and date>='".urldecode($this->spArgs('startTime'))."' and date<'".urldecode($this->spArgs('endTime'))."'";
		$records = $report->findAll($conditions); 
		//dump(urldecode($this->spArgs('startTime')).urldecode($this->spArgs('endTime')));
		//dump($records);
		echo json_encode($records);
	}

    
}