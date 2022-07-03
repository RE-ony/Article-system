<?php
session_start();
$uid = $_REQUEST["uid"];
$pwd = $_REQUEST["pwd"];
$md5pwd = md5($pwd);
$isin = $_REQUEST["isin"];
$link = mysqli_connect("localhost", "root", "123456", "article");
mysqli_set_charset($link, "utf8");
$result=mysqli_query($link, "select * from user where name='$uid' and password='$md5pwd'");
$islog = mysqli_query($link, "select isuse from user where name='$uid' and password='$md5pwd'");
$count = mysqli_num_rows($result);
if ($count > 0) {
	if ($isin == true) {
		while ($row = mysqli_fetch_assoc($result)) {
			if($row["isuse"]=="T"){
				setcookie("uid", $uid, time() + 36000);
				$id=$row["id"];
				setcookie("id", $id, time() + 36000);
				$hespon_id=$row["hespon_id"];
				setcookie("hespon_id", $hespon_id, time() + 36000);
				$_SESSION["name"] = $uid;
				$_SESSION["id"] = $id;
				$_SESSION["hespon_id"] = $hespon_id;
				$print=$row["type"];
				echo $print;
			}else{
				echo "false";
			}
		}
	} else {
		while ($row = mysqli_fetch_assoc($result)) {
			if($row["isuse"]=="T"){
				session_start();
				// 保存登录信息
				$id=$row["id"];
				$_SESSION["name"] = $uid;
				$_SESSION["id"] = $id;
				$_SESSION["hespon_id"] = $hespon_id;
				$print=$row["type"];
				echo $print;
			}else{
				echo "false";
			}
		}
	}
}else{
	echo "false";
}
mysqli_close($link);
?>