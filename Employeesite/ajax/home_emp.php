<?php
 $conn = mysqli_connect("localhost","root","","workprogresstracker");
 session_start();

  if($conn->connect_error)
  {
   die($conn->connect_error);
  }

           $sqlpending= "select * from tasks where status='Pending' AND e_id =  {$_SESSION['id']}";
           $result_pending= mysqli_query($conn,$sqlpending);
           $rowpending = $result_pending->num_rows;

           $sql_going= "select * from tasks where status='On-going' AND e_id =  {$_SESSION['id']}";
           $result_going = mysqli_query($conn,$sql_going);
           $rowgoing = $result_going->num_rows;
          
           $sql_done= "select * from tasks where status='Completed' AND e_id =  {$_SESSION['id']}";
           $result_done = mysqli_query($conn,$sql_done);
           $rowdone = $result_done->num_rows;

           $response =[
            'pending'=>$rowpending,
            'ongoing'=>$rowgoing,
            'done'=>$rowdone
           ];
           echo json_encode($response);
       
 ?>