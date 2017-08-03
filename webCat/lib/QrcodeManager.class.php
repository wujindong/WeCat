<?php

require_once dirname(__FILE__) . "/WeiXinData.class.php";

class QrcodeManager extends WeiXinData {

    public function __construct($appId, $appSecret) {
        parent::__construct($appId, $appSecret);
    }

    /**
     * 创建二维码ticket
     * @param type $expire_seconds
     * @param type $num
     * @param type $scene_str
     * @return type
     */
    private function getTicket($expire_seconds, $num, $scene_str) {
        $action_name = null;
        switch ($num) {
            case 1:
                $action_name = "QR_STR_SCENE";
                break;
            case 2:
                $action_name = "QR_LIMIT_STR_SCENE";
                break;
        }
        $data = array(
            "expire_seconds" => $expire_seconds,
            "action_name" => $action_name,
            "action_info" => array("scene" => array("scene_str" => $scene_str))
        );
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=" . $this->getAccessToken();

        $result = $this->https_request($url, json_encode($data));

        return json_decode($result, TRUE);
    }

    /**
     * 直接显示或下载二维码
     * @param type $expire_seconds
     * @param type $num 1:临时二维码，2：永久二维码
     * @param type $scene_str
     * @param type $down boolen true 下载二维码 false 获取二维码连接自行生成二维码
     * @return type
     */
    public function getQrcode($expire_seconds, $num, $scene_str, $down) {
        $data = $this->getTicket($expire_seconds, $num, $scene_str);
        if ($down) {
            $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . urlencode($data['ticket']);
            $result = $this->https_request($url);
        } else {
            $result = $data['url'];
        }
        return $result;
    }
    
    /**
     * 长链接转短链接接口
     * @param type $urlAddress
     * @return type
     */
    public function createShortUrl($urlAddress){
        $data=array(
            "action"=>"long2short",
            "long_url"=>$urlAddress
        );
        $url="https://api.weixin.qq.com/cgi-bin/shorturl?access_token=".$this->getAccessToken();
        $result=$this->https_request($url, json_encode($data));
        $callBackData=json_decode($result,TRUE);
        if($callBackData['errmsg']=='ok'){
            return $callBackData['short_url'];
        }else{
            return $callBackData['errmsg'];
        }
    }
    
    
    

}
