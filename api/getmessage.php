<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/30
 * Time: 10:09
 */
include_once ('config.php');
include_once ('db.php');

$mobile = $_POST['mobile'];
//$mobile = '13333333333';
$sql = "select mobile from ".DB_PREFIX."forms where mobile = $mobile and status = 1";

$result = mysql_query($sql);
$rows = mysql_num_rows($result);

if($rows>0){
    echo json_encode(array('result'=>1,'msg'=>'助力好友达到5位,恭喜你获得试用资格.'));
    exit;
}else{
    $sqlone = "select a.friendId from ".DB_PREFIX."group_member a,".DB_PREFIX."forms b where b.mobile = $mobile and a.userId = b.userId";
    $resultone = mysql_query($sqlone);
    $rowsone = mysql_num_rows($resultone);

    if($rowsone>4){
        echo json_encode(array('result'=>0,'msg'=>'助力好友达到5位,很遗憾未获得试用资格!'));
        exit;
    }else{
        echo json_encode(array('result'=>-1,'msg'=>'助力好友未达到5位,没有获得试用资格!'));
        exit;
    }
}

//====================================================================================================================
//$sql = "select mobile from ".DB_PREFIX."forms where mobile = $mobile and status = 1";
//$sqlone = "select a.friendId from ".DB_PREFIX."group_member a,".DB_PREFIX."forms b where b.mobile = $mobile and a.userId = b.userId";
//$result = mysql_query($sql);
//$rows = mysql_num_rows($result);
//$resultone = mysql_query($sqlone);
//$rowsone = mysql_num_rows($resultone);
//
//if($rows>0&&$rowsone>0){
//    echo json_encode(array('result'=>1,'msg'=>'助力好友达到5位,恭喜你获得试用资格.'));
//}elseif($rows>0&&$rowsone==0){
//    echo json_encode(array('result'=>0,'msg'=>'助力好友达到5位,很遗憾未获得试用资格!'));
//}else{
//    echo json_encode(array('result'=>-1,'msg'=>'助力好友未达到5位,没有获得试用资格!'));
//}





