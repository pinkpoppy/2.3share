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
        <button class="button" id="get">立即领取<br style="line-height:0px;"><span style="line-height:0;font-size:0px;">x<span></button>
        <button class="button" id="click">参与<br>多宝</button>
      </section>
      <section class="result-wrap">
        <span class="line"></span>
      </section>
    </section>
    <section class="winner-wrap">
      <header>4人已领取,还剩10份</header>
      <div class="winner-avatar-wrap">
        <img src="resources/banner.png" class="avatar">
        <img src="resources/banner.png" class="avatar">
        <img src="resources/banner.png" class="avatar">
        <img src="resources/banner.png" class="avatar">
        <img src="resources/banner.png" class="avatar">
        <img src="resources/banner.png" class="avatar">
        <img src="resources/banner.png" class="avatar">
        <img src="resources/banner.png" class="avatar">
      </div>
    </section>
    <section class="reward-wine-wrap">
      <img src="resources/banner.png">
    </section>
  </div>
</body>
</html>