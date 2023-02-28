<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
<?php
require "config.php";
include 'partials/nav.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
}

$product_id = $_GET['sid'];
$sql = sprintf("SELECT * FROM `products` WHERE `sid` = %d" , $product_id);
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
?>

<form action="updateproduct.php" method ="POST" >
  <div class="mb-3">
  <div class="form-group">
        <input type="hidden" name="sid" value="<?php echo $row['sid'];?>">
      <label for="inputEmail4">Product Name</label>
      <input type="text" class="form-control" name="pname"value =" <?php echo $row['pname']; ?>">
    </div>
    <div class ="form-group mt-4">
    <label for="exampleInputEmail1" >Price</label>
    <input type="number" class="form-control" name ="price"value ="<?php echo $row['price'];  ?>">
    </div>

  <div class="d-flex justify-content-center">
  <button type="submit" name = "editproduct" class="btn btn-primary">Edit Info</button>
</div>

</form>
<?php
}
}
else{
   echo "Data not Found";
}
?>