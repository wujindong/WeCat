<?php

require_once dirname(__FILE__) . "/WeiXinData.class.php";

class ZTreeManager extends WeiXinData{
    
    
  public function __construct($appId, $appSecret) {
        parent::__construct($appId, $appSecret);
    }
    /**
     * 创建自定义菜单
     * @param type $data
     * @return type
     */
    public function create_ztree($data) {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, $data);
        return json_decode($result, TRUE);
    }

    /**
     * 自定义菜单查询
     * @return type
     */
    public function query_ztree() {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url);
        return json_decode($result, TRUE);
    }

    /**
     * 删除自定义菜单
     * @return type
     */
    public function delete_ztree() {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url);
        return json_decode($result, TRUE);
    }
}
