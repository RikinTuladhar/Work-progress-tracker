<!-- Contains for deleting data -->

<?php
// require "../database/crud.php";
// require "../database/Database.php";
    // $deleteid = new crud();
    // $deleteid->delete("login");
//     class delete_login extends Database{ 
//         public function delete_login($id){
//         $id = $_GET['id'];
//         $sql = "delete from login where id = ".$id;
//         $stmt = mysqli_query($this->getConnection(),$sql);
        
//     }
// }
        $con= mysqli_connect("localhost","root","","workprogresstracker");
        $id = $_GET['id'];
        $sql = "delete from login where id = ".$id;
        $stmt = mysqli_query($con,$sql);
        if($sql)
       {
              header('location:displaydata.php');
       }
?>