<?php 
session_start();
$arctileId = $_REQUEST["arctileId"];
$_SESSION["arctileId"] = $arctileId;
?>