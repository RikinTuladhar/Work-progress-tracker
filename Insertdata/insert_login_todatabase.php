<?php
require "../database/crud.php";

$login = new crud();
$table = "login";




$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
echo $username;
// $items = [
//     "id"=>1,
//     "username"=> "sita",
//     "password"=>"123456",
//     "email" => "sita@gmail.com"
    
// ];

$items = [
    "id"=>2,
    "username"=> "$username",
    "password"=>"$password",
    "email" => "$email"
    
];

$login -> insert($table,$items);
?>