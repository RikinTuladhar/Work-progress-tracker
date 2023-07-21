<?php
$data = array(
    "name" => "Rabi",
    "age" => 11
);
header('Content-Type: application/json');
echo $data["name"];
echo json_encode($data);
?>
