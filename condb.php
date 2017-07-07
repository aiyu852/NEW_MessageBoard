<?php
error_reporting(E_ALL || ~E_NOTICE);
$con = mysqli_connect("localhost","test","test1234","nehscsa_megbd");
if(!$con){
    die("连接失败".mysqli_connect_error());
}
//    echo "ok";


/**
 * Created by PhpStorm.
 * User: 艾煜
 * Date: 2017/3/10
 * Time: 18:20
 */