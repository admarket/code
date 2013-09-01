<?php
class main extends spController
{
	function index(){
        $type = spClass('type');
        $project=spClass('project');
        $this->types = $type->spLinker()->findAll();
        $this->currentCategory=1;
        $this->projects = $project->spLinker()->spPager($this->spArgs('page', 1), 12)->findAll();
        $this->pager = $project->spPager()->getPager();
        $this->hots =  $project -> findAll(null,'alexa ASC',null,"0,12");
        $this->display("index.php"); // 首页
	}
    function result(){
        $type = spClass('type');
        $project=spClass('project');
        $conditions=" 1=1";
        if($this->spArgs("category")!=1){
             $conditions =$conditions." and category=".$this->spArgs("category");
        }
        $this->keyword=trim($this->spArgs("keyword"));
        if(!isset($keyword)){
            $conditions = $conditions.' and (name like '.$project->escape('%'.$this->keyword.'%');
            $conditions= $conditions." or description like ".$project->escape('%'.$this->keyword.'%').')';
        }
        $this->currentCategory=$this->spArgs("category");
        $this->types = $type->spLinker()->findAll();
        $this->projects = $project->spLinker()->spPager($this->spArgs('page', 1), 20)->findAll($conditions,"id asc");
        $this->pager = $project->spPager()->getPager();
        $this->display("result.php"); // 首页
    }
	function login(){
		if(!isset($_SESSION["user"])){
            $this->display("signin.php"); // 登录
        }
        else{
        	$this->display("user/dashboard.php"); // 用户面板   
        }
	}
    function register(){
            $this->display("signup.php"); // 注册   
    }
    function email() {
                $mail = spClass('spEmail');
                $email=$this->spArgs("email"); // 用spArgs接收spUrl传过来的email
                $address="http://localhost/index.php?c=cuser&a=verify&email=".$email;
                $mailsubject = "九尾狐账户注册验证邮箱";//邮件主题
                $mailbody = "<h4> 请点击下面验证地址进行验证：</h4>"."<p> <a href=".$address.">".$address."<a></p>";//邮件内容
                $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
                $result=$mail->sendmail($email, $mailsubject, $mailbody, $mailtype);
                echo $result;
        }
    function detail(){
        $type = spClass('type');
        $project=spClass('project');
        $product=spClass('product');
        if(isset($_SESSION['user'])){
            $conditions =" id=".$this->spArgs("project");
            $productConditions =" owner=". $_SESSION['user']['id'];
            $this->products=$product->findAll($productConditions);
        }
        
        $this->currentCategory=1;
        $this->types = $type->spLinker()->findAll();
        $this->project = $project->spLinker()->find($conditions);
        $this->display("detail.php"); // 注册 
    }
    function help(){
        $this->display("help.html"); // 注册 
    }
}