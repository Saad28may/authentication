<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
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

if(isset($_SESSION['email'])){
      
      $user_id = $_GET['id'];
      $sql = sprintf("SELECT * FROM `users` WHERE `id` = %d" , $user_id);
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

      if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
      ?>


      <form action="updatedata.php" method ="POST" >
        <div class="mb-3">
        <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <label for="inputEmail4">Name</label>
            <input type="text" class="form-control" name="name"value =" <?php echo $row['name']; ?>">
          </div>
          <div class ="form-group mt-4">
          <label for="exampleInputEmail1" >Email address</label>
          <input type="email" class="form-control" name ="email"value ="<?php echo $row['email'];  ?>">
          </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password"value ="<?php echo $row['password'];  ?>" name ="password">
        </div>
        <div class="form-group mb-3">
        <label class="form-label" for="phone">Phone number</label>
        <input type="text" id="phone" name ="phone" value="<?php echo $row['phone'];  ?>"/>
      
      </div>
        <div class="d-flex justify-content-center">
        <button type="submit" name = "edit" class="btn btn-primary">Edit</button>
      </div>

      </form>
      <?php
      }
      }
      else{
        echo "Data not Found";
      }
}
else{
  echo "Please login to continue";
}

?>