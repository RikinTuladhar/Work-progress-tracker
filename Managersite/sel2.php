<?php

$conn = mysqli_connect("localhost","root","","workprogresstracker");




$sql_task = "select * from tasks";
$result_task = mysqli_query($conn,$sql_task);


for($a=0;$a<10;$a++){
    $rows = $result_task->fetch_assoc();
    if($rows['task_id']==''){

    }else{

    echo "<tr>
    <td>".$rows['task_id']."</td>
    <td>".$rows['task_title']."</td>
    <td>".$rows['status']."</td>
    <td>".$rows['start_date']."</td>
    <td>".$rows['end_date']."</td>
    <td>".$rows['task_description']."</td>
    <td>".$rows['e_id']."</td>
    <td> <a href ='tasskdelete.php?task_id=".$rows["task_id"]."'>Delete</a></td>
    <tr>";

}
}


?>