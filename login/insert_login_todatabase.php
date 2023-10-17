<?php
// require "../database/crud.php";

$conn = mysqli_connect("localhost", "root", "", "workprogresstracker");

if ($conn->connect_error) {
    die("connection error" . $conn->connect_error);
}
//data from form 
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];

$sql = "
SELECT login.email from login  where email = '$email' 
 UNION ALL 
SELECT manager.m_email from manager where m_email = '$email' 
 UNION ALL
Select employee.emp_email from employee where emp_email = '$email'";


$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if ($count > 0) {
?>
    <script>
        alert("Email exist");
        window.location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html";
    </script>
    <?php
} else {
    $insert = "insert into login (username,	password,email)values('$username','$password','$email')";
    if (mysqli_query($conn, $insert)) {

    ?>
        <script>
            alert("Registration Successfull");
            window.location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html";
        </script>
<?php
    }
}
$conn->close();
?>