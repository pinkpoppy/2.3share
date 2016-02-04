<?php
  //require_once('auth.php');
  //在这里可以打出$userInfo
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>拍卖得好酒,优惠常常有</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=-1.0,user-scalable=no">
  <link rel="stylesheet" href="main.min.css"/>
  <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
  <script class="infotextkey" href="http://www.jbxue.com/jb/js/"></script>
  <script src="main.min.js"></script>
  <script type="text/javascript">
    wx.config({
      debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
      appId: '<?php echo $signPackage["appId"];?>', // 必填，公众号的唯一标识
      timestamp:  <?php echo $signPackage["timestamp"];?>, // 必填，生成签名的时间戳
      nonceStr: '<?php echo $signPackage["nonceStr"];?>', // 必填，生成签名的随机串
      signature: '<?php echo $signPackage["signature"];?>',// 必填，签名，见附录1
      jsApiList: [
        // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'onMenuShareQZone',
        'menuItem:profile'
      ] 
    });
    var title = "大圣邀你喝美酒,拍酒胜似花果山"
    var link = "http://www.pai9.com.cn/singlePage/cj/page/ac.php"
    var imgUrl = "http://www.pai9.com.cn/singlePage/cj/head.jpg"
    var desc = "拍酒恭祝新春快乐"
    wx.ready(function(){
      wx.onMenuShareTimeline({
        title: title, // 分享标题
        link: link, // 分享链接
        imgUrl: imgUrl, // 分享图标
        success: function () { 
            // 用户确认分享后执行的回调函数
          },
          cancel: function () { 
            // 用户取消分享后执行的回调函数
          }
      });

      wx.onMenuShareAppMessage({
        title: title, // 分享标题
        desc: desc, // 分享描述
        link: link, // 分享链接
        imgUrl: imgUrl, // 分享图标
        success: function () { 
            // 用户确认分享后执行的回调函数
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
        }
      });
    })
    wx.error(function(res){
    })
  </script>
  <script src="js/auction.min.js"></script>
</head>
<body>
  <div class="wrap">
    <section class="header">
      <img src="resources/banner.png">
      <div class="host-wrap flex-container">
        <img src="resources/banner.png">
        <div class="host-say flex-container">
          <span>我是名字名字</span>
          <img src="resources/target.png">
        </div>
      </div>   
    </section>
    <section class="win">
      <section class="button-wrap">
        <button class="button" id="get">立即领取</button>
        <button class="button" id="click">参与<br>多宝</button>
      </section>
      <section class="result-wrap">
        <span class="line"></span>
      </section>
    </section>
  </div>
</body>
</html>