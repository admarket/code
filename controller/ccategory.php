<?php
class ccategory extends spController
{
	function getJsonData(){
		$category = spClass("category");
		$records = $category->findAll(); 
		echo json_encode($records);
	}
	function getCategoryJsonByType(){
		$category = spClass("category");
		$conditions = array("type" => $this->spArgs('type'));
		$records = $category->findAll($conditions); 
		if($records){
			echo json_encode($records);
		}else{
			echo 0;
		}
		
	}

    
}