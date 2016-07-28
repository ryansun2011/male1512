<?php
$appid = "wxfd827b849a70ad0b";
$appsecret = "2c46b45b5e9fde5fa52c0ad40769a69f";
$redirect = urlencode("http://www.philips-campaign.com/male1512/api/callback.php");

// 调试模式开关
define( 'DEBUG_MODE', false);
define( 'DEVELOP_MODE', false);

define( 'COOKIE_PATH', '/male1512/');
define( 'COOKIE_EXPIRE', 60*60*24*7);

define( 'DB_PREFIX', 'male1512_wx_');


if ( DEBUG_MODE ) {
    error_reporting(E_ALL);
    ini_set('display_errors', true);
	//$_COOKIE["userId"] = 1;
}else{
	ini_set('display_errors', false);
}

?>