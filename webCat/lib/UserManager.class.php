<?php

require_once dirname(__FILE__) . "/WeiXinData.class.php";

class UserManager extends WeiXinData {

    public function __construct($appId, $appSecret) {
        parent::__construct($appId, $appSecret);
    }

    /**
     * 创建用户标签
     * @param type $data
     * @return type
     */
    public function setUserTag($data) {

        $url = "https://api.weixin.qq.com/cgi-bin/tags/create?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }

    /**
     * 获取公众号已创建的标签
     * @return type
     */
    public function queryUserTag() {
        $url = "https://api.weixin.qq.com/cgi-bin/tags/get?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url);
        return json_decode($result, TRUE);
    }

    /**
     * 编辑标签
     * @param type $data
     * @return type
     */
    public function updateUserTag($data) {
        $url = "https://api.weixin.qq.com/cgi-bin/tags/update?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }

    /**
     * 删除标签
     * @param type $data
     * @return type
     */
    public function deleteUserTag($data) {
        $url = "https://api.weixin.qq.com/cgi-bin/tags/delete?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }

    /**
     *  获取标签下粉丝列表
     * @param type $tagid 标签id
     * @param type $next_openid 第一个拉取的OPENID，不填默认从头开始拉取
     * @return type
     */
    public function getUserTagLists($tagid, $next_openid) {

        $data = array("tagid" => $tagid, "next_openid" => $next_openid ? $next_openid : "");
        $url = "https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }

    /**
     * 批量为用户打标签
     * @param type $tagid 标签id
     * @param type $dataArr opeid数组
     * @return type
     */
    public function setUserTags($tagid, $dataArr) {
        $data=array("tagid"=>$tagid,"openid_list"=>$dataArr);
        $url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }
    
    /**
     * 批量为用户取消标签
     * @param type $tagid 标签id
     * @param type $dataArr opeid数组
     * @return type
     */
    public function cancleUserTags($tagid, $dataArr){
        $data=array("tagid"=>$tagid,"openid_list"=>$dataArr);
        $url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchuntagging?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }
    
    
    /**
     *获取用户身上的标签列表 
     * @param type $openid
     * @return type
     */
    public function getUserTagsList($openid){
        $data=array("openid"=>$openid);
        $url = "https://api.weixin.qq.com/cgi-bin/tags/getidlist?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }
    
    /**
     * 设置用户备注名
     * @param type $openid
     * @param type $remark
     * @return type
     */
    public function setUserRemark($openid,$remark){
        $data=array("openid"=>$openid,"remark"=>$remark);
        $url = "https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=" . $this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }
    
    
    /**
     * 获取用户基本信息
     * @param type $openid
     * @return type
     */
    public function  getUserBaseInfo($openid){
        $url ="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->getAccessToken()."&openid=".$openid."&lang=zh_CN"; 
        $result = $this->https_request($url);
        return json_decode($result, TRUE);
    }
    
    /**
     * 获取用户列表
     * @param type $nextOpenId
     * @return type
     */
    public function  getUserBaseInfoLists($nextOpenId){
        $url ="https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->getAccessToken()."&next_openid=".$nextOpenId; 
        $result = $this->https_request($url);
        return json_decode($result, TRUE);
    }
    
    /**
     *  获取公众号的黑名单列表
     * @param type $begin_openid 当 begin_openid 为空时，默认从开头拉取。
     * @return type
     */
    public function getUserBackList($begin_openid){
        
        $data=array("begin_openid"=>$begin_openid);
        $url ="https://api.weixin.qq.com/cgi-bin/tags/members/getblacklist?access_token=".$this->getAccessToken();
        $result = $this->https_request($url, json_encode($data));
        return json_decode($result, TRUE);
    }

}
