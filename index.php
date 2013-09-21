<?php
define("APP_PATH",dirname(__FILE__));
define("SP_PATH",dirname(__FILE__).'/SpeedPHP');
$spConfig = array(
	'db' => array( // 数据库设置
                'host' => 'admarket.mysql.rds.aliyuncs.com',  // 数据库地址，一般都可以是localhost
                'port' => '3306', //数据库服务器端口号
                'login' => 'eadmarket', // 数据库用户名
                'password' => '1admarket', // 数据库密码
                'database' => 'eadmarket', // 数据库的库名称
        ),
    'launch' => array( // 加入挂靠点，以便开始使用Url_ReWrite的功能
        'router_prefilter' => array(
            array('spUrlRewrite', 'setReWrite'),  // 对路由进行挂靠，处理转向地址
        ),
        'function_url' => array(
            array("spUrlRewrite", "getReWrite"),  // 对spUrl进行挂靠，让spUrl可以进行Url_ReWrite地址的生成
        ),
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
                        'host_name' => 'eadmarket.com', //邮件主机名
                        'smtp_host' => 'smtp.biz.mail.qq.com',  //SMTP服务器
                        'smtp_port' => '25',    //SMTP端口
                        'auth' => TRUE, //身份验证
                        'from' => 'system@eadmarket.com', //发件邮箱
                        'user' => 'system@eadmarket.com',      //用户名
                        'pass' => '1admarket',       //密码
                        'log_file' => '',       //日志文件
                        'time_out' => 30,       //超时时间
                ),
                 // 以下是Url_ReWrite的设置
                 'spUrlRewrite' => array(
                     'hide_default' => false, // 隐藏默认的main/index名称，但这前提是需要隐藏的默认动作是无GET参数的
                     'args_path_info' => false, // 地址参数是否使用path_info的方式，默认否
                     'suffix' => '.html', // 生成地址的结尾符
                     'sep'=>'/',
                     'map' => array(
                         'alipay_return' => 'crecharge@alipayReturn',
                         'alipay_notify' => 'crecharge@alipayNotify',
                         'active_member' => 'cuser@verify',
                     ),
                 ),
        ),
);
header("Content-type: text/html; charset=utf-8"); 
require(SP_PATH."/SpeedPHP.php");
spRun();