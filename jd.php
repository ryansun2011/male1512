<?php

error_reporting(E_ALL);
ini_set('display_errors', true);


class aes {
	 
	private $_secret_key = 'ypxw7@f7}[6{mhld';
	 
	public function setKey($key) {
		$this->_secret_key = $key;
	}

	private function padData($data){
		return str_pad($data, strlen($data)+16-strlen($data)%16, "\0");
	}
	 
	public function encrypt($data){
		$data = $this->padData($data);
		return base64_encode(
			mcrypt_encrypt(
				MCRYPT_RIJNDAEL_128,
				$this->_secret_key,
				$data,
				MCRYPT_MODE_CBC,
				"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
			)
		);
	}

	public function decrypt($data){
		$decode = base64_decode($data);
		return mcrypt_decrypt(
				MCRYPT_RIJNDAEL_128,
				$this->_secret_key,
				$decode,
				MCRYPT_MODE_CBC,
				"\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"
			);
	}

	public function guid(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = chr(123)// "{"
					.substr($charid, 0, 8).$hyphen
					.substr($charid, 8, 4).$hyphen
					.substr($charid,12, 4).$hyphen
					.substr($charid,16, 4).$hyphen
					.substr($charid,20,12)
					.chr(125);// "}"
			return $uuid;
		}
	}
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
 
//1，成功领取  //0
//2，已经领过了  //7
//3，已经发完了 //6
//4，领取失败



if(!isset($_GET['ret'])){
	$biz = "feilipu0118";
	$key = "MS5030";
	$secret_key = "ypxw7@f7}[6{mhld";
	$time = time();
	$redirect = 'http://www.philips-campaign.com/male1512/jd.php';
	$pinlimitcnt = 1;

	$aes = new aes();
	$guid = trim($aes->guid(), '{}');
	$aes->setKey($secret_key);
	$str = $biz.'&'.$key.'&'.$time.'&'.$guid.'&'.$pinlimitcnt;
	$cert = urlencode($aes->encrypt($str)); 
	//echo $cert;
	$url = "http://wq.jd.com/activeapi/opensendcouponapi?biz=".$biz."&cert=".$cert."&returl=".$redirect;
	//echo httpGet($url);

	//echo file_get_contents($url);
	header("location:".$url);
}else{
	$callback = $_REQUEST['callback'];
	echo $callback.'({"result":1, "code":"'.$_GET['ret'].'"})';
}
?>
