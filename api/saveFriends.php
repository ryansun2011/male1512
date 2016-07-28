<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/30
 * Time: 10:09
 */
session_start();

include_once ('config.php');
include_once ('db.php');



//前台发送的post信息.
$userId = $_POST['userId'];
$friendId= $_SESSION['openid'];
$headimgurl = $_SESSION['headimgurl'];

//判断好友是否已经助力!
$sqltwo = "select friendId from ".DB_PREFIX."group_member where friendId='$friendId' and userId='$userId'";
$resulttwo = mysql_query($sqltwo);
$rows = mysql_num_rows($resulttwo);
//var_dump($rows);

if($rows>0){
    echo json_encode(array('result'=>1,'msg'=>'你已经助力过该好友了哦!'));
    exit;
}else{
    $sql = "insert into ".DB_PREFIX."group_member(userId,friendId) values('$userId','$friendId')";
    $result = mysql_query($sql);

    if($result){
        echo json_encode(array('result'=>1,'msg'=>'你助力好友成功.'));
    }else{
        echo json_encode(array('result'=>-1,'msg'=>'你助理好友失败!'));
        exit;
    }
}



