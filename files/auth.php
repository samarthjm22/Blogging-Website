<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: blog.php");
exit(); }
?>
