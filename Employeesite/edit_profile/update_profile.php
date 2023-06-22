<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    session_start();
    $conn = mysqli_connect("localhost","root","","workprogresstracker");
    if($conn->connect_error){
        die('Connection failed'.mysqli_connect_error());
    }
    $sessionid = $_SESSION['username'];
    $sessionid =$_SESSION['id'];
    

$emp_name=ucfirst($_POST['emp_name']);;
$e_pw=$_POST['e_pw'];
$emp_lastname = ucfirst($_POST['emp_lastname']);
$emp_email=$_POST['emp_email'];
$emp_phone=$_POST['emp_phone'];
$location=ucfirst($_POST['location']);
$Age=$_POST['Age'];
$Experence=ucfirst($_POST['Experence']);
$Degree=ucfirst($_POST['Degree']);
$Short_detail=ucfirst($_POST['Short_detail']);
$About_Your_Self = $_POST['About_Your_Self'];
//img change or insert 
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

      move_uploaded_file($tmpName, '../../Managersite/uploads/'. $newImageName);
    }
}
//checking if image is set
    if(isset($newImageName)){
        $sql = "UPDATE employee SET emp_name='$emp_name',emp_email='$emp_email',`emp_lastname`='$emp_lastname',`emp_phone`='$emp_phone',`e_pw`='$e_pw',`location`='$location',`Age`='$Age',`Experence`='$Experence',`Degree`='$Degree',`Short-detail`='$Short_detail',`About-Your-Self`='$About_Your_Self',`em_img`='$newImageName' WHERE eid = $sessionid";
    }
    else{
        $sql = "UPDATE employee SET emp_name='$emp_name',emp_email='$emp_email',`emp_lastname`='$emp_lastname',`emp_phone`='$emp_phone',`e_pw`='$e_pw',`location`='$location',`Age`='$Age',`Experence`='$Experence',`Degree`='$Degree',`Short-detail`='$Short_detail',`About-Your-Self`='$About_Your_Self' WHERE eid = $sessionid";
    }


//update in database



if($result=mysqli_query($conn,$sql))
{
    ?>
    <script>
        alert("Updated");
        location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/editself.php";
    </script>

<?php
}
else{
    ?>
    <script>
        alert("Something went wrong");
        location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/editself.php";
    </script>

<?php
    
}


}
else{
    echo "";
}

?><?php  $conn->close();  ?>