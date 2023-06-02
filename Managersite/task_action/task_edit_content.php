<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    // echo $_POST['E_Name'];
    $taks_id = $_POST['id'];
    $title = $_POST['task_title'];
    $status = $_POST['status'];
    $description =$_POST['Description'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $eid = $_POST['E_Name'];

//     echo $taks_id ;
//     echo $title ;
//     echo $status ;
//     echo $startdate ;
//     echo $enddate ;
//     echo $eid ;
//     echo  $description ;
//
    $con = mysqli_connect("localhost","root","","workprogresstracker");
    $sql="UPDATE tasks SET `task_title`='$title ',`status`='$status',`task_description`='$description',`start_date`='$startdate',`end_date`='$enddate ',`e_id`='$eid' WHERE task_id=$taks_id" ;
    $result= mysqli_query($con,$sql);
    if($result)
    {

        ?>
        <script>
            alert("Edited Task");
            location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php";
        </script>
        <?php
    }
    else{
        echo "No updated";
    }

}
?>