<?php
require "../database/crud.php";

$login = new crud();
$table = "login";

$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

// $items = [
//     "id"=>1,
//     "username"=> "sita",
//     "password"=>"123456",
//     "email" => "sita@gmail.com"
    
// ];

$items = [
    "username"=> "$username",
    "password"=>"$password",
    "email" => "$email"
    
];
print_r($items);
$login -> insert($table,$items);
?>