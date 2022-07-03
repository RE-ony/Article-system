<?php
session_start();
if($_SESSION && isset($_SESSION["name"]))
{
	$name=$_SESSION["name"];
	$commentInfo=$_POST["commentInfo"];
	$arctileId = $_SESSION["arctileId"];
	$time=$_POST["time"];
	$link=mysqli_connect("localhost","root","123456","article");
	mysqli_set_charset($link,"utf8");
	$result=mysqli_query($link,"insert into comment values(null,'$name','$commentInfo','$arctileId','$time') ");
	$json=["name"=>$name,"commentInfo"=>$commentInfo,"time"=>$time];
	echo json_encode($json);
}else{
	echo "false";
}
?>