<?php
require_once "./php/jssdk.php";
$jssdk = new JSSDK("wxfb337c1106b89658", "36bdf6bf95ad608c82e613f0b186af24");
$signPackage = $jssdk->GetSignPackage();
$access_token = $jssdk->getAccessToken();
//echo $access_token;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>微信JSSDK测试Demo</title>
        <link rel="stylesheet" href="node_modules/weui/dist/style/weui.min.css">
        <style>
            body{
                padding: 1rem;
            }
            img{
                width:100%;
            }
            .weui-btn{margin-bottom: .3rem}

        </style>
    </head>
    <body>

        <a href="#" id="pic" class="weui-btn weui-btn_primary">选择照片</a>
        <img src="" alt="" id="img1" class="img-thumbnail">
        <a href="" class="weui-btn weui-btn_warn" id="get_location">获取地理位置</a>

        <a href="" class="weui-btn weui-btn_primary" id="network">获取网络状态</a>
        <fieldset style="padding:10px!important;">
            <legend>界面操作</legend>
            <a href="#" class="weui-btn weui-btn_plain-primary" id="hideWindow">隐藏右上角菜单接口</a>
            <a href="#" class="weui-btn weui-btn_plain-primary" id="openWindow">显示右上角菜单接口</a>
            <a href="#" class="weui-btn weui-btn_plain-primary" id="closeWindow">关闭当前网页窗口接口</a>
            <a href="#" class="weui-btn weui-btn_plain-default" id="showAll">批量显示功能按钮接口</a>
            <a href="#" class="weui-btn weui-btn_plain-primary" id="hideAll">批量隐藏功能按钮接口</a>
            <a href="#" class="weui-btn weui-btn_plain-primary" id="hideAllNoBasePort">隐藏所有非基础按钮接口</a>
            <a href="#" class="weui-btn weui-btn_plain-primary" id="showAllPort">显示所有功能按钮接口</a>
        </fieldset>
        <fieldset style="padding:10px!important">
            <legend>音频接口</legend>
            <a href="javascript:;" class="weui-btn weui-btn_warn" id="startRecord">开始录音接口</a>
            <a href="javascript:;" class="weui-btn weui-btn_warn" id="stopRecord">停止录音接口</a>
            <a href="javascript:;" class="weui-btn weui-btn_warn" id="playVoice">播放语音接口</a>
            <a href="javascript:;" class="weui-btn weui-btn_warn" id="pauseVoice">暂停播放接口</a>
            <a href="javascript:;" class="weui-btn weui-btn_warn" id="stopVoice">停止播放接口</a>
            <a href="javascript:;" class="weui-btn weui-btn_warn" id="uploadVoice">上传语音接口</a>
            <!--<a href="javascript:;" class="weui-btn weui-btn_warn" id="translateVoice">识别音频并返回识别结果接口</a>-->
        </fieldset>
        <a href="#" class="weui-btn weui-btn_primary" id="qrcode">调起微信扫一扫接口</a>
    </body>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="./js/jquery-2.1.4.js"></script>
    <script>
        /*
         * 注意：
         * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
         * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
         * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
         *
         * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
         * 邮箱地址：weixin-open@qq.com
         * 邮件主题：【微信JS-SDK反馈】具体问题
         * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
         */
        wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"]; ?>',
            timestamp: <?php echo $signPackage["timestamp"]; ?>,
            nonceStr: '<?php echo $signPackage["nonceStr"]; ?>',
            signature: '<?php echo $signPackage["signature"]; ?>',
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'onMenuShareQZone',
                'chooseImage',
                'uploadImage',
                'downloadImage',
                'getLocation',
                'openLocation',
                'getNetworkType',
                'showMenuItems',
                'hideMenuItems',
                'scanQRCode',
                'startRecord',
                'stopRecord',
                'onVoiceRecordEnd',
                'playVoice',
                'pauseVoice',
                'stopVoice',
                'onVoicePlayEnd',
                'uploadVoice',
                'downloadVoice'
                        // 所有要调用的 API 都要加到这个列表中
            ],
            success: function (res) {
                console.log(res);
                // 以键值对的形式返回，可用的api值true，不可用为false
                // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
            }

        });
        wx.ready(function () {
            wx.checkJsApi({
                jsApiList: ['chooseImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
                success: function (res) {

                    console.log(res);
                    // 以键值对的形式返回，可用的api值true，不可用为false
                    // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
                }
            });


            // 分享到朋友圈
            wx.onMenuShareTimeline({
                title: '百度', // 分享标题
                link: 'http://www.baidu.com', // 分享链接
                imgUrl: 'http://www.eshenghuo365.com/wxgzh/a.jpg', // 分享图标
                success: function () {
                    console.log("分享成功");
                },
                cancel: function () {
                    console.log("取消分享");
                }
            });

            // 分享给朋友
            wx.onMenuShareAppMessage({
                title: '国庆节', // 分享标题
                desc: '今天是2016年国庆节的前一天', // 分享描述
                link: 'http://www.eshenghuo365.com', // 分享链接
                imgUrl: 'http://www.eshenghuo365.com/wxgzh/a.jpg', // 分享图标
                type: 'link', // 分享类型,music、video或link，不填默认为link
                dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                success: function () {
                    console.log("分享给朋友成功");
                },
                cancel: function () {
                    console.log("分享取消了");
                }
            });

            //分享到QQ
            wx.onMenuShareQQ({
                title: '我的QQ好友', // 分享标题
                desc: '这是我从微信分享给你的消息', // 分享描述
                link: 'http://www.baidu.com', // 分享链接
                imgUrl: 'http://www.eshenghuo365.com/wxgzh/a.jpg', // 分享图标
                success: function () {
                    console.log("分享给QQ好友成功");
                },
                cancel: function () {
                    console.log("分享取消了");
                }
            });

            //分享到腾讯微博
            wx.onMenuShareWeibo({
                title: '分享到腾讯微博的消息', // 分享标题
                desc: '这是分享到腾讯微博的消息', // 分享描述
                link: 'http://www.baidu.com', // 分享链接
                imgUrl: 'http://www.eshenghuo365.com/wxgzh/a.jpg', // 分享图标
                success: function () {
                    console.log("分享到腾讯微博成功");
                },
                cancel: function () {
                    console.log("分享取消了");
                }
            });

            //分享到QQ空间
            wx.onMenuShareQZone({
                title: '分享到QQ空间的消息', // 分享标题
                desc: '分享到QQ空间的消息', // 分享描述
                link: 'http://www.baidu.com', // 分享链接
                imgUrl: 'http://www.eshenghuo365.com/wxgzh/a.jpg', // 分享图标
                success: function () {
                    console.log("分享到QQ空间成功");
                },
                cancel: function () {
                    console.log("分享取消了");
                }
            });



            //拍照或选择图片

            document.querySelector("#pic").onclick = function () {

                wx.chooseImage({//选择图片
                    count: 1, // 默认9
                    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                    success: function (res) {
                        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                        document.querySelector("#img1").setAttribute("src", localIds);
                        wx.uploadImage({//上传图片
                            localId: localIds.toString(), // 需要上传的图片的本地ID，由chooseImage接口获得
                            isShowProgressTips: 1, // 默认为1，显示进度提示
                            success: function (res) {
                                var serverId = res.serverId; // 返回图片的服务器端ID

                                $.post(
                                        "./php/downfile.php",
                                        {"accesstoken": "<?php echo $access_token ?>", "serverId": serverId, "tag": "img"},
                                        function (data) {
//                                          上传图片到自己服务器
//                                            wx.downloadImage({//下载图片，一般不需要
//                                                serverId: serverId, // 需要下载的图片的服务器端ID，由uploadImage接口获得
//                                                isShowProgressTips: 1, // 默认为1，显示进度提示
//                                                success: function (res) {
//                                                    var localId = res.localId; // 返回图片下载后的本地ID
//                                                }
//                                            });
                                        }
                                );


                            },
                            fail: function (res) {
                                alert("上传失败" + res.errMsg);
                            }
                        });

                    }
                });
            };

            // 获取地理位置
            document.querySelector("#get_location").onclick = function () {

                wx.getLocation({
                    type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
                    success: function (res) {
                        var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                        //这里调用了高德地图的api    
                        var key = "cb31c2279151228628a87065667b7bb6",locationd = longitude + "," + latitude;
                        var url = "http://restapi.amap.com/v3/geocode/regeo?output=JSON&location=" + locationd + "&key=cb31c2279151228628a87065667b7bb6&radius=1000&extensions=all";
                        $.get(url, function (data) {
//                            alert(data.regeocode.name);
                            //使用微信内置地图查看位置接口
                            wx.openLocation({
                                latitude: latitude, // 纬度，浮点数，范围为90 ~ -90
                                longitude: longitude, // 经度，浮点数，范围为180 ~ -180。
                                name: '', // 位置名
                                address: data.regeocode.formatted_address, // 地址详情说明
                                scale: 17, // 地图缩放级别,整形值,范围从1~28。默认为最大
                                infoUrl: 'http://www.baidu.com' // 在查看位置界面底部显示的超链接,可点击跳转
                            });
                        });

                    }
                });
            };



            // 获取网络状态

            document.querySelector("#network").onclick = function () {
                wx.getNetworkType({
                    success: function (res) {
                        var networkType = res.networkType; // 返回网络类型2g，3g，4g，wifi
                        alert(networkType);
                    }
                });
            };



            //隐藏右上角菜单接口

            document.querySelector("#hideWindow").onclick = function () {
                wx.hideOptionMenu();
            };

            //显示右上角菜单接口
            document.querySelector("#openWindow").onclick = function () {
                wx.showOptionMenu();
            };


            // 关闭当前网页窗口接口
            document.querySelector("#closeWindow").onclick = function () {
                wx.closeWindow();
            };


            // 批量显示功能按钮接口
            document.querySelector("#showAll").onclick = function () {
                wx.showMenuItems({
                    menuList: [
                        'refresh',
                        'dayMode',
                        'nightMode'
                    ] // 要显示的菜单项，所有menu项见附录3
                });
            };


            // 批量显示功能按钮接口
            document.querySelector("#hideAll").onclick = function () {
                wx.hideMenuItems({
                    menuList: [
                        'appMessage',
                        'share:timeline',
                        'share:qq'
                    ] // 要显示的菜单项，所有menu项见附录3
                });
            };

            //隐藏所有非基础按钮接口
            document.querySelector("#hideAllNoBasePort").onclick = function () {
                wx.hideAllNonBaseMenuItem();
            };

            //显示所有功能按钮接口
            document.querySelector("#showAllPort").onclick = function () {
                wx.showAllNonBaseMenuItem();
            };

            //调起微信扫一扫接口

            document.querySelector("#qrcode").onclick = function () {
                wx.scanQRCode({
                    needResult: 1, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
                    scanType: ["qrCode", "barCode"], // 可以指定扫二维码还是一维码，默认二者都有
                    success: function (res) {
                        var result = res.resultStr; // 当needResult 为 1 时，扫码返回的结果
                        alert(result);
                    }
                });
            };


            //开始录音
            document.querySelector("#startRecord").onclick = function () {
                wx.startRecord();
            };

            //停止录音
            document.querySelector("#stopRecord").onclick = function () {
                wx.stopRecord({
                    success: function (res) {
                        var localId = res.localId;
                        document.querySelector("#playVoice").onclick = function () {
                            //播放录音
                            wx.playVoice({
                                localId: localId // 需要播放的音频的本地ID，由stopRecord接口获得
                            });
                        };
                        document.querySelector("#pauseVoice").onclick = function () {
                            //暂停录音
                            wx.pauseVoice({
                                localId: localId // 需要播放的音频的本地ID，由stopRecord接口获得
                            });
                        };
                        document.querySelector("#stopVoice").onclick = function () {
                            //停止录音
                            wx.stopVoice({
                                localId: localId // 需要播放的音频的本地ID，由stopRecord接口获得
                            });
                        };

                        document.querySelector("#uploadVoice").onclick = function () {
                            //上传录音
                            wx.uploadVoice({
                                localId: localId, // 需要上传的音频的本地ID，由stopRecord接口获得
                                isShowProgressTips: 1, // 默认为1，显示进度提示
                                success: function (res) {
                                    var serverId = res.serverId; // 返回音频的服务器端ID

                                    $.post(
                                            "./php/downfile.php",
                                            {"accesstoken": "<?php echo $access_token ?>", "serverId": serverId, 'tag': "voice"},
                                            function (data) {
//                                           上传音频文件到自己服务器
                                            }
                                    );

                                    //下载录音通常情况下不需要
//                                    wx.downloadVoice({
//                                        serverId: serverId, // 需要下载的音频的服务器端ID，由uploadVoice接口获得
//                                        isShowProgressTips: 1, // 默认为1，显示进度提示
//                                        success: function (res) {
//                                            var localId = res.localId; // 返回音频的本地ID
//                                            document.querySelector("#translateVoice").onclick = function () {
//                                                //识别语音
//                                                wx.translateVoice({
//                                                    localId: localId, // 需要识别的音频的本地Id，由录音相关接口获得
//                                                    isShowProgressTips: 1, // 默认为1，显示进度提示
//                                                    success: function (res) {
//                                                        alert(res.translateResult); // 语音识别的结果
//                                                    }
//                                                });
//                                            };
//                                        }
//                                    });
                                }
                            });
                        };


//                        alert(localId);
                    }
                });
            };

            //监听语音播放完毕

            wx.onVoicePlayEnd({
                success: function (res) {
                    var localId = res.localId; // 返回音频的本地ID
                    alert(localId + ":录音播放完毕");
                }
            });


            //监听录音自动停止接口
            wx.onVoiceRecordEnd({
                // 录音时间超过一分钟没有停止的时候会执行 complete 回调
                complete: function (res) {
                    var localId = res.localId;
                    alert(localId + "已录音一分钟");
                    //播放录音
                    wx.playVoice({
                        localId: localId // 需要播放的音频的本地ID，由stopRecord接口获得
                    });

                    //可以进行其他的操作
                }
            });



























            //////////////////////////////////////
        });

    </script>
</html>
