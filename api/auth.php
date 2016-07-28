<?php
require_once("config.php");
require_once("db.php");

if(empty($_SESSION["openid"])) {
	if(isset($_GET['hmsr'])){
		$_SESSION["hmsr"] = (int)$_GET['hmsr'];
	}
	$uri = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
	header("location:".$uri);
}else{
	/*
	$openid = $_SESSION["openid"];
	$sql = "select userId from ".DB_PREFIX."users where openid='$openid'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		//echo 'has';
		$row = mysql_fetch_assoc($result);
		$userId = $row['userId'];
	}
	
	$_SESSION["userId"] = $userId;
	setcookie("userId", $userId, time()+COOKIE_EXPIRE, COOKIE_PATH);
	*/
}
?>