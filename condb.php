<?php
header("Content-Type:text/html;charset=utf-8");
//error_reporting(E_ALL || ~E_NOTICE);
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'mgbd');
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$con){
    die("連接失敗".mysqli_connect_error());
}
?>

/**
 * Created by PhpStorm.
 * User: 艾煜
 * Date: 2017/3/10
 * Time: 18:20
 */
