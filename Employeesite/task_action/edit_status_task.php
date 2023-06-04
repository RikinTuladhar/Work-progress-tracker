<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #container{
            width:100%;
            height:100vh;
            display:flex;
            justify-content: center;
            align-items: center;
            
        }
        #form_data{
        
            width:auto;
            height:400px;
            background-color:gray;
            padding:20px;
        }
        .flex_row{
            display: flex;
             justify-content: space-around;
        }
        input[type="text"] {
           width: auto;
            height: 30px;
            margin: 10px;
}
select#status {
    margin-top: 20px;
}
button[type="submit"]
{
    margin-top:30px;
}
    </style>
</head>
<body>
    <?php
        session_start();
        $conn = mysqli_connect("localhost","root","","workprogresstracker");
        if($conn->connect_error)
         {
          die($conn->connect_error);
         }
                $sessionid =$_SESSION['id'];
                $sql = "Select * from tasks where e_id =$sessionid";
                $result = mysqli_query($conn,$sql);
            ?>
    <div id="container">
        <div id="form_data">
        <form action="edit_submit.php" method="post">
        <?php 
                $row = $result->fetch_assoc();
                  
                 if($result->num_rows < 0)
                 {
                  echo '';
                 }
                 else{
                ?>    
                 <div class="flex_row">
                  <label for="Task_title">Task_title</label>
                  <label for="Task_description">Task_description</label>
                </div>
                <div class="flex_row">
                    <input type="text" name="task_title"  value="<?php echo $row['task_title'];?>">
                    <input type="text" name="task_description"  value="<?php echo $row['task_description'];?>">
                 </div>
                 <div class="flex_row">
                 <label for="Start_date">Start_date</label>
                 <label for="End_date">End_date</label>
                 </div>
                 <div class="flex_row">
                <input type="text" name="start_date"  value="<?php echo $row['start_date'];?>">
                <input type="text" name="end_date"  value="<?php echo $row['end_date'];?>">
            </div>
            <div>
                <label for="">Status</label>
                <select name="status" id="status">
                <option value="Pending">Pending</option>
                  <option value="On-going">On-going</option>
                  <option value="Completed">Completed</option>
                  </select> 
                  </div>

            <button type="submit">submit</button>

            <?php
               
            }
          
          $conn->close();
            ?>
        </form>
        </div>
    </div>
</body>
</html>