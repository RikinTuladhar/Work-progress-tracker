<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cssfile/feedback_homepage.css" />
   
</head>
<body>  
<?php 
  session_start(); 
  if(isset($_SESSION['username']))
  {
       $conn = mysqli_connect("localhost","root","","workprogresstracker");
    ?>
    <nav>
      <ul>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/manager_homepage.php#" class="logo">
            <img src="icons/home.png" alt="" />
            <span class="nav-item">Home</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php" class="logo">
            <img src="icons/employee.png" alt="" />
            <span class="nav-item">Employee</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php" class="logo">
            <img src="icons/task.png" alt="" />
            <span class="nav-item">Task</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/feedback_homepage.php" class="logo">
            <img src="icons/feedback.png" alt="" />
            <span class="nav-item">Feedback</span>
          </a>
        </li>
        <li>
          <a href="../unsetvariable.php?unset=true" class="logo last">
            <img src="icons/logout.png" alt="" />
            <span class="nav-item">Log-out</span>
          </a>
        </li>
      </ul>
    </nav>
   
    <div class="websitename">Feedback</div>

<div class="container">
<div id="total">
  <?php 
  if($conn->connect_error)
  {
    die($conn->connect_error);
  }
  ?>
  
</div>
  <div class="details">
    <h2>Task Progress</h2>
    <div class="project_table">
      <table>
        <tr>
          <th>#</th>
          <th>Task Title</th>
          <th>Assigned</th>
          <!-- <th>Progress</th> -->
          <th>Status</th>
          <th>Start-Date</th>
          <th>End-Date</th>
          <th>Days-Taken</th>
          <th>Files</th>
          <th>Feedback</th>
        </tr>
        <?php 
        //data of employee
        $sql_task_list = "select task_id,task_title,emp_name,status,start_date,end_date,feedback,file_name,started_task,finished_task from tasks INNER JOIN employee on tasks.e_id =employee.eid where status='Completed'";
        $result  =  mysqli_query($conn,$sql_task_list);


        $idnum= 1;
        if($result->num_rows > 0 )
        {
        while($row = $result->fetch_assoc())
        {
          //days difference working
          $started_task_db= $row['started_task'];
          if(!isset($row['started_task']))
          {
            $started_task_db = "";
          }
          $started_task_db = $row['started_task'] ?? "";
          $finished_task_db = $row['finished_task'] ?? "";
          $started_task= new DateTime($started_task_db);
          $finished_task= new DateTime($finished_task_db);
  
          $dateInterval = $finished_task->diff($started_task);
          
          
          $daysDifference = $dateInterval->days;
          $monthsDifference = $dateInterval->m;
          $yearsDifference = $dateInterval->y;


          if(empty($row['task_title'])){
            echo '';
          }
          else
          {
          ?>
          <tr>
            <td><?php echo $idnum ?></td>
            <td><?php  echo $row['task_title'] ?></td>
            <td><?php  echo $row['emp_name'] ?></td>
            <td><?php  echo $row['status'] ?></td>
            <td><?php  echo $row['start_date'] ?></td>
            <td><?php  echo $row['end_date'] ?></td>
            <td><?php  echo $daysDifference ?></td>
            <!-- for file to be downloaded -->
            <script>
              </script>
              <!-- can download file -->
              <td><a href="../xlshfiles/<?php echo $row['file_name']?>" download ><img src="../icons/download-icon.png" alt="" srcset=""></a></td>
            <!-- <td> -->
                <?php
                //  echo $row['task_id'];
                 ?>
                 <!-- </td> -->
                 <!-- to send from url -->
                 <?php  
                  $data = array(
                    'task_id' => $row['task_id'],
                    'task_title'=>$row['task_title'],
                    'emp_name' => $row['emp_name'],
                    'status' => $row['status'],
                    'start_date'=> $row['start_date'],
                    'end_date'=>$row['end_date'],
                    'feedback'=>$row['feedback']
                  );
                  $baseurl = "emp_action/feedback_home.php";
                  //data send garrna lai from URL 
                  $url = $baseurl . '?' . http_build_query($data);
                  ?>
            <td><a href="<?php echo $url ?>">GIVE feedback</a> </td>
          </tr>

          <?php 
          $idnum++;
          }
        }
      }
      else{
          echo '';
      }

        ?>

      </table>
    </div>

    <!-- <img src="" alt="imgemp" />
    
   
    <span class="content">2023/04/27</span>
    <span class="content">2023/04/30</span> -->
    <!-- <table>
      <tr>
        <th><span class="content heading">Profil</span></th>
        <th><span class="content heading">Name</span></th>
        <th><span class="content heading">Task</span></th>
        <th><span class="content heading">Start Date</span></th>
        <th><span class="content heading">End Date</span></th>
      </tr>
      <tr>
        <td><img src="" alt="imgemp" /></td>
        <td><span class="content detail_row">Savib</span></td>
        <td><span class="content detail_row">Html correction</span></td>
        <td><span class="content detail_row">2023/04/27</span></td>
        <td><span class="content detail_row">2023/04/30</span></td>
      </tr>
    </table> -->
  </div>
        <?php
 
      ?>
<?php
    }
    else{
      echo "";
    }
    $conn->close();
?>
    
</body>
</html>