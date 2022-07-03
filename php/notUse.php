<?php
session_start();
$userId=$_POST["userId"];
$isuse=$_POST["isuse"];
$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
if($isuse=="T"){
	$result=mysqli_query($link,"UPDATE user SET isuse = 'F' WHERE id = $userId");	
	echo "successe";
}else{
	$result=mysqli_query($link,"UPDATE user SET isuse = 'T' WHERE id = $userId");
	echo "true";
}
mysqli_close($link);
?>