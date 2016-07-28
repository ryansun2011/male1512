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

//根据userId,获取openid 的个数,和openid里面的详细信息.
//$userid = $_SESSION['userId'];
$userId = $_POST['userId'];

//$sql = "select a.id,a.username,b.score from ".DB_PREFIX."user a,".DB_PREFIX."score b where a.telephone = b.telephone and DateDiff(b.ctime,CURDATE())=0 order by b.score desc limit 7";
$sql = "select a.nickname,a.headimgurl from ".DB_PREFIX."users a,".DB_PREFIX."group_member b where b.userId = $userId and a.openid = b.friendId order by b.group_member_id asc limit 5";

$result = mysql_query($sql);
$rows = mysql_num_rows($result);
//var_dump($sql);
//var_dump($result);
//var_dump($rows);
//exit;
$arrInfo = array();
while($rowsa = mysql_fetch_assoc($result)){
    $arrInfo[] = $rowsa;
}
//var_dump($arrInfo);
//exit;
if($rows <= 5){
    echo json_encode(array(
        'result'=>1,
        'number'=>$rows,
        'info'=> $arrInfo,
        'msg'=>'好友助力成功!'
    ));

    exit;
}else{
    echo json_encode(array(
        'result'=>-1,
        'msg'=>'好友助力失败!'
    ));
    exit;
}






