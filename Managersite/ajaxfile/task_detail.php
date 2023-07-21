<!doctype html>
<title>Example</title>
<style>
  * {
   box-sizing: border-box; 
  }
  body {
    margin: 0;
    height: 100%;
    background-color: #D8D8D8;
  }
  #main {
    display: flex;
    flex-wrap: wrap;
    height: auto;
    min-height: calc(100vh - 40vh);
    
  }
  #main > article {
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    background:  #EEEEEE;
    border-radius: 20px;
    margin:5px 10px;
  }
  #main > nav, 
  #main > aside {
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    flex: 26vw;
    background:  #EEEEEE;
    border-radius: 10px;
    margin: 10px;
    
  }
  #main > nav {
    
    border-radius: 10px;
    margin: 10px;
    order: -1;
  }
  header, footer, article, nav, aside {
    padding: 1em;
  }
  header {
    background:  #D8D8D8;
    height: 15vh;
  }
  footer{
    height: 25vh;
    background-color:  #D8D8D8;
  }
  .flex-box{
    display: flex;
    justify-content: space-around;
  }
  .flex-box > h3{
    margin: 20px;
    padding: 10px;
  }
  span{
    font-size: 20px;
    margin: 5px;
  }
  h4 > a{
    text-decoration: none;
    color: black;
    border: 0.5px solid black;
    padding: 7px;
    border-radius: 10px;
  }
  h4 > a:hover{
    
    cursor: pointer;
    color: #ffffff;
    background-color: black;
    padding: 10px;
    transition-delay: 0.1s;
    transition-duration: 0.5s;
    transition-timing-function: ease-in-out;
  }
</style>
<body>
  <?php
  session_start();
  $task_id = $_GET['task_id'];
  $conn = mysqli_connect("localhost","root","","workprogresstracker");
  if($conn->connect_error)
  {
    die($conn->connect_error);
  }
  $sql = "SELECT * FROM tasks INNER JOIN employee on tasks.e_id = employee.eid  where task_id = $task_id";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows > 0)
  {
    $row = $result->fetch_assoc();
  }
  ?>
  <header><h1 style="text-align: center;">About Task </h1></header>
  <div id="main">
    <nav><h2>Employe Profile:</h2>
    <hr>

      <h3>Name: <span  ><?php echo $row['emp_name'] ?></span></h3>
      <h3>Last-Name: <span ><?php echo $row['emp_lastname'] ?></span></h3>
      <h3>Email: <span ><?php echo $row['emp_email'] ?></span></h3>
      <h3>Phone: <span ><?php echo $row['emp_phone'] ?></span></h3>
      <h4><a href="../emplyee_view.php?eid= <?php echo $row['e_id']?>">View Profile</a> </h4>
    </nav> 
    <article><h2 style="text-align: center;">Task Details</h2>
    <hr>
    <div class="flex-box">
      <h3>Task Title: <span ><?php echo $row['task_title'] ?></span></h3>
      <h3>Task-Description: <span ><a style="color:black" href="./../description_tasks/<?php echo $row['task_description']?>" download ><img src="../../icons/download-icon.png" alt="Download" srcset=""></a></span></h3>
    </div>
    
    <div class="flex-box">
      
      <h3>Start date: <span ><?php echo isset($row['start_date']) ? $row['start_date'] : "-"  ?></span></h3>
      <h3>End date: <span ><?php echo $row['end_date'] ?></span></h3>
    </div>
    </article>
    <aside style="text-align: center;">
      <h2>Employee Task Status</h2>
      <hr>
      <h3>Status: <span ><?php echo $row['status'] ?></span></h3>
      <h3>Started Task date: <span style="color: #1A5D1A"><?php echo $row['started_task'] ?></span></h3>
      <h3>Finished Task date: <span style="color: #D71313;"><?php echo $row['finished_task'] ?></span></h3>
      <?php 
      $started_task =$row['started_task']  ?? "";;
      $finished_task =$row['finished_task'] ?? "";;
      $started_task_date = new DateTime($finished_task);
      $finished_task_date = new DateTime($finished_task);

      $dateInterval = $finished_task_date->diff($started_task_date);

      //difference between started and finished
      $daysDifference = $dateInterval->days;
      $monthsDifference = $dateInterval->m;
      $yearsDifference = $dateInterval->y;

      //due date difference between finished date and enddate
      $end_date  = new DateTime($row['end_date']); 

      $dueDateInterval = $finished_task_date->diff($end_date);
      $dueDays = $dueDateInterval->days;
    

      ?>
      <h4 style="border: 1px solid black;text-align:left;padding:10px;background-color:#F7F1E5"><span style="color: #B31312;font-size:18px">Date Difference:</span>Days:<?php echo $daysDifference."\t" ?> days Month:<?php echo  $monthsDifference ?>
    
    </h4>
    <h4>
      <?php
       if($finished_task_date > $end_date)
      {?>
        <span style="color: #D71313;"><?php echo "Due Days: \t". $dueDays; ?></span>
      <?php
      } 
      else{
        echo "";
      }

      $conn->close();
    ?>
    </h4>
    </aside>
  </div>
  <footer><button id="goBackBtn">Go Back</button></footer>
  <script>
    document.getElementById('goBackBtn').addEventListener('click', goBack);
// Function to go back in the browser history
  function goBack() {
  window.history.back();
}
  </script>
</body>