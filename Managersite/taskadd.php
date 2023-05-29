<?php
require "../database/crud.php";

$login = new crud();
$table = "tasks";


$Name = $_POST['Name'];
$Status = $_POST['Status'];
$StartDate=$_POST['Start-Date'];
$EndDate =$_POST['End-Date'];
$ProjectManager=$_POST['Project-Manager'];
$ProjectMember=$_POST['Project-Member'];
$Description=$_POST['Description'];

$items = [
    
    "task_title" => "$Name",
    "status"=> "$Status",
    "task_description" =>"$Description",
    "start_date"=>"$StartDate",
    "end_date"=>"$EndDate",
    "m_id "=>"$ProjectManager",
    "e_id"=>"$ProjectMember"
];

$login -> insert($table,$items);
if($login)
{
    header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php');
}
else{
    echo "error";
}
?>