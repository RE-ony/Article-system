<?php
session_start();
$title=$_POST["title"];
$name=$_SESSION["name"];
$content=$_POST["content"];
$time=$_POST["time"];
if($title!=""&&$name!=""&&$content!=""){
	$link=mysqli_connect("localhost","root","123456","article");
	mysqli_set_charset($link,"utf8");
	$result=mysqli_query($link,"insert into articles values(null,'$title','$content','$name','$time') ");
	$getid = mysqli_query($link, "select article_id from articles order by article_id desc LIMIT 1");
	$count = mysqli_num_rows($getid);
	if ($count > 0) {
		while ($row = mysqli_fetch_assoc($getid)) {
			$theId=$row["article_id"];
			$upfile=mysqli_query($link,"UPDATE file SET file_id = '$theId' WHERE file_id = '-1'");
			$uptitle=mysqli_query($link,"UPDATE arcticle_title SET file_id = '$theId' WHERE file_id = '-1'");
		}
	}
	echo "true";
}else{
	echo"false";
}
mysqli_close($link);
?>