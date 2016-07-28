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
	<link rel="stylesheet" type="text/css" href="css/mian.css">
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
<div class="page4_mian">
	<img class="rule" src="img/page1/rule.png" alt="">
	<div class="nub_buddy">
		已经有<span class="number">0</span>位好友
	</div>
	<img class="success_word" src="img/page4/success_word.png" alt=""/>
	<img class="page4_word1" src="img/page4/page4_word1.png" alt=""/>
	<img class="chanpin" src="img/page4/chanpin.png" alt=""/>
	<ul class="friend_list">
		<li class="list"><div><img src="" alt=""/></div></li>
		<li class="list"><div><img src="" alt=""/></div></li>
		<li class="list"><div><img src="" alt=""/></div></li>
		<li class="list"><div><img src="" alt=""/></div></li>
		<li class="list"><div><img src="" alt=""/></div></li>
	</ul>
	<div class="friend_box">
		还需邀请<span class="num1">5</span>位好友帮你验证
	</div>
	<img class="friend_num" src="img/page4/friend_num.png" alt=""/>
	<img class="page4_word2" src="img/page4/page4_word2.png" alt=""/>
	<img class="notice_word" src="img/page4/notice_word.png" alt=""/>
	<a class="invited_btn" href="javascript:;">
		<img src="img/page4/text_btn.png" alt=""/>
		<i class="light flashLeft"></i>
	</a>
	<a class="share_fen" href="javascript:;">
    		<img src="img/page4/share_fen.png" alt=""/>
    		<i class="light flashLeft"></i>
    </a>
	<a class="receive_btn" href="end.html">
		<img src="img/page2/shop_btn.png" alt=""/>
	</a>
	<img class="wenzi1" src="img/page4/wenzi1.png" alt=""/>
</div>
<div class="box">
	<img class="logo" src="img/page1/logo.png" alt=""/>
	<img class="rule_word1" src="img/page1/rule_word.png" alt="">
	<div id="wrapper">
		<ul>
			<li><img src="img/page1/huodongshijian.png" alt=""></li>
		</ul>
	</div>
	<a class="back_btn" href="javascript:;"><img src="img/page1/page1_back_btn.png" alt=""></a>
</div>
<div class="share_layer">
	<img class="error" src="img/page3/error.png" alt=""/>
	<div class="share_word11">
		<img src="img/page3/share_word.png" alt=""/>
	</div>
	<div class="share_word2">
    		<img src="img/page3/share_word1.png" alt=""/>
    </div>
    <div class="share_word3">
    		<img src="img/page3/share_word2.png" alt=""/>
    </div>
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
	shareData.success = shareData2.success = function (res) {
		trackBaidu(media+'分享完成');
	}
	var numFriend;
	$.ajax({
		url:'api/getFriends.php',
		dataType:'json',
		type:'post',
		data:{userId:getId}
	}).done(function(data){
//		var data = {
//				'result':1,
//				'number':5,
//				'info':[
//					{"nickname":"ddd","headimgurl":"img/head1.jpg"},
//					{"nickname":"ddd","headimgurl":"img/head1.jpg"},
//					{"nickname":"ddd","headimgurl":"img/head1.jpg"},
//					{"nickname":"ddd","headimgurl":"img/head1.jpg"},
//					{"nickname":"ddd","headimgurl":"img/head1.jpg"}
//				],
//				'msg':'还需要好友助力哦!'
//		};
		if(data.result==1){
			$('.friend_num').hide();
			$('.friend_box').show();
			$('.number').html(data.number);
			$('.num1').html(5-data.number);
			var arr = data.info;
			for( var  i = 0 ; i < arr.length; i++ ){
				$('.friend_list li img').eq(i).show().attr('src',arr[i].headimgurl)
			}
			numFriend = data.number;
		}
		if(data.number==5){
			$('.friend_box').hide();
			$('.page4_word2').hide();
			$('.nub_buddy').hide();
			$('.page4_word1').hide();
			$('.notice_word').show();
			$('.success_word').show();
			$('.invited_btn').hide();
			$('.share_fen').show();
		}
		if(data.number==0){
			shareData.title = shareData2.title ='好友们在哪！快助我变身刷脸型男吧！';
		}else if(data.number==5){
			shareData.title = shareData2.title ='型男魅力爆表，好友助力成功，你也来试用吧！';
		}else{
			shareData.title = shareData2.title ='已有'+data.number+'个好友助我验证型男，其他好友快来吧！';
		}
	})
	$('.receive_btn').click(function(){
		//$('.coupon_box').show();
		trackBaidu(media+'btn/奖券');
	})


	$('.rule').click(function(){
		$('.box').show();
		var myscroll;
		myscroll=new iScroll("wrapper");
		trackBaidu(media+'btn/活动规则');
	})
	$('.back_btn').click(function(){
		$('.box').hide();
	})
	$('.invited_btn').click(function(){
		if(numFriend==0){
			$('.share_layer').show();
			$('.share_word11').show();
			trackBaidu(media+'btn/分享');
		}else if(numFriend>0 && numFriend<5){
			$('.share_layer').show();
			$('.share_word2').show();
			trackBaidu(media+'btn/分享');
		}
	})
	$('.share_fen').click(function(){
		$('.share_layer').show();
        $('.share_word3').show();
        trackBaidu(media+'btn/分享');
	})
	//	$('.ues_colse').click(function(){
	//		$('.coupon_box').hide();
	//	})
	$('.now_user').click(function(){
//		$('.now_user').attr('href','page5.php')
	})
	$('.share_layer').click(function(){
		$(this).hide();
	})
	$('.share_layer1').click(function(){
		$(this).hide();
	})
	$('.share_layer2').click(function(){
		$(this).hide();
	})
</script>
</body>
</html>