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
		 $results=$news->spPager($this->spArgs('page', 1), 8)->findAll(null,"id desc");
		 $this->pager = $news->spPager()->getPager();
		 $this->records=$results;
		 $this->display("user/admin/news.php"); // 新闻管理中心
	}

    
}