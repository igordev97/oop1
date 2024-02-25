<?php
 class Database{
     protected $db;


     public function __construct(){
         $this->db = mysqli_connect("127.0.0.1","root","","usersoop");
     }
 }
