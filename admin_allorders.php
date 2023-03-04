<?php
include 'partials/nav.php';
require "config.php";
session_start();
$email = $_SESSION['email'];
$user_id = $_SESSION["userid"];

if (!isset($_SESSION['email'])) {
  header("location:login.php");

  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   // Get the selected option value from the $_POST superglobal array
  //   $selected_option = $_POST["my-dropdown"];
  
  //   // Do something with the selected option value
  //   echo "You selected: " . $selected_option;
  // }
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
  <form method="POST" action="">
  <label for="my-dropdown">Select the user to see their order:</label>
  <select id="my-dropdown" name="filter_user">
    <?php $sql="SELECT `id`, `name` FROM `users`";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
    ?>
    <option value="<?= $row['id']?>"><?= $row['name'];   ?></option>
    <?php }?>
  </select>
 
  <button type="submit" name="user_filter">Submit</button>
</form>
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

          if(isset($_POST["user_filter"])){
          $selected_id = $_POST["filter_user"];
          // echo "your selected user is :" . $selected_id;
          $sql = "SELECT p.pname , p.price , i.quantity, d.amount FROM users u INNER JOIN order_detail d ON u.id = d.user_id INNER JOIN order_items i ON d.id = i.order_id INNER JOIN products p ON i.product_id = p.sid WHERE u.id=$selected_id ";
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
       }  
         ?>

    </tbody>
  </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>