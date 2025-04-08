<?php
session_start();
include("../engine/config.php");

if (isset($_SESSION['id'])) {
    // Check if the column is 'password' and hash the password
    if ($_POST["column"] == 'user_password') {
        $user_password = $_POST["value"];
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT); // Hash the password
        $value = $hashed_password;
    } else {
        $value = $_POST["value"];
    }

    // Prepare the query for updating user_profile
    $sql = "UPDATE user_profile SET " . mysqli_escape_string($conn, $_POST["column"]) . " = ? WHERE id = ?";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameters (s = string, i = integer)
        mysqli_stmt_bind_param($stmt, 'si', $value, $_POST["id"]);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "true";
        } else {
            echo "false";
            echo mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_SESSION['lawyer_id'])) {
    // Check if the column is 'password' and hash the password
    if ($_POST["column"] == 'lawyer_password') {
        $user_password = $_POST["value"];
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT); // Hash the password
        $value = $hashed_password;
    } else {
        $value = $_POST["value"];
    }

    // Prepare the query for updating lawyer_profile
    $sql = "UPDATE lawyer_profile SET " . mysqli_escape_string($conn, $_POST["column"]) . " = ? WHERE id = ?";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameters (s = string, i = integer)
        mysqli_stmt_bind_param($stmt, 'si', $value, $_POST["id"]);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "true";
        } else {
            echo "false";
            echo mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
