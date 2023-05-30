<?php

// if(isset($_GET['vername']) && isset($_GET['verpassword']))
// {
$username=$_GET['vername'];
$password=$_GET['verpassword'];
$count = 0;
// var_dump($username);

$con = mysqli_connect("localhost","root","","workprogresstracker");
if($con->connect_error)
{
    die("connection error".$con->connect_error);
}
$sql = "SELECT * FROM employee";
$result = mysqli_query($con,$sql);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        
        if($row['emp_name'] == $username && $row['e_pw'] == $password)
        {
            // var_dump($row['eid'] );
            $count = 1;
            ?>

            <script>alert("Log in success");
          window.location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/home_employee.php"</script>
          
"
         <?php

        }
        
    }
        
    if($count == 0)
    {
        
        header('location:login.html');
    }
    


}

// }
else{
    echo "Value not received";
}
?>