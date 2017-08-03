<?php

require_once "../lib/ZTreeManager.class.php";
$jssdk = new ZTreeManager("wxfb337c1106b89658", "36bdf6bf95ad608c82e613f0b186af24");


$menus = <<<json
        {
     "button":[
     {	
        "name":"娱乐",
        "sub_button":[
            {
              "type":"click",
              "name":"今日歌曲",
              "key":"音乐"
            },
            {
              "type":"click",
              "name":"点击跳转",
              "key":"http://www.baidu.com"
            }
        ]
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"JSSDK测试",
               "url":"http://www.eshenghuo365.com/wxgzh/sample.php"
            },
           {	
               "type":"scancode_push",
               "name":"扫一扫",
               "key":"qrcode"
            },
           {	
               "type":"scancode_waitmsg",
               "name":"扫一扫(带提示)",
               "key":"waiting"
            },
          
            {
                 "type":"pic_sysphoto",
                 "name":"拍照",
                 "key":"拍照"   

             },
            {
               "type":"location_select",
               "name":"发送位置查天气",
               "key":"V1001_GOOD"
            }]
       }]
 }
json;

$callBackResult = $jssdk->create_ztree($menus);
var_dump($callBackResult);
