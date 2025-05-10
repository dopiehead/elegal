<?php

$con = mysqli_connect("localhost","states_in_nigeria","","states_in_nigeria");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>