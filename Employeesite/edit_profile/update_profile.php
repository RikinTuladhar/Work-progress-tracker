<?php



if($_SERVER['REQUEST_METHOD']=="POST")
{
    session_start();
    $conn = mysqli_connect("localhost","root","","workprogresstracker");
    if($conn->connect_error){
        die('Connection failed'.mysqli_connect_error());
    }
    $sessionname = $_SESSION['username'];
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

//function for phone number
function phoneCheckDublicate($conn, $emp_phone,$sessionid) {
  $sql_phone = "SELECT emp_phone from employee where emp_phone = '$emp_phone' and not eid = '$sessionid' ";
  $result_check = mysqli_query($conn,$sql_phone);
  // If result matched $myusername and $mypassword, table row must be 1 row
  if(mysqli_num_rows($result_check)>0)
  {
    return true;
    }else{
      return false;}
};
//function to check email
function emailCheckDublicate($conn,$emp_email,$sessionid)
{
  $sql_email = "SELECT emp_email  from employee where emp_email  = '$emp_email' and not eid = '$sessionid'";
  $result_check = mysqli_query($conn,$sql_email);
  if(mysqli_num_rows($result_check)>0)
  {
    return true;
  }
  else{
    return false;
  }
}

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
$bol_phone = phoneCheckDublicate($conn,$emp_phone,$sessionid);
$bol_email =  emailCheckDublicate($conn,$emp_email,$sessionid);
if(!$bol_phone && !$bol_email)
{
//checking if image is set
    if(isset($newImageName)){
        $sql = "UPDATE employee SET emp_name='$emp_name',emp_email='$emp_email',`emp_lastname`='$emp_lastname',`emp_phone`='$emp_phone',`e_pw`='$e_pw',`location`='$location',`Age`='$Age',`Experence`='$Experence',`Degree`='$Degree',`Short-detail`='$Short_detail',`About-Your-Self`='$About_Your_Self',`em_img`='$newImageName' WHERE eid = $sessionid";
    }
    else{
        $sql = "UPDATE employee SET emp_name='$emp_name',emp_email='$emp_email',`emp_lastname`='$emp_lastname',`emp_phone`='$emp_phone',`e_pw`='$e_pw',`location`='$location',`Age`='$Age',`Experence`='$Experence',`Degree`='$Degree',`Short-detail`='$Short_detail',`About-Your-Self`='$About_Your_Self' WHERE eid = $sessionid";
    }
}
else{
  ?>
  <script>
    alert("Duplicate Email or Phone Number");
    location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/editself.php";
  </script>
  <?php
}

//update in database
$result=mysqli_query($conn,$sql);

if($result)
{
    ?>
    <script>
        alert("Updated");
        location.href="http://localhost/work-progress-tracker/Work-progress-tracker/Employeesite/editself.php";
    </script>
<?php
}
else{
    echo "hello";
}

}
else{
    echo "";
}




?><?php  $conn->close();  ?>