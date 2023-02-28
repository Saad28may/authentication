<?php
require "config.php";
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
}
$sid = $_GET["sid"];

$sql = sprintf("DELETE FROM `products` WHERE `products`.`sid` = %d" , $sid );
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
 header("location: products.php");
?>