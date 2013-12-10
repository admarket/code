<?php
class cnews extends spController
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
	function addNews(){
		$news = spClass("news");
		$title=$this->spArgs("title");
		$content=$this->spArgs("content");
		$src=$this->spArgs("src");
		$newRow=array(
                'title'=>$title,
                'content'=>$content,
                'src'=>$src,
            );
		$result=$news->create($newRow);
		if($result){
	        echo 1;
	      } else{
	        echo "操作失败：网络异常！";
	      } 
	}
	function removeNews(){
		$news = spClass("news");
		$conditions=" id=".$this->spArgs('id');
		$result=$news->delete($conditions);
		if($result) {
			$this->jump(spUrl('cadmin', 'news'));
		}
		else{
			echo 0;
		}
	}

    
}