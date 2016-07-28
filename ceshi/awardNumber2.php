<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 16:35
 */
session_start();
include_once ('../api/config.php');
include_once ('../api/db.php');



$arr = array();
$arrData = array();
//select * from tb1 where dDate>='2010-11-05' and dDate<='2010-11-15'
//and convert(char(8),dDate,108)>='22:30:00' and  convert(char(8),dDate,108)<='23:00:00'
//$sql = "select a.nickname,a.headimgurl from ".DB_PREFIX."users a,".DB_PREFIX."group_member b where b.userId = $userId and a.openid = b.friendId order by b.group_member_id asc limit 5"
//$sql = "select a.mobile from ".DB_PREFIX."forms a,".DB_PREFIX."group_member b where (group by b.mobile) >= 5 and ctime>=$startTime and ctime<=$endTime";
//
//$sql = "select a.mobile from ".DB_PREFIX."users a,".DB_PREFIX."group_member b where
// b.userId = $userId and a.openid = b.friendId order by b.group_member_id asc limit 5";

//$sqlone = "select userId,count(1) as counts from ".DB_PREFIX."group_member group by userId where ctime>=$startTime and ctime<=$endTime";
//"select userId from male1512_wx_group_member where ctime BETWEEN 2016-01-01 00:00:00 AND 2016-02-01 00:00:00 group by userId having(count(userId)>4)"
//"select userId from male1512_wx_group_member where ctime BETWEEN 2016-01-01 00:00:00 AND 2016-02-01 00:00:00 group by userId having(count(userId)>4)"

//$startTime = strtotime('2016-01-01 00:00:00');
//$endTime   = strtotime('2016-02-01 00:00:00');


//$startTime = '2016-01-19';
//$endTime   = '2016-01-20';

$startTime = $_POST['startTime'];
$endTime   = $_POST['endTime'];

$sql = "select userId,COUNT(userId) from ".DB_PREFIX."group_member where ctime BETWEEN '$startTime' AND '$endTime' group by userId having(count(userId)<5)";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
while($row = mysql_fetch_assoc($result)){
    $userId[] = $row['userId'];
}

$arrData['userId'] = $userId;

for($i=0;$i<$rows;$i++){
    $Id = $arrData['userId'][$i];
    $sqll = "select username,mobile from ".DB_PREFIX."forms where userId = $Id";
    $sqlone = "select nickname from ".DB_PREFIX."users where userId = '$Id'";
    $resultone = mysql_query($sqlone);
    $resultt = mysql_query($sqll);
    $rowss = mysql_num_rows($resultt);
    while($rowone = mysql_fetch_assoc($resultone)){
        $nickname = urldecode($rowone['nickname']);
    }
    $arr[] = $nickname;

    while($roww = mysql_fetch_assoc($resultt)){
        $username =$roww['username'];
        $mobile = $roww['mobile'];
    }
    $arr[] = $username;
    $arr[] = $mobile;
}

if($rowss>0){
    echo json_encode(array('result'=>1,'info'=>$arr,'msg'=>'成功.'));
    exit;
}else{
    echo json_encode(array('result'=>-1,'msg'=>'失败!'));
    exit;
}






