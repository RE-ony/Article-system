<?php
$aid=$_POST["aid"];
$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
if($aid>0){
	mysqli_query($link, "SET AUTOCOMMIT=0"); // 设置为不自动提交，因为MYSQL默认立即执行
	mysqli_begin_transaction($link);            // 开始事务定义
	$resultComment = mysqli_query($link, "DELETE from comment where art_id='$aid'");
	if(!$resultComment){
		mysqli_query($link, "ROLLBACK");
	}
	$resultFile=mysqli_query($link,"select file_true_path from file where file_id='$aid'");
	$count=mysqli_num_rows($resultFile);
	$arr=array();
	if($count>0){
		for($i=0;$i<$count;$i++){
			$arr[$i]=mysqli_fetch_assoc($resultFile);
		}
	}
	//var_dump($arr);
	for($i = 0; $i < count($arr); $i++) {
		$fileName=$arr[$i]["file_true_path"];
		//echo $fileName;
		if (!unlink($fileName)){
			echo "Error";
		}
	}
	$result = mysqli_query($link, "DELETE from file where file_id='$aid'");
	if(!$result){
		mysqli_query($link, "ROLLBACK");
	}
	$resultArticle=mysqli_query($link,"delete from articles where article_id='$aid'");
	if(!$resultArticle){
		mysqli_query($link, "ROLLBACK");
	}
	echo "Deleted";
}else{
	echo"Error";
}
mysqli_commit($link); 
mysqli_close($link);
?>