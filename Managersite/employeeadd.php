<?php
require "../database/crud.php";
// if(isset($_POST["submit"]))
// {

    // //file name with a random number so that similar dont get replaced
    // $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    // //temporary file name to store file
    // $tname = $_FILES["files"]["tmp_name"];

    // //upload directoary path
    // $uploads_dir = '/images';

    // //to move the uploaded file to specific location 
    // move_uploaded_file($tname,$uploads_dir.'/'.$pname);

    //dani yt
    $file = $_FILES['file'];
    print_r($file);
    //size and file type 
    $fileName = $_FILES['file']['name']; //file name ko lagi 
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSizw = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);  //seperate . lai 
    $fileActualExt = strtolower(end($fileExt));//last piece of data from array
    $allowed = array('jpg','jpeg','png');//allow garrne kun kun extentions
    if(in_array($fileActualExt,$allowed))//check garne exist garxha ki nai hamro extention and array 
    {
        if($fileError === 0)   //making sure no error uplading files 
        {
            if($fileSizw < 500000)  // lets than 5kb 
            {
                $fileNameNew = uniqid('',true).".".$fileActualExt;  //making a new name so that if same name vayo vane override na hos vanera
                $fileDestination = 'uploads/'.$fileNameNew;
               $Avatar= move_uploaded_file($fileTmpName, $fileDestination); //temporary location ko file actual location ma rakhne 

            }
            else{
                echo "Your file is to big";
            }

        }
        else{
            echo "There was an error uplaoding your file";
        }

    }
    else{
        echo "you cannot upload files of this type!";
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
    