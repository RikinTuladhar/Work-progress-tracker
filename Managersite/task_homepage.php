<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    
    <link rel="stylesheet" href="task_homepage.css">
    <style>
    .popup {
      display: none;
      position: absolute;
      z-index: 9999;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: transparent;
      
    }
    
    .popup-content {
      box-shadow: 0px 13px 15px 28px rgba(115, 114, 117, 0.562);
  
      border-radius: 25px;
      background-color: #9f84b4;
      max-width: 700px;
      height: fit-content;
      margin: 100px auto;
      padding: 20px;
 
    

    }
    
    .close {
      float: right;
      cursor: pointer;
    }
    
    .close:hover {
      color: red;
    }
    </style>
  </head>
  
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
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html" class="logo">
            <img src="icons/logout.png" alt="" />
            <span class="nav-item">Log-out</span>
          </a>
        </li>
      </ul>
    </nav>

    <h1 id="top-heading">Task List</h1>
    <div class="container ">
      <!-- <div class="blur-effect"> -->


      <div id="task_card" class="blur-effect">
        <div class="add_task_button"><span style=" float: right;padding: 10px;"><button style="  width: 150px;
    height: 39px;
    font-size: 14px;
    border-radius: 20px;" onclick="showPopup()">Add Task</button></span></div>
        <div class="search_show">
         <span  class="showbar">Showbar <select id="popo" style="margin: 11px 5px;">
          
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          
         </select>entries</span>
          <span class="search_bar"><input type="text" placeholder="search" style=" width: 200px;
    height: 35px;
    font-size: 16px;
    border-radius: 10px;
    text-align: center;"></span>
        </div>
        <div id="task_table">
        <table border="1px black solid" cellspacing="15px" id="yy" >
    
          </table>
            <?php  $conn = mysqli_connect("localhost","root","","workprogresstracker"); 
                    $sql_task = "select * from tasks";
                    $result_task = mysqli_query($conn,$sql_task);
                    if($result_task->num_rows > 0)
                    {
                      // while($row = $result_task->fetch_assoc())
                      // {
                        // echo "<tr>
                        // <td>".$row['task_id']."</td>
                        // <td>".$row['task_title']."</td>
                        // <td>".$row['status']."</td>
                        // <td>".$row['start_date']."</td>
                        // <td>".$row['end_date']."</td>
                        // <td>".$row['task_description']."</td>
                        // <td>".$row['e_id']."</td>
                        // <td> <a href ='tasskdelete.php?task_id=".$row["task_id"]."'>Delete</a></td>
                        // <tr>";
                      }
                    // }
                    else{
                      echo "<script>alert('no record');</script> ";
                    }
                      ?>
          </table>
        </div>
      <!-- </div> -->
    </div>
<div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="hidePopup()">&times;</span>
    <h2 style="text-align: center;margin-bottom: 2px;">Add New Task </h2>
    <hr>
    <form action="taskadd.php" method="post">
      <div class="row">
        <div class="margin-content">
        <br><label for="Name" class="large-input">Task Name</label><br>
        <br><input type="text" class="large-input"id="Name" name="Name" placeholder="Task Name" required></div><br>
        <div class="margin-content">
        <br><label class="large-input" for="Status">Status</label><br>
        <br><select class="large-input"name="Status" id="Status">
          <option value="Pending">Pending</option>
          <option value="On-hold">On-going</option>
          <option value="<?php echo"Done";?>">Done</option>
        </select> </div><br>
      </div>

      <div class="row">
        <div class="margin-content">
        <br><label class="large-input" for="Start-Date">Start Date</label><br>
        <br><input type="date" id="Start-Date" name="Start-Date" class="large-input"placeholder=""  class="large-input" required></div><br>
        <div class="margin-content">
        <br><label class="large-input" for="End-Date">End Date</label><br>
        <br><input type="date" id="End-Date" name="End-Date" placeholder=""  class="large-input" required></div><br>
        </div>
       
      <div class="row">
        <div class="margin-content">
        <br><label  class="large-input" for="Project-Manager">Project Manager</label><br>
        <br>
        <?php
       
        $sql_manager = "SELECT * from  manager";
        $result = mysqli_query($conn,$sql_manager);?>
        <select id="Project-Manager" name="Project-Manager"class="large-input" >
        <?php
        if($result>0)
        {
          while($row = $result->fetch_assoc())
          {?>
            <option value="<?php echo $row['m_id'] ?>"><?php echo $row['m_name']; ?></option>
            <?php
          }
        }
       ?>
        </select>
      </div><br>
        <div class="margin-content">
        <br><label  class="large-input"for="Project-Member">Project Member</label><br>
        <br>
        <select id="Project-Member"class="large-input" name="Project-Member">
          <?php
          $sql_employee = "select * from employee";
          $result_employee = mysqli_query($conn, $sql_employee );
          if($result_employee >0)
          {
            while($row_employee = $result_employee->fetch_assoc())
            {
              ?>
              <option value="<?php echo $row_employee['eid'];?>"><?php echo $row_employee['emp_name'];?></option>
              <?php
            }
          }
         ?>
        </select>
      </div><br>
      </div>

      <div class="row">
        <div class="margin-content">
      <br><label class="large-input" for="Description">Description</label><br>
      <br><textarea name="Description" id="" cols="30" rows="10" style="height: 43px; width: 334px;"></textarea><br>
      </div>
      </div>
      <div class="row">

        <input type="submit" value="submit" class="submit-input" >
      </div>
    </form>
    
  </div>
</div>
    </div>
    

    <script>
      function showPopup() {
  document.getElementById("popup").style.display = "block";
  document.querySelector(".blur-effect").style.filter= "blur(8px)";
}

function hidePopup() {
  document.getElementById("popup").style.display = "none";
  document.querySelector(".blur-effect").style.filter= "none";
  
}

    </script>
    <script>

$(document).ready(function(){
  $.ajax({
url:"sel2.php",
type:"post",
success:function(data){
$("#yy").html(data);
}

});


$("#popo").change(function(){

  var sel= $(this).children("option:selected").val();
  // alert(sel);
  
$.ajax({
url:"sel.php",
type:"post",
data:{data:sel},
success:function(data){
$("#yy").html(data);
}

});


});

});
    </script>
  </body>
</html>
