<?php
    require ("header.php");


/*             注册提交处理               */
    $OK = 1;
    $UsernameErr = $PasswordErr = " ";
    if(isset($_POST["submit"])){
//        echo "hello";
        $Username = input_safety($_POST["username"]);
        $Password = input_safety($_POST["password"]);
        $_Password = input_safety($_POST["pdr"]);
        if(empty($Username)){
            $UsernameErr = "用户名不得为空！";
            $OK=0;
        }
        elseif (!preg_match("/^[a-zA-Z0-9]+$/",$Username)){
            $UsernameErr = "用户名只能为大小写字母和数字！";
            $OK = 0;
        }
        if (empty($Password)){
            $PasswordErr = "密码不得为空！";
            $OK = 0;
        }
        if ($_Password!=$Password){
            $PasswordErr = "两次输入密码必须相同";
            $OK = 0;
        }
        if ($OK){
            $Permit = 1;
            $reUsername =" ";
            $result = $con->query("SELECT username FROM user WHERE username = '$Username'");
            $row = $result -> fetch_assoc();
            if($result->num_rows > 0){
                $UsernameErr = "此账户已存在";
                $Permit = 0;
            }
            if ($Permit){
                $con->query("INSERT INTO user (username,password) VALUES ('$Username','$Password')");
                echo"
                       <p class='su_p'>欢迎您的加入,该页面将会在3秒后跳转到登录页。
                        <br />
                        <a href='login.php'>若您的浏览器无反应请点击此处到登录页！</a></p>
                ";
                echo '<meta http-equiv="refresh" content="3;url=login.php" /> ';
            }
        }
    }





?>

   <!          注册提交页        >
<br />
    <div class="sud">
        <form action="signup.php" method="post" class="suf">
                账号（昵称）：<input type="text" name="username" placeholder="Username"  size="30" maxlength="10">
                <br />
                <span class="error"><?php echo $UsernameErr;?></span>
                <br />
                <br />
                密码：<input type="password" name="password" placeholder="Password" size="30" maxlength="20">
                <br />
                <span class="error"><?php echo $PasswordErr;?></span>
                <br />
                <br />
                重复密码：<input type="password" name="pdr" placeholder="Password"  size="30" maxlength="20" >
                <br />
                 <br />
                <input type="submit" name="submit" value="注册">
        </form>
    </div>

<?php
    require ("footer.php");
/**
 * Created by PhpStorm.
 * User: 艾煜
 * Date: 2017/3/14
 * Time: 17:16
 */