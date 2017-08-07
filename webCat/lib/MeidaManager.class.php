<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/7
 * Time: 9:31
 */
require_once dirname(__FILE__) . "/WeiXinData.class.php";
class MeidaManager extends WeiXinData
{


    /**
     * 多媒体文件下载
     * @param $accessToken
     * @param $media_id
     * @param $targetName
     */
    public  function  MediaDown($accessToken,$media_id,$targetName){
        $ch = curl_init("http://file.api.weixin.qq.com/cgi-bin/media/get?access_token={$accessToken}&media_id={$media_id}");
        $fp = fopen($targetName, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
}