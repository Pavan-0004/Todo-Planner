<?php 
include "config.php";
$text = $_POST['text'];
mysqli_query($con,"INSERT INTO `todolist`(`list`) VALUES ('$text')");
header("location:todolist.php");
?>