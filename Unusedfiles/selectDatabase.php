<?php
// require "../database/crud.php";
// class selectDatabase extends Database{
//     public function getUsers(){
//         $sql = "select * from login";
//         $stmt = $this->getConnection()->query($sql);
//         while($row = $stmt->fetch_assoc())
//         {
//            $data[] = $row;
//         }
//         return $data;
//     }

    // public function getUsersStmt($firstname){
    //     $sql = "select * from login where username= ?";
    //     $stmt = $this->getConnection()->prepare($sql);  
    //    $stmt->execute([$firstname]);   //execute requires brackets
    //     $names = $stmt->fetch();

    //     foreach($names as $name ){
    //         echo $name['username'].$name['email'].'<br>';
    //     }
    // }

// }