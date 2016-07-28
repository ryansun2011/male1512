<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/19
 * Time: 16:35
 */
include_once ('../api/config.php');
include_once ('../api/db.php');


$startTime = $_POST['startTime'];
$endTime   = $_POST['endTime'];
//$startTime   = '2016-1-18';
//$endTime   = '2016-1-19';


$sql = "select formId from ".DB_PREFIX."forms where ctime>='$startTime' and ctime<'$endTime'";

$result = mysql_query($sql);

$row = mysql_num_rows($result);


if($row>0){
    echo json_encode(array('result'=>1,'totle'=>$row));
}else{
    echo json_encode(array('result'=>-1,'msg'=>'失败!'));
}