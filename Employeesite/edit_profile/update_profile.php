<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    session_start();
    $conn = mysqli_connect("localhost","root","","workprogresstracker");
    if($conn->connect_error){
        die('Connection failed'.mysqli_connect_error());
    }
    $sessionid = $_SESSION['username'];
    $sessionid =$_SESSION['id'];
    

$emp_name=ucfirst($_POST['emp_name']);;
$e_pw=$_POST['e_pw'];
$emp_lastname = ucfirst($_POST['emp_lastname']);
$emp_email=$_POST['emp_email'];
$emp_phone=$_POST['emp_phone'];
$location=ucfirst($_POST['location']);
$Age=$_POST['Age'];
$Experence=ucfirst($_POST['Experence']);
$Degree=ucfirst($_POST['Degree']);
$Short_detail=ucfirst($_POST['Short_detail']);
// $profile_pic=$_POST['profile_pic'];
$About_Your_Self = $_POST['About_Your_Self'];




$sql = "UPDATE employee SET emp_name='$emp_name',emp_email='$emp_email',`emp_lastname`='$emp_lastname',`emp_phone`='$emp_phone',`e_pw`='$e_pw',`location`='$location',`Age`='$Age',`Experence`='$Experence',`Degree`='$Degree',`Short-detail`='$Short_detail',`About-Your-Self`='$About_Your_Self' WHERE eid = $sessionid";
if($result=mysqli_query($conn,$sql))
{
    ?>
    <script>
        alert("Updated");
        location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/editself.php";
    </script>

<?php
}
else{
    ?>
    <script>
        alert("Something went wrong");
        location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/editself.php";
    </script>

<?php
    
}


}
else{
    echo "";
}

?><?php  $conn->close();  ?>