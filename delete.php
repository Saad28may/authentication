<?php
require "config.php";
if(isset($_SESSION['email']))
{
    $id = $_GET["id"];

    $sql = sprintf("DELETE FROM `users` WHERE `users`.`id` = %d" , $id );
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    header("location: display.php");
}
else{
   echo  "Please login to continue"; 
}
?>