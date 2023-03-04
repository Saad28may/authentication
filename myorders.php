<?php
include 'partials/nav.php';
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
  <table class="table">
    <thead>
    <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Qunatity</th>
                <th scope="col">Order Total Price</th>
                </tr>
    </thead>
    <tbody>
      <tr>
      <?php
          $sql = "SELECT  p.pname , p.price , i.quantity, d.amount FROM users u INNER JOIN order_detail d ON u.id = d.user_id INNER JOIN order_items i ON d.id = i.order_id INNER JOIN products p ON i.product_id = p.sid WHERE u.id=$user_id; ";
          $result = mysqli_query($conn, $sql);
          $id = 0;?>
          <?php while($row = mysqli_fetch_assoc($result)){?> 
            <tbody>
            <tr>
            <td> <?php echo $row['pname'];   ?> </td>
            <td> <?php echo $row['price'];  ?></td>
            <td> <?php echo $row['quantity'];  ?></td>
            <td> <?php echo $row['amount']; ?></td>
            </tr>
          </tbody>
          
         <?php } 
         
         ?>

    </tbody>
  </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>