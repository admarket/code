<?php
class sub extends spController
{
    function dashboard(){
    	$this->display("user/dashboard.php"); // 用户面板   
    }
    function logout(){
    	unset($_SESSION["user"]);
    	session_destroy();
    	$this->display("index.php"); // 退出   
    }
    function setting(){
        $this->display("user/setting.php"); // 设置
    }
    function admanage(){
        $project = spClass("project");
        $projectConditions = array("owner" => $_SESSION['user']['id']);
        $this->projects = $project->spLinker()->findAll($conditions);

        $category = spClass("category");
        $this->categories=$category->findAll();
        $this->display("user/admanage.php"); // 广告管理
    }
    function sitemanage(){
        $project = spClass("project");
        $projectConditions = array("owner" => $_SESSION['user']['id']);
        $this->projects = $project->spLinker()->findAll($conditions);
        $category = spClass("category");
        $this->categories=$category->findAll();
        $this->display("user/sitemanage.php"); // 广告管理
    }
    function finance(){
        $finance = spClass("finance");
        $conditions = array("user_id" => $_SESSION['user']['id']);
        $this->records = $finance->spPager($this->spArgs('page', 1), 5)->findAll($conditions,'time DESC'); 
        $conditionJson = array("user_id" => $_SESSION['user']['id']);
        $recordsJson = $finance->findAll($conditionJson); 
        $this->json=json_encode($recordsJson);
        $this->pager = $finance->spPager()->getPager();
        //dump($records);
        $this->display("user/finance.php"); // 财务统计
    }
    
}