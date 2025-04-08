<?php
session_start();
include ("../engine/config.php");

if(isset($_SESSION['id'])){
$sql = "update user_profile set ". mysqli_escape_string($conn,$_POST["column"]). "='". mysqli_escape_string($conn, $_POST["value"]). "' where id=".  mysqli_escape_string($conn,$_POST["id"]);
}


if(isset($_SESSION['firm_id'])){
$sql = "update firm_profile set " . mysqli_escape_string($conn,$_POST["column"]). "='" . mysqli_escape_string($conn, $_POST["value"]) . "' where id=" .  mysqli_escape_string($conn,$_POST["id"]);
}


if(isset($_SESSION['lawyer_id'])){
$sql = "update lawyer_profile set " . mysqli_escape_string($conn,$_POST["column"]). "='" . mysqli_escape_string($conn, $_POST["value"]) . "' where id=" .  mysqli_escape_string($conn,$_POST["id"]);
}




if (mysqli_query($conn, $sql)){
    echo "true";
}
else{
    echo "false";
}
?>