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
                    <meta http-equiv="content-type" content="text/html;charset=utf-8">
                    <title>MessageBoard</title>
                    <link href="css.css" rel="stylesheet" type="text/css">
                </head>
                <body>
                    <div class="header_div">
                            <p class="header_p">EricAlan的留言板</p>
                            <a href="index.php"><p class="header_p">主页</p></a>
                    </div>
                </body>
            </html>';

session_start();
if($_SERVER['PHP_SELF'] = 'index.php'){
    echo '
        <button  class="btn-1" type="button" onclick="window.location.href=(\'login.php\')" class="button">登录</button>
        <button class="btn-2" type="button" onclick="window.location.href=(\'meg.php\')" class="button">留言</button>
    ';
}
if (!$_SESSION['username']){
    echo '
        <button class="button" type="button" onclick="window.location.href=(\'signup.php\')" class="button">注册</button>
    ';
}

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