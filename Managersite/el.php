a<?php

$conn = mysqli_connect("localhost","root","","workprogresstracker");

$val = $_POST['data'];

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
    for($a=0;$a<$val;$a++)
    {
        $row = $result_task->fetch_assoc();
        if($row['eid']=='')
        {

        }
        else{
        echo "<tr>
        <td>".$idnum."</td>
        <td>" .$row['em_img']. "</td>
        <td>" .$row['emp_name']. "</td>
        <td>" .$row['emp_email']. "</td>
        <td>" .$row['emp_lastname']."</td>
        <td>".$row['emp_phone']."</td>
        <td> <a href='edit_employee.php?eid=".$rows['eid']."'>Edit</a></td>
        <td> <a href='delete_employee.php?eid=".$rows['eid']."'>Delete</a></td>
        </tr>";
        $idnum++;
        }
    }   
}
else{
    echo "nodata";
}
$conn->close();
?>