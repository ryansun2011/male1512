<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/20
 * Time: 11:30
 */
include 'PHPExcel_1.8.0_doc/Classes/PHPExcel.php';
include 'PHPExcel_1.8.0_doc/Classes/PHPExcel/Writer/Excel2007.php';
// 如果直接输出excel文件，则要包含此文件
include 'PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php';

// 创建phpexcel对象，此对象包含输出的内容及格式
$objPHPExcel = new PHPExcel();


//.....此处略去从数据库获取数据的过程，$a为需要导出的数组......
$o = new info();
$a = $o->information();
var_dump($a);


$count = count($a);
//var_dump($count);
//exit;
for ($i = 1; $i <= $count; $i++) {
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, convertUTF8($row[$i-2][1]));
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, convertUTF8($row[$i-2][2]));
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, convertUTF8($row[$i-2][3]));
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, convertUTF8($row[$i-2][4]));
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, convertUTF8(date("Y-m-d", $row[$i-2][5])));
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, convertUTF8($row[$i-2][6]));
    $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, convertUTF8($row[$i-2][7]));
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, convertUTF8($row[$i-2][8]));
}

//在默认sheet后，创建一个worksheet
echo date('H:i:s') . " Create new Worksheet object\n";
$a = $objPHPExcel->createSheet();

$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
$objWriter->save('php://output');
exit;


//保存excel—2007格式
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);


$strOutputExcelFileName = date('Y-m-j_H_i_s').".xlsx"; // 输出EXCEL文件名

//或者$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel); 非2007格式
$objWriter->save($strOutputExcelFileName);


//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));








class info
{
    function information()
    {
        include_once('../api/config.php');
        include_once('../api/db.php');

        $arr = array();
        $arrData = array();

        $startTime = '2015-01-19';
        $endTime = '2016-03-20';

//$startTime = $_POST['startTime'];
//$endTime   = $_POST['endTime'];

        $sql = "select userId,COUNT(userId) from " . DB_PREFIX . "group_member where ctime BETWEEN '$startTime' AND '$endTime' group by userId having(count(userId)>4)";
        $result = mysql_query($sql);
        $rows = mysql_num_rows($result);
        while ($row = mysql_fetch_assoc($result)) {
            $userId[] = $row['userId'];
        }

        $arrData['userId'] = $userId;

        for ($i = 0; $i < $rows; $i++) {
            $Id = $arrData['userId'][$i];
            $sqll = "select username,mobile from " . DB_PREFIX . "forms where userId = $Id";
            $sqlone = "select nickname from " . DB_PREFIX . "users where userId = '$Id'";
            $resultone = mysql_query($sqlone);
            $resultt = mysql_query($sqll);
            while ($rowone = mysql_fetch_assoc($resultone)) {
                $nickname = urldecode($rowone['nickname']);
            }
            $arr[] = $nickname;

            while ($roww = mysql_fetch_assoc($resultt)) {
                $username = $roww['username'];
                $mobile = $roww['mobile'];
            }
            $arr[] = $username;
            $arr[] = $mobile;
        }

        return $arr;
    }
}