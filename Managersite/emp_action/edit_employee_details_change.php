<?php
$con = mysqli_connect("localhost","root","","workprogresstracker");
if($con->connect_error)
{
    die($con->connect_error);
}
$id = $_POST['eid'];
if(empty($id))
{
    header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
}
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Lastname=$_POST['Lastname'];
$Phone = $_POST['Phone'];
$password=$_POST['password'];
$sql = "UPDATE employee set emp_name='$Name',emp_email='$Email',emp_lastname='$Lastname',emp_phone='$Phone',e_pw='$password'";
$result=mysqli_query($con,$sql);
if($result)
{
    header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
}