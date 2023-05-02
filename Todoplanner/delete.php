<?php 
include "config.php";
$id = $_GET['btn'];
echo $id;
mysqli_query($con,"DELETE FROM `todolist` WHERE  `id` = '$id' ");
header("location:todolist.php");
?>