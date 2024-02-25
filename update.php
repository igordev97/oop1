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
    <title>Update</title>
</head>
<body>

<?php if(!isset($_SESSION["user"])):?>
<h1 class="display-1 text-danger">You must be logined</h1>
<?php else:?>

    <h1 class="text-center">Account: <?=$_SESSION["user"]?></h1>
   <div class="container">
       <div class="row">
           <div class="col-6 mx-auto">
               <form action="./php/update.php" method="post">
                   <input type="hidden" name="email" value="<?=$_SESSION["user"]?>">
                   <div class="form-group">
                       <label for="newpassword" class="label">Enter new password:</label>
                       <input type="password" class="form-control" name="newpassword">
                   </div>

                   <button class="btn btn-primary">Update now</button>
               </form>
               <?php if(isset($_GET["status"])):?>
                   <p class="text-warning"><?=$_GET["status"]?></p>
               <?php endif;?>
           </div>
       </div>
   </div>

<?php endif;?>

</body>
</html>
