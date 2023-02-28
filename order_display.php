<?php  include 'partials/nav.php';
require "config.php";
session_start();

$email = $_SESSION['email'];
$user_id = $_SESSION["userid"];

if (!isset($_SESSION['email'])) {
    header("location:login.php");
}

  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
  <div class="container my-4">
    <h2>Users</h2>
  </div>

  <div class="container my-4">

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Order ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">User ID</th>

        </tr>
      </thead>
      <tbody>
        <?php 
         $query = "SELECT * FROM `users` WHERE id = '$user_id' ";
         $check = mysqli_query($conn, $query);
         $num = mysqli_num_rows($check);
         $data = mysqli_fetch_array($check);
         if($num>0 && $data[5] == "admin"){
            $sql = "SELECT o.oid , p.pname , o.user_id FROM orders o INNER JOIN products p ON o.product_id = p.sid";
            $result = mysqli_query($conn, $sql);
          $id = 0;
          while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
            <td> <?php echo $row['oid'];   ?> </td>
            <td> <?php echo $row['pname'];  ?></td>
            <td> <?php echo $row['user_id'];  ?></td>
          </tr>
          <?php }
         }
        else{
          $sql = "SELECT o.oid , p.pname , o.user_id FROM orders o INNER JOIN products p ON o.product_id = p.sid WHERE user_id = '$user_id' ";
          $result = mysqli_query($conn, $sql);
          $id = 0;
          while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
            <td> <?php echo $row['oid'];   ?> </td>
            <td> <?php echo $row['pname'];  ?></td>
            <td> <?php echo $row['user_id'];  ?></td>
          </tr>
         <?php } 
        }
          ?>


      </tbody>
    </table>
  


