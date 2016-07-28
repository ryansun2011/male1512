// JavaScript Document
var shareData = {
	title: '控油神器免费体验，快来验证型男魅力！',
	desc: '刷脸型男从持续控油开始！参与邀请好友助力，即有机会免费试用刷脸神器！',
	link: 'http://www.philips-campaign.com/male1512/',
	imgUrl: 'http://www.philips-campaign.com/male1512/img/share.jpg',
	success: function (res) {
		//_hmt.push(['_trackPageview', '/share_end']);
		//location.href="shareEnd.html";
	},
	cancel: function (res) {

	},
	fail: function (res) {

	}
}
var shareData2 = {
	title: shareData.title,
	desc: shareData.desc,
	link: shareData.link,
	imgUrl: shareData.imgUrl,
	success: shareData.success,
	cancel: shareData.cancel,
	fail: shareData.fail
}

$.ajax({
	url:"http://uniqueevents.sinaapp.com/wx/getJsAPIA.php?callback=?",
	dataType:"jsonp",
	data:{
		url:location.href
	}
}).done(function(data) {
	//_hmt.push(['_trackPageview', '/share_end']);
	if(data) {
		var res = data.result;
		if(res == 1) {
			  wx.config({
				debug: false,
				appId: data.appId,
				timestamp: data.timestamp,
				nonceStr: data.nonceStr,
				signature: data.signature,
				jsApiList: [
					'checkJsApi',
					'onMenuShareTimeline',
					'onMenuShareAppMessage',
					'onMenuShareQQ',
					'onMenuShareWeibo'
				]
			});

			wx.ready(function () {
				wx.onMenuShareAppMessage(shareData);
				wx.onMenuShareTimeline(shareData2);
			});
		} else {
			//self.showError(data.msg);
		}
	}
}).always(function() {
	
});