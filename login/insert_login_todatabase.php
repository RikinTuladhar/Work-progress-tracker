<?php
// require "../database/crud.php";


$conn = mysqli_connect("localhost","root","","workprogresstracker");

if($conn->connect_error)
{
    die("connection error".$conn->connect_error);
    
}

$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

// $sql= "SELECT l.email ,m.m_email , e.emp_email  FROM  login l  INNER JOIN manager m on l.email = m.m_email INNER JOIN employee e on l.email = e.emp_email  where l.email = '$email' OR m.m_email = '$email' OR e.emp_email = '$email' ";
$sql = "SELECT login.email from login  where email = '$email' 
UNION ALL 
SELECT manager.m_email from manager where m_email = '$email' 
UNION ALL
Select employee.emp_email from employee where emp_email = '$email'";


$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
if($count > 0 )
{
    ?>
<script>
    alert("Email exist");
        window.location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html";
</script>

<?php
} 
else{
    $insert = "insert into login (username,	password,email)values('$username','$password','$email')";
   if( mysqli_query($conn,$insert))
   {
    ?>
    <script> alert("Inserted");
window.location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html";</script>
    <?php
   }
}
$conn->close();

?>