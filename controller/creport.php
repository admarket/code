<?php
class creport extends spController
{
	
	function GetJsonData(){
		$report = spClass("report");
		$conditions=" buyer=".intval($_SESSION['user']['id']);
		$records = $report->spLinker()->findAll($conditions); 
		echo json_encode($records);
	}

	function GetJsonDataByTime(){
		$report = spClass("report");
		$conditions=" buyer=".intval($_SESSION['user']['id']);
		$trade=$this->spArgs('trade');
		if(isset($trade)){
			$conditions=$conditions." and trade='".intval($this->spArgs('trade'))."' ";
		}
		//dump($trade);
		$conditions=$conditions." and date>='".urldecode($this->spArgs('startTime'))."' and date<'".urldecode($this->spArgs('endTime'))."'";
		$records = $report->findAll($conditions); 
		//dump(urldecode($this->spArgs('startTime')).urldecode($this->spArgs('endTime')));
		//dump($records);
		echo json_encode($records);
	}
	function GetJsonDataByDay(){
		$report = spClass("report");
		$conditions=" buyer=".intval($_SESSION['user']['id']);
		$trade=$this->spArgs('trade');
		if(isset($trade)){
			$conditions=$conditions." and trade='".intval($this->spArgs('trade'))."' ";
		}
		//dump($trade);
		$conditions=$conditions." and date>='".urldecode($this->spArgs('startTime'))."' and date<'".urldecode($this->spArgs('endTime'))."'";
		$records = $report->findSql("select date_format(r.date, '%Y-%m-%d') as date,count(id) as count,sum(click) as click,sum(impression) as impression
									from report r
									where ".$conditions."
									group by date_format(r.date, '%Y-%m-%d')"); 
		//dump(urldecode($this->spArgs('startTime')).urldecode($this->spArgs('endTime')));
		//dump($records);
		// $sql="select date_format(r.date, '%Y-%m-%d') as date,count(id) as count,sum(click) as click,sum(impression) as impression
		// 							from report r
		// 							where ".$conditions."
		// 							group by date_format(r.date, '%Y-%m-%d')";
  //       echo $sql;
		echo json_encode($records);
	}

	function GetJsonDataByHour(){
		$report = spClass("report");
		$conditions=" buyer=".intval($_SESSION['user']['id']);
		$trade=$this->spArgs('trade');
		if(isset($trade)){
			$conditions=$conditions." and trade='".intval($this->spArgs('trade'))."' ";
		}
		//dump($trade);
		$conditions=$conditions." and r.date>='".urldecode($this->spArgs('startTime'))."' and r.date<'".urldecode($this->spArgs('endTime'))."'";
		$records = $report->findSql("select date_format(r.date, '%Y-%m-%d %H') as date,count(id) as count,sum(click) as click,sum(impression) as impression
									from report r
									where ".$conditions."
									group by date_format(r.date, '%Y-%m-%d %H')"); 
		//dump(urldecode($this->spArgs('startTime')).urldecode($this->spArgs('endTime')));
		//dump($records);
		echo json_encode($records);
	}
	function GetJsonDataByMonth(){
		$report = spClass("report");
		$conditions=" buyer=".intval($_SESSION['user']['id']);
		$trade=$this->spArgs('trade');
		if(isset($trade)){
			$conditions=$conditions." and trade='".intval($this->spArgs('trade'))."' ";
		}
		//dump($trade);
		$conditions=$conditions." and date>='".urldecode($this->spArgs('startTime'))."' and date<'".urldecode($this->spArgs('endTime'))."'";
		$records = $report->findSql("select date_format(r.date, '%Y-%m') as date,count(id) as count,sum(click) as click,sum(impression) as impression
									from report r
									where ".$conditions."
									group by date_format(r.date, '%Y-%m')"); 
		//dump(urldecode($this->spArgs('startTime')).urldecode($this->spArgs('endTime')));
		//dump($records);
		echo json_encode($records);
	}


    
}