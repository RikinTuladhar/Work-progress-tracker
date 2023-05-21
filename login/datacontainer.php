<?php
// require "selectDatabase.php";
require "../database/crud.php";
class datacontainer extends crud{
   
    public function showAllUsers(){
       $datas = $this->getUsers();
       foreach($datas as $data)
       {
        echo $data['username'].'<br>';
       }
    }

}

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
