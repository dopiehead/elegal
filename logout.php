<?php session_start();
     session_start();
     session_unset();
     session_destroy();
     header("Location: ../elegal/login.php");
     exit();
?>