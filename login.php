<?php
header("content-type:text/html;charset=utf-8");

//    session_start();
/*完善提交表單處理工作*/
/*!! 表單與數據庫交互處理 !!*/
require("header.php");

$Online=1;
$Username_Err = $Password_Err = "";
if(isset($_POST["submit"])){
  $Username = input_safety($_POST["username"]);
  $Password = input_safety($_POST["password"]);

  if($Online){
    $OK=1;
    $realUsername = $realPassword = " ";
    $result = $con->query("SELECT username,password FROM user where username = '$Username'");
    $row= $result->fetch_assoc();
    if($result->num_rows == 0){
      $Username_Err = "不存在此帳號";
      $OK =0;
    }
    elseif($row["password"] != $Password){
      $Password_Err = "密碼錯誤";
      $OK =0;
    }
    if($OK) {
      echo '
      <p class="info">';
      echo "
      歡迎您的登錄,該頁面將會在3秒後跳轉到主頁。
      <br>
      <a href='index.php'>若您的瀏覽器無反應請點擊此處回到主頁！</a>
      </p>
      ";
      /*關於設置session 和cookie 的區別 待補充 */
      //echo $row["username"];
      $_SESSION['username']=$row["username"];
      //echo $_SESSION['username'];
      echo '<meta http-equiv="refresh" content="3;url=index.php" />';
    }
  }
}


?>

<div class="login_div">
  <form  class="login_form" onsubmit="return login_check();" action="login.php" method='post'>
    <table class="login">
      <tr>
        <td class="login-a">用戶名：</td>
        <td class="login-a">
          <input class="login-input" type="text" name="username" id="username" placeholder="Username" maxlength="10">
        </td>
      </tr>
      <tr>
        <td class="login-a">密碼：</td>
        <td class="login-a">
          <input class="login-input" type="password" name="password" id="password" placeholder="Password" maxlength="20">
        </td>
      </tr>
    </table>
    <br>
    <button type="submit" name="submit">登入</button>
  </form>
</div>
<script>
  function login_check(){
    if(document.getElementById("username").value =='' && document.getElementById("password").value == ''){
      alert('帳號與密碼不得為空');
      document.getElementById("username").focus();
      return false;
    }
    else if(document.getElementById("username").value =='')
    {
      alert('帳號不得為空');
      document.getElementById("username").focus();
      return false;
    }
    else if(document.getElementById("password").value =='')
    {
      alert('密碼不得為空');
      document.getElementById("password").focus();
      return false;
    }
    return true;
  }
  <?php
  //根據上方的 $Username_Err $Password_Err 來判別要不要印出 alert
  if($Username_Err != '')
  {
    echo "alert('{$Username_Err}');";
  }

  if($Password_Err != '')
  {
    echo "alert('{$Password_Err}');";
  }
  ?>
</script>

<?php require('footer.php');?>
