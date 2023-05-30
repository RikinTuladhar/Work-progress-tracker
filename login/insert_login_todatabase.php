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

$sql= "select * from login where email = '$email'";
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