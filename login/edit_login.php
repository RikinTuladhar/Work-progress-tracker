<!-- Containts FORM where data are filled at first for editing , data came from datacontainer.php though id  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Edit_login</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost","root","","workprogresstracker");
    if($conn->connect_error)
    {
        die("Connection failde".$conn->connect_error);
    }
    $id = $_GET['id'];
    if(empty($id))
    {
        header('location:displaydata.php');
    }
    $sql ="select * from login where id = '$id'";
    
    

    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="edit_login_update.php" method="POST">
<table>
    <tr>
        
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <td>Username</td>
        <td><input type="text" name="username" value="<?php echo $row['username'];?>"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" name="password" value="<?php echo $row['password'];?>"></td>
    </tr>
    
    <tr>
    <td>Email</td>
        <td><input type="text" name="email" value="<?php echo $row['email'];?>"></td>
    </tr>
    <tr>
        <td>
            <input type="submit" value="Update">
        </td>
    </tr>
    
</table>


    </form>

</body>
</html>