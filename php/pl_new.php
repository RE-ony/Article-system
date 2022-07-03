<?php
function display(&$str){
	$str=iconv('gb2312','utf-8',$str);
}
$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
$id=$_POST["id"];
$result=mysqli_query($link,"select * from comment where art_id='$id'");
$count=mysqli_num_rows($result);
$data=array();
if($count>0){
	for($i=0;$i<$count;$i++){
		// $row = mysqli_fetch_assoc($result);
		$data[$i]=mysqli_fetch_assoc($result);
	}
}

mysqli_close($link);
array_walk_recursive($data,"display");
echo json_encode($data);
?>