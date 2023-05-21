<?php
require "crud.php";

$crud = new crud();
$table = "log-in";

$items = ["id" => 1004,
    "username"=> "samsnge",
    "password" => "qihweqwe",
    "email" => "tugrp@example.com"
];
$crud -> insert($table,$items);
?>