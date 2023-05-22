<!-- SQL command for updating data that came from edit_login.php  -->

<?php
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die ("<h2>Access Denied!</h2> This file is protected and not available to public.");
        }
   $conn = mysqli_connect("localhost","root","","workprogresstracker");
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "UPDATE login set username ='$username',password ='$password',email ='$email' where id = $id";
    mysqli_query($conn,$sql);
    if($sql)
    {
        header('location:displaydata.php');
    }

    
    ?>