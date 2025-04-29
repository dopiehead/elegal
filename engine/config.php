<?php

$conn = mysqli_connect("localhost","root","", "elegal");

if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}

?>