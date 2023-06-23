<?php

$con = mysqli_connect("localhost","root","","workprogresstracker");
$id = $_GET['eid'];
var_dump($id);

$sql = "delete from employee where eid =".$id;
$stm = mysqli_query($con,$sql);
if($stm)
{
    header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
}

?><?php  $conn->close();  ?>