<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/11
 * Time: 13:04
 */
class mysql{
    public function form_check($username,$telphone,$employee_number,$email){
        if(mb_strlen($username,'utf-8')<=0||mb_strlen($username,'utf-8')>30){
            $hasError = true;
            $strError .= '姓名为空或多于30字。';
        }

        $pattern = "/^1[3-8]\d{9}$/i";
        if ( !preg_match( $pattern, $telphone ) ) {
            $hasError = true;
            $strError .= '手机格式不对。';
        }

        $pattern = "/^\d{6,8}$/i";
        if(!preg_match($pattern,$employee_number)){
            $hasError = true;
            $strError .= '员工号必须是6-8位的数字。';
        }

        $pattern = "/^\w+(\.\w+)?@[a-z0-9\-]+(\.[a-z]{2,6}){1,2}$/i";
        if ( !preg_match( $pattern, $email ) ) {
            $hasError = true;
            $strError .= '邮箱格式不对。';
        }

        if($hasError){
            echo '{"result":-1,"msg":"'.$strError.'"}';
            exit();
        }
    }
    public function mysql_result($sql){
        $get_sql = $sql;
        $result = mysql_query($get_sql);
        return $result;
    }
    public function mysql_rows($sql){
        $get_sql = $sql;
        $result = mysql_query($get_sql);
        $rows = mysql_num_rows($result);
        return $rows;
    }
    public function mysql_assoc($sql){
        $get_sql = $sql;
        $result = mysql_query($get_sql);
        $row = mysql_fetch_assoc($result);
        return $row;
    }
}