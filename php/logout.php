<?php
session_start();
// 删除session中存储的指定变量
unset($_SESSION["name"]);
unset($_SESSION["id"]);
//直接删除session中的所有数据
// session_destroy();
setcookie("uid", $uid, time() - 36000);
setcookie("id", $id, time() - 36000);
$name=$_SESSION["name"];
echo "true";
?>