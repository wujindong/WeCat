<?php
/**
 * Created by PhpStorm.
 * User: jd
 * Date: 2016/9/30
 * Time: 16:32
 */

$accessToken =$_POST['accesstoken'];
$media_id =$_POST['serverId'];
$tag=$_POST['tag'];

// 要存在你服务器哪个位置？
$ROOT = substr(str_replace("\\","/", dirname(__FILE__)), strlen($_SERVER['DOCUMENT_ROOT']));

if($tag=="img"){
    $targetName ="../tmp/".date('YmdHis').".jpg";
}else if($tag=="voice"){
   $targetName ="../tmp/".date('YmdHis').".wav"; 
}

$ch = curl_init("http://file.api.weixin.qq.com/cgi-bin/media/get?access_token={$accessToken}&media_id={$media_id}");
//echo  $ch;
$fp = fopen($targetName, 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);