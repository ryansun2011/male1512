<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 16:35
 */
header("content-type:text/html;charset=utf-8");
session_start();
include_once ('../api/config.php');
include_once ('../api/db.php');



$arr = array();
$arrData = array();


//$startTime = '2016-1-18';
//$endTime   = '2016-01-20';

$startTime = $_POST['startTime'];
$endTime   = $_POST['endTime'];

$sql = "select userId,COUNT(userId) from ".DB_PREFIX."group_member where ctime BETWEEN '$startTime' AND '$endTime' group by userId having(count(userId)>4)";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
while($row = mysql_fetch_assoc($result)){
    $userId[] = $row['userId'];
}

$arrData['userId'] = $userId;

for($i=0;$i<$rows;$i++){
 $Id = $arrData['userId'][$i];
    $sqll = "select username,mobile from ".DB_PREFIX."forms where userId = $Id";
    $sqlone = "select nickname,sex,hmsr from ".DB_PREFIX."users where userId = '$Id'";
    $resultone = mysql_query($sqlone);
    $resultt = mysql_query($sqll);
    $rowss = mysql_num_rows($resultt);
    while($rowone = mysql_fetch_assoc($resultone)){
        $nickname = urldecode($rowone['nickname']);
        $sex      = $rowone['sex'];
        $hmsr     = $rowone['hmsr'];
    }
    $arr[] = $nickname;
    $arr[] = $sex;
    $arr[] = $hmsr;

    while($roww = mysql_fetch_assoc($resultt)){
        $username = $roww['username'];
        $mobile = $roww['mobile'];
    }
    $arr[] = $username;
    $arr[] = $mobile;
}

//$b = 0;
//$arra = array();
//$count = count($arr);
//var_dump($count);
//for($a=0;$a<$count;$a=$a+4){
//    $arra[$b][''];
//    $arra[$b][$arr[$a]];
//    $arra[$b][$arr[$a+1]];
//    $arra[$b][$arr[$a+2]];
//    $arra[$b][$arr[$a+3]];
//    $b++;
//}
//var_dump($arra);
//exit;

if($rowss>0){
    echo json_encode(array('result'=>1,'info'=>$arr,'msg'=>'成功.'));
    exit;
}else{
    echo json_encode(array('result'=>-1,'msg'=>'失败!'));
    exit;
}






