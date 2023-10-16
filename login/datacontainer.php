<!-- All the display contents but is called at displaydata.php using oop -->

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

    a:active {
        /* CSS styles for when the link is being clicked */
        color: red;
        /* Add any other styles you want to apply during the click */
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
</style>
<?php
// require "selectDatabase.php";
require "../database/crud.php";
class datacontainer extends crud
{



    public function showAllUsersOfLogin()
    {
        $datas = $this->getUsers("login");
?>
        <a href="login.html" id="addcontact">Add Contact</a>
        <div id="container">


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
            $idnum = 1;
            if ($datas > 0) {
                foreach ($datas as $data) {
                    echo "<tr>
            <td> $idnum</td>
            <td>" . $data["username"] . "</td>
            <td>"  . $data["email"] . "</td>
            
                <td> <a href='delete_login.php?id=" . $data["id"] . "'>Delete</a></td>
                <td><a id='mylink' onclick='disable()' href='approve_employee_toDb.php?email=" . $data["email"] . "'>Approve</a></td></tr>";
                    $idnum++;
                }
            } else {
                $message = "No Data Found";
                echo "<div style='color:red;margin: 20px'>$message</div>";
            }
        }
    }
            ?>
                </table>
            </div>
        </div>