<?php 

$conn = mysqli_connect("localhost","root","","workprogresstracker");
$sql_task = "select * from employee";

$result_task = mysqli_query($conn,$sql_task);
$idnum = 1;

echo "<tr>
<th>#</th>
<th>Image</th>
<th>Name</th>
<th>Email</th>
<th>Last Name</th>
<th>Phone</th>
<th>Edit</th>
<th>Delete</th>

</tr>";

if($result_task->num_rows > 0)
{
    for($a=0 ;$a<10;$a++)
    {
        $rows = $result_task->fetch_assoc();
        if($rows['eid']=='')
        {
            	
        }
        else{
            echo "<tr>
            <td>".$idnum."</td>
            <td>".$rows['em_img']."</td>
            <td>".$rows['emp_name']."</td>
            <td>".$rows['emp_email']."</td>
            <td>".$rows['emp_lastname']."</td>
            <td>".$rows['emp_phone']."</td>
            <td> <a href='edit_employee.php?eid=".$rows['eid']."'>Edit</a></td>
            <td> <a href='delete_employee.php?eid=".$rows['eid']."'>Delete</a></td>
            </tr>";
            $idnum++;
 
        }
    }
}else{
    echo "nodata";
}
$conn->close();
?>