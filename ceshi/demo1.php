<?php
header("content-type:text/html;charset=utf-8");
error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');
require_once './PHPExcel_1.8.0_doc/Classes/PHPExcel.php';
include_once './PHPExcel_1.8.0_doc/Classes/PHPExcel/Writer/Excel2007.php';
include_once './PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php';


$a = new info();
$data = $a->information();


$objPHPExcel=new PHPExcel();
$objPHPExcel->getProperties()
    ->setTitle('Office 2007 XLSX Document')
    ->setSubject('Office 2007 XLSX Document')
    ->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Result file');
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1','微信名')
    ->setCellValue('B1','性别')
    ->setCellValue('C1','媒体')
    ->setCellValue('D1','姓名')
    ->setCellValue('E1','电话')
    ->setCellValue('F1','创建时间');

$i=2;
foreach($data as $k=>$v){
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i,$v[0])
        ->setCellValue('B'.$i,$v[1])
        ->setCellValue('C'.$i,$v[2])
        ->setCellValue('D'.$i,$v[3])
        ->setCellValue('E'.$i,$v[4])
        ->setCellValue('F'.$i,$v[5]);
    $i++;
}
$objPHPExcel->getActiveSheet()->setTitle('统计表');
$objPHPExcel->setActiveSheetIndex(0);
$filename=urlencode('组团成功人数').'_'.date('Y-m-d H-i-s');


//*生成xlsx文件
//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
//header('Cache-Control: max-age=0');
//$a = $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
//var_dump($a);


//*生成xls文件
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');


$objWriter->save('php://output');
exit;



class info
{
    function information()
    {
        include_once('../api/config.php');
        include_once('../api/db.php');

        $arr = array();
        $arrData = array();

        $startTime = '2016-1-20';
        $endTime = '2016-2-2';

//$startTime = $_POST['startTime'];
//$endTime   = $_POST['endTime'];

        $sql = "select userId,COUNT(userId) from " . DB_PREFIX . "group_member where group by userId having(count(userId)>4)";
        $result = mysql_query($sql);
        $rows = mysql_num_rows($result);
        while ($row = mysql_fetch_assoc($result)) {
            $userId[] = $row['userId'];
        }

        //$arrData['userId'] = $userId;
        //var_dump($userId);
        //exit;

        $arrData = Array();
        for ($i = 0; $i < $rows; $i++) {
            $Id = $userId[$i];
            $sqll = "select a.username,a.mobile,b.nickname,b.sex,b.hmsr,b.ctime from " . DB_PREFIX . "forms as a, ". DB_PREFIX ."users as b where a.userId=b.userId and b.userId = $Id limit 1";
            //$sqlone = "select nickname,sex from " . DB_PREFIX . "users where userId = '$Id'";
            //echo $sqll;
            $resultt = mysql_query($sqll);
            while ($resultt = mysql_fetch_assoc($resultt)) {
                $nickname = $resultt['nickname'];
                $sex   = $resultt['sex'];
                $hmsr = $resultt['hmsr'];
                $username = $resultt['username'];
                $mobile = $resultt['mobile'];
                $ctime = $resultt['ctime'];
            }
            $arr = array();
            $arr[0] = $nickname;
            $arr[1] = $sex;
            $arr[2] = $hmsr;

            /*
            while ($roww = mysql_fetch_assoc($resultt)) {
                $username = $roww['username'];
                $mobile = $roww['mobile'];

            }
            */
            $arr[3] = $username;
            $arr[4] = $mobile;
            $arr[5] = $ctime;
            $arrData[$i]=$arr;
        }



        return $arrData;
    }
}