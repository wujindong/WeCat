<?php

require_once dirname(__FILE__) . "/WeiXinData.class.php";

class TempleteMessageManager extends WeiXinData {

    public function __construct($appId, $appSecret) {
        parent::__construct($appId, $appSecret);
    }

    /**
     * 发送模板消息
     * @param type $data
     * @return type
     */
    public function send_tmplete_message($data) {
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $this->getAccessToken();
        $res = $this->https_request($url, $data);
        return json_decode($res, TRUE);
    }

}
