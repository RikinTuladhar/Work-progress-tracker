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
  if(isset($_SESSION['username']))
  {
       
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
    <div class="websitename">Welcome <?php echo $_SESSION['username']?></div>

    <div class="container">
    <div id="total">
      <?php 
      if($conn->connect_error)
      {
        die($conn->connect_error);
      }
      //total tasks
      $sql_tasks="select *  from  tasks";
      $task = mysqli_query($conn,$sql_tasks);
      $result_task  = $task -> num_rows;

      //total Department
      $sql_department = "select * from department";
      $department = mysqli_query($conn,$sql_department);
      $result_department = $department->num_rows;
 
      //total employee
      $sql_employee = "select * from employee";
      $employee = mysqli_query($conn,$sql_employee);
      $result_employee = $employee -> num_rows;

      //for total tasks status
      $sql_pending = "SELECT * FROM `tasks` WHERE status = 'Pending';";
      $pending = mysqli_query($conn,$sql_pending);
      $result_pending = $pending ->num_rows;
      $sql_on_going = "select * from tasks where status='On-going'";
      $on_going =mysqli_query($conn,$sql_on_going);
      $result_on_going= $on_going->num_rows; 
      $sql_completed = "select * from tasks where status= 'Completed'";
      $completed = mysqli_query($conn,$sql_completed);
      $result_completed=$completed ->num_rows;
      ?>
      <div class="total_container"> <h3>Total Department <?php echo $result_department; ?></h3></div>
      <div class="total_container" id="total_tasks"> <h3>Total Tasks <?php echo "$result_task";?></h3></div>
      <div class="total_container" id="total_employee"> <h3>Total Employee <?php echo $result_employee; ?></h3></div>
      <div class="total_container" id="total_employee"> <h3>Total Pending tasks <?php echo $result_pending ; ?></h3></div>
      <div class="total_container" id="total_employee"> <h3>Total On-going tasks <?php echo $result_on_going ; ?></h3></div>
      <div class="total_container" id="total_employee"> <h3>Total Completed tasks <?php echo $result_completed ; ?></h3></div>
      
    </div>
      <!-- <div class="details"> -->
  
        
          

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
         
    }
    else{
      echo "";
    }
?>
  </body>
  <script>
    var total_tasks = document.getElementById("total_tasks");
    total_tasks.addEventListener("click",function(){
      total_tasks.style.cursor="pointer";
      location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php";
    })
    var total_employee = document.getElementById("total_employee");
    total_employee.addEventListener("click",function(){
      total_tasks.style.cursor="pointer";
      location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php";
    })

  </script>
  <?php  $conn->close();  ?>
</html>
