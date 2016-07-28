<?php
session_start();
include_once ('api/config.php');
include_once ('api/db.php');


$sql = "select coupon_id,coupon_url from ".DB_PREFIX."coupons where is_use=0 limit 1";
$result = mysql_query($sql);
$numRows = mysql_num_rows($result);
if($numRows==0){
	echo "<script>window.alert('很抱歉，奖券已经领光了。');window.location.href = 'http://www.philips-campaign.com/male1512/page8.php';</script>";
	exit;
}else{
	$row = mysql_fetch_assoc($result);
	$coupon_id = $row['coupon_id'];
	$coupon_url = $row['coupon_url'];
	$sql = "update ".DB_PREFIX."coupons set is_use=1 where coupon_id=$coupon_id";
	$result = mysql_query($sql);
	if($result){
		//echo $coupon_url;
		echo "<script>window.location.href = '".$coupon_url."';</script>";
		exit;
	}else{
		echo "<script>window.alert('领取失败，请重试。');window.location.href = 'http://www.philips-campaign.com/male1512/page8.php';</script>";
		exit;
	}
}
