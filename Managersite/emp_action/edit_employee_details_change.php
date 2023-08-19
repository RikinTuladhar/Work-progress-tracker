<?php
$con = mysqli_connect("localhost","root","","workprogresstracker");
session_start();




if($con->connect_error)
{
    die($con->connect_error);
}
$id = $_POST['id'];
if(empty($id))
{
    header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
    // echo "no data";
}
else
{
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Lastname=$_POST['Lastname'];
$Phone = $_POST['Phone'];
$password=$_POST['password'];


function phoneCheckDublicate($con, $Phone,$id) {
    $sql_phone = "SELECT emp_phone from employee where emp_phone = '$Phone' and not eid = '$id' ";
    $result_check = mysqli_query($con,$sql_phone);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if(mysqli_num_rows($result_check)>0)
    {
      return true;
      }else{
        return false;}
  };
  //function to check email
  function emailCheckDublicate($con,$Email,$id)
  {
    $sql_email = "SELECT emp_email  from employee where emp_email  = '$Email' and not eid = '$id'"; 
    $result_check = mysqli_query($con,$sql_email);
    if(mysqli_num_rows($result_check)>0)
    {
      return true;  //record is there mean exist in db
    }
    else{
      return false;
    }
  }



  $bol_phone = phoneCheckDublicate($con,$Phone,$id);
  $bol_email =  emailCheckDublicate($con,$Email,$id);
  if(!$bol_phone && !$bol_email)
  {
$sql = "UPDATE employee set emp_name='$Name',emp_email='$Email',emp_lastname='$Lastname',emp_phone='$Phone',e_pw='$password' where eid = $id";
$result=mysqli_query($con,$sql);
if($result)
{
    header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
}
  }
  else{
    ?>
  <script>
    alert("Duplicate Email or Phone Number");
    location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php";
  </script>
  <?php
  }
}
$conn->close();  ?>