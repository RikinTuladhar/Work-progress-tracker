<!-- called datacontainer.php datas using oop where there is table ui with data from database used by manager for delete edit  -->

<?php
require "datacontainer.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    * {
      background-color: #d9d9d9;
    }

    #addcontact {
      width: 82px;
      border: 2px;
      text-decoration: none;
      border: 2px solid black;
      margin: 2px auto;
      position: absolute;
      padding: 5px;
    }

    table {
      margin: 20px;
      background: #AA9FB6;
      border-radius: 10%;
      padding: 2%;
      margin-left: 5%;
    }

    .myClass {
      color: gray;

    }


    .container-table {
      margin: 20px;

      border-radius: 10%;
      padding: 2%;
      display: flex;
      /* margin-left: 5%; */
      justify-content: center;
      align-items: center;
    }

    tr>td>a {
      text-decoration: none;
      color: black;
    }
  </style>
</head>

<body><?php
      // $testobj = new datacontainer();
      // $testobj->showAllUsersOfLogin();
      // $testobj->getUsersStmt("rikin");
      ?>
  <a href="login.html" id="addcontact" style="color: Black;">Add Contact</a>
  <div class="container-table">

    <table border="1" cellspacing="10px" cellpadding="20px">
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <!-- <th>Edit</th> -->
        <th>Delete</th>
        <th>Approve</th>
      </tr>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "workprogresstracker") or die("Connection error");
      $sql = "SELECT * FROM login";
      $idnum = 1;
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $idnum; ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td> <a onclick="return confirm('Delete?')" href="delete_login.php?id=<?php echo $row['id'] ?>">Delete</a></td>
            <td> <a onclick="return confirm('Approve?')" href="approve_employee_toDb.php?email=<?php echo $row['email'] ?>">Approve</a></td>
            <?php $idnum++; ?>
          </tr>
        <?php
        }
      } else {
        ?>
        <span style="color:red">No records</span>
      <?php
      }
      ?>
    </table>
</body>

</html>