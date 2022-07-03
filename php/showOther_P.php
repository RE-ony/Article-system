<?php
function display(&$str){
	$str=iconv('gb2312','utf-8',$str);
}
$link=mysqli_connect("localhost","root","123456","article");
mysqli_set_charset($link,"utf8");
$page=$_POST["pageNum"];
$size=10;
$start=($page-1)*$size;
	$result=mysqli_query($link,"SELECT articles.article_id,articles.article_title,articles.article_content,articles.author,articles.time,arcticle_title.file_all_path FROM articles LEFT JOIN arcticle_title on articles.article_id=arcticle_title.file_id ORDER BY articles.article_id ASC LIMIT $start,10;");
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