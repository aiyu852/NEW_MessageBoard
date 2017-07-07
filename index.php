<?php
    require("header.php");
    /*         子网页的检查！            */
//    require("login.php");
    $sql = "SELECT username,title,content,date FROM msg";
    $result = $con->query($sql);




if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc())
    {
    echo '


<div class="box">
    <div class="left">
    <p class="p">留言人<br />'.$row["username"].'</p></div>
    <div class="center">
    <p class="p">标题<br />'.$row["title"].'</p>
    <p class="p">内容<br />'.$row["content"].'</p></div>
    <div class="right">
    <p class="p">'.$row["date"].'</p></div>
    <div class="clear"></div>
</div>
';
}
}






//    $sql = "SELECT id,username,password FROM user";
//    $result = $con ->query($sql);
//   if ($result->num_rows > 0){
//       while ($row = $result->fetch_assoc()){
//           echo"<br>id ".$row["id"]."   -username ".$row["username"]."   -password".$row["password"];
//       }
//   }


/*********真正内容  */






    require("footer.php");
/**
 * Created by PhpStorm.
 * User: 艾煜
 * Date: 2017/3/10
 * Time: 21:37
 */