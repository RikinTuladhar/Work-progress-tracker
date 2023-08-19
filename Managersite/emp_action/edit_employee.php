<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;

        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10%;
            margin-left: auto;
            margin-right: auto;


        }

        form {
            background-color: #9f84b4;
            padding: 30px;
            border-radius: 10%;
        }

        input[type="text"],input[type ="password"] {
            padding: 5px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <?php

    $con = mysqli_connect("localhost", "root", "", "workprogresstracker");
    if ($con->connect_error) {
        die($con->connect_error);
    }
    $id = $_GET['eid'];
    if (empty($id)) {
        header('location:http://localhost/work-progress-tracker/Work-progress-tracker/Managersite/employee_homepage.php');
    }
    // var_dump($id);

    $sql = "SELECT * FROM employee where eid=" . $id;
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    ?>
    <div class="container">
        <form action="edit_employee_details_change.php" method="POST">
            <table>
                <h2>Edit Employee Details</h2>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $row['eid']; ?>">
                    <td><b>Name</b></td>
                    <td><input type="text" id="Name" name="Name" value="<?php echo $row['emp_name'] ?>"></td>

                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td><input type="text" name="Email" id="Email" value="<?php echo $row['emp_email'] ?>"></td>
                </tr>
                <tr>

                    <td><b>Last Name</b></td>
                    <td><input type="text" name="Lastname" value="<?php echo $row['emp_lastname'] ?>"></td>
                </tr>
                <tr>

                    <td><b>Phone</b></td>
                    <td><input type="text" name="Phone" id="Phone" value="<?php echo $row['emp_phone'] ?>"></td>
                </tr>
                <tr>

                    <td><b>Password</b></td>
                    <td><input type="password" name="password" disabled value="<?php echo $row['e_pw'] ?>"></td>
                </tr>
            </table>
            <button type="submit" value="submit"> Submit</button>
        </form>
    </div>
    <script>
    var form = document.querySelector("form");

    // Function to enable all disabled elements
    function enableDisabledElements() {
        // Select all elements with the disabled attribute within the form
        var disabledElements = form.querySelectorAll("[disabled]");

        // Iterate over the disabled elements and remove the disabled attribute
        disabledElements.forEach(function(element) {
            element.removeAttribute("disabled");
        });
    }

    //validate 
    function validate(event){
        event.preventDefault();
        var Name = document.getElementById("Name").value;
        var Email = document.getElementById("Email").value;
        var Phone = document.getElementById("Phone").value;
        var regx_email = /^[a-zA-Z0-9.-_]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
        var regx_phone = /^[0-9]{10}$/;
        if(Name === ""){
            alert("Name Must Be Placed");
            return false;

        }
        else if(Email ==="")
        {
            alert("Email Cannot Be null");
            return false;
        }
        else if(Phone ==="")
        {
            alert("Phone Cannot Be Null");
            return false;
        }
        else if(!regx_email.test(Email))
        {
            alert("Invalid Email Format");
            return false;
        } 
        else if(!regx_phone.test(Phone))
        {
            alert("Invalid Phone Format");
            return false;
        }

        enableDisabledElements();
        form.submit();
    }

    // Add an event listener to the form submission
    form.addEventListener("submit", validate);

</script>


</body>

</html>
<?php $con->close() ?>