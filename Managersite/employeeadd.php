<?php
require "../database/crud.php";

if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'uploads/' . $newImageName);
    }
}
    $login = new crud();
    $table = "employee";
    
    $Name=$_POST['Name'];
    $Email =$_POST['Email'];
    $LastName=$_POST['Last-Name'];
    $Password = $_POST['Password'];
    $Phone = $_POST['Phone'];
    
    $items = [
        "emp_name"=>$Name,
        "emp_email"=>$Email ,
        "emp_lastname"=>$LastName,
        "emp_phone"=>$Password,
        "e_pw"=>$Phone,
        "em_img"=>$newImageName
    ];
    $login -> insert($table,$items);
    if($login)
    {
        header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
    }
    else{
        echo "error";
    }
    

    
    ?>
    