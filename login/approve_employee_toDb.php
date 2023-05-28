<?php

$conn =mysqli_connect("localhost","root","","workprogresstracker");

if(isset($_GET['id']))
{
$id = $_GET['id'];
$sqllog = "select * from login where id =".$id;
$resultlog = mysqli_query($conn,$sqllog);
if($resultlog->num_rows > 0)
{
    while($row = $resultlog->fetch_assoc())
    {
    $username=$row["username"];
    $password=$row['password'];
    $email=$row['email'];
    }
}
else{
    echo "no data";
}

$sql = "INSERT INTO `employee`(`eid`, `emp_name`,`e_pw`,`emp_email`) VALUES ('$id','$username','$password','$email')";
try{
if(mysqli_query($conn,$sql))
{
    header('location:displaydata.php');
    // var_dump($username);
}
}
catch(Exception )
{   
    echo "<script> alert('Cannot Approve Twice') </script>";
}

}
$conn->close();

?>