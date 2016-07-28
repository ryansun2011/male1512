<?php
session_start();

$_SESSION['phase'] = 'ft';
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
	<link rel="stylesheet" type="text/css" href="css/mian.css?v=2">
	<link rel="stylesheet" href="css/animate.css"/>
	<script>
		location.href = 'http://www.philips-campaign.com/male1512/end.html';
		var _hmt = _hmt || [];
		(function() {
			var hm = document.createElement("script");
			hm.src = "//hm.baidu.com/hm.js?884843bb6a1038cb789ff15571072425";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hm, s);
		})();
	</script>
</head>
<body>
<img class="logo" src="img/page1/logo.png" alt=""/>
<div class="page3_main">
	<img class="page3_chanpin animated fadeIn" src="img/page3/page3_chanpin.png" alt=""/>
	<img class="ruhe animated fadeInUp" src="img/page3/ruhe.png" alt="">
	<img class="yinpai animated zoomIn" src="img/page3/yinpai.png" alt=""/>
	<img class="page3_success animated fadeInDown" src="img/page3/success_word.png" alt=""/>
	<img class="page3_yaoqing animated fadeInDown" src="img/page3/yaoqing_word.png" alt=""/>
	<img class="page3_feiword animated fadeInDown" src="img/page3/page_fei_word.png" alt=""/>
	<a class="invited1 animated fadeInUp" href="javascript:;">
		<img src="img/page3/invited_btn.png" alt=""/>
		<i class="light flashLeft"></i>
	</a>
	<!--<a class="page3_shop_btn" href="http://item.jd.com/1313159.html"><img src="img/page2/shop_btn.png" alt=""/></a>-->
</div>
<div class="share_layer">
	<img class="error" src="img/page3/error.png" alt=""/>
	<div class="share_word">
		<img src="img/page3/fenxiang_word.png" alt=""/>
	</div>
</div>

<script src="js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/js.cookie.js"></script>
<script src="js/share.js"></script>
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

	var phase = 'ft';
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

	var getId = <?php echo $_SESSION["userId"];?>;

	shareData.link = shareData2.link ='http://www.philips-campaign.com/male1512/page6.php?myId='+getId+'&hmsr='+hmsr+'&share='+share;
	shareData.title = shareData2.title ='好友们在哪！快助我变身刷脸型男吧！';
	shareData.success = shareData2.success = function (res) {
		trackBaidu(media+'分享完成');
	}

	$('.invited1').click(function(){
		$('.share_layer').show();
		trackBaidu(media+'btn/分享');
	})
	$('.share_layer').click(function(){
		$(this).hide();
	});
	$('.page3_shop_btn').click(function(){

		trackBaidu(media+'btn/奖券');
	})
	$('.ues_colse').click(function(){
		$('.coupon_box').hide();
	})
</script>
</body>
</html>