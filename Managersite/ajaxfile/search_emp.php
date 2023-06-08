<?php
$conn = mysqli_connect("localhost","root","","workprogresstracker");
if($conn->connect_error)
{
  die("Connection error".$conn->connect_error);
}
$sinput = $_POST['search_input'];
$sinput = "%" .$sinput."%"; 
$sql ="SELECT * FROM employee like" .$sinput;

?>