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
      <div class="reward-bottom">
        <div class="headline two-line">
          沃悦科酒庄-第一夫人红葡萄酒750ml2013*2瓶一共显示
        </div>
        <div class="progress-wrap">
          <progress max="100" value="80"></progress>
          <span>还剩100人次</span>
        </div>
        <div>总需3000人次</div>
      </div>
    </section>
  </div>

  <script type="text/javascript">
  function myFadeIn(){
    var parent = document.querySelector('body')
    createMask(parent)
    var mask = document.querySelector('#mask')
    var popTips = document.querySelector('#test')

    if (!mask.style.opacity && !popTips.style.opacity) {
      mask.style.opacity = 0;
      popTips.style.opacity = 0;
    }
    var maskInterval = setInterval(function(){
      var preOpacity = Number(mask.style.opacity)
      mask.style.opacity = preOpacity + 0.06
      if (mask.style.opacity >=0.8) {
        clearInterval(maskInterval)
      }
    },25)

    var popTipsInterval = setInterval(function(){
      var preOpacity = Number(popTips.style.opacity)
      popTips.style.opacity = preOpacity + 0.04
      if (popTips.style.opacity >=1) {
        clearInterval(popTipsInterval)
      }
    },50)
  }

  function rotateDelete(){
    var target = document.querySelector('#mask')
    // var rotateInterval = setInterval(function(){

    // },25)
    var classString = target.className
    var newClass = classString.concat("delete-rotate" + " effect")
    var timeoutID = window.setTimeout(function(){
      target.parentNode.removeChild(target)
    },0)
    target.className = newClass
  }

  function createMask(parent){
    var rules = "<div class='tips-des'>领取优惠码后点击参与夺宝进入拍酒App，在夺宝商品结算时使用可抵扣相应金额.</div>" +"<div class='title'>拍酒夺宝说明</div>"
       +"<ol>"
        +"<li><strong>1. </strong>在拍酒App—发现—夺宝选择自己喜欢的商品，点击立即参与即可提交夺宝订单。</li>"
        +"<li><strong>2. </strong>每支付一元，您获得一次该商品的夺宝机会（系统会为您随机分配一个夺宝号）</li>"
        +"<li>3.参与夺宝后可给朋友分享优惠码，在夺宝商品右上角点击分享。</li>"
        +"<li>4.同时您可以在我的 ->  我的夺宝 -> 我的记录中查看参与记录、中奖结果，中奖后系统会生成待发货订单，补充收货地址后发货。</li>"
        +"<br>"
        +"<header class='title'>如何产生中奖者：</header>"
        +"<p class='li'>幸运号=［（截至该商品开奖时间点倒数50个时间点之和+最近下一期中国福利彩票“老时时彩”的开奖结果) ÷ 商品所需人次］取余数 + 10000001 ，持有该幸运号者中奖，获得该商品。</p>"
        +"<div class='statement'>拍酒保证公平，公正，公开的原则，所有开奖过程严格按照计算公式进行，无人工干预。</div>"
       +"</ol>"
    var maskHeight = Number(parent.offsetHeight)
    var mask = document.createElement('div')

    var maskId = document.createAttribute('id')
    maskId.value = 'mask'
    mask.setAttributeNode(maskId)
    mask.style.opacity = 0
    console.log(maskHeight)
    mask.offsetHeight = maskHeight
    parent.appendChild(mask)


    var popTips = document.createElement('div')

    var popId = document.createAttribute('id')
    popId.value = 'test'
    popTips.setAttributeNode(popId)
    popTips.style.opacity = 0
    popTips.innerHTML = rules
    mask.appendChild(popTips)

    //创建关闭按钮
    var closeWrap = document.createElement('div')
    closeWrap.setAttribute('class','close-wrap')

    var close = document.createElement('div')
    close.innerHTML = 'X'
    var closeId = document.createAttribute('id')
    closeId.value = 'close'
    close.setAttributeNode(closeId)
    close.addEventListener('click',rotateDelete)
    closeWrap.appendChild(close)
    mask.appendChild(closeWrap)
  }

  window.onload = function(){
    var button = document.querySelector('#get')
    button.addEventListener('click',myFadeIn)    
  }
  </script>
</body>
</html>