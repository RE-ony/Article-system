<?php
$uid=$_REQUEST["uid"];
$pwd=$_REQUEST["pwd"];
$isin = $_REQUEST["isin"];
$md5pwd=md5($pwd);
$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
//$result=mysqli_query($link,"insert into user (name,password) values ('$tel','$pwd')");
$result=mysqli_query($link,"insert into user values(null,'$uid','$md5pwd','user','2','T','$isin') ");
echo"true";
mysqli_close($link);
?>