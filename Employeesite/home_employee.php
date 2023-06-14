<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/home_employee.css" />
    <script src="../js/jquery.js"></script>
    <title>Document</title>
  </head>
  <body>
    <?php  $conn = mysqli_connect("localhost","root","","workprogresstracker");
        session_start();
        
        if(isset($_SESSION['username']))
        {

         if($conn->connect_error)
         {
          die($conn->connect_error);
         }
        

    ?>
    <nav>
      <ul>
        <li>
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/editself.php" class="logo first">
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
        <a href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/update_employee.php" class="logo">
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
            
            <div class="card pending">Pending Task <span id="pending"></span></div>
            <div class="card ongoing">On-Going Task <span id="ongoing"></span></div>
            <div class="card completed">Completed <span id="completed"> </span></div>
        </div>

    </div>
    <script>
  $(document).ready(function() {
    $.ajax({
          url:"ajax/home_emp.php",
          type:"post",
          dataType:"json",
          success:function(data){
            $("#pending").html("<pre>\t"+data.pending+"</pre>");
            // alert();
            $("#ongoing").html("<pre>\t"+data.ongoing+"</pre>");

            $("#completed").html("<pre>\t"+data.done+"</pre");
          }
        });

    $(".pending").click(function(){
          window.location.href="home_cards/pending_task.php";
        });
    
        $(".ongoing").click(function(){
          window.location.href="home_cards/ongoing_task.php";
        });

        $(".completed").click(function(){
          window.location.href="home_cards/completed_task.php";
        });

        

  });
</script>

<?php
        }
        else{
          echo "";
        }
  ?>
  </body>
</html>
