<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$con = mysqli_connect("localhost","root","","workprogresstracker");
if($con->connect_error)
{
    die($con->connect_error);
}
$id = $_GET['eid'];
if(empty($id))
{
    header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
}
// var_dump($id);

$sql = "SELECT * FROM employee where eid=".$id;
$result = mysqli_query($con,$sql);
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
}
?>
    <form action="edit_employee_details_change.php" method="POST">
    <table>
        <tr>
            <input type="hidden" name="id" value="<?php echo $row['eid'];?>">
            <td>Name</td>
            <td><input type="text" name="Name" value="<?php echo $row['emp_name'] ?>"></td>
            </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="Email" value="<?php echo $row['emp_email'] ?>"></td>
        </tr>
        <tr>

            <td>Last Name</td>
            <td><input type="text" name="Lastname" value="<?php echo $row['emp_lastname'] ?>"></td>
        </tr>
        <tr>

            <td>Phone</td>
            <td><input type="text" name="Phone" value="<?php echo $row['emp_phone'] ?>"></td>
        </tr>
        <tr>

            <td>Password</td>
            <td><input type="password" name="password" disabled  value="<?php echo $row['e_pw'] ?>"></td>
        </tr>
    </table>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>