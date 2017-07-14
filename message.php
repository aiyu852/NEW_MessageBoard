<?php
header("content-type:text/html;charset=utf-8");
require ("header.php");
//echo $_SESSION['username'];

/* 由此看出 session 是不能直接傳值給變量的？？？ */
//$Username = $_SESSION['username'];
//echo $Username;
/**/

$OK = 1;
$TitleErr = $ContentErr = $AnonymousErr = "";
$check1 = $check2 =" ";
if (isset($_POST["submit"])){
    $Title = input_safety($_POST["title"]);
    $Content = input_safety($_POST["message"]);
    date_default_timezone_set("Asia/Shanghai");
    $Time = date("Y-m-d H:i:s");
    $Anonymous = $_POST["anonymous"];
    $Username = $_SESSION['username'];
    if(empty($Title)){
        $TitleErr = "標題不得為空！";
        $OK = 0;
    }
    if(empty($Content)){
        $ContentErr = "內容不得為空！";
        $OK = 0;
    }
    if ($Anonymous == 1){
        $result = $con->query("SELECT username FROM user WHERE id = '3' ");
        $row = $result->fetch_assoc();
        $Username = $row["username"];
    }
    elseif(!$_SESSION['username']){
        $AnonymousErr = "您未登錄！該頁面將會在 3 秒後跳轉到登陸頁！";
        $OK = 0;
    }
    if ($OK){
        $con->query("INSERT INTO msg (username,title,content,date) VALUES ('$Username','$Title','$Content','$Time');");
        echo '
           <p class="info"> 發表成功，將在 3 秒後跳轉回到主頁！</p>
           <br>
           <p>
           <a href="index.php">若您的瀏覽器無反應請點擊此處回到主頁！</a>
           </p> 
        ';
        echo '<meta http-equiv="refresh" content="3;url=index.php" />';
    }
}
?>


<div class="message_div">
    <form class="message_form" onsubmit="return message_check();" action="message.php" method="post">
        <table class="message">
          <tr>
            <td class="message-title">標題：</td>
            <td class="message-title">
                <input class="message-input" type="text" name="title" placeholder="Title" maxlength="50">
            </td>
          </tr>
          <tr>
            <td class="message-content">內容：</td>
            <td class="message-content">
                <textarea class="message-text" id="message" 
                type="text" name="message" placeholder="Message" 
                rows="7" cols="50" maxlength="500" onkeyup="wordsTotal()"></textarea>
                <br>
                字數統計：<span id="display">0</span>
                <script type="text/javascript">
                  function wordsTotal() {
                    var total = document.getElementById('message').value.length;
                    document.getElementById('display').innerHTML = total;
                    if(total >= 500)
                    {
                    alert('字數超過限制');
                    }
                    }
                </script>
            </td>
          </tr>
        </table>
        <p>目前用戶為<?php if ($_SESSION['username'] != ""){echo $_SESSION['username'];}else{echo "未知";} ?></p>
        <button type="submit" name="submit">發表</button>
    </form>
</div>
<script>
  function message_check(){
    if(document.getElementById("title").value =='' && document.getElementById("message").value == ''){
      alert('標題與內容不得為空');
      document.getElementById("title").focus();
      return false;
    }
    else if(document.getElementById("title").value =='')
    {
      alert('標題不得為空！');
      document.getElementById("title").focus();
      return false;
    }
    else if(document.getElementById("message").value =='')
    {
      alert('內容不得為空！');
      document.getElementById("message").focus();
      return false;
    }
    return true;
  }
  <?php
  //根據上方的 $TitleErr $ContentErr $AnonymousErr 來判別要不要印出 alert
  if($TitleErr != '')
  {
    echo "alert('{$TitleErr}');";
  }

  if($ContentErr != '')
  {
    echo "alert('{$ContentErr}');";
  }

    if($AnonymousErr != '')
  {
    echo "alert('{$AnonymousErr}');location.href='login.php';";
  }
  ?>
</script>

<?php require ("footer.php"); ?>