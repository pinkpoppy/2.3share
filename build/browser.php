<?php
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
$ua = $_SERVER['HTTP_USER_AGENT'];
$inwx = preg_match('/MicroMessenger/', $ua);
echo $inwx;
// $browser = get_browser(null, true);
// print_r($browser);


$queryString = urldecode($_SERVER['QUERY_STRING']);
echo $queryString;
$arr = str_slice($queryString);

// function getQueryObj($queryString){
//   $arr = [];
//   for ($i = 0,$l = $queryString.length; $i < $l; $i++) {
//     if ($queryString[$i] == '&')
//   }
// }
// function getBrowser(){
//   //判断是否在微信浏览器中
//   return preg_match('/MicroMessenger/', $_SERVER['HTTP_USER_AGENT']);
// }

// function getSearchString(){
//   $queryString = urldecode($_SERVER['QUERY_STRING']);
// }
?>