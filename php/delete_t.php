<?php 
$file_dir = $_REQUEST["fileName"];
$link = mysqli_connect("localhost", "root", "123456", "article");
mysqli_set_charset($link, "utf8");
if (!unlink($file_dir)){
	echo "Error";
}else{
	echo "Deleted";
	$result = mysqli_query($link, "DELETE from arcticle_title where file_true_path='$file_dir'");
}
mysqli_close($link);
?>