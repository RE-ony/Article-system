<?php
session_start();
$aid=$_POST["aid"];
$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
$result=mysqli_query($link,"UPDATE user SET type = 'admin', hespon_id = '1', become_admin = 'true' WHERE id = $aid");
echo "successe";
mysqli_close($link);
?>