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
    createMask()
    var mask = document.querySelector('#mask')
    var popTips = document.querySelector('#test')
    if (!mask.style.opacity && !popTips.style.opacity) {
      mask.style.opacity = 0;
      popTips.style.opacity = 0;
    }
    var maskInterval = setInterval(function(){
      var preOpacity = Number(mask.style.opacity)
      mask.style.opacity = preOpacity + 0.02
      if (mask.style.opacity >=0.5) {
        clearInterval(maskInterval)
      }
    },50)

    var popTipsInterval = setInterval(function(){
      var preOpacity = Number(popTips.style.opacity)
      popTips.style.opacity = preOpacity + 0.02
      if (popTips.style.opacity >=1) {
        clearInterval(popTipsInterval)
      }
    },50)
  }
  function createMask(parent){
    var rules = "两个穿着西服、衬衫的男子，每人手里拿着一把20厘米左右的匕首，其中一个十八九岁的男子，身高约1.7米，肩膀很厚实，身上沾了不少血。后来，冷婧才知道，这名男子在打斗过程中，被公公咬断了右手中指。另一个男子，坐在进门的沙发椅上。冷婧一眼认出了他——一家连锁房产中介的业务员钟杰。这个颧骨很高、很瘦的男子，30多岁，眼睛有些凹陷，给人一种很凶相的感觉。冷婧家的房子曾通过他挂牌出售，他也曾带冷婧夫妇看过三四套房子。"
    var maskHeight = Number(parent.style.clientHeight)
    var mask = document.createElement('div')

    var maskId = document.createAttribute('id')
    maskId.value = mask
    mask.setAttributeNode(maskId)
    var maskStyle = document.createAttribute('style')
    maskStyle.value = 'style',"'opacity:0;height:"+ maskHeight + ";'"
    mask.setAttributeNode(maskStyle)
    parent.appendChild(mask)


    var popTips = document.createElement('div')

    var popId = document.createAttribute('id')
    popId.value = 'test'
    popTips.setAttributeNode(popId)

    var popStyle = document.createAttribute('style')
    popStyle.value = 'opacity:0;'
    popTips.setAttributeNode(popStyle)
    popTips.innerHtml = rules
    mask.appendChild(popTips)
  }

  window.onload = function(){
    var button = document.querySelector('#get')
    button.addEventListener('click',myFadeIn)
  }
  </script>
</body>
</html>