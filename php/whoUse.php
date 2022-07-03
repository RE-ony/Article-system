<?php
session_start();
function display(&$str){
	$str=iconv('gb2312','utf-8',$str);
}
$type="";
if ($_SESSION && isset($_SESSION["hespon_id"])) {
	$type = $_SESSION["hespon_id"];
} elseif ($_COOKIE && isset($_COOKIE["hespon_id"])) {
	$uid=$_COOKIE["hespon_id"];
	$_SESSION["hespon_id"] = $uid;
	$type = $_SESSION["hespon_id"];
}else{
	$type="";
}
$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
$result=mysqli_query($link,"SELECT titlt_name,url FROM function_menu WHERE id IN (SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(perstr, ',', help_topic_id + 1), ',', -1) FROM mysql.help_topic, role WHERE 1=1 AND help_topic_id < LENGTH(perstr) - LENGTH(REPLACE(perstr, ',', ''))+1 AND id='$type');");
$count=mysqli_num_rows($result);
$data=array();
if($count>0){
	for($i=0;$i<$count;$i++){
		$data[$i]=mysqli_fetch_assoc($result);
	}
}
array_walk_recursive($data,"display");
echo json_encode($data);
mysqli_close($link);
?>