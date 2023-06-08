<?php 
$conn = mysqli_connect("localhost","root","","workprogresstracker");
if($conn->connect_error)
{
    die("Connection error".$conn->connect_error);
}
$search_input =$_POST['data'];
// $sql = "SELECT * FROM tasks LEFT JOIN employee ON tasks.emp_id = employee.eid WHERE task_title LIKE '%{$search_input}%'";
$sql ="SELECT * FROM tasks LEFT OUTER JOIN employee on tasks.e_id = employee.eid  WHERE task_title LIKE '%{$search_input}%'";
$result = mysqli_query($conn,$sql);
$idnum = 1;

echo "<tr>
<th>#</th>
<th>Task Title</th>
<th>status</th>
<th>start date</th>
<th>end date</th>
<th>Description</th>
<th>E-Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>";
if($result->num_rows > 0 )
{
    while($row = mysqli_fetch_assoc($result))
    {
            ?>
            <tr>
            <td><?php echo $idnum?></td>
            <td><?php echo $row['task_title']?></td>
            <td><?php echo $row['status'] ?></td>
            <td><?php echo $row['start_date']  ?> </td>
            <td><?php echo $row['end_date'] ?></td>
            <td><?php echo $row['task_description']  ?></td>
            <td><?php 
            $row['emp_name']?>
            </td>
            <td><a href="task_action/tasskedit.php?task_id=<?php echo $row["task_id"] ?>">Edit</a> </td>
            <td><a href="task_action/tasskdelete.php?task_id=<?php echo $row["task_id"] ?>">Delete</a> </td>
            </tr>
            <?php 
            $idnum++;
    }
}
else
{
    echo "Task not found";
}
$conn->close();
?>
