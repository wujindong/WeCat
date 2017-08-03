<?php

require_once '../lib/QrcodeManager.class.php';
$qrCode=new QrcodeManager("wxfb337c1106b89658", "36bdf6bf95ad608c82e613f0b186af24");
$callBackResult=$qrCode->getQrcode("", 2, '112414111',TRUE);
file_put_contents("a.png",$callBackResult,FILE_APPEND|LOCK_EX);//保存图片
$qrcodUrl=$qrCode->getQrcode("", 2, '112414111',FALSE);//返回二维码地址自行生成二维码

$shortUrl=$qrCode->createShortUrl("http://www.baidu.com");//长连接转短连接
var_dump($shortUrl);



