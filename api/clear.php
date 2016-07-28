<?php
session_start();

setcookie("openid2", "", time()-3600, '/male1512/');

var_dump($_COOKIE);
exit();
?>