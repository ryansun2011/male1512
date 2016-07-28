<?php
session_start();
require_once("config.php");
require_once("db.php");

$code = isset($_GET["code"]) ? $_GET["code"] : "";
if(!empty($code)) {
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$code."&grant_type=authorization_code";
	$res = json_decode(httpGet($url));
	$access_token = $res->access_token;
	$refresh_token = $res->refresh_token;
	$openid = $res->openid;
	$api = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
	$userinfo = json_decode(httpGet($api));
	saveToDB($userinfo);
	saveToLocal($userinfo);
	//header("location:http://www.philips-campaign.com/male1512/page6.php?myId=2");
	header("location:http://www.philips-campaign.com".$_SESSION["referer"]);
}
function saveToLocal($user) {
	$_SESSION["openid"] = $user->openid;
	$_SESSION["headimgurl"] = urlencode($user->headimgurl);

	//setcookie("openid",$user->openid, time()+COOKIE_EXPIRE,COOKIE_PATH);
	//setcookie("openid10",$user->openid, time()+COOKIE_EXPIRE,COOKIE_PATH);
	//setcookie("nickname",$user->nickname, time()+COOKIE_EXPIRE,COOKIE_PATH);
	//setcookie("sex",$user->sex, time()+COOKIE_EXPIRE,COOKIE_PATH);
	//setcookie("headimgurl",urlencode($user->headimgurl), time()+COOKIE_EXPIRE,COOKIE_PATH);
}
function saveToDB($user) {
	$openid = $user->openid;
	$nickname = urlencode($user->nickname);
	$sex = $user->sex;
	$headimgurl = $user->headimgurl;
	$sql = "select userId from ".DB_PREFIX."users where openid='$openid'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		//echo 'has';
		$row = mysql_fetch_assoc($result);
		$userId = $row['userId'];
	}else {
		//echo 'not has';
		if(isset($_SESSION["hmsr"])){
			$hmsr = $_SESSION["hmsr"];
		}else{
			$hmsr=0;
		}
		$sql = "insert into ".DB_PREFIX."users(openid,nickname,sex,headimgurl,hmsr) values('$openid','$nickname','$sex','$headimgurl',$hmsr)";
		$result = mysql_query($sql);
		$userId = mysql_insert_id();
	}
	
	$_SESSION["userId"] = $userId;
	//setcookie("userId", $userId, time()+COOKIE_EXPIRE, COOKIE_PATH);

/*
	echo $userId.'<br>';
	echo $openid.'<br>';
	echo $_COOKIE['openid'].'<br>';
	echo $_COOKIE['userId'].'<br>';
	exit;
	*/

}
function httpGet($url) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_TIMEOUT, 500);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_URL, $url);
	$res = curl_exec($curl);
	curl_close($curl);
	return $res;
}


?>