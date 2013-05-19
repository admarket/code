<?php
include(APP_PATH."/tpl/alipay/alipay.config.php");
require_once(APP_PATH."/tpl/alipay/lib/alipay_notify.class.php");
class calipay extends spController
{

    function alipayReturn() {
        //$this->display("recharge.php");
        echo "calipay@alipayReturn";
        $alipayNotify = new AlipayNotify($alipay_config);
    }

    function alipayNotify() {
        //$this->display("");
        echo "calipay@alipayNotify";
    }
}