<?php

//error_reporting(E_ALL);
//ini_set('display_errors', true);

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

if(!isset($_GET['phase'])){
	$_SESSION['phase'] = $_GET['phase'];
}


if(!isset($_GET['ret'])){
	$biz = "feilipu0301";  
	$key = "philips5030";  //第一波  MS5030        第二波  philips5030
	$secret_key = "imfcjdk_14#}5efv";
	$time = time();
	$redirect = 'http://www.philips-campaign.com/male1512/jiangjuan1.php';
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
	//$callback = $_REQUEST['callback'];
	//echo $callback.'({"result":1, "code":"'.$_GET['ret'].'"})';
	$ret = $_GET['ret'];
}

if(!isset($_SESSION['phase'])){
	$phase = $_SESSION['phase'];
}else{
	$phase = 'award';
}
/*
if(isset($_GET['ret'])){
	$ret = $_GET['ret'];
}else{
	$ret = -1;
}
*/
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="target-densitydpi=device-dpi,width=640, user-scalable=no" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/mian.css?v=1">
	<link rel="stylesheet" href="css/animate.css"/>
	<script>
		var _hmt = _hmt || [];
		(function() {
			var hm = document.createElement("script");
			hm.src = "//hm.baidu.com/hm.js?634c6d03f88008a3c2ff3d7c94a79174";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hm, s);
		})();
	</script>
</head>
<body>
<script src="js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="js/js.cookie.js"></script>
<script>

	function trackBaidu(str){
		_hmt.push(['_trackPageview', '/'+str]);
	}

	function parseURL(url) {
		var a =  document.createElement('a');
		a.href = url;
		return {
			source: url,
			protocol: a.protocol.replace(':',''),
			host: a.hostname,
			port: a.port,
			query: a.search,
			params: (function(){
				var ret = {},
					seg = a.search.replace(/^\?/,'').split('&'),
					len = seg.length, i = 0, s;
				for (;i<len;i++) {
					if (!seg[i]) { continue; }
					s = seg[i].split('=');
					ret[s[0]] = s[1];
				}
				return ret;
			})(),
			file: (a.pathname.match(/\/([^\/?#]+)$/i) || [,''])[1],
			hash: a.hash.replace('#',''),
			path: a.pathname.replace(/^([^\/])/,'/$1'),
			relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [,''])[1],
			segments: a.pathname.replace(/^\//,'').split('/')
		};
	}

	var phase = '<?php echo $phase; ?>';

	var hmsr,share;
	var myURL = parseURL(location.href);
	hmsr = myURL.params.hmsr;
	share = parseInt(myURL.params.share,10);
	if(!isNaN(share)){
		share++;
	}

	if(!hmsr){
		hmsr = Cookies.get('hmsr')?Cookies.get('hmsr'):0;
	}
	if(!share){
		share = Cookies.get('share')?parseInt(Cookies.get('share'),10):1;
	}
	
	Cookies.set('hmsr', hmsr, { expires: 30, path: '' });
	Cookies.set('share', share, { expires: 30, path: '' });

	var media = phase+'/media'+hmsr+'/';
	trackBaidu(media+'奖券页面');

</script>
<div class="coupon_box">
	<?php
		if ($ret==0){
	?>
	<div class="coupon_list">
		<img src="img/page7/juan2.png" alt=""/>
		<a class="now_user" href="http://wq.jd.com/item/view?sku=1313159&price=799.00&fs=1#main"><img src="img/page4/now_use_btn.png" alt=""/></a>
		<a class="ues_colse" href="javascript:;"><img  src="img/page4/use_close_btn.png" alt=""/></a>
	</div>
	<script>
		trackBaidu(media+'成功领取');
	</script>
	<?php 
		}else{
	?>
	<div class="coupon_list1">
		<div class="word_tmp">
		<?php
			if ($ret==7){
				$result = '<p class="tit">很抱歉</p><p class="cot">您已经领取过本优惠券了</p><p><a class="now_user1" href="http://wq.jd.com/item/view?sku=1313159&price=799.00&fs=1#main"><img src="img/page4/now_use_btn.png" alt=""/></a></p>';
			}else if($ret==6){
				$result = '<p class="tit">很抱歉</p><p class="cot">很抱歉，优惠券已经领完</p>';
			}else{
				$result = '<p class="tit">很抱歉</p><p class="cot">优惠券领取失败</p>';
			}
			echo $result;
		?>
		</div>
		<img src="img/page7/juan1.png" alt=""/>
		<a class="ues_colse" href="javascript:;"><img  src="img/page4/use_close_btn.png" alt=""/></a>
	</div>
	<script>
		trackBaidu(media+'领取失败'+<?php echo $ret; ?>);
	</script>
	<?php 
		}
	?>
</div>
<script>
$('.ues_colse').click(function(){
		history.back()
	})
</script>
</body>
</html>