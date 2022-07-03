<?php
session_start();
if ($_SESSION && isset($_SESSION["name"])) {
	$name = $_SESSION["name"];
	echo $name;
} elseif ($_COOKIE && isset($_COOKIE["uid"])) {
	$uid=$_COOKIE["uid"];
	$_SESSION["name"] = $uid;
	$name = $_SESSION["name"];
	$hespon_id=$_COOKIE["hespon_id"];
	$_SESSION["hespon_id"] = $hespon_id;
	echo $name;
}else{
	echo "";
}
//检查用户是否登录
?>