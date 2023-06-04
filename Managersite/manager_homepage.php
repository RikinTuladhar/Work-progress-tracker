<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="cssfile/stylemanager1.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
  </head>
  <body>
    <?php 
      session_start();
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
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html" class="logo">
            <img src="icons/logout.png" alt="" />
            <span class="nav-item">Log-out</span>
          </a>
        </li>
      </ul>
    </nav>
    <div class="websitename">Welcome <?php echo $_SESSION['username']?></div>

    <div class="container">
    <div id="total">
      <?php 
      if($conn->connect_error)
      {
        die($conn->connect_error);
      }
      $sql_tasks="select *  from  tasks";
      $task = mysqli_query($conn,$sql_tasks);
      $result_task  = $task -> num_rows;

      $sql_department = "select * from department";
      $department = mysqli_query($conn,$sql_department);
      $result_department = $department->num_rows;

      $sql_employee = "select * from employee";
      $employee = mysqli_query($conn,$sql_employee);
      $result_employee = $employee -> num_rows;

      ?>
      <div class="total_container"> <h3>Total Department <?php echo $result_department; ?></h3></div>
      <div class="total_container"> <h3>Total Tasks <?php echo "$result_task";?></h3></div>
      <div class="total_container"> <h3>Total Employee <?php echo $result_employee; ?></h3></div>
      
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
              <!-- <th>View</th> -->
            </tr>
            <?php 
            $sql_task_list = "select task_title,emp_name,status,start_date,end_date from tasks LEFT OUTER JOIN employee on tasks.e_id =employee.eid where status = 'Completed'";
            $result  =  mysqli_query($conn,$sql_task_list);
            $idnum= 1;
            if($result->num_rows > 0 )
            {
            for($a=0 ; $a<10 ; $a++)
            {
              $row = $result->fetch_assoc();
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
                <!-- <td> -->
                  <?php  
                  // echo "view";
                   ?>
              <!-- </td> -->
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
          $conn->close();
          ?>
  </body>
</html>
