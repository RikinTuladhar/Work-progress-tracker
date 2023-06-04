<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/home_employee.css" />
    <title>Document</title>
  </head>
  <body>
    <?php  $conn = mysqli_connect("localhost","root","","workprogresstracker");
        session_start();

         if($conn->connect_error)
         {
          die($conn->connect_error);
         }
        

    ?>
    <nav>
      <ul>
        <li>
          <a href="#" class="logo first">
            <img src="icons_emp/user.png" alt="" />
            <span class="nav-item"><?php echo $_SESSION['username'];?></span>
          </a>
        </li>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/home_employee.php" class="logo">
            <img src="icons_emp/home.png" alt="" />
            <span class=" nav-text">Home</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/task_employee.php" class="logo">
            <img src="icons_emp/task.png" alt="" />
            <span class=" nav-text">Task</span>
          </a>
        </li>
        <li>
          <a href="#" class="logo">
            <img src="icons_emp/new.png" alt="" />
            <span class=" nav-text">Update</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/feedback_home.php#" class="logo">
            <img src="icons_emp/feedback.png" alt="" />
            <span class=" nav-text">Feedback</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html" class="logo last">
            <img src="icons_emp/logout.png" style="width: 44px;height: 35px;" alt="" />
            <span class=" nav-text">Log-Out</span>
          </a>
        </li>
      </ul>
    </nav>

    <div id="container">
        <div class="flex_cards">
            <?php
          
          
           $sqlpending= "select * from tasks where status='Pending'";
           $result_pending= mysqli_query($conn,$sqlpending);
           $rowpending = $result_pending->num_rows;

           $sql_going= "select * from tasks where status='On-going'";
           $result_going = mysqli_query($conn,$sql_going);
           $rowgoing = $result_going->num_rows;

           $sql_done= "select * from tasks where status='Done'";
           $result_done = mysqli_query($conn,$sql_done);
           $rowdone = $result_done->num_rows;
            ?>

            <div class="card">Pending Task <?php echo $rowpending ?></div>
            <div class="card">On-Going Task <?php  echo $rowgoing  ?></div>
            <div class="card">Completed <?php  echo $rowdone  ?></div>
            <div class="card">All <?php  ?></div>
        </div>

    </div>
  </body>
</html>
