<?php
class cadmin extends spController
{
	 public function __construct(){
        parent::__construct(); // 要先启动父类的构造函数
        if($_SESSION['user']==""){
            $this->jump(spUrl('main', 'login'));
        }else{
        	if($_SESSION['user']['id']!=0){
        		echo "您不具备此权限！我们把您的信息已经备案在日志！";
        		$this->jump(spUrl('main', 'index'));
        	}
        }
    }
	function news(){
		 $news = spClass("news");
		 $results=$news->spPager($this->spArgs('page', 1), 15)->findAll(null,"id desc");
		 $this->pager = $news->spPager()->getPager();
		 $this->records=$results;
		 $this->display("user/admin/news.php"); // 新闻管理中心
	}
    function trades(){
         $this->getView()->allow_php_tag = true; 
         $trade = spClass("trade");
         $project= spClass("project");
         $results=$trade->spPager($this->spArgs('page', 1), 15)->findAll(null,"id desc");
         
         $this->pager = $trade->spPager()->getPager();
         $results = $trade->spLinker()->run($results);
         foreach ($results as &$result) { 
            $condition = array("id" => $result['advertise']['project']);
            $arr=explode(";",$result['product']['image']);
            $tempProject=$project->find($condition);
            $result['siteName']=$tempProject['name'];
            $result['siteUrl']=$tempProject['url'];
            $result['currentContent']=$arr[$result['adcontentNumber']];
         }

         $this->records=$results;
         $this->display("user/admin/trades.php"); //交易管理中心
    }
    function finance(){
         $cash = spClass("cash");
         $results=$cash->spPager($this->spArgs('page', 1), 15)->findAll(null,"id desc");
         $this->pager = $cash->spPager()->getPager();
         $results = $cash->spLinker()->run($results);
         $this->records=$results;
         $this->display("user/admin/finance.php"); // 财务管理中心
    }

    
}