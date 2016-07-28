<?php
session_start();
$_SESSION["referer"] = $_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"];
require_once("api/auth.php");


$userId = $_SESSION["userId"];
$myId = $_REQUEST["myId"];

if($myId == $userId){
	header("location:http://www.philips-campaign.com/male1512/page4.php");
	exit;
}

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
	<link rel="stylesheet" type="text/css" href="css/mian.css?v=11">
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
<img class="rule" src="img/page1/rule.png" alt="">
<div class="page_all">

	<div class="page6_box">
		<ul class="friend_list2">
			<li class="list"><div><img src="" alt=""/></div></li>
			<li class="list"><div><img src="" alt=""/></div></li>
			<li class="list"><div><img src="" alt=""/></div></li>
			<li class="list"><div><img src="" alt=""/></div></li>
			<li class="list"><div><img src="" alt=""/></div></li>
		</ul>
		<img class="page6_success_word" src="img/page6/page6_success_word.png" alt=""/>

	</div>
	<div class="page_box2">
		<img class="page6_person" src="img/page6/person.png" alt=""/>
	</div>
	<video id="tenvideo_video_player_0" width="100%"  x-webkit-airplay="true" controls="controls" webkit-playsinline="true" preload="none" poster="http://vpic.video.qq.com/12419591/b0145qw1hjp_ori_3.jpg" src="http://videohy.tc.qq.com/vhot2.qqvideo.tc.qq.com/b0145qw1hjp.m701.mp4?vkey=EED088A0AAE9D8C73B204195B3353BFC26B1142F9FCA1E7130F1D7B9BD9B6E36B6194CA5E6F0FBF8FCDF7F2E8ADE309B80880B914C9728A3A268FC55B2C2334AE772F904EB1FB51E8D310E1B69AD982626143FF95485762F&br=29&platform=2&fmt=auto&level=40&sdtfrom=v3010&ocid=2504725932&amp;br=60&amp;platform=2&amp;fmt=auto&amp;level=40&amp;sdtfrom=v3010">
    	</video>
	<div class="page6_box3">

	</div>
</div>
<div class="box">
	<img class="logo" src="img/page1/logo.png" alt=""/>
	<img class="rule_word1" src="img/page1/rule_word.png" alt="">
	<div id="wrapper">
    		<ul>
    			<li class="frist"><img src="img/page1/huodongshijian.png" alt=""></li>
    		</ul>
    </div>
	<a class="back_btn" href="javascript:;"><img src="img/page1/page1_back_btn.png" alt=""></a>
</div>
<div class="page5_6">
	<a class="fenxiang_btn1" href="javascript:;">
		<img src="img/page6/meto_btn.png" alt=""/>
		<i class="light flashLeft"></i>
	</a>
	<a class="goumai_btn1" href="end.html">
		<img src="img/page6/page6_for_btn.png" alt=""/>
	</a>
</div>
<!--<div class="coupon_box">
	<div class="coupon_list">
		<a class="now_user" href="http://wq.jd.com/item/view?sku=1313159&price=799.00&fs=1#main"><img src="img/page4/now_use_btn.png" alt=""/></a>
		<img class="ues_colse" src="img/page4/use_close_btn.png" alt=""/>
	</div>
</div>-->
<div class="tips animated fadeOutUp"><img src="img/tips1.png" alt=""/></div>
<script src="js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="js/iscroll.js" type="text/javascript"></script>
<script src="js/js.cookie.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
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

	shareData.link = shareData2.link ='http://www.philips-campaign.com/male1512/index.php?hmsr='+hmsr+'&share='+share;
	shareData.success = shareData2.success = function (res) {
		trackBaidu(media+'分享完成');
	}


	$(function(){
		var userId = <?php echo $_SESSION["userId"]; ?>;
		var myId = getParam("myId");
		$.ajax({
			url:'api/saveFriends.php',
			dataType:'json',
			type:'post',
			data:{userId:myId}
		}).done(function(data){

			$.ajax({
				url:'api/getFriends.php',
				dataType:'json',
				type:'post',
				data:{userId:myId}
			}).done(function(data){

				console.log(data);
				if(data.result==1){
					var arr = data.info;
					for( var  i = 0 ; i < arr.length; i++ ){
						$('.friend_list2 li img').eq(i).show().attr('src',arr[i].headimgurl)
					}
				}
			});
		})


		$('.rule').click(function(){
			$('.page_all').hide();
			$('.box').show();
			var myscroll;
            myscroll=new iScroll("wrapper");
			trackBaidu(media+'btn/活动规则');

		})
		$('.back_btn').click(function(){
			$('.box').hide();
			$('.page_all').show();
		})
		function getParam(param) {
			var res = location.search.match(new RegExp("\\?"+param+"=([^=&]+)","i"));
			return res ? res[1] : null;
		}
		$('.fenxiang_btn1').click(function(){
			location.href = 'index.php';
			trackBaidu(media+'btn/去刷脸');
		})
		$('.goumai_btn1').click(function(){
//			$('.coupon_box').show();
//			$(document).bind('touchmove',function(){
//				return false;
//			})
			trackBaidu(media+'btn/奖券');
		})
		$('.ues_colse').click(function(){
			$('.coupon_box').hide();
			$(document).unbind();
		})
	})
</script>
</body>
</html>