<?php
require_once(APP_PATH.'/tpl/alipay/alipay.config.php');
require_once(APP_PATH.'/tpl/alipay/lib/alipay_submit.class.php');
class crecharge extends spController
{
	
	public function xx() {
        $uid = $_SESSION['user']['id'];
        $cash = $this->spArgs('cash') * 100;
        echo "uid:".$uid."\n";
        $recharge = spClass("recharge");

        $out_trade_no = $recharge->create(array("uid"=>$uid,"cash"=>$cash));
        echo "out_trade_no:".$out_trade_no;

        $subject = $uid."充值".$out_trade_no;

        $total_fee = $cash;

        $body = "JIUWEIHU".$out_trade_no;

        $show_url = "WIDshow_url";
//需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

//防钓鱼时间戳
        $anti_phishing_key = "";
//若要使用请调用类文件submit中的query_timestamp函数

//客户端的IP地址
        $exter_invoke_ip = "";
//非局域网的外网IP地址，如：221.0.0.1
        $alipay_config['partner']		= trim('');

//安全检验码，以数字和字母组成的32位字符
        $alipay_config['key']			= trim('');

//支付类型
        $alipay_config['payment_type'] = "1";
//必填，不能修改
//服务器异步通知页面路径
        $alipay_config['notify_url'] = "http://localhost:8888/tpl/alipay/notify_url.php";
//需http://格式的完整路径，不能加?id=123这类自定义参数

//页面跳转同步通知页面路径
        $alipay_config['return_url'] = "http://127.0.0.1:8888/tpl/alipay/return_url.php";
//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

//系统公共的支付宝帐户
        $alipay_config['seller_email'] = trim("liuyongpo@gmail.com");

//签名方式 不需修改
        $alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
        $alipay_config['input_charset']= strtolower('utf-8');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
        $alipay_config['cacert']    = getcwd().'\\cacert.pem';

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport']    = 'http';
        /************************************************************/

//构造要请求的参数数组，无需改动
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $alipay_config['partner'],
            "payment_type"	=> $alipay_config['payment_type'],
            "notify_url"	=> $alipay_config['notify_url'],
            "return_url"	=> $alipay_config['return_url'],
            "seller_email"	=> $alipay_config['seller_email'],
            "out_trade_no"	=> $out_trade_no,
            "subject"	=> $subject,
            "total_fee"	=> $total_fee,
            "body"	=> $body,
            "show_url"	=> $show_url,
            "anti_phishing_key"	=> $anti_phishing_key,
            "exter_invoke_ip"	=> $exter_invoke_ip,
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
        );

//建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;

    }
    
}