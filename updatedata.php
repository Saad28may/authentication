<?php
require "config.php";
 $id = $_POST["id"];
 $name = $_POST["name"];
 $email =$_POST["email"];
 $password =$_POST["password"];
 $phone = $_POST["phone"];
 
 $sql = sprintf("UPDATE `users` SET `name` = '%s', `email` = '%s', `phone` = '%s' WHERE `users`.`id` = %d" , $name, $email,$phone ,$id );
 $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
 header("location: display.php");
?>