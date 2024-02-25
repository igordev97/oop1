<?php
require_once "../Models/Database.php";
require_once "../Models/User.php";
if(!isset($_POST["email"]) || empty(trim($_POST['email']))){
    header("Location:../?status=Enter email");
    exit();
}

if(!isset($_POST["password"])  || empty(trim($_POST['password']))){
    header("Location:../?status=Enter password");
    exit();
}

$email = $_POST["email"];
$password = $_POST["password"];

$user = new User();
$user->loginUser($email,$password);
