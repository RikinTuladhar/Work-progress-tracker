<?php

// if(isset($_GET['vername']) && isset($_GET['verpassword']))
// {
    session_start();
$username=$_GET['vername'];
$password=$_GET['verpassword'];
$count = 0;
var_dump($username);

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
            
            $_SESSION['username'] = $username;
            $_SESSION['id']=$row['eid'];
            // var_dump($row['eid'] );
            $count = 1;
            // if(isset($_SESSION['username']))
           
            ?>
            <script>alert("Log in success <?php echo $_SESSION['id']?>");
          window.location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/home_employee.php?"</script>
          
         <?php

        }
        
    } 
    
    
    
}
$managersql = "SELECT * FROM manager";
$managercheck = mysqli_query($con,$managersql);

if($managercheck->num_rows > 0)
{
    while($rows = $managercheck->fetch_assoc())
    if(($rows['m_name'] ==  $username &&  $rows['m_pw'] == $password))
    {
        // echo $rows['m_name'];
        $_SESSION['username'] = $username;
        $_SESSION['id']=$row['m_id '];
        $count = 1;
        ?>
    <script>alert("Log in success for manager");
      window.location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/manager_homepage.php?<?php echo $_SESSION['username'];?>"</script>

     <?php
        
    }

}


if($count == 0)
{
header('location:login.html');
}



// }
// else{
    // echo "Value not received";
    // }
?>