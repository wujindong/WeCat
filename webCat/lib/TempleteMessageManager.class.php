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


    /**
     * 一次性订阅消息
     * @param $scene 场景值
     * @param $template_id 模板id
     * @param $redirect_url 回调地址
     * @param $reserved 自定义参数原样返回
     */
    public function  onlyTemplateMessage($scene,$template_id,$redirect_url,$reserved){
        $url="https://mp.weixin.qq.com/mp/subscribemsg?action=get_confirm&appid=".$this->appId."&scene=".$scene."&template_id=".$template_id.
            "&redirect_url=".$redirect_url."&reserved=".$reserved."#wechat_redirect";
        header("location:".$url);
    }

}
