<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/26
 * Time: 18:29
 */

include_once ('../api/config.php');
include_once ('../api/db.php');


$sql = "select count(q1_1) from ".DB_PREFIX."forms where q1_1=1";


$result = mysql_query($sql);

$rows = mysql_num_rows($result);
var_dump($sql);
exit;

if($rows>0){
    echo json_encode(array(
       'result'=>1,
        'msg'=>'成功.'
    ));
}else{
    echo json_encode(array(
        'result'=>-1,
        'msg'   =>'失败!'
    ));
}