<?php

session_start();

if(isset($_GET['hmsr'])){
	$_SESSION["hmsr"] = addslashes($_GET['hmsr']);
}else{
	$_SESSION["hmsr"] = 0;
}

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
		//location.href = 'http://www.philips-campaign.com/male1512/end.html';
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?8ac6369d04593bc81f3269086e6f150c";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>


</head>
<body>
<div class="page7_all">
	<div class="box1">
		<img src="img/page7/page7_bg.jpg" alt=""/>
		<img class="xiao" src="img/page7/xiao.png" alt=""/>
		<a class="lijian_btn" href="jiangjuan3.php">
			<img src="img/page7/lijian_btn1.png" alt=""/>
			<i class="light1 flashLeft"></i>
		</a>
<!--		<img class="wenzi" src="img/page7/wenzi.png" alt=""/>-->
	</div>
	<video id="tenvideo_video_player_0" width="100%"  x-webkit-airplay="true" controls="controls" webkit-playsinline="true" preload="none" poster="http://vpic.video.qq.com/12419591/b0145qw1hjp_ori_3.jpg" src="http://videohy.tc.qq.com/vhot2.qqvideo.tc.qq.com/b0145qw1hjp.m701.mp4?vkey=EED088A0AAE9D8C73B204195B3353BFC26B1142F9FCA1E7130F1D7B9BD9B6E36B6194CA5E6F0FBF8FCDF7F2E8ADE309B80880B914C9728A3A268FC55B2C2334AE772F904EB1FB51E8D310E1B69AD982626143FF95485762F&br=29&platform=2&fmt=auto&level=40&sdtfrom=v3010&ocid=2504725932&amp;br=60&amp;platform=2&amp;fmt=auto&amp;level=40&amp;sdtfrom=v3010">
	</video>
	<div class="box2">
		<img src="img/page7/box2jpg.jpg" alt=""/>
	</div>
	<div class="box3">
		<img src="img/page7/box3.jpg" alt=""/>
	</div>
	<div class="box4" style="height: 740px;background: none;">
		<img src="img/page7/box4.jpg">
		<div style="font-size: 20px;text-align: center;height: 30px;line-height: 30px;">飞利浦（中国）投资有限公司</div>
	</div>
	<div class="box5">
		<a class="page7_ling " style="left:210px;" href="jiangjuan3.php">
			<img src="img/page5/goumai.png" alt=""/>
			<i class="light1 flashLeft"></i>
		</a>
	</div>
	<div class="share_layer">
		<img class="error" src="img/page3/error.png" alt=""/>
		<div class="share_word1">
			<img class="" src="img/page5/page5_share.png" alt=""/>
		</div>
	</div>
	<!--<div class="coupon_box">-->
		<!--<div class="coupon_list">-->
			<!--<a class="now_user" href="http://wq.jd.com/item/view?sku=1313159&price=799.00&fs=1#main"><img src="img/page4/now_use_btn.png" alt=""/></a>-->
			<!--<img class="ues_colse" src="img/page4/use_close_btn.png" alt=""/>-->
		<!--</div>-->
	<!--</div>-->
	<div class="tips "><img src="img/tips1.png" alt=""/></div>
</div>
<script src="js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="js/iscroll.js" type="text/javascript"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/share.js"></script>
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

	var phase = 'pro2';
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

	shareData.link = shareData2.link ='http://www.philips-campaign.com/male1512/page8.php?hmsr='+hmsr+'&share='+share;
	shareData.title = shareData2.title ='型男怎么少得了他！刷脸神器立减100！';
	shareData.desc = shareData2.desc ='刷脸型男从持续控油开始！即刻购买刷脸神器立减100！';
	shareData.success = shareData2.success = function (res) {
		trackBaidu(media+'分享完成');
	}

	$(function(){
		$('.page7_fen').click(function(){
			$('.share_layer').show();
			trackBaidu(media+'btn/分享');
		})
		$('.share_layer').click(function(){
			$(this).hide();
		});
		$('.page7_ling').click(function(){
//			$('.coupon_box').show();
			trackBaidu(media+'btn/奖券2');
		})
		$('.ues_colse').click(function(){
			$('.coupon_box').hide();
		})
		$('.lijian_btn').click(function(){
//			$('.coupon_box').show();
			trackBaidu(media+'btn/奖券2');
		})
		$('.tips').addClass('animated fadeOutUp');
	})
</script>
</body>
</html>