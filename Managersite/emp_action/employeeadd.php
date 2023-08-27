<?php
require "../../database/crud.php";
// require "../database/crud.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../../sendemail/phpmailer/src/Exception.php';
require '../../sendemail/phpmailer/src/PHPMailer.php';
require '../../sendemail/phpmailer/src/SMTP.php';



$Email = $_POST['Email'];

$Name = $_POST['Name'];
$LastName = $_POST['Last-Name'];
$Password = $_POST['Password'];
$Phone = $_POST['Phone'];

echo $Phone;

$count = 0;
// echo $Email;
$conn = mysqli_connect("localhost", "root", "", "workprogresstracker");
$sql = "SELECT * FROM employee where emp_email = '$Email' or emp_phone = '$Phone' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // echo $row['emp_name'];
  $count = 1;
?>
  <script>
    alert("Email or Phone Number exist");
    location.href = "http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php";
  </script>
  <?php
}

if ($count == 0) {

  if ($_FILES["image"]["error"] == 4) {
    echo
    "<script> alert('Image Does Not Exist'); </script>";
  } else {
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    } else if ($fileSize > 1000000) {
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    } else {
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, '../uploads/' . $newImageName);
    }
  }
  $login = new crud();
  $table = "employee";



  $items = [
    "emp_name" => $Name,
    "emp_email" => $Email,
    "emp_lastname" => $LastName,
    "emp_phone" => $Phone,
    "e_pw" => $Password,
    "em_img" => $newImageName
  ];
  $login->insert($table, $items);
  if ($login) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abc73357240@gmail.com';    //your gmail
    $mail->Password = 'xzngkworkmmjtewo';  //your password
    $mail->SMTPSecure = 'ssl'; //connection secured 
    $mail->Port = 465;
    $mail->setFrom('workprogresstracker@gmail.com');
    $mail->addAddress($Email); //send to
    $mail->isHTML(true);
    $mail->Subject = "Account Created!";
    $mail->Body = "We have created your account at http://localhost/work-progress-tracker/Work-progress-tracker/Landing/index.html ";
    $mail->send();

  ?>
    <script>
      alert("send successfully");
      alert("Inserted")
    </script>
<?php
  }



  // header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
} else {
  echo "error";
}


$conn->close();
?>