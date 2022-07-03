<?php
session_start();
function display(&$str){
	$str=iconv('gb2312','utf-8',$str);
}
if ($_SESSION && isset($_SESSION["arctileId"])) {
	$arctileId = $_SESSION["arctileId"];
	$link=mysqli_connect("localhost","root","123456","article");
	mysqli_set_charset($link,"utf8");
	$result=mysqli_query($link,"select * from arcticle_title where file_id='$arctileId'");
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
}
?>