<?php

session_start();
$emailname = $_GET['vername'];
$password = md5($_GET['verpassword']);
$count = 0;
// var_dump($emailname);
$con = mysqli_connect("localhost", "root", "", "workprogresstracker");
if ($con->connect_error) {
    die("connection error" . $con->connect_error);
}
$sql = "SELECT * FROM employee ";
$result = mysqli_query($con, $sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['emp_email'] == $emailname && $row['e_pw'] == $password) {

            $_SESSION['username'] = $row['emp_name'];
            $_SESSION['id'] = $row['eid'];
            // var_dump($row['eid'] );
            $count = 1;
            // if(isset($_SESSION['username']))
            // workprogresstracker
?>
            <script>
                alert("Log in success <?php echo $_SESSION['id'] ?>");
                window.location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/home_employee.php?"
            </script>

        <?php

        }
    }
}
$managersql = "SELECT * FROM manager";
$managercheck = mysqli_query($con, $managersql);

if ($managercheck->num_rows > 0) {
    while ($rows = $managercheck->fetch_assoc())
        if (($rows['m_email'] ==  $emailname &&  $rows['m_pw'] == $password)) {
            // echo $rows['m_name'];
            $_SESSION['username'] = $rows['m_name'];
            $_SESSION['id'] = $rows['m_id'];
            $count = 1;
        ?>
        <script>
            alert("Log in success for manager");
            window.location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/manager_homepage.php?<?php echo $_SESSION['username']; ?>"
        </script>
    <?php
        }
}
if ($count == 0) {
    ?>
    <script>
        alert("Incorrect Email or Password");
        location.href = "./login.html";
    </script>
<?php
    // header('location:login.html');
}
$con->close();
?>