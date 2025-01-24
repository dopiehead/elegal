<?php

session_start();

include ("../engine/config.php");

if(isset($_SESSION['id'])){
    
     $sql = "UPDATE user_profile SET ". mysqli_escape_string($conn,$_POST["column"]). "='". mysqli_escape_string($conn, $_POST["value"]). "' WHERE id=".  mysqli_escape_string($conn,$_POST["id"]);
}


if(isset($_SESSION['firm_id'])){
     $sql = "UPDATE lawyer_firm SET " . mysqli_escape_string($conn,$_POST["column"]). "='" . mysqli_escape_string($conn, $_POST["value"]) . "' WHERE firm_id=" .  mysqli_escape_string($conn,$_POST["id"]);
}


if(isset($_SESSION['lawyer_id'])){
     $sql = "UPDATE  lawyer_profile SET " . mysqli_escape_string($conn,$_POST["column"]). "='" . mysqli_escape_string($conn, $_POST["value"]) . "' WHERE id=" .  mysqli_escape_string($conn,$_POST["id"]);
}


if (mysqli_query($conn, $sql)){
    echo "true";
}

else{
    echo "false";
    echo mysqli_error($conn);
}
?>