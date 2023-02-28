<?php   

include 'partials/nav.php';
require "config.php";
session_start();

$email = $_SESSION['email'];
$user_id = $_SESSION["userid"];

if (!isset($_SESSION['email'])) {
    header("location:login.php");
}
if(isset($_POST['addproduct'])){
$product_id = $_POST["dropdownvalue"];
echo "You selected Product ID: " . $product_id;
echo "User ID:" . $user_id;
//INSERT INTO `orders`(`oid`, `product_id`, `user_id`, `created_at`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
$sql = "INSERT INTO `orders`(`product_id`, `user_id`, `created_at`) VALUES ('$product_id','$user_id',NOW())";
$stmt = mysqli_prepare($conn, $sql);
if (mysqli_stmt_execute($stmt))
    {
        header("location: order_display.php");
    }
    else{
        echo "Something went wrong... cannot redirect!";
    }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prduct Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <form method ="POST">
  <?php 
      $sql = "SELECT * FROM `products`";
      $result = mysqli_query($conn, $sql); ?>
      <label for="">Select the product</label>
      <select name= "dropdownvalue" class="form-select">
      <?php while($row = mysqli_fetch_assoc($result)){ ?> 
    <option value="<?php echo $row['sid'];   ?>"><?php echo $row['pname'];?></option>
    <?php } 
      ?>
</select>
<button type="submit" name = "addproduct" class="btn btn-primary">Order</button>
   </form>  
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>