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
                // $sessionid =$_SESSION['id'];
                $task_id = $_GET['task_id'];
                // echo $task_id;
                $sql = "";
                $result = mysqli_query($conn,$sql);
            ?>
    <div id="container">
        <div id="form_data">
        <form action="feedback_send.php" method="post">
        <div class="flex_row">
                    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
                  <label for="Task_title">Task_title</label>
                  <label for="Task_description">Task Assigend</label>
                </div>
                <div class="flex_row">
                    <input type="text" name="task_title"  value="">
                    <input type="text" name="task_description"  value="">
                 </div>
                 <div class="flex_row">
                 <label for="Start_date">Start_date</label>
                 <label for="End_date">End_date</label>
                 </div>
                 <div class="flex_row">
                <input type="text" name="start_date"  value="">
                <input type="text" name="end_date"  value="">
            </div>
            <div>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <br>

            <button type="submit">submit</button>
        </form>
        </div>
    </div>
</body>
</html>