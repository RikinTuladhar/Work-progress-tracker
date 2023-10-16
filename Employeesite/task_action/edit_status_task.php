<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        #form_data {
            border-radius: 10%;
            width: auto;
            height: 400px;
            background-color: gray;
            padding: 40px;
        }

        .flex_row {
            display: flex;
            justify-content: space-around;
        }

        input[type="text"] {
            width: auto;
            height: 30px;
            margin: 10px;
        }

        select#status {
            margin-top: 20px;
            padding: 5px;
            border-radius: 15%;
        }

        button[type="submit"] {
            margin-top: 30px;
            padding: 10px;
            border-radius: 20%;
            margin-left: 163px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "workprogresstracker");
    if ($conn->connect_error) {
        die($conn->connect_error);
    }
    $sessionid = $_SESSION['id'];
    $task_id = $_GET['task_id'];
    $sql = "Select * from tasks where task_id  =$task_id";
    $result = mysqli_query($conn, $sql);
    ?>
    <div id="container">
        <div id="form_data">
            <form action="edit_submit.php" method="post" enctype="multipart/form-data">
                <?php
                $row = $result->fetch_assoc();

                if ($result->num_rows < 0) {
                    echo '';
                } else {
                    //taskid from url 
                ?>
                    <div class="flex_row">
                        <input type="hidden" name="task_id" value="<?php echo $task_id ?>">
                        <label for="Task_title">Task_title</label>
                        <label for="Task_description">Task_description</label>
                    </div>
                    <div class="flex_row">
                        <input type="text" name="task_title" value="<?php echo $row['task_title']; ?>" disabled>
                        <input type="text" name="task_description" value="<?php echo $row['task_description']; ?>" disabled>
                    </div>
                    <div class="flex_row">
                        <label for="Start_date">Start_date</label>
                        <label for="End_date">End_date</label>
                    </div>
                    <div class="flex_row">
                        <input type="text" name="start_date" value="<?php echo $row['start_date']; ?>" disabled>
                        <input type="text" name="end_date" value="<?php echo $row['end_date']; ?>" disabled>
                    </div>
                    <div>
                        <label for="">Status</label>
                        <select name="status" id="status">
                            <option value="Pending">Pending</option>
                            <option value="On-going">On-going</option>
                            <option value="Completed">Completed</option>
                        </select>
                        <!-- <input type="file" id="fileInput" name="xlsh" accept=".xlsx, .xls"> -->
                        <!-- <input type="file" id="fileInput" name="xlsh" accept="application/pdf> -->
                        <input type="file" name="pdfFile" id="pdfFile">
                    </div>
                    <button type="submit">submit</button>


                <?php

                }

                $conn->close();
                ?>
            </form>
        </div>
    </div>
    <script>
        var form = document.querySelector("form");
        //select select tag for change 
        var statusSelect = document.getElementById('status');
        var pdfFile = document.getElementById('pdfFile');
        // Add an event listener to detect changes in the select element
        pdfFile.disabled = true;
        statusSelect.addEventListener('change', function() {
            var selectedValue = statusSelect.value;

            // Enable or disable the file input based on the selected value
            if (selectedValue === 'Completed') {
                pdfFile.disabled = false;
            } else {
                fileInput.disabled = true;
            }
        });



        // Function to enable all disabled elements
        function enableDisabledElements() {
            // Select all elements with the disabled attribute within the form
            var disabledElements = form.querySelectorAll("[disabled]");

            // Iterate over the disabled elements and remove the disabled attribute
            disabledElements.forEach(function(element) {
                element.removeAttribute("disabled");
            });
        }
        // Add an event listener to the form submission
        form.addEventListener("submit", function(event) {
            enableDisabledElements();
        });
    </script>
</body>

</html>