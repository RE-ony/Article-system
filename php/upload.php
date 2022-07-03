<?php
session_start();
if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	$upfile = $_FILES["file"];//获取数组里面的值
	$name = $upfile["name"]; //上传文件的文件名
	$type = $upfile["type"]; //上传文件的类型
	$size = $upfile["size"]; //上传文件的大小
	$tmp_name = $upfile["tmp_name"]; //上传文件的临时存放路径
	$file_path="D:/phpstudy_pro/WWW/php/uploads/".date("Ymd");
	$id="";
	if(!file_exists($file_path)){
		mkdir($file_path);
	}
	$error = $upfile["error"]; //上传后系统返回的值
	$file_name=time().$name;
	move_uploaded_file($tmp_name, $file_path."/" . $file_name);
	$arr=array();
	$file_path_name=date("Ymd")."/".$file_name;
	$arr[]=$file_path_name;
	$fileAllPath="http://localhost/php/uploads/".$file_path_name;
	$fileTruePath=$file_path."/".$file_name;
	if ($error == 0) {
		$id = $_SESSION["id"];
		$uName=$_SESSION["name"];
		$json=["code"=>0,"src"=>$fileAllPath,"fileName"=>$file_name,"filePath"=>$file_path];
		echo json_encode($json);
		$link = mysqli_connect("localhost", "root", "123456", "article");
		mysqli_set_charset($link, "utf8");
		$result=mysqli_query($link,"insert into file values('$id','$uName','$name','$file_name','-1','$fileAllPath','$fileTruePath') ");
		mysqli_close($link);
	} elseif ($error == 1) {
		echo "超过了文件大小，在php.ini文件中设置";
	} elseif ($error == 2) {
		echo "超过了文件的大小MAX_FILE_SIZE选项指定的值";
	} elseif ($error == 3) {
		echo "文件只有部分被上传";
	} elseif ($error == 4) {
		echo "没有文件被上传";
	} else {
		echo "上传文件大小为0";
	}
}
?>