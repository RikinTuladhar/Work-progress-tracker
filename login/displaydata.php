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
  </head>
  <body>
    <?php
    // $testobj = new selectDatabase();
    // $testobj->getUsers();
   
    
    // if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    //   header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    //   die ("<h2>Access Denied!</h2> This file is protected and not available to public.");
    //   }
    $testobj = new datacontainer();
     $testobj->showAllUsersOfLogin();

    // $testobj->getUsersStmt("rikin"); ?>
  </body>
</html>
