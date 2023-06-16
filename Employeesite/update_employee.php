<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/task_employee.css" />
    <title>Update</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
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
         $sessionid =$_SESSION['id']
        

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
          <a href="../unsetvariable.php?unset=true" class="logo last">
            <img src="icons_emp/logout.png" style="width: 44px;height: 35px;" alt="" />
            <span class=" nav-text">Log-Out</span>
          </a>
        </li>
      </ul>
    </nav>

    
    <div id="container">
      <?php
            
              // $sql ="SELECT *
              // FROM tasks
              // INNER JOIN employee
              // ON tasks.e_id  = employee.eid 
              // WHERE tasks.e_id= $sessionid";
              $sql = "Select * from tasks where e_id =$sessionid and (status='Pending' and completed_task=1)";
              $result = mysqli_query($conn,$sql);
              ?>
              <div id="table_data">
            <table border= 1px solid black >
              <h1 style="text-align:center;">Update Task</h1>
              <tr>
                <th>#</th>
                <th>Task_title</th>
                <th>Task_description</th>
                <th>Start_date</th>
                <th>End_date</th>
                <th>Status</th>
                <th>Feedback</th>
                <th>Action</th>
                
              </tr>
                <?php 
                $idnum=1;
                while($row = $result->fetch_assoc()){
                  
                 if($result->num_rows < 0)
                 {
                  echo '';
                 }
                 else{
                  $task_id=$row['task_id'];
                  
                ?>
              <tr>
                <td><?php echo $idnum?> </td>
                <td><?php echo $row['task_title'];?></td>
                <td><?php echo $row['task_description'];?></td>
                <td><?php echo $row['start_date'];?></td>
                <td><?php echo $row['end_date'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><?php echo $row['feedback'];?></td>
                 
                  <td><a href="task_action/edit_status_task.php?task_id=<?php echo $task_id; ?>">Edit</a></td>

              
                <!-- <td> -->
                  <?php 
                  // echo $row['status'];
                ?>
                <!-- </td> -->
               
              </tr>
              <?php
                $idnum++;
                }
              }
              $conn->close();
                ?>
            </table>
        </div>

    </div>
    <script>
      $(document).ready(function()
      {
       $("#status").change(function(){
        var selected_value= $(this).children("option:selected").val();
        $.ajax({
          url:'status.php',
          type:"post",
          data:{data:selected_value},
          success:function(data)
          {
          }
        })
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
