<?php
class main extends spController
{
	function index(){
		$this->display("index.php"); // 首页
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
}