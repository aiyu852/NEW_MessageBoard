<?php
    require("header.php");

/*   完善提交表单处理工作  */


    /*!! 表单与数据库交互处理 !!*/

    $Online=1;
    $Username_Err = $Password_Err = " ";
    if(isset($_POST["submit"])){
        $Username = input_safety($_POST["username"]);
        $Password = input_safety($_POST["password"]);
        /*!! 验证账户和密码 !!*/
        if(empty($Username)){
            $Username_Err = "账户名不得为空";
            $Online = 0;
        }
        if(empty($Password)){
            $Password_Err = "密码不得为空";
            $Online = 0;
        }
        if($Online){
            $OK=1;
            $realUsername = $realPassword = " ";
            $result = $con->query("SELECT username,password FROM user where username = '$Username'");
            $row= $result->fetch_assoc();
            if($result->num_rows == 0){
                $Username_Err = "不存在此账户";
                $OK =0;
            }
            elseif($row["password"] != $Password){
                $Password_Err = "该账号密码错误";
                $OK =0;
            }
            if($OK) {
                echo "
                        <p class='login_p'>欢迎您的登录,该页面将会在3秒后跳转到主页。
                        <br />
                        <a href='index.php'>若您的浏览器无反应请点击此处回到主页！</a></p>
                        ";
                /*!!   关于设置session 和cookie 的区别！   待补充   !!*/
                $_SESSION['username']=$row["username"];
                echo '<meta http-equiv="refresh" content="3;url=index.php" />';
            }
        }
    }


?>
<div class="login_div">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method='post' class="login_form">
        昵称：<input type="text" name="username" placeholder="Username"  size="30" maxlength="10">
        <br />
        <span class="error"><?php echo $Username_Err;?></span>
        <br />
        密码：<input type="password" name="password" placeholder="Password"   size="30" maxlength="20">
        <br />
        <span class="error"><?php echo $Password_Err;?></span>
        <br />
        <input type="submit" name="submit" value="登录" >
    </form>
</div>



   <?php require("footer.php");
/**
 * Created by PhpStorm.
 * User: 艾煜
 * Date: 2017/3/11
 * Time: 1:12
 */