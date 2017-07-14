<?php
header("content-type:text/html;charset=utf-8");
require("condb.php");
/*保留此處  讓子網頁調用非常簡單*/
/*!!輸入安全!!*/
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
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NEHSCSA 留言板</title>
    <link href="css.php?file=style.css" rel="stylesheet" type="text/css">
    <link href="css.php?file=mobile-style.css" rel="stylesheet" type="text/css">
    <link href="css.php?file=tablet-style.css" rel="stylesheet" type="text/css">
    <link href="css.php?file=component.css" rel="stylesheet" type="text/css">
    <link href="css.php?file=mobile-component.css" rel="stylesheet" type="text/css">
    <link href="css.php?file=button.css" rel="stylesheet" type="text/css">
    <link href="css.php?file=mobile-button.css" rel="stylesheet" type="text/css">
    <meta name="description" content="中科實中資研社(NEHSCSA) 創立於106學年度。歡迎同樣對資訊科技有興趣的「電腦人」，用本社所提供的知識組裝形體，並用自身的創意與熱忱當燃料，朝未來邁進。">
    <meta name="author" content="NEHSCSA">
    <meta property="fb:admins" content="carry0987"/>
    <meta property="fb:app_id" content="1455782504488287">
    <meta property="og:title" content="NEHSCSA 留言板">
    <meta property="og:site_name" content="中科實中資研社-NEHSCSA">
    <meta property="og:description" content="本社是在第7屆的13位幹部與5屆學長的幫助下於106學年度新創立的社團，歡迎各位加入。">
    <meta property="og:type" content="blog">
    <meta property="og:url" content="https://www.nehscsa.com/mgbd">
    <meta property="og:image" content="https://www.nehscsa.com/icnc/fblogo1.png">
    <link rel="alternate" hreflang="zh-Hant" href="https://www.nehscsa.com/mgbd">
    <link rel="apple-touch-icon" href="https://www.nehscsa.com/icnc/apple-touch-icon-256x256.png" />
    <link rel="shortcut icon" sizes="256x256" href="https://www.nehscsa.com/icnc/apple-touch-icon-256x256.png" />
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Organization",
      "name": "NEHSCSA 留言板",
      "alternateName": "NEHSCSA",
      "founder": "陳佳吟",
      "url": "https://www.nehscsa.com/mgbd",
      "logo": "https://www.nehscsa.com/icnc/nehscsa.png",
      "email": "mailto:nehscsa@gmail.com",
      "description": "中科實中資研社(NEHSCSA) 創立於106學年度。歡迎同樣對資訊科技有興趣的「電腦人」，用本社所提供的知識組裝形體，並用自身的創意與熱忱當燃料，朝未來邁進。",
      "sameAs": [
        "https://www.facebook.com/nehscsa"
      ]
    }
    </script>
</head>
<body>
    <div id="mainwrapper">
        <header id="header">
            <div id="logo">
                <a href="./"><img id="logo-img" src="https://www.nehscsa.com/icnc/nehscsa.png" alt="logo"></a>
            </div>
        </header>
 ';

session_start();
    echo '
        <div id="button">
        <table class="button_table">
        <tr>
    ';
if($_SESSION['username']){
    echo '
        <th class="button_table_a">
            <button class="button-act button-act-1 button-act-1a" type="button" onclick="window.location.href=(\'out.php\')">退出</button>
        </th>
    ';
}
else {
    echo '
        <th class="button_table_a">
            <button class="button-act button-act-1 button-act-1a" type="button" onclick="window.location.href=(\'login.php\')">登錄</button>
        </th>
        <th class="button_table_a">
            <button class="button-act button-act-1 button-act-1a" type="button" onclick="window.location.href=(\'signup.php\')">注冊</button>
        </th>
    ';
}
    echo '
        <th class="button_table_a">
            <button class="button-act button-act-1 button-act-1a" type="button" onclick="window.location.href=(\'message.php\')">留言</button>
        </th>
    ';

    echo '
      </tr>
      </table>
      </div>
    ';

if ($_SESSION['username']){
    echo "<table class='nowlogin'>目前登入：{$_SESSION['username']}</table>";
}
