<?php
require_once "../Models/Database.php";
require_once "../Models/User.php";
$user = new User();
if(!isset($_POST["email"]) || empty(trim($_POST['email']))){
    header("Location:../update.php?status=Enter email");
    exit();
}

if(!isset($_POST["newpassword"]) || empty(trim($_POST['newpassword']))){
    header("Location:../?status=Enter email");
    exit();
}

$email = $_POST["email"];
$newpassword = $_POST["newpassword"];


$user->updateUserPassword($email,$newpassword);