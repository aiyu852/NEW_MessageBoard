<?php
header("content-type:text/html;charset=utf-8");
    require ("header.php");


/* 注冊提交處理 */
    $OK = 1;
    $UsernameErr = $PasswordErr = "";
    if(isset($_POST["submit"])){
        $Username = input_safety($_POST["username"]);
        $Password = input_safety($_POST["password"]);
        $_Password = input_safety($_POST["pdr"]);
        if(empty($Username)){
            $UsernameErr = "用戶名不得為空！";
            $OK=0;
        }
        elseif (!preg_match("/^[a-zA-Z0-9]+$/",$Username)){
            $UsernameErr = "用戶名只能為大小寫字母和數字！";
            $OK = 0;
        }
        if (empty($Password)){
            $PasswordErr = "密碼不得為空！";
            $OK = 0;
        }
        if ($_Password!=$Password){
            $PasswordErr = "兩次輸入密碼必須相同";
            $OK = 0;
        }
        if ($OK){
            $Permit = 1;
            $reUsername =" ";
            $result = $con->query("SELECT username FROM user WHERE username = '$Username'");
            $row = $result -> fetch_assoc();
            if($result->num_rows > 0){
                $UsernameErr = "此帳號已存在";
                $Permit = 0;
            }
            if ($Permit){
                $con->query("INSERT INTO user (username,password) VALUES ('$Username','$Password')");
                echo"
                       <p class='info'>歡迎您的加入,該頁面將會在3秒後跳轉到登錄頁。
                        <br>
                        <a href='login.php'>若您的瀏覽器無反應請點擊此處到登錄頁！</a></p>
                ";
                echo '<meta http-equiv="refresh" content="3;url=login.php" /> ';
            }
        }
    }





?>

   <!--注冊提交頁-->
<br>
    <div class="signup_div">
        <form class="signup_form" onsubmit="return signup_check();" name="signup" action="signup.php" method="post">
			<table class="signup">
			  <tr>
				<td class="signup-a">用戶名：</td>
				<td class="signup-a">
					<input class="signup-input" type="text" name="username" placeholder="Username" maxlength="10">
				</td>
			  </tr>
			  <tr>
				<td class="signup-a">密碼：</td>
				<td class="signup-a">
					<input class="signup-input" type="password" name="password" placeholder="Password" maxlength="20">
				</td>
			  </tr>
			  <tr>
				<td class="signup-a">重複密碼：</td>
				<td class="signup-a">
					<input class="signup-input" type="password" name="pdr" placeholder="Password" maxlength="20">
				</td>
			  </tr>
			</table>
        <br>
          <button type="submit" name="submit">注冊</button>
        </form>
    </div>
<script>
  function signup_check(){
    if(document.getElementById("username").value =='' && document.getElementById("password").value == ''){
      alert('帳號與密碼不得為空');
      document.getElementById("username").focus();
      return false;
    }
    else if(document.getElementById("username").value =='')
    {
      alert('用戶名不得為空！');
      document.getElementById("username").focus();
      return false;
    }
    else if(document.getElementById("password").value =='')
    {
      alert('密碼不得為空');
      document.getElementById("password").focus();
      return false;
    }
    else if(document.getElementById("pdr").value !== document.getElementById("password").value)
    {
      alert('兩次輸入密碼必須相同');
      document.getElementById("pdr").focus();
      return false;
    }
    return true;
  }
  <?php
  //根據上方的 $UsernameErr $PasswordErr 來判別要不要印出 alert
  if($UsernameErr != '')
  {
    echo "alert('{$UsernameErr}');";
  }

  if($PasswordErr != '')
  {
    echo "alert('{$PasswordErr}');";
  }
  ?>
</script>
<?php require ("footer.php"); ?>