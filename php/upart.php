<?php
session_start();
$aid=$_SESSION["arctileId"];
$title=$_POST["title"];
$content=$_POST["content"];
if($title!="")
{
    $link=mysqli_connect("localhost","root","123456","article");
    mysqli_set_charset($link,"utf8");
	$result=mysqli_query($link,"update articles set article_title='$title',article_content='$content' where article_id='$aid'");
    echo "true";
	mysqli_close($link);
}
else
{
    echo"false";
}
?>