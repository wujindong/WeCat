<?php

require_once '../lib/QauthData.class.php';
$data=new QauthData("wxfb337c1106b89658", "36bdf6bf95ad608c82e613f0b186af24");
$aa=$data->OauthData();//获取openid等信息
$ss=$data->getUserBaseInfo($aa['openid'],$aa['access_token']);//网页授权获取用户基本信息
var_dump($ss);

