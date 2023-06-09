<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Document</title>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link rel="stylesheet" href="cssfile/employee_homepage.css" />
  </head>
  <body>
  <?php
  session_start(); 
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
          <a href="http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html" class="logo last">
            <img src="icons/logout.png" alt="" />
            <span class="nav-item">Log-out</span>
          </a>
        </li>
      </ul>
    </nav>
     

    <h1 id="top-heading" style="background-color: #d7d7d7;">Employee List</h1>
  
    <div class="container">
      <div id="viewlogin">
      <a href="http://localhost/work-progress-tracker/Work-progress-tracker/login/displaydata.php" style="text-decoration: none;"><span id="add">View Log-In</span></a>
      </div>
      <div id="employee_card" class="blur-effect">
        <div class="add_emp_button"><span style=" float: right;padding: 10px;"><button style=" width: 150px;
    height: 39px;
    font-size: 14px;
    border-radius: 20px;
    padding-bottom: -2px;" onclick="showPopup()">Add Employee</button></span></div>
        <div class="search_show">
         <span  class="showbar">Showbar <select 
         id="popo" style="margin: 11px 5px;">
          
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          
         </select>entries</span>
          <span class="search_bar"><input type="text" id="search_input" placeholder="search" style="    width: 200px;
    height: 35px;
    font-size: 16px;
    border-radius: 10px;
    text-align: center;"
    ></span>
        </div>
        <div id="employee_table">
        <table border="1px black solid" cellspacing="15px" id="yy"> 
          <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Last Name</th>
              <th>Phone</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            <?php 
              $conn = mysqli_connect("localhost","root","","workprogresstracker");
              if($conn->connect_error)
              {
                die("Connection error".$conn->connect_error);
              }
              $sql = "SELECT * FROM employee";
              $row = mysqli_query($conn,$sql);
              // $result=mysqli_query($conn,$sql);
              // if($result->num_rows > 0)
              // {
              //   while($row = $result->fetch_assoc())
              //   {
                  
                  // echo "<tr>
                  // <td>".$row['eid']."</td>
                  // <td>".$row['emp_name']."</td>
                  // <td>".$row['emp_email']." </td>
                  // <td>".$row['emp_lastname']."</td>
                  // <td>".$row['emp_phone']."</td>
                  // <td> <a href='edit_employee.php?eid=".$row['eid']."'>Edit</a></td>
                  // <td> <a href='delete_employee.php?eid=".$row['eid']."'>Delete</a></td>
                  // </tr>";      
              //   }
              // ?
            ?>  
 
          </table>
        </div>
      </div>
      <div id="popup" class="popup">
        <div class="popup-content">
          <span class="close" onclick="hidePopup()">x</span>
          <h2 style="text-align: center;margin-bottom: 2px;">Add Employee</h2>
          <hr>
          <form action="emp_action/employeeadd.php" name="emp_validate" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="margin-content">
              <br><label class="large-input" for="Name">Name</label><br>
              <br><input type="text" id="Name" name="Name" class="large-input" placeholder="Name"  class="large-input" ></div><br>
              <div class="margin-content">
              <br><label class="large-input" for="Email"> Email</label><br>
              <br><input type="Email" id="Email" name="Email" placeholder="Email"  class="large-input" ></div><br>
              </div>
           
      
            <div class="row">
              <div class="margin-content">
              <br><label class="large-input" for="Last-Name">Last-Name</label><br>
              <br><input type="text" id="Last-Name" name="Last-Name" class="large-input"placeholder="Last-Name"  class="large-input" ></div><br>
              <div class="margin-content">
              <br><label class="large-input" for="Password"> Password</label><br>
              <br><input type="password" id="Password" name="Password" placeholder="Password"  class="large-input" ></div><br>
              </div>
             
            <div class="row">
              <div class="margin-content">
              <br><label  class="large-input" for="Phone">Phone</label><br>
              <br><input type="text" id="Phone" name="Phone"class="large-input" placeholder="Phone" ></div><br>
              <div class="margin-content">
              <br><label  class="large-input  avatar"for="Avatar" style="margin-left: 100px;">Avatar</label><br>
              <br><input type="file" id="image" name="image"  accept=".jpg, .jpeg ,.png"  style="margin-left: 100px;"></div><br>
            </div>
      

            <!-- <div class="row">
              <div class="margin-content">
            <br><label class="large-input" for="Avatar">Avatar</label><br>
            <br><input type="file"><br>
            </div>
            </div> -->
            <div class="row submit-flex">
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
    <script >
      $(document).ready(function(){
        function fetchdata(){
        $.ajax({
          url:"ajaxfile/el2.php",
          type:"post",
          success:function(data)
          {
            $("#yy").html(data);
          }
        });
      }

        $("#popo").change(function(){
          var sel = $(this).children("option:selected").val();
          $.ajax({
            url:"ajaxfile/el.php",
            type:"post",
            data:{data:sel},
            success:function(data)
            {
              $("#yy").html(data);
            }
          });
          
        });

        $("#search_input").keyup(function(){
          var search_input = $(this).val();
          //alert(search_input);
          if(search_input != '')
          {
          $.ajax({
            url:"ajaxfile/search_emp.php",
            type:"post",
            data:{data:search_input},
            success:function(data)
            {
              // alert(data);
              $("#yy").html(data);
            }
          });
        }
        else if(search_input == '')
        {
          fetchdata();
        }
        });
        

        fetchdata();
      });

    </script>
    <script >
      let form = document.querySelector("form");
      form.addEventListener("submit",function(event){
        event.preventDefault();
        let Phonenumber = document.querySelector("#Phone").value;
          // alert(Phonenumber);
          if(Phonenumber.length === 10)
          {

          }
          else{
            alert("Invalid Phone number");
            return false;
          }
        form.submit();
      })

    </script>
<?php
    }
    else{
      echo "";
    }
?>
  </body>

</html>
