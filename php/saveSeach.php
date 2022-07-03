<?php 
session_start();
$keyboard = $_REQUEST["keyboard"];
$_SESSION["keyboard"] = $keyboard;
?>