<?php
require "config.php";
$sid = $_GET["sid"];

$sql = sprintf("DELETE FROM `products` WHERE `products`.`sid` = %d" , $sid );
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
 header("location: products.php");
?>