<?php
$conn = mysqli_connect("localhost", "root", "", "workprogresstracker");
if ($conn->connect_error) {
    die("Connection error" . $conn->connect_error);
}
$seach_input = $_POST['data'];
$sql = "SELECT * FROM employee WHERE emp_name LIKE '%{$seach_input}%'";
$result = mysqli_query($conn, $sql);
$idnum = 1;

echo "<tr>
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Last Name</th>
<th>Phone</th>
<th>Edit</th>
<th>Delete</th>

</tr>";
if ($result->num_rows > 0) {


    while ($row = mysqli_fetch_assoc($result)) {

        // if($row['emp_name']=='')
        // {
?>
        <tr>
            <td><?php echo $idnum; ?></td>
            <!-- <td><img src="uploads/647af3b759df2.png" alt=""></td> -->

            <td><?php echo $row['emp_name']; ?></td>
            <td><?php echo  $row['emp_email']; ?></td>
            <td><?php echo  $row['emp_lastname']; ?></td>
            <td><?php echo  $row['emp_phone']; ?></td>
            <td><a href="emp_action/edit_employee.php?eid=<?php echo $row['eid']; ?>">Edit</a></td>
            <td><a href="emp_action/delete_employee.php?eid=<?php echo $row['eid']; ?>">Delete</a></td>
        </tr>
<?php
        $idnum++;

        //  }
    }
} else {
    echo 'Employee Not found';
}
$conn->close();
?>