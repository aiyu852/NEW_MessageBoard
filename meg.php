<?php
require ("header.php");
//echo $_SESSION['username'];

/* 由此看出 session 是不能直接传值给变量的？？？ */
//$Username = $_SESSION['username'];
//echo $Username;
/**/

$OK = 1;
$TitleErr = $ContentErr = $AnonymousErr = " ";
$check1 = $check2 =" ";
if (isset($_POST["submit"])){
//    echo $_SESSION['username'];
    $Title = input_safety($_POST["title"]);
    $Content = input_safety($_POST["message"]);
    date_default_timezone_set("Asia/Shanghai");
    $Time = date("Y-m-d H:i:s");
    $Anonymous = $_POST["anonymous"];
    $Username = $_SESSION['username'];
    if(empty($Title)){
        $TitleErr = "标题不得为空！";
        $OK = 0;
    }
    if(empty($Content)){
        $ContentErr = "内容不得为空！";
        $OK = 0;
    }
    if ($Anonymous == 1){
        $result = $con->query("SELECT username FROM user WHERE id = '3' ");
        $row = $result->fetch_assoc();
        $Username = $row["username"];
    }
    elseif(!$_SESSION['username']){
        $AnonymousErr = "您未登录！该页面将会在 3 秒后跳转到登陆页！";
        echo'
            <meta http-equiv="refresh" content="3;url=login.php">
        ';
        $OK = 0;
    }
    if ($OK){
        $con->query("INSERT INTO msg (username,title,content,date) VALUES ('$Username','$Title','$Content','$Time');");
        echo '
           <p class="meg_p"> 发表成功，将在 3 秒后跳转回到主页！<br />
   
           <a href="index.php">若您的浏览器无反应请点击此处回到主页！</a>
           </p> 
        ';
        echo '<meta http-equiv="refresh" content="3;url=index.php" />';
    }
}







?>


<div>
    <form action="meg.php" method="post" class="meg_form">
        <br />
        <br />
        <br />
        标题：<input type="text" name="title" placeholder="title" size="50" maxlength="500">
        <br />
        <span class="error"><?php echo $TitleErr; ?></span>
        <br />
        <br />
        <label>内容：</label>
        <textarea placeholder="Message" name="message" rows="5" cols="52"></textarea>
        <br />
        <span class="error"><?php echo $ContentErr; ?></span>
        <br />
        是否匿名：
        <br />
        <label for="no">否</label>
        <input type="radio" name="anonymous" id="no" value="0" checked>
        <label for="yes">是</label>
        <input type="radio" name="anonymous" id="yes" value="1">
        <br />
        <span class="error"><?php echo $AnonymousErr; ?></span>
        <br />
        <p>目前用户为<?php if ($_SESSION['username'] != ""){echo $_SESSION['username'];}else{echo "未知";} ?>
            <br />
            <input type="submit" name="submit" value="发表">
    </form>
</div>


<?php
require ("footer.php");
/**
 * Created by PhpStorm.
 * User: 艾煜
 * Date: 2017/3/15
 * Time: 17:15
 */