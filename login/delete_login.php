<!-- Contains for deleting data -->

<?php
$con = mysqli_connect("localhost", "root", "", "workprogresstracker");
$id = $_GET['id'];
$sql = "delete from login where id = " . $id;
$stmt = mysqli_query($con, $sql);
if ($sql) {
       header('location:displaydata.php');
}
?>