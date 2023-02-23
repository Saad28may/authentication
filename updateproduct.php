<?php
require "config.php";
 $sid = $_POST["sid"];
 $pname = $_POST["pname"];
 $price =$_POST["price"];

 
 $sql = sprintf("UPDATE `products` SET `pname` = '%s', `price` = '%d' WHERE `products`.`sid` = %d" , $pname, $price , $sid );
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
 header("location: products.php");
?>

