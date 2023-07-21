<?php
session_start();
$sessionid = $_SESSION["id"];
$task_id = $_POST["task_id"];
$status = $_POST["status"];
$conn = mysqli_connect("localhost","root","","workprogresstracker");
// if(isset($_POST['submit'])){}
$mydate=getdate(date("U"));
$currentDateTime = $mydate['year'] ."-".$mydate['mon']."-".$mydate['mday'];
//started date from database 
$sql_started_date = "SELECT * FROM  tasks WHERE task_id = $task_id";
$result_started_date = mysqli_query($conn,$sql_started_date);
$row_started_date = $result_started_date->fetch_assoc();
echo "Started - date:".$row_started_date['started_task'];

if ($status === "Completed")
{
  if($row_started_date['started_task'] == "0000-00-00"){
    ?>
    <script>
    alert("Cannot Change From pending to Completed directly");
    location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
    </script>
        <?php
  exit(1);
  }
if($_FILES["pdfFile"]["error"] == UPLOAD_ERR_NO_FILE){

  ?>
  <script>
    alert("PDF Does Not Exist")
    location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
    </script>
  <?php
  exit(1);
}
else{
  $fileName = $_FILES["pdfFile"]["name"];
  $fileSize = $_FILES["pdfFile"]["size"];
  $tmpName = $_FILES["pdfFile"]["tmp_name"];

  $validImageExtension = ['pdf','xls','xlsx'];
  $imageExtension = explode('.', $fileName);
  $imageExtension = strtolower(end($imageExtension));

  if (!in_array($imageExtension, $validImageExtension)){
    echo '<script>alert("Invalid PDF Extension");</script>';
    ?>
    <script>
      location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
      </script>
    <?php
    exit(1);
  }
  else{
    $newImageName = uniqid();
    $newImageName .= '.' . $imageExtension;

    move_uploaded_file($tmpName, '../../xlshfiles/' . $fileName);
    //update when completed
    $query = "UPDATE `tasks` SET `file_name` = '$fileName',status='$status', completed_task='1', feedback='',finished_task = '$currentDateTime'   WHERE task_id = '$task_id'";
    $stmt = mysqli_prepare($conn, $query);

    // mysqli_stmt_bind_param($stmt, 'ss',$newImageName,$task_id);
    $result = mysqli_stmt_execute($stmt);

    if($result){
      echo "Inserted into database";
    }
    else{
      echo "Not inserted";
    }
    echo '<script>alert("PDF uploaded successfully.");</script>';
  }
}
?>
  <script>
    location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
  </script>
<?php
}
else
{
  if($status == "Pending")
  {
    $null = NULL;
    $sql = "UPDATE tasks SET status='$status',started_task='$null', finished_task ='$null'   WHERE e_id=$sessionid AND task_id=$task_id";
    $result = mysqli_query($conn, $sql);
    ?>
        <script>
            alert("Updated as <?php echo $status; ?>");
            location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
        </script>
        <?php
  }
  else{
  $sql = "UPDATE tasks SET status='$status',started_task='$currentDateTime'  WHERE e_id=$sessionid AND task_id=$task_id";
        $result = mysqli_query($conn, $sql);
        ?>
        <script>
            alert("Updated as <?php echo $status; ?>");
            location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
        </script>
        <?php
}
}
?>
