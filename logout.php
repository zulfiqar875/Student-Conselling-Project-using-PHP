<?php
    session_start();
     unset($_SESSION['user']);
     $_SESSION['msg'] = "Logout Successfull.";
     header("Location:login.php");
?>