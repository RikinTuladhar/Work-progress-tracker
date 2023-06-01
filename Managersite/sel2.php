
<?php

$conn = mysqli_connect("localhost","root","","workprogresstracker");




// $sql_task = "select * from tasks";
$sql_task = "select task_id,task_title,emp_name,status,start_date,end_date,task_description from tasks INNER JOIN employee on tasks.e_id =employee.eid ";
$result_task = mysqli_query($conn,$sql_task);
$idnum = 1;
echo "<tr>
<th>#</th>
<th>Task Title</th>
<th>status</th>
<th>start date</th>
<th>end date</th>
<th>Description</th>
<th>E-Name</th>
<th>Delete</th>

</tr>";
if($result_task->num_rows > 0)
{

    
    for($a=0;$a<10;$a++){
        $rows = $result_task->fetch_assoc();
        if($rows['task_id']==''){
            
        }else{
            
            echo "<tr>
            <td>".$idnum ."</td>
            <td>".$rows['task_title']."</td>
            <td>".$rows['status']."</td>
            <td>".$rows['start_date']."</td>
            <td>".$rows['end_date']."</td>
            <td>".$rows['task_description']."</td>
            <td>".$rows['emp_name']."</td>
            <td> <a href ='tasskdelete.php?task_id=".$rows["task_id"]."'>Delete</a></td>
            <tr>";
            $idnum++;
            
        }
    }
}
else
{
    echo "no data";
}
    
    
    ?>