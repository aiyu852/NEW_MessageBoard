<?php
require("condb.php");


/*保留此处  让子网页调用非常简单*/
/*!!输入安全!!*/
function input_safety($date){
    $date = str_replace("'","\"","$date" );
    $date = trim($date);
    $date = stripslashes($date);
    $date = htmlspecialchars(
        $date
    );
    return $date;
}




echo '
            <html>
                <head>
//                    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
                    <meta http-equiv="content-type" content="text/html;charset=utf-8">
                    <title>MessageBoard</title>
                    <link href="css.css" rel="stylesheet" type="text/css">
                </head>
                <body>
                    <div class="header_div">
                            <p class="header_p">EricAlan的留言板</p>
                            <a href="index.php"><p class="header_p">主页</p></a>
                    </div>
 ';

session_start();
//$_SESSION['username'];
//if(!$_SESSION['username']){
//    $_SESSION['username']=" ";
//}
if ($_SESSION['username']){
    echo "欢迎您！";
    echo $_SESSION['username'];
    echo "<br />";
}

if($_SESSION['username']){
    echo '
        <button class="button" type="button" onclick="window.location.href=(\'out.php\')">退出</button> 
    ';
}
else {
    echo '
        <button class="button" type="button" onclick="window.location.href=(\'login.php\')">登录</button>
        <button class="button" type="button" onclick="window.location.href=(\'signup.php\')" >注册</button>
    ';
}
    echo '
        <button class="button" type="button" onclick="window.location.href=(\'meg.php\')" >留言</button>
    ';


//$_SESSION['view']=1234567890;
//echo $_SESSION['view'];

//if (isset($_SESSION['view'])){
//    echo "success!";
//}
//else{
//    echo "fail!";
//}




/*
 * Created by PhpStorm.
 * User: 艾煜
 * Date: 2017/3/10
 * Time: 19:42
 */