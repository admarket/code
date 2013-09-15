<?php
require_once(APP_PATH.'/tpl/alipay/alipay.config.php');
require_once(APP_PATH.'/tpl/alipay/lib/alipay_submit.class.php');
class crecharge extends spController
{

    public function createRecharge() {
        $uid = $_SESSION['user']['id'];
        $cash = $this->spArgs('cash');

        $total_fee = $cash;

        //echo "uid:".$uid."\n";
        $recharge = spClass("recharge");
        $cashFen = $cash * 100;
        $out_trade_no = $recharge->create(array("uid"=>$uid,"cash"=>$cashFen));
        //echo "out_trade_no:".$out_trade_no;

        $subject = "会员".$uid."充值";

        $body = "JIUWEIHU".$out_trade_no;

        $show_url = "WIDshow_url";
//需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

//防钓鱼时间戳
        $anti_phishing_key = "";
//若要使用请调用类文件submit中的query_timestamp函数

//客户端的IP地址
        $exter_invoke_ip = "";
//非局域网的外网IP地址，如：221.0.0.1
        $alipay_config['partner']		= "2088011541482927";

//安全检验码，以数字和字母组成的32位字符
        $alipay_config['key']			= "javb9gt6k9kzuj1kfgv0exx4niqnyolu";

//支付类型
        $alipay_config['payment_type'] = "1";
//必填，不能修改
//服务器异步通知页面路径
        $alipay_config['notify_url'] = "http://localhost:8888/alipay_notify.html";
//需http://格式的完整路径，不能加?id=123这类自定义参数

//页面跳转同步通知页面路径
        $alipay_config['return_url'] = "http://127.0.0.1:8888/alipay_return.html";
//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

//系统公共的支付宝帐户
        $alipay_config['seller_email'] = "eadmarket@gmail.com";

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
        $html_text = $alipaySubmit->buildRequestForm($parameter,"post", "确认");
        echo $html_text;

    }

    public function alipayReturn() {
        //计算得出通知验证结果
        //$alipayNotify = new AlipayNotify($alipay_config);
        //$verify_result = $alipayNotify->verifyReturn();
        $verify_result = true;
        if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码

            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //商户订单号
            $out_trade_no = $this->spArgs('out_trade_no');

            //支付宝交易号
            $trade_no = $this->spArgs('trade_no');

            //交易金额，以元为单位，实际成交额以支付宝返回为准
            $total_fee = $this->spArgs('total_fee');

            $total_fee_fen = $total_fee * 100;
            //交易状态
            $trade_status = $this->spArgs('trade_status');


            if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
                $recharge = spClass("recharge");
                $result = $recharge->finish($out_trade_no,$total_fee_fen);
                //echo "result".$result;
            }
            else {
                //echo "trade_status=".$trade_status;
            }

            echo "验证成功<br />";

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            //如要调试，请看alipay_notify.php页面的verifyReturn函数
            echo "验证失败";
        }
    }

    public function alipayNotify() {
        //$alipayNotify = new AlipayNotify($alipay_config);
        //$verify_result = $alipayNotify->verifyNotify();
        $verify_result = true;
        if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代


            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

            //商户订单号
            $out_trade_no = $this->spArgs('out_trade_no');

            //支付宝交易号
            $trade_no =$this->spArgs('trade_no');

            //交易金额，以元为单位，实际成交额以支付宝返回为准
            $total_fee = $this->spArgs('total_fee');
            $total_fee_fen = $total_fee * 100;
            //交易状态
            $trade_status = $this->spArgs('trade_status');

            //echo "result".$out_trade_no;
            if($trade_status == 'TRADE_FINISHED') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //该种交易状态只在两种情况下出现
                //1、开通了普通即时到账，买家付款成功后。
                //2、开通了高级即时到账，从该笔交易成功时间算起，过了签约时的可退款时限（如：三个月以内可退款、一年以内可退款等）后。
                $recharge = spClass("recharge");
                $result = $recharge->finish($out_trade_no, $total_fee_fen);
                //echo "result".$result;
                //调试用，写文本函数记录程序运行情况是否正常
                logResult("finished one trade: ".$out_trade_no);
            }
            else if ($trade_status == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //该种交易状态只在一种情况下出现——开通了高级即时到账，买家付款成功后。
                $recharge = spClass("recharge");
                $result = $recharge->finish($out_trade_no, $total_fee_fen);
                //echo "result".$result;
                //调试用，写文本函数记录程序运行情况是否正常
                logResult("trade success, out_trade_no is: ".$out_trade_no );
            }

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            echo "success";		//请不要修改或删除

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "fail";

            //调试用，写文本函数记录程序运行情况是否正常
            logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
        }
    }

}