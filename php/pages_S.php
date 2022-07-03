<?php
session_start();
$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
$keyboard = $_SESSION["keyboard"];
$result=mysqli_query($link,"SELECT COUNT(article_id) FROM articles WHERE LOCATE('$keyboard',article_title) OR LOCATE('$keyboard',article_content);");
$count=mysqli_num_rows($result);
$data=array();
if($count>0){
	for($i=0;$i<$count;$i++){
		$data[$i]=mysqli_fetch_assoc($result);
	}
}
echo $data[0]["COUNT(article_id)"];
mysqli_close($link);
?>