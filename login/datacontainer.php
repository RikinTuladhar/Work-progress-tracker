<!-- All the display contents but is called at displaydata.php using oop -->

<style>
    *{
        background-color: #d9d9d9;
    }
#addcontact{
    width: 300px;
    border: 2px;
    text-decoration: none;
    border: 2px solid black;
    margin: 5px auto 20px 20px;
    position: relative;
}
table{
    margin: 20px;
}
.myClass{
    color: gray;

}
a:active {
  /* CSS styles for when the link is being clicked */
  color: red;
  /* Add any other styles you want to apply during the click */
}
</style>
<?php
// require "selectDatabase.php";
require "../database/crud.php";
class datacontainer extends crud{
   
    

    public function showAllUsersOfLogin(){
       $datas = $this->getUsers("login");
       ?>
       <div >
        <a href="login.html" id="addcontact">Add Contact</a>
     </div>
        <table border="1" cellspacing="10px" cellpadding="20px" >
            
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Approve</th>
            </tr>
         <?php

        if($datas >0)
        {
        foreach($datas as $data)
        {
            // echo "<td><td>".$data['id']."</td><td>".$data['username']."</td><td>".$data['email'].
            // "</td></td> <a href='delete.php?id=".$data["id"]."'>Delete</a></td>
            // <td><a hreft ='edit.php?id=".$data["id"]."'>Edit</a></td></tr>";

                echo "<tr>
                <td>" . $data["id"] . "</td>
                <td>" . $data["username"]. "</td>
                <td>"  .$data["email"]. "</td>
                <td> <a href='edit_login.php?id=".$data["id"]."'>Edit</a></td>
                <td> <a href='delete_login.php?id=" .$data["id"]."'>Delete</a></td>
                <td><a id='mylink' onclick = 'disablelink(event)' href='approve_employee_toDb.php?id=" .$data["id"]."'>Approve</a></td></tr>";
                
            }
        }
        else{
            $message = "No Data Found";
            echo "<div style='color:red;margin: 20px'>$message</div>";
        }
    }
}
?>
        </table>
       
        <script >
            var hasclicked = false;

            function disablelink(e) {
                var link = event.target;
                link.removeEventListener('click',disablelink);
                link.setAttribute('disabled','true');
                link.classList.add('myClass');
                event.preventDefault();
            }
            
         

        </script>
       

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
