<?php
session_start();
$_SESSION["referer"] = $_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"];
require_once("api/auth.php");

$_SESSION['phase'] = 'ft';

?>
<!DOCTYPE html>
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
<div id="preloadImg" style="display:none;">
    <img src="img/page1/sd.jpg" alt=""/>
    <img src="img/page1/huodongshijian.png" alt=""/>
    <img src="img/page1/page1_bg.jpg" alt=""/>
    <img src="img/page1/page1_product.png" alt=""/>
    <img src="img/page2/answer.png" alt=""/>
    <img src="img/page2/answer_box_bg.png" alt=""/>
    <img src="img/page2/page2_chanpin.png" alt=""/>
    <img src="img/page3/page3_chanpin.png" alt=""/>
    <img src="img/page4/chanpin.png" alt=""/>
    <img src="img/page5/page_5_1bg.png" alt=""/>
    <img src="img/page5/page5_pic1.jpg" alt=""/>
    <img src="img/page5/page5_pic2.jpg" alt=""/>
    <img src="img/page5/page5_pic3.jpg" alt=""/>
    <img src="img/page5/page5_pic4.jpg" alt=""/>
    <img src="img/page5/page5_query_bg.png" alt=""/>
    <img src="img/page6/page_box3_bg.jpg" alt=""/>
    <img src="img/page6/page6_box2bg.jpg" alt=""/>
</div>
<div id="loading">
    <div id="loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
    <span class="lod_word"></span>
</div>
<img class="logo" src="img/page1/logo.png" alt="">
<div class="main" style="display:none;">
    <img class="rule" src="img/page1/rule.png" alt="">
    <img class="word1 animated fadeInDown" src="img/page1/word1.png" alt="">
    <img class="product animated fadeIn" src="img/page1/page1_product.png" alt="">
    <img class="page1_left_word animated fadeInLeft" src="img/page1/left_word.png" alt=""/>
    <img class="page1_right_word animated fadeInRight" src="img/page1/right_word.png" alt=""/>
    <img class="price animated zoomIn" src="img/page1/price.png" alt="">
    <a class="page1_btn animated fadeInUp" href="page2.php">
        <img src="img/page1/page1_btn.png" alt="">
        <i class="light flashLeft"></i>
    </a>
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


    var imgTotal = $('#preloadImg img').length;
    var loadCount = 0;
	//中文中文
    $('#preloadImg').imagesLoaded()
            .always( function( instance ) {
                console.log('all images loaded');
            })
            .done( function( instance ) {
                console.log('all images successfully loaded');

                $('#loading').hide();
                $('.main').show()
            })
            .fail( function() {
                //console.log('all images loaded, at least one is broken');
            })
            .progress( function( instance, image ) {
                //var result = image.isLoaded ? 'loaded' : 'broken';
                loadCount++;
                $('.word').html(parseInt(loadCount / imgTotal * 100) + '%');
                //console.log($('.word').html())
                //$("#progress").html(imgLoaded);
                //console.log( 'image is ' + result + ' for ' + image.img.src );
            });

    $(function(){

		$('.page1_btn').click(function(){
			trackBaidu(media+'btn/开始答题');
		});
        $('.rule').click(function(){
            $('.main').hide();
            $('.box').show();

           var myscroll;
           myscroll=new iScroll("wrapper");
			trackBaidu(media+'btn/活动规则');
        })
        $('.back_btn').click(function(){
            $('.box').hide();
            $('.main').show();
        })
    })
</script>
</body>
</html>
