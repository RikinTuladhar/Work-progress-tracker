<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link rel="stylesheet" href="employee_homepage.css" />
  </head>
  <im>
    <div class="sidebar">
      <div class="element">
        <a href="manager_homepage.php"
          ><span
            class="material-symbols-outlined"
            style="font-size: 40px; color: black"
          >
            home
          </span></a
        >
      </div>
      <div class="element">
        <a
          href="employee_homepage.php"
          ><span
            class="material-symbols-outlined"
            style="font-size: 40px; color: black"
          >
            person
          </span></a
        >
      </div>
      <div class="element">
        <a
          href="task_homepage.php"
          ><span
            class="material-symbols-outlined"
            style="font-size: 40px; color: black"
          >
            task
          </span></a
        >
      </div>
      <div class="element">
        <a
          href="http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html"
          ><span
            class="material-symbols-outlined"
            style="font-size: 40px; color: black"
          >
            logout
          </span></a
        >
      </div>
    </div>

    <h1 id="top-heading" style="background-color: #d7d7d7;">Employee List</h1>
  
    <div class="container">
      <a href="http://localhost/work-progress-tracker/Work-progress-tracker/login/displaydata.php" style="text-decoration: none;"><span id="add">View Log-In</span></a>
      <div id="employee_card" class="blur-effect">
        <div class="add_emp_button"><span style=" float: right;padding: 10px;"><button style="width: 150px;height:20px;font-size:14px;border-radius: 20px;padding-bottom: 10px;" onclick="showPopup()">Add Employee</button></span></div>
        <div class="search_show">
         <span  class="showbar">Showbar <select style="margin:0px 5px;">
          
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          
         </select>entries</span>
          <span class="search_bar"><input type="text" placeholder="search" style="width: 200px;height: 20px; font-size: 16px;border-radius: 10px;text-align: center;"></span>
        </div>
        <div id="employee_table">
          <table border="1px black solid" cellspacing="15px" >
          <tr>
              <th>#</th>
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
              $result=mysqli_query($conn,$sql);
              if($result->num_rows > 0)
              {
                while($row = $result->fetch_assoc())
                {
                  
                  echo "<tr>
                  <td>".$row['eid']."</td>
                  <td>".$row['emp_name']."</td>
                  <td>".$row['emp_email']." </td>
                  <td>".$row['emp_lastname']."</td>
                  <td>".$row['emp_phone']."</td>
                  <td> <a href='edit_employee.php?eid=".$row['eid']."'>Edit</a></td>
                  <td> <a href='delete_employee.php?eid=".$row['eid']."'>Delete</a></td>
                  </tr>";
                  

                  
                }
              }
            ?>
          </table>
        </div>
      </div>
      <div id="popup" class="popup">
        <div class="popup-content">
          <span class="close" onclick="hidePopup()">&times;</span>
          <h2 style="text-align: center;margin-bottom: 2px;">Add Employee</h2>
          <hr>
          <form action="employeeadd.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="margin-content">
              <br><label class="large-input" for="Name">Name</label><br>
              <br><input type="text" id="Name" name="Name" class="large-input"placeholder="Name"  class="large-input" required></div><br>
              <div class="margin-content">
              <br><label class="large-input" for="Email"> Email</label><br>
              <br><input type="Email" id="Email" name="Email" placeholder="Email"  class="large-input" required></div><br>
              </div>
           
      
            <div class="row">
              <div class="margin-content">
              <br><label class="large-input" for="Last-Name">Last-Name</label><br>
              <br><input type="text" id="Last-Name" name="Last-Name" class="large-input"placeholder="Last-Name"  class="large-input" required></div><br>
              <div class="margin-content">
              <br><label class="large-input" for="Password"> Password</label><br>
              <br><input type="password" id="Password" name="Password" placeholder="Password"  class="large-input" required></div><br>
              </div>
             
            <div class="row">
              <div class="margin-content">
              <br><label  class="large-input" for="Phone">Phone</label><br>
              <br><input type="text" id="Phone" name="Phone"class="large-input" placeholder="Phone" required></div><br>
              <div class="margin-content">
              <br><label  class="large-input  avatar"for="Avatar" style="margin-left: 100px;">Avatar</label><br>
              <br><input type="file" id="file" name="file"  required style="margin-left: 100px;"></div><br>
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
  </body>
</html>
