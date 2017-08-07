<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/7
 * Time: 9:45
 */

require  "../lib/MeidaManager.class.php";

$down= new MeidaManager();

$accessToken =$_POST['accesstoken'];
$media_id =$_POST['serverId'];
$tag=$_POST['tag'];

// 要存在你服务器哪个位置？
$ROOT = substr(str_replace("\\","/", dirname(__FILE__)), strlen($_SERVER['DOCUMENT_ROOT']));

if($tag=="img"){
    $targetName ="../../tmp/".date('YmdHis').".jpg";
}else if($tag=="voice"){
    $targetName ="../../tmp/".date('YmdHis').".wav";
}
$down->MediaDown($accessToken,$media_id,$targetName);
