<?php
include 'partials/nav.php';
require "config.php";
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
}

    if(isset($_POST["submit"])){

        $pname = $_POST["pname"];
        $price =$_POST["price"];
        
        
    
       
        $sql = "INSERT INTO `products` (`pname`, `price`, `created_at`) VALUES ('$pname', '$price', NOW())";
        //$result = mysqli_query($conn, $sql);
        $stmt = mysqli_prepare($conn, $sql);
        if (mysqli_stmt_execute($stmt))
            {
                header("location: products.php");
            }
            else{
                echo "Something went wrong... cannot redirect!";
            }
    
    
    }


?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
<h3>Add Products here:</h3>
    <hr>
    <form method ="POST">
  <div class="mb-3">
  <div class="form-group">
      <label for="inputEmail4">Product Name</label>
      <input type="text" class="form-control" name="pname" placeholder="Enter Product  Name">
    </div>
    <div class ="form-group mt-4">
    <label for="exampleInputEmail1" class="form-label" placeholder="Enter Price">Price</label>
    <input type="number" class="form-control" name ="price">
    </div>

    </div>
  <div class="d-flex justify-content-center">
  <button type="submit" name = "submit" class="btn btn-primary">Add Product</button>
</div>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>