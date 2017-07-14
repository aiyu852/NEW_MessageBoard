<?php
header("content-type:text/html;charset=utf-8");
require("header.php");
    $sql = "SELECT username,title,content,date FROM msg";
    $result = $con->query($sql);

if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc())
    {
    echo '
      <div class="box_div">
        <table class="box">
          <tr>
            <td class="box-profile" rowspan="3">'.$row["username"].'</td>
            <td class="box-title">'.$row["title"].'</td>
          </tr>
          <tr>
            <td class="box-content">'.$row["content"].'</td>
          </tr>
          <tr>
            <td class="box-date">發佈時間：'.$row["date"].'</td>
          </tr>
        </table>
      </div>
         ';
    }
    require("footer.php");
}