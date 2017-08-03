<?php

require_once '../lib/UserManager.class.php';

$um=new UserManager("wxfb337c1106b89658", "36bdf6bf95ad608c82e613f0b186af24");

//$tag=array("tag"=>array("name"=>"江苏"));
//$callResult=$um->setUserTag($tag);//设置标签
//$callResult=$um->queryUserTag();//查询标签
//$tag=array("tag"=>array("id"=>"2","name"=>"江苏"));
//$callResult=$um->updateUserTag($tag);//修改标签
//$tag=array("tag"=>array("id"=>"100"));
//$callResult=$um->deleteUserTag($tag);//删除标签
$tag=array("tagid"=>"2","next_openid"=>"");
$callResult=$um->getUserTagLists("2",'');
var_dump($callResult);

