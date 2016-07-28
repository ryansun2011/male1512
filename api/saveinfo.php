<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/30
 * Time: 10:08
 */
session_start();
include_once ("config.php");
include_once ("db.php");

$username = addslashes($_POST['username']);
$mobile   = addslashes($_POST['mobile']);
$age      = (int)$_POST['age'];
$sex      = (int)$_POST['sex'];
//$userId   = $_POST['userId'];
$userId   = (int)$_SESSION["userId"];



$q1_1 = $_POST['q1_1'];$q1_2 = $_POST['q1_2'];$q1_3 = $_POST['q1_3'];$q1_4 = $_POST['q1_4'];$q1_5 = $_POST['q1_5'];
$q2_1 = $_POST['q2_1'];$q2_2 = $_POST['q2_2'];$q2_3 = $_POST['q2_3'];$q2_4 = $_POST['q2_4'];
$q3_1 = $_POST['q3_1'];$q3_2 = $_POST['q3_2'];$q3_3 = $_POST['q3_3'];$q3_4 = $_POST['q3_4'];
$q4_1 = $_POST['q4_1'];$q4_2 = $_POST['q4_2'];$q4_3 = $_POST['q4_3'];
$q5_1 = $_POST['q5_1'];$q5_2 = $_POST['q5_2'];$q5_3 = $_POST['q5_3'];$q5_4 = $_POST['q5_4'];$q5_5 = $_POST['q5_5'];
$q6_1 = $_POST['q6_1'];$q6_2 = $_POST['q6_2'];$q6_3 = $_POST['q6_3'];$q6_4 = $_POST['q6_4'];

//$hasError = false;
//$strError = '';
//
//if(mb_strlen($username,'utf-8')<=0||mb_strlen($username,'utf-8')>30){
//    $hasError = true;
//    $strError .= '姓名为空或多于30字。';
//}
//
//$pattern = "/^1[3-8]\d{9}$/i";
//if ( !preg_match( $pattern, $mobile ) ) {
//    $hasError = true;
//    $strError .= '手机格式不对。';
//}
//
//if($hasError){
//    echo '{"result":-1,"msg":"'.$strError.'"}';
//    exit();
//}
//
//
$phone = "select mobile from ".DB_PREFIX."forms where mobile = '$mobile'";
////var_dump($phone);
$hear =mysql_query($phone);
$result = mysql_num_rows($hear);
//
if($result>0){
    echo json_encode(array('result' =>-2, 'msg'=>'电话号码已经使用'));
    //echo '{"result":-2,"msg":"电话号码已经使用！"}';
    exit();
}

//
$sql = "insert into ".DB_PREFIX."forms
(userId,username,mobile,age,sex,
q1_1,q1_2,q1_3,q1_4,q1_5,
q2_1,q2_2,q2_3,q2_4,
q3_1,q3_2,q3_3,q3_4,
q4_1,q4_2,q4_3,
q5_1,q5_2,q5_3,q5_4,q5_5,
q6_1,q6_2,q6_3,q6_4) values
('$userId','$username','$mobile','$age','$sex',
'$q1_1','$q1_2','$q1_3','$q1_4','$q1_5',
'$q2_1','$q2_2','$q2_3','$q2_4',
'$q3_1','$q3_2','$q3_3','$q3_4',
'$q4_1','$q4_2','$q4_3',
'$q5_1','$q5_2','$q5_3','$q5_4','$q5_5',
'$q6_1','$q6_2','$q6_3','$q6_4')";

$result = mysql_query($sql);
//$rows = mysql_num_rows($result);

//$sqlone = "select formId from ".DB_PREFIX."forms order by formId desc limit 1";
//$resultone = mysql_query($sqlone);
//$row = mysql_fetch_assoc($resultone);
//$_SESSION['userId'] = $userId;
//setcookie('userId','$row',time()+COOKIE_EXPIRE,COOKIE_PATH);

if($result){
    echo json_encode(array('result'=>1,'msg'=>'信息提交成功.'));
}else{
    echo json_encode(array('result'=>-1,'msg'=>'信息提交失败!'));
    exit;
}



