<?php
  
  $queryString = getSearchString();

  $APPID = "wxeb681a427246a6c2";
  $SECRET = "df8799df884e21bb80e284975e7d4b5e";
  $REDIRECT_URI = "http://t.snapwine.net:7784/v2_3share/auction.php".$queryString;
  $SCOPE = "snsapi_userinfo";
  $STATE = "zhushasha";

  $code='';

  //第一步要打开的页面
  $autUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$APPID."&redirect_uri=".urlencode($REDIRECT_URI)."&response_type=code&scope=".$SCOPE."&state=".$STATE."#wechat_redirect";
  $openId = "";
  $userInfo = "";
  if (isset($_GET['code'])) {
      $code=$_GET['code'];
      $getTokenUrl = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$APPID."&secret=".$SECRET."&code=".$code."&grant_type=authorization_code";
      $content=file_get_contents($getTokenUrl);
      $arr=json_decode($content,true);
      $accessToken = $arr['access_token'];
      $openId = $arr['openid'];
      if ($openId) {
        $getOtherInfoUrl = "https://api.weixin.qq.com/sns/userinfo?access_token=".$accessToken."&openid=".$openId."&lang=zh_CN";
        $userInfo = file_get_contents($getOtherInfoUrl);
      }
  }
  else {
     header("location:" . $autUrl);
  }

  function getSearchString(){
    $queryString = urldecode($_SERVER['QUERY_STRING']);
    return $queryString;
  }
?>