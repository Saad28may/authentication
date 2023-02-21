
<?php  include 'partials/nav.php';
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
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Phone</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `users`";
          $result = mysqli_query($conn, $sql);
          $id = 0;
          while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
            <td> <?php echo $row['id'];   ?> </td>
            <td> <?php echo $row['name'];  ?></td>
            <td> <?php echo $row['email'];  ?></td>
            <td> <?php echo $row['password'];  ?></td>
            <td> <?php echo $row['phone'];  ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id'];   ?>">Edit</a>
              <a href="delete.php?id=<?php echo $row['id'];   ?>" >Delete</a>
            </td>
          </tr>
         <?php } 
          ?>


      </tbody>
    </table>
  


