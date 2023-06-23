<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    // echo $_POST['E_Name'];
    $taks_id = $_POST['id'];
    $title = $_POST['task_title'];
    $status = $_POST['status'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $eid = $_POST['E_Name'];


    if($_FILES["desc_file"]["error"] == UPLOAD_ERR_NO_FILE){
        echo '<script>alert("PDF Does Not Exist");</script>';
      }
    else{
        $validImageExtension =array("pdf", "xls", "xlsx", "ppt", "docx", "pptx");
        $fileName = $_FILES["desc_file"]["name"];
        $fileSize = $_FILES["desc_file"]["size"];
        $tempName = $_FILES["desc_file"]["tmp_name"];
        $imageExtension = explode(".",$fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension,$validImageExtension)){
            echo
            "<script> alert('Invalid extension');</script>";
        }
        elseif($fileSize > 1000000)
        {
            echo "<script> alert('File size to large');</script>";
        }
        else{
            if(move_uploaded_file($tempName,'../../description_tasks/'.$fileName))
            {
                echo "<script> alert('Inserted file');</script>";
            }
        }
    
    }
    
    
    
    
    
    
//     echo $taks_id ;
//     echo $title ;
//     echo $status ;
//     echo $startdate ;
//     echo $enddate ;
//     echo $eid ;
//     echo  $description ;
//
    $con = mysqli_connect("localhost","root","","workprogresstracker");
    $sql="UPDATE tasks SET `task_title`='$title ',`status`='$status',`task_description`='$fileName',`start_date`='$startdate',`end_date`='$enddate ',`e_id`='$eid' WHERE task_id=$taks_id" ;
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