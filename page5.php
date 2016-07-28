<?php
session_start();

$_SESSION['phase'] = 'sms';
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
	<link rel="stylesheet" type="text/css" href="css/mian.css">
	<link rel="stylesheet" href="css/animate.css"/>
	<script>
		//location.href = 'http://www.philips-campaign.com/male1512/end.html';
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
<div class="page5_box">

	<div class="page5_main">

		<div class="query_box"></div>
		<input class="query_ipt" id="input"  maxlength="11" value="" type="text"/>
		<span class="tishi2">请输入正确的手机号码</span>
		<a class="sub_btn" href="javascript:;">
			<img src="img/page5/sub_btn.png" alt="img"/>
			<i class="light flashLeft"></i>
		</a>
		<img class="tips_word_fail" src="img/page5/tips_word.png" alt=""/>
		<img class="tips_word_fail1" src="img/page5/tips_word1.png" alt=""/>
		<img class="tips_word_success" src="img/page5/tips_word_success.png" alt=""/>
		<a class="collect_btn" href="javascript:;"><img src="img/page5/collect_btn.png" alt=""/></a>
	</div>
	<div class="page5_2">
		<img class="xiao" src="img/page7/xiao.png" alt=""/>
		<a class="lijian_btn" href="jiangjuan1.php?phase=pro">
			<img src="img/page7/lijian_btn1.png" alt=""/>
			<i class="light1 flashLeft"></i>
		</a>
<!--		<img class="wenzi" src="img/page7/wenzi.png" alt=""/>-->
	</div>
	<video id="tenvideo_video_player_0" width="100%"  x-webkit-airplay="true" controls="controls" webkit-playsinline="true" preload="none" poster="http://vpic.video.qq.com/12419591/b0145qw1hjp_ori_3.jpg" src="http://videohy.tc.qq.com/vhot2.qqvideo.tc.qq.com/b0145qw1hjp.m701.mp4?vkey=CEBAF321DC9DD42041168C86A96B9F474310754A062EEF2C340194DD0E389892D4B249289DAC617B7CD7A0E1BD6FDDE180057B8F4DAE88FDAFA07F80CF692007DBACB98B28118D7AD5393B13CC2D2023492EB3AEBD378075&br=29&platform=2&fmt=auto&level=40&sdtfrom=v3010&ocid=263135148&amp;br=60&amp;platform=2&amp;fmt=auto&amp;level=40&amp;sdtfrom=v3010">
    </video>
	<div class="page5_3"></div>
	<div class="page5_4"></div>
	<div class="page5_5"></div>
	<div class="foot"></div>
	<div class="page5_6">
		<a class="goumai_btn" href="jiangjuan1.php?phase=pro">
			<img src="img/page5/goumai.png" alt=""/>
			<i class="light flashLeft"></i>
		</a>
	</div>

</div>
<div class="flow">
	<img class="rule" src="img/page1/rule.png" style="display:none;" alt="">
	<img class="flow_word1" src="img/page5/flow_word1.png" alt=""/>
	<div class="flow_box" id="wrapper">
    		<ul>
    			<li class="frist1"><img src="img/page5/liucheng.png" alt=""/></li>
    		</ul>
    </div>
	<a class="back_btn1" href="javascript:;"><img src="img/page5/back_btn.png" alt=""/></a>
</div>
<div class="box">
	<img class="logo" src="img/page1/logo.png" alt=""/>
	<img class="rule_word1" src="img/page1/rule_word.png" alt="">
	<div id="wrapper1">
        		<ul>
        			<li class="frist"><img src="img/page1/huodongshijian.png" alt=""></li>
        		</ul>
    </div>
	<a class="back_btn" href="javascript:;"><img src="img/page1/page1_back_btn.png" alt=""></a>
</div>
<img class="tip tips animated fadeOutUp" src="img/tips1.png" alt=""/>
<div class="share_layer">
	<img class="error" src="img/page3/error.png" alt=""/>
	<div class="share_word">
		<img src="img/page3/share_word.png" alt=""/>
	</div>
</div>
<script src="js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="js/iscroll.js" type="text/javascript"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/share.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
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

	var phase = 'sms';

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


	var Ipt = document.getElementById('input');

	Ipt.onblur = function(){

    		$('.tishi2').hide();
    }


	$('.collect_btn').click(function(){
		$('.flow').show();
		$('.page5_box').hide();
		$('body').css('overflow','hidden');
		var myscroll;
        myscroll=new iScroll("wrapper");
			trackBaidu(media+'btn/领取流程');
	})

	$('.back_btn1').click(function(){
		$('.flow').hide();
		$('.page5_box').show();
		$('body').css('overflow','');
	})

	$('.rule').click(function(){
		$('.box').show();
		$('body').css('overflow','hidden');
		var myscroll;
        myscroll=new iScroll("wrapper1");
		trackBaidu(media+'btn/活动规则');
	})

	$('.back_btn').click(function(){
		$('.box').hide();
		$('body').css('overflow','');
	})

	$('.fenxiang_btn').click(function(){
		$('.share_layer').show();
	})

	$('.lijian_btn').click(function(){
		trackBaidu(media+'btn/奖券');
	})

	$('.ues_colse').click(function(){
		$('.coupon_box').hide();
		$(document).unbind();
	})

	$('.goumai_btn').click(function(){
//		//$('.coupon_box').show();
//		$(document).bind('touchmove',function(){
//			return false;
//		});
		trackBaidu('sms/btn/奖券');
	})

	$('.share_layer').click(function(){
		$(this).hide();
	})

	$('.sub_btn').click(function(){
		if(!chkMobile()){
			$('.tishi2').show();
			return;
		}
		trackBaidu(media+'btn/查询提交');
		var Mobval =$('.query_ipt').val();
		$.ajax({

			url:'api/getmessage.php',
			dataType:'json',
			type:'post',
			data:{mobile:Mobval}

		}).done(function(data){
			console.log(data)
			if(data.result==1){
				$('.tishi2').hide();
				$('.sub_btn').hide();
				$('.tips_word_success').show();
				$('.collect_btn').show();
				$('.tips_word_fail').hide();
			}else if(data.result==-1){
				$('.tishi2').hide();
                $('.tips_word_fail1').show();
                $('.sub_btn').hide();
			}else{
				$('.tishi2').hide();
				$('.tips_word_fail').show();
				$('.sub_btn').hide();
			}
		})

		function chkMobile(){
			var re = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
			// var re = /^1[3-9]\w{9}$/i
			if(!re.test($('.query_ipt').val())){
				return false;
			}
			return true;
		}
	})
	//$('.query_ipt').fouse()
</script>
</body>
</html>