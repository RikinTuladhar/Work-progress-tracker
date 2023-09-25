<?php
require "../../database/crud.php";

$login = new crud();
$table = "tasks";


$Name = $_POST['Name'];
$Status = $_POST['Status'];
$StartDate = $_POST['Start-Date'];
$EndDate = $_POST['End-Date'];
$ProjectManager = $_POST['Project-Manager'];
$ProjectMember = $_POST['Project-Member'];
// $Description=$_POST['Description'];


if ($_FILES["desc_file"]["error"] == UPLOAD_ERR_NO_FILE) {
?>
  <script>
    alert("PDF Does Not Exist")
    location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php";
  </script>
  <?php
  exit(1);
} else {
  $validImageExtension = array("pdf", "xls", "xlsx", "ppt", "docx", "pptx");
  $fileName = $_FILES["desc_file"]["name"];
  $fileSize = $_FILES["desc_file"]["size"];
  $tempName = $_FILES["desc_file"]["tmp_name"];
  $imageExtension = explode(".", $fileName);
  $imageExtension = strtolower(end($imageExtension));
  if (!in_array($imageExtension, $validImageExtension)) {
  ?>
    <script>
      alert("Invalid extention");
      location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php";
    </script>
  <?php
    exit(1);
  } elseif ($fileSize > 5000000) {
  ?>
    <script>
      alert("File size to big")
      location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php";
    </script>
  <?php
    exit(1);
  } else {
    if (move_uploaded_file($tempName, '../../description_tasks/' . $fileName)) {
      echo "<script> alert('Inserted file');</script>";
    }
  }
}

$items = [

  "task_title" => "$Name",
  "status" => "$Status",
  "task_description" => "$fileName",
  "start_date" => "$StartDate",
  "end_date" => "$EndDate",
  "m_id " => "$ProjectManager",
  "e_id" => "$ProjectMember",
  "started_task" => "NULL",
  "finished_task" => "NULL"

];

$login->insert($table, $items);
if ($login) {
  ?>
  <script>
    alert("Inserted");
    location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php";
  </script>
<?php
} else {
  echo "error";
}
?>