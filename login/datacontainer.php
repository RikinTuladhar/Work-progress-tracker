<?php
// require "selectDatabase.php";
require "../database/crud.php";
class datacontainer extends crud{
   
    public function showAllUsersOfLogin(){
       $datas = $this->getUsers("login");
       ?>
        <table border="1" cellspacing="10px" cellpadding="20px">
            
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
         <?php

        foreach($datas as $data)
        {
            // echo "<td><td>".$data['id']."</td><td>".$data['username']."</td><td>".$data['email'].
            // "</td></td> <a href='delete.php?id=".$data["id"]."'>Delete</a></td>
            // <td><a hreft ='edit.php?id=".$data["id"]."'>Edit</a></td></tr>";

            echo "<tr>
            <td>" . $data["id"] . "</td>
            <td>" . $data["username"]. "</td>
            <td>"  .$data["email"]. "</td>
         <td> <a href='delete.php?id=" .$data["Id"]."'>Delete</a></td>
         <td><a href='edit.php?id=" . $data["Id"]."'>Edit</a></td></tr>";

         }
    }
}?>
        </table>
       

<?php
// protected function getUsers(){
//         $sql = "select * from login";
//         $result = $this->getConnection()->query($sql); //could have used directly
//         $numRows = $result->num_rows;   //notnneed
//         if($numRows >0){

//             while($row = $result->fetch_assoc())
//             {
//                 echo $row['username'];
//             }
//             // return $data;
//         }
//     } 

    ?>
