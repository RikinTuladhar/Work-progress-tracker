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
        $row = $result_task->fetch_assoc();
        if($row['eid']=='')
        {
            	
        }
        else{ ?>
              <tr>
              <td><?php echo $idnum;?></td>
              <!-- <td><img src="uploads/647af3b759df2.png" alt=""></td> -->
              <td> <img src="uploads/<?php echo $row["em_img"];?>" width = 100px height= 80px title="<?php echo $row['em_img']; ?>"> </td>
              <td><?php echo $row['emp_name']  ;?></td>
              <td><?php echo  $row['emp_email'];?></td>
              <td><?php echo  $row['emp_lastname'];?></td>
              <td><?php echo  $row['emp_phone'];?></td>
              <td><a href="emp_action/edit_employee.php?eid=<?php echo $row['eid']; ?>">Edit</a></td>
              <td><a href="emp_action/delete_employee.php?eid=<?php echo $row['eid']; ?>">Delete</a></td>
            </tr>
            <?php echo $row['em_img']; ?>
        <?php 
            $idnum++;
            // echo "<tr>
            // <td>".$idnum."</td>
            // <td> <img src ='uploads/" $rows['em_img']"' width = 100px height = 80px  </td>
            // <td>".$rows['emp_name']."</td>
            // <td>".$rows['emp_email']."</td>
            // <td>".$rows['emp_lastname']."</td>
            // <td>".$rows['emp_phone']."</td>
            // <td> <a href='edit_employee.php?eid=".$rows['eid']."'>Edit</a></td>
            // <td> <a href='delete_employee.php?eid=".$rows['eid']."'>Delete</a></td>
            // </tr>";
 
        }
    }
}else{
    echo "nodata";
}
$conn->close();
?>