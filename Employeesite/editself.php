<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery.js"></script>
    <title>Edit Self Profile</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: #D8D8D8;
        }
       
        main{
            display: grid;
            background-color: #D8D8D8;
            width: 100%;
            height: 100vh;
            grid-template-areas: "head head head "
                                "side content content"
                                "foot foot foot";
                                grid-template-rows: 73px auto 50px;


        }
        img{
            border: 1px solid black;
        }
        header{
            grid-area: head;
            background-color: #D8D8D8;
            height: 60px;
            padding: 20px;
            text-align: center;
            
        }
        article{
            grid-area: content;
            background-color: #D8D8D8;
            margin-block: auto;
        }
        article h2{
            margin-left: 30px;
        }
        aside{
            grid-area: side;
            background-color: #D8D8D8;
            padding: 40px;
            
        }
        footer{
            grid-area: foot;
            background-color: #D8D8D8;
        }
        .card{
            
            margin: 10px;
            padding: 30px;
            background-color: #EEEEEE;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
        h3{
            margin-top: 10px;
            font-weight: 100;
        }
        h4 {
            font-weight: 100;
            }
        .flex-box {
                     display: flex;
                      justify-content: space-evenly;
                     align-content: center;
                    flex-wrap: wrap;
                    margin: 20px;
        }
        .spacingtop{
            margin-top: 40px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
}
        .margin-content {
             margin: 5px;
            font-size: larger;
}
    .popup{
        display: none;
        position: absolute;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: transparent;
    }
    .popup-content{
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        border-radius: 5px;
        background-color: #EBF0F6;
        max-width: 700px;
        height: fit-content;
        margin: 100px auto;
        padding: 20px;
    }
    .close{
        color: red;
    }
    .close:hover{
        cursor: pointer;
    }
    #button_middle{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }
    input[type]{
        padding: 10px;
        background-color: transparent;
        outline:none;
    }
    </style>
</head>
<body>
    <?php
    session_start();
        if(isset($_SESSION['username']))
        {
            $conn = mysqli_connect("localhost","root","","workprogresstracker");
            if($conn->connect_error){
                die('Connection failed'.mysqli_connect_error());
            }
            $sessionid = $_SESSION['username'];
            $sessionid =$_SESSION['id'];
            $sql = "SELECT * FROM employee WHERE eid = $sessionid";
            $result = mysqli_query($conn,$sql);
            if(!$result){
                echo "Query error";
            }
            $row = mysqli_fetch_assoc($result); 

            
    ?>
        <div class="popup" id="popup">
            <div class="popup-content">
                <span style="float: right;font-size:20px" class="close" onclick="hidePopup() ">x</span>
                <h2 >Edit Profile</h2>
                <hr>
                <form action="./edit_profile/update_profile.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="margin-content">
                            <br>
                            <label for="">Name</label>
                            <br>
                            <br>
                            <input type="text" name="emp_name" placeholder="Name" value="<?php echo $row['emp_name'];?>"><br>
                        </div>
                        <div class="margin-content">
                            <br>
                            <label for="">Last Name</label>
                            <br>
                            <br>
                            <input type="text" name="emp_lastname" placeholder="Last Name" value="<?php echo $row['emp_lastname'];?>"><br> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="margin-content">
                        <br>
                            <label for="">Email</label>
                            <br>
                            <br>
                            <input type="text" id="email"  name="emp_email" placeholder="Email" value="<?php echo $row['emp_email'];?>" required><br>
                        </div>
                        <div class="margin-content">
                        <br>
                            <label for="">Phone</label>
                            <br>
                            <br>
                            <input type="text" name="emp_phone" id="phone" placeholder="Phone" value="<?php echo $row['emp_phone'];?>"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="margin-content">
                        <br>
                            <label for="">Location</label>
                            <br>
                            <br>
                            <input type="text" name="location" placeholder="Location" value="<?php echo $row['location'];?>"><br>
                        </div>
                        <div class="margin-content">
                        <br>
                            <label for="">Age</label>
                            <br>
                            <br>
                            <input type="text" name="Age" id="Age" placeholder="Age" value="<?php echo $row['Age'];?>"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="margin-content">
                        <br>
                            <label for="">Experence</label>
                            <br>
                            <br>

                            <input type="text" name="Experence" placeholder="Experence" value="<?php echo "{$row['Experence']}";?>"><br>
                        </div>
                        <div class="margin-content">
                        <br>
                        
                            <label for="">Degree</label>
                            <br>
                            <br>
                            <input type="text" name="Degree" placeholder="Degree" value="<?php echo $row['Degree'];?>"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="margin-content">
                        <br>
                            <label for="">Short-detail</label>
                            <br>
                            <br>
                            <input type="text" name="Short_detail" placeholder="Short-detail" value="<?php echo $row['Short-detail'];?>"><br>
                        </div>
                        <div class="margin-content" >
                        <br>
                            <!-- <label for="">Profile-Pic</label> -->
                            <label for="">Password</label>
                            <br>
                            <br>
                            <!-- <input name="profile_pic" type="file"><br> -->
                            <input type="text" name="e_pw" id="e_pw" value="<?php echo $row['e_pw'] ?>">
                        </div>
                    </div>
                    <div class="margin-content">
                    <br>
                        <label for="">About Your Self</label>
                        <br>
                        <br>
                        <textarea name="About_Your_Self" id="About_Your_Self" style="width: 691px;height: 110px;"><?php echo $row['About-Your-Self'];?></textarea>
                    </div>
                    <div id="button_middle">
                        <button type="submit" style="padding: 10px; border-radius:10px;" >Submit</button>
                    </div>
                </form>
            </div>
        </div>




    <main id="blur_bg">

        <header>
            <h1>Profile</h1>
        </header>

        <aside>
            <div class="card">
            
                <h1> Details </h1>
                <img src="icons_emp/employee.png" alt="profile" height="150px" width="150px">
                <div><h3>Name: <?php echo $row['emp_name'];?></h3></div>
                <div><h3>Age: <?php echo $row['Age'];?></h3></div>
                <div><h3>Location: <?php echo isset($row['location']) ? $row['location'] : 'no location'; ?></h3></div>
                <div><h3>Experence: <?php echo isset($row['Experence']) ? $row['Experence']."years" :'-'; ?></h3></div>
                <div><h3>Degree: <?php echo isset($row['Degree']) ? $row['Degree']: "-";?></h3></div>
              
                
            </div>
            <button onclick="showpopup()" 
            style="margin-top:10px;padding: 3px; border-radius:10px;">Edit Profile</button>
        </aside>



        <article>
        <div class="card">
           <h2>About Me</h2>
           <hr>
               <div class="flex-box">
                    <h4>Name:  <?php echo $row['emp_name'];?></h4>
                   <h4>LastName:  <?php echo $row['emp_lastname'];?></h4>
                </div >
                <div class="flex-box">
                <h4>Location:  <?php echo $row['location'];?></h4>
                    <h4>Phone:  <?php echo $row['emp_phone'];?></h4>
                </div>
                <div class="flex-box">
                    <h4>E-Mail:  <?php echo $row['emp_email'];?></h4>
                    <h4>Age:  <?php echo $row['Age'];?></h4>
                </div>
        </div>
        <div class="card spacingtop">
        <h1> <?php echo $row['Short-detail'];?></h1>
        <hr>
        <div class="card" style="box-shadow: none;">
        <p><?php echo $row['About-Your-Self'];?></p>
        </div>
        </div>
        </article>
        <footer>
        </footer>
    </main> 
    <?php
        }
        else {
                echo "";
        }?>



<script>
    function showpopup(){
        document.getElementById("popup").style.display="block";
        document.getElementById("blur_bg").style.filter="blur(5px)";
    }
    function hidePopup(){
        document.getElementById("popup").style.display="none";
        document.getElementById("blur_bg").style.filter="";
    }
    var form = document.querySelector("form");
    form.addEventListener("submit",function(e){
        e.preventDefault();
        //values from id
        var  age = parseInt(document.getElementById("Age").value);
        var  phone = document.getElementById("phone").value;
        var email = document.getElementById("email").value;
        var e_pw = document.getElementById("e_pw").value;

        //patterns
        var pattern = /^[\w\.-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\.[a-zA-Z]{2,4}$/;
        var patternnum = /^[0-9]+$/;


        if(pattern.test(email)){

        }
        else{
            alert("Not valid email");
            return;
        }


        if(age <= 0 )
        {
            alert("Invalid Age");
            return;
        }
        if(phone.length === 10){
        }
        else{
            alert("Invalid Phone Number");
            return;
        }
        var intnumber = parseInt(phone)
        if(patternnum.test(phone))
        {
        }
        else{
            alert("Incorret Phone number pattern");
            return;
        }

        

        form.submit();

    })

    
</script>
</body>
</html>