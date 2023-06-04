<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    // $task_title = $_POST['task_title'];
    // $task_description = $_POST['task_description'];
    // $start_date = $_POST['start_date'];
    // $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    echo $status;
    session_start();
    $conn = mysqli_connect("localhost","root","","workprogresstracker");
    if($conn->connect_error)
     {
      die($conn->connect_error);
     }
     $sessionid =$_SESSION['id'];
     if($status != "Completed"){
            $sql = "UPDATE tasks SET
            status='$status' where e_id = $sessionid";
            // echo "done";
            $result = mysqli_query($conn,$sql);
            ?>
            <script>
                alert("Updated");
                location.href ="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
            </script>
            <?php
         }  
     else{
        echo "no";
        $sql_com = "UPDATE tasks SET status='$status',completed_task='1' where e_id = $sessionid";
        $result_com = mysqli_query($conn,$sql_com);
        ?>
             <script>
                alert("Updated");
                location.href ="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
            </script>
        <?php
     }
    }
    
?>