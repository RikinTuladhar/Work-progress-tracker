<?php
include('connection.php');

?>
<?php
	if(isset($_POST['addstaff.php']))
	{
	
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];   
	$email=$_POST['email']; 
	$password=$_POST['password']; 
	$address=$_POST['address']; 
	$gender=$_POST['gender']; 
	$dob=$_POST['dob']; 
	$phone=$_POST['phone'];
	$leave_days=$_POST['avg_leave']; 
	

	 $query = mysqli_query($conn,"select * from employees where Email = '$email'");
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ ?>
	 <script>
	 alert('Data Already Exist');
	</script>
    <?php
     }
      else{
        mysqli_query($conn,"INSERT INTO employees(FirstName,LastName,Email,Password,Address,Gender,DOB,Phone,Avg_leave) 
        VALUES('$fname','$lname','$email','$password','$address','$gender','$dob','$phone','$avg_leave' )        
		");} ?>
		<script>alert('Staff Records Successfully  Added');
    </script>
    <?php
}

?>



<html>
    <head>
        <title>dashborad</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ="stylesheet" href="mstyle.css">
    </head>
    

<body>
    <nav>Leave Management System
      
      <button class="dropbtn" ><i class="fa fa-cog" ></i></button>
      
</div>
</div>
      
    </nav>
    <div class="sidenav">
        <a href ="managerdashboard.php">Dashboard</a><br>
        <a href ="#">Leave type</a><br>
        <button class="dropdown-btn">Staff
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#">Add staff</a><br>
            <a href="#">Manage staff</a>
        </div><br>
        <button class="dropdown-btn">Leave
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#">Apply leave</a><br>
            <a href="#">Pending leave</a><br>
            <a href="#">Approved leave</a><br>
            <a href="#">Rejected leave</a><br>
        </div><br>
</div>

<fieldset>
    <legend>Staff form</legend>
    <form name="addform" action="addstaff.php" method="post">
        <div class="content">
            <br>
            <label>Firstname:</label>
            <input type="text"  name="firstname">
            <label>Lastname:</label>
            <input type="text"  name="lastname"><br><br>
            <label>Email:</label>
            <input type="email"  name="email">
            <label>Password:</label>
            <input type="password"  name="password"><br><br>
            <label>Address:</label>
            <input type="text"  name="address">
            <label>Gender:</label>
            <input type="radio"  name="gender">Male
            <input type="radio"  name="gender">Female<br><br>
            <label>Date of birth:</label>
            <input type="date"  name="dob">
            <label>Phone:</label>
            <input type="tel"  name="phone"><br><br>
            <label>Avg_leave:</label>
            <input type="number"  name="avg_leave">
            <br><br><br>
            <button type="submit">Add Staff</button>
        </div>

        </form>

        
    </fieldset>
    
</html>