
<?php
require "config.php";

if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email =$_POST["email"];
    $password =$_POST["password"];
    $phone = $_POST["phone"];
    

    $sql = "INSERT INTO `users` (`name`, `email`, `password`, `phone`, `created_at`) VALUES ('$name', '$email', '$password', '$phone', CURRENT_TIMESTAMP)";
   // $result = mysqli_query($conn, $sql);
    $stmt = mysqli_prepare($conn, $sql);
    if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
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
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <?php include 'partials/nav.php'; ?>
  <div class="container mt-4">
    <h3>Register here:</h3>
    <hr>
    <form method ="POST">
  <div class="mb-3">
  <div class="form-group">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter your Name">
    </div>
    <div class ="form-group mt-4">
    <label for="exampleInputEmail1" class="form-label" placeholder="Enter your Email">Email address</label>
    <input type="email" class="form-control" name ="email">
    </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name ="password">
  </div>
  <div class="form-group mb-3">
  <label class="form-label" for="phone">Phone number</label>
  <input type="text" id="phone" name ="phone" class="form-control"/>
 
</div>
  <div class="d-flex justify-content-center">
  <button type="submit" name = "submit" class="btn btn-primary">Register</button>
</div>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

