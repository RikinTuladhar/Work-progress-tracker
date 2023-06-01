
<?php 
$conn =mysqli_connect("localhost","root","","workprogresstracker");

if(isset($_GET['email']))
{
    $flag  = 0;
    $emailget = $_GET['email'];
    $sqlverify = "SELECT * FROM employee";
    $result_verify= mysqli_query($conn,$sqlverify);
    $columncount = $result_verify->num_rows;
    for($i=0;$i<$columncount;$i++) {
    $row = $result_verify->fetch_assoc();
    if($emailget == $row['emp_email'])
    {
        $flag = 1;
        ?>
        <script>
            alert("Approved Already");
            window.location.href="http://localhost/work-progress-tracker/Work-progress-tracker/login/displaydata.php";
        </script>
        <?php
        break;
    }
}
        if($flag == 0)
    {
        // echo "continue";
        $sqllogin = "select * from login where email='$emailget'";
        $result_login = mysqli_query($conn,$sqllogin);
        if($result_login->num_rows > 0)
        {
            while($row = $result_login->fetch_assoc())
            {
                $username = $row['username'];
                $password = $row['password'];
                $email = $row['email'];
            }
            $sql_insert = "INSERT INTO `employee`(emp_name,emp_email,e_pw) VALUES('$username','$email','$password')";
            $result_insert = mysqli_query($conn,$sql_insert);
            if($result_insert)
            {?>
                <script>
                alert("Inserted");
                window.location.href="http://localhost/work-progress-tracker/Work-progress-tracker/login/displaydata.php";
                </script>
            <?php
            }
        }
        else
        {
            echo "no data";
        }
    }

}

