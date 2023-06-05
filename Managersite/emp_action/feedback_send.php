<?php 
$feedback= $_POST['feedback'];
$task_id = $_POST['task_id'];
// echo $feedback;
// echo $task_id;
session_start();
        $conn = mysqli_connect("localhost","root","","workprogresstracker");
        if($conn->connect_error)
         {
          die($conn->connect_error);
         }
         $sql = "UPDATE tasks SET feedback='$feedback' where task_id =$task_id";
         if(mysqli_query($conn,$sql))
         {
            ?>
                <script>
                    alert("Feed back submitted");
                    location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/feedback_homepage.php"
                </script>

            <?php

         }
?>