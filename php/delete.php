<?php 
$fileName = $_REQUEST["fileName"];
$filePath = $_REQUEST["filePath"];
$file_dir = $filePath."/".$fileName;
$link = mysqli_connect("localhost", "root", "123456", "article");
mysqli_set_charset($link, "utf8");
if (!unlink($file_dir)){
	echo "Error";
}else{
	echo "Deleted";
	$result = mysqli_query($link, "DELETE from file where file_path_name='$fileName'");
}
mysqli_close($link);
?>