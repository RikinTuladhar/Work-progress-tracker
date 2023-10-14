<?php
session_start();
if(isset($_GET['unset']) && $_GET['unset']==='true')
{
    unset( $_SESSION['username']);
    unset($_SESSION['id']);
    header('Location: http://localhost/work-progress-tracker/Work-progress-tracker/login/login.html');
    exit();
}
?>