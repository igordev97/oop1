<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/7f25e9b7f6.js" crossorigin="anonymous"></script>
    <title>Homework</title>
</head>
<body>

  <?php if(isset($_SESSION["user"])):?>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="text-dark text-center">Welcome <?=$_SESSION["user"]?></h1>
                <a href="./php/logout.php">Logout</a>

                <a href="./update.php" class="btn btn-info">Update password</a>
                <form action="./php/delete.php" method="post">
                    <input type="hidden" value="<?=$_SESSION["user"]?>" name="email">
                    <button class="btn btn-danger">Delete account</button>
                </form>
                <?php if(isset($_GET["status"])):?>
                    <p class="text-warning"><?=$_GET["status"]?></p>
                <?php endif;?>
            </div>
        </div>
    </div>
   <?php else :?>
  <div class="container">
      <div class="row d-flex flex-wrap justify-content-center">
          <div class="col-6">

              <h1 class="text-center">Login Now <i class="fa-solid fa-user"></i></h1>
              <form action="./php/login.php" class="form" method="post">
                  <div class="form-group">
                      <label for="email" class="label">Enter email:</label>
                      <input type="text" class="form-control" name="email">
                  </div>

                  <div class="form-group my-3">
                      <label for="password" class="label">Enter password:</label>
                      <input type="password" class="form-control" name="password">
                  </div>

                  <button type="submit" class="btn btn-primary">Login in</button>
              </form>

          </div>

          <div class="col-6">
              <h1 class="text-center">Register Now <i class="fa-solid fa-user-plus"></i></h1>
              <form action="./php/register.php" class="form" method="post">
                  <div class="form-group">
                      <label for="name" class="label">Enter Full Name:</label>
                      <input type="text" class="form-control" name="name">
                  </div>
                  <div class="form-group">
                      <label for="email" class="label">Enter email:</label>
                      <input type="text" class="form-control" name="email">
                  </div>

                  <div class="form-group my-3">
                      <label for="password" class="label">Enter password:</label>
                      <input type="password" class="form-control" name="password">
                  </div>

                  <button type="submit" class="btn btn-primary">Create User</button>
              </form>
          </div>

          <?php if(isset($_GET["status"])):?>
              <p class="text-warning"><?=$_GET["status"]?></p>
          <?php endif;?>
      </div>
  </div>

<?php endif;?>
</body>
</html>