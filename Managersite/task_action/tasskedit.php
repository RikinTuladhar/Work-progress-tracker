<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #flex-container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        #container{
            display: flex;
            width: 454px;
            padding: 20px;
            height: auto;
             background: aqua;
                flex-direction: row;
             flex-wrap: wrap;
             align-content: center;
             justify-content: center;
             border-radius: 30px;

        }
        input[type="text"] {
            margin: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        textarea#Description {
    margin: 10px;
    display: flex;
}
select#E-Name {
    width: 100px;
}
        
    </style>
</head>
<body>

        <?php 
        $con = mysqli_connect("localhost","root","","workprogresstracker");
        $id = $_GET['task_id'];

        // echo $id;

        if(empty($id))
        {
            header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/task_homepage.php');
        }

        $sql = "SELECT * FROM  tasks where task_id = $id";
        $result = mysqli_query($con,$sql);

        $row = $result->fetch_assoc();
        ?>

        <div id="flex-container">

            <div id="container">
                
                <form action="task_edit_content.php" method="post">



                    <input type="hidden" name="id" value="<?php echo $row['task_id'];?>">  <br>

                    <label for="" name="name" >Task</label>    
                    <input type="text" name="task_title" value="<?php echo $row['task_title'] ?>"><br>

                    <label for="">status</label>
                    <input type="text" name="status" value="<?php echo $row['status'] ?>"><br>
                    
                    <label for="">Description</label>   
                    <textarea name="Description" id="Description" cols="30" rows="10" value=""><?php echo  $row['task_description']?></textarea>
                    <br>
                    
                    <label for="">start date</label>    
                    <input type="date" name="startdate" value="<?php echo $row['start_date'] ?>"><br>
                    <br>
                    
                    
                    <label for="">end date</label>    
                    <input type="date" name="enddate" value="<?php echo $row['end_date'] ?>"><br>
                    <br>
                    <label for="">E-Name</label>    
                    <br><br>

                    <select name="E_Name" id="E_Name">
                    <?php 
                    $sql_emp = "SELECT * FROM  employee";
                    $result_emp_detail=mysqli_query($con,$sql_emp);
                    while($rows= $result_emp_detail->fetch_assoc())
                    { ?>
                        <option value="<?php echo $rows['eid']?>"><?php echo $rows['emp_name'];?> </option>
                    <?php }
                    ?>
                    
                    </select>
                    <input type="submit" value="submit">

                </form>    
            </div>
                
            </div>
           
</body>
</html>