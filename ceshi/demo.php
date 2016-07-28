<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/2
 * Time: 18:22
 */
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

        $sql = "select a.nickname,a.openid, b.username,count(c.userId)as people from ".DB_PREFIX."forms As b,".DB_PREFIX."users As a,".DB_PREFIX."group_member As c where a.userId = b.userId and c.userId = b.userId group by c.userId";
        
        //$sql = "select a.nickname,a.openid,b.* from ".DB_PREFIX."users as a,".DB_PREFIX."forms as b where a.userId = b.userId";
        //$sql = "select a.username,count(b.userId) from ".DB_PREFIX."group_member as b,".DB_PREFIX."forms as a where a.userId = b.userId group by b.userId";
        
        $result = mysql_query($sql);

        $row = mysql_num_rows($result);


        while($row = mysql_fetch_assoc($result)){
            $nickname = $row['nickname'];
            $openid   = $row['openid'];
            $username = $row['username'];
            $people =   $row['people'];
            
            
        }
        $arr[] = $nickname;
        $arr[] = $openid;
        $arr[] = $username;
        $arr[] = $people;
        return $arr;
    }
}
