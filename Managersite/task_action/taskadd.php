<?php
require "../../database/crud.php";

$login = new crud();
$table = "tasks";


$Name = $_POST['Name'];
$Status = $_POST['Status'];
$StartDate=$_POST['Start-Date'];
$EndDate =$_POST['End-Date'];
$ProjectManager=$_POST['Project-Manager'];
$ProjectMember=$_POST['Project-Member'];
// $Description=$_POST['Description'];


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







$items = [
    
    "task_title" => "$Name",
    "status"=> "$Status",
    "task_description" =>"$fileName",
    "start_date"=>"$StartDate",
    "end_date"=>"$EndDate",
    "m_id "=>"$ProjectManager",
    "e_id"=>"$ProjectMember"
];

$login -> insert($table,$items);
if($login)
{
   ?>
    <script>
        alert("Inserted");
        location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php";
    </script>
   <?php 
}
else{
    echo "error";
}
?>