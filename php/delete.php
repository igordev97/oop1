<?php
require_once "../Models/Database.php";
require_once "../Models/User.php";

if(!isset($_POST["email"]) || empty(trim($_POST["email"]))){
    header("Location:./?status=Email not founded");
    exit();
}
$email = $_POST["email"];

$user = new User();


$user->deleteUser($email);
