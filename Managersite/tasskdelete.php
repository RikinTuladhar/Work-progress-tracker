<?php

$con = mysqli_connect("localhost","root","","workprogresstracker");
$id = $_GET['task_id'];
var_dump($id);

$sql = "delete from tasks where task_id =".$id;
$stm=mysqli_query($con,$sql);
if($stm)
{
    header('location:task_homepage.php');

}
?>