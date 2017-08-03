<?php

require_once "../lib/TempleteMessageManager.class.php";
$jssdk = new TempleteMessageManager("wxfb337c1106b89658", "36bdf6bf95ad608c82e613f0b186af24");

//组装模板消息
$templete = array(
    "touser" => "okPTRs0ewUhSvPa_0ajU0p7mPaoE",
    "template_id" => "PpAsY7Kq7OU6rm-V1GrDhZWexrFetJOdpDAwwDpO658",
    "url" => "http://www.baidu.com",
    "data" => array(
        "first" => array("value" => "您好,欢迎使用自动售货机购物。"),
        "product" => array("value" => "可口可乐", "color" => "#173177"),
        "price" => array("value" => "4", "color" => "#173177"),
        "time" => array("value" => date("Y年m月d日")),
        "remark" => array("value" => "祝您购物愉快！")
    )
);
//发送模板消息
$jssdk->send_tmplete_message(urldecode(json_encode($templete)));

