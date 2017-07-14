<?php
header("Content-Type:text/html;charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'megbd');
define('DB_PORT', '3306');
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
if(!$con){
    die("連接失敗".mysqli_connect_error());
}
$con->query("SET CHARACTER SET utf8");
?>