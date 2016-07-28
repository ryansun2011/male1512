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

$code   = $_POST['code'];
$userId = $_SESSION['userId'];

$sql = "insert into ".DB_PREFIX."code(userId,code)values('$userId','$code')";
$result = mysql_query($sql);
$rows = mysql_fetch_assoc($result);
if($rows>0){
    echo json_encode(array('result'=>1,'msg'=>'购物券获取成功.'));
}else{
    echo json_encode(array('result'=>-1,'msg'=>'购物券获取失败!'));
}