<?php
include 'partials/nav.php';
require "config.php";
session_start();

$email = $_SESSION['email'];
$password = $_SESSION["password"];

if (!isset($_SESSION['email'])) {
    header("location:login.php");
}

 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
<h3>All Products</h3>

  <a href="addproduct.php">Add Products</a>

    <hr>
    <div class="container my-4">

<table class="table" id="prdTable">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql = "SELECT * FROM `products`";
      $result = mysqli_query($conn, $sql);
      $id = 0;
      while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
        <td> <?php echo $row['sid'];   ?> </td>
        <td> <?php echo $row['pname'];  ?></td>
        <td> <?php echo $row['price'];  ?></td>
        <td>
        
          <a href="editproduct.php?sid=<?php echo $row['sid'];   ?>">Edit</a>
          <a href="deleteproduct.php?sid=<?php echo $row['sid'];   ?>" >Delete</a>
        </td>
      </tr>
     <?php } 
      ?>

  </tbody>
</table>
