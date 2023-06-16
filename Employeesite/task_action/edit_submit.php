<?php
    if($_SERVER["REQUEST_METHOD"]=="POST" ||$_SERVER["REQUEST_METHOD"]=="GET" ){
    // $task_title = $_POST['task_title'];
    // $task_description = $_POST['task_description'];
    // $start_date = $_POST['start_date'];
    // $end_date = $_POST['end_date'];
    $task_id = $_POST['task_id'];
    $status = $_POST['status'];
    echo $status;
    session_start();
    $sessionid =$_SESSION['id'];
    $conn = mysqli_connect("localhost","root","","workprogresstracker");
    if($conn->connect_error)
     {
      die($conn->connect_error);
     }
     
     //xlsh file handling 
     if($_FILES['xlsh']['error'] == 4){
        echo ('File Does Not Exist');
        ;
      }
      else{
        $fileName = $_FILES['xlsh']['name'];
        $fileSize = $_FILES['xlsh']['size'];
        $tmpName = $_FILES['xlsh']['tmp_name'];
        
        $validImageExtension = ['xlsx','xls'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        
        if (!in_array($imageExtension, $validImageExtension)) {

          ?>
          <script>
            alert("Invalid file extension");
          </script>
          <?php
        } else if ($fileSize > 1000000) {
            ?>
          <script>
            alert("File size is too large");
          </script>
          <?php
        } else {
          $FileName = uniqid();
          $FileName .= '.' . $imageExtension;
          move_uploaded_file($tmpName , '../../xlshfiles/' . $FileName);
          
          $sql_file_insert = "UPDATE tasks SET file_name = '$FileName' where task_id = $task_id";
          $result_inserted_file = mysqli_query($conn,$sql_file_insert);  
          if($result_inserted_file){
            ?>
            <script>
                alert("File inserted to database");
            </script>
            <?php
          }
          else{
            ?>
            <script>
                alert("Not inserted to database");
            </script>
            <?php
             if($status == "Completed"){
                echo "no";
                $sql_com = "UPDATE tasks SET status='$status',completed_task='1' , feedback ='' where e_id = $sessionid AND task_id =$task_id";
                $result_com = mysqli_query($conn,$sql_com);
            ?>
             <script>
                alert("Updated as Completed");
                location.href ="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
            </script>
            <?php
          }
        }
        

      }



     
     if($status != "Completed"){
            $sql = "UPDATE tasks SET
            status='$status' where e_id = $sessionid AND task_id =$task_id";
            // echo "done";
            $result = mysqli_query($conn,$sql);
            ?>
            <script>
                alert("Updated");
                location.href ="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php";
            </script>
            <?php
         }
    
    }
    
?>