<?php
define("APP_PATH",dirname(__FILE__));
define("SP_PATH",dirname(__FILE__).'/SpeedPHP');
$spConfig = array(
	"db" => array( // 数据库设置
                'host' => 'localhost',  // 数据库地址，一般都可以是localhost
                'login' => 'root', // 数据库用户名
                'password' => '', // 数据库密码
                'database' => 'ad', // 数据库的库名称
        ),
	 'view' => array(
                'enabled' => TRUE, // 开启Smarty
                'config' =>array(
                        'template_dir' => APP_PATH.'/tpl', // 模板存放的目录
                        'compile_dir' => APP_PATH.'/tmp', // 编译的临时目录
                        'cache_dir' => APP_PATH.'/tmp', // 缓存的临时目录
                        'left_delimiter' => '<{',  // smarty左限定符
                        'right_delimiter' => '}>', // smarty右限定符
                ),
        ),
         'ext' => array(  // 扩展使用的配置根目录
                'spEmail' => array( //邮件扩展的基本设置
                        'debug' => TRUE, //调试模式
                        'host_name' => 'winter_2000@126.com', //邮件主机名
                        'smtp_host' => 'smtp.126.com',  //SMTP服务器
                        'smtp_port' => '25',    //SMTP端口
                        'auth' => TRUE, //身份验证
                        'from' => 'winter_2000@126.com', //发件邮箱
                        'user' => 'winter_2000@126.com',      //用户名
                        'pass' => 'a130509',       //密码
                        'log_file' => '',       //日志文件
                        'time_out' => 30,       //超时时间
                ),
        ),
);
header("Content-type: text/html; charset=utf-8"); 
require(SP_PATH."/SpeedPHP.php");
spRun();