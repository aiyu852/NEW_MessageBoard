<?php
header("content-type:text/html;charset=utf-8");
require ("header.php");
    unset($_SESSION['username']);
    echo '
        <meta http-equiv="refresh" content="0;url=index.php" /> 
    ';
