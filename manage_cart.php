<?php  include 'partials/nav.php';
require "config.php";
session_start();
$email = $_SESSION['email'];
$user_id = $_SESSION["userid"];

if (!isset($_SESSION['email'])) {
  header("location:login.php");
}

if(isset($_GET['sid'])){
$product_id = $_GET['sid'];
header("location:order.php");

$sql = "SELECT  `pname`, `price` FROM `products` WHERE sid ='$product_id'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
if($num>0){
    while($row = mysqli_fetch_assoc($query)){
     echo $row['pname'];
     echo $row['price'];
    }
}
$product_name = $data[0];
$product_price = $data[1];

if (isset($_SESSION['cart'][$product_id])) {
    //     // if so, update the quantity
         $_SESSION['cart'][$product_id]['quantity']++;
     } else {
    //     // if not, add the product to the cart
         $_SESSION['cart'][$product_id] = array(
             'name' => $product_name,
             'price' => $product_price,
             'quantity' => 1
         );
     
       }
       if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
}



    // print_r($_SESSION['cart']);
     ?>
     <!doctype html>
     <html lang="en">
       <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Cart</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
       </head>
       <body>
       <div class="container my-4">
         <h2>Cart</h2>
       </div>
     <div class="container my-4">

    <table class="table" id="myTable">
      <thead>
        <tr>
        <th scope="col">ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $grand = 0;
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $values){
              //INSERT INTO `order_items`(`id`,  `product_id`, `quantity`, `total`, `created_at`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
              
              $grand += $values['quantity'] * $values['price'];
            //print_r($key);
            
            ?>
        <tr>
        <td>
          <?php echo $key;   ?>
          </td>
          <td>
          <?php echo $name = $values['name'];   ?>
          </td>
          <td>
          <?php echo  $values['price'];   ?>
          </td>  
          <td>
          <?php echo  $values['quantity'];   ?>
          </td>
          <td>
          <?php echo $total = $values['quantity'] * $values['price'] ;   ?>
          </td>
        </tr>
          <?php 
          
          }
         }
?> 
        <tr>
        <td> Total </td>
        <td></td>
        <td></td>
        <td><?php echo $grand ?></td>
        </tr>
      </tbody>
    </table>
    <?php
    if(isset($_POST['order'])){
      
      $sql = "INSERT INTO `order_detail`(`amount`, `user_id`, `created_at`) VALUES ('$grand','$user_id',NOW())";
      if (mysqli_query($conn, $sql))
          { 
            $order_id = $conn->insert_id;
            foreach($_SESSION['cart'] as $key => $values){
              $quantity= $values['quantity'];
              $total = $values['quantity'] * $values['price'] ;
            $query = "INSERT INTO `order_items`(`order_id`, `product_id`, `quantity`, `total`, `created_at`) VALUES ('$order_id','$key','$quantity','$total',NOW())";
             mysqli_query($conn, $query);

          }
        }
    }
    ?>
    <div class="container">
      <form action="" method="POST">
      <button type="submit" name="order">Order Now</button>
      </form> 

    </div>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
       </body>
     </html>
       