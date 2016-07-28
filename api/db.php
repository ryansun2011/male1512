<?php
if ( DEVELOP_MODE ) {
	$db_host = "localhost"; 
	$db_user = "root";
	$db_pass = "root";
	$db_data = "campaign";
	$db=mysql_connect($db_host,$db_user,$db_pass);
}else{
	$db_host = SAE_MYSQL_HOST_M; 
	$db_port = SAE_MYSQL_PORT;
	$db_user = SAE_MYSQL_USER;
	$db_pass = SAE_MYSQL_PASS;
	$db_data = SAE_MYSQL_DB;
	$db=mysql_connect($db_host.':'.$db_port,$db_user,$db_pass);
}


mysql_select_db($db_data);
mysql_set_charset('utf8',$db);
?>