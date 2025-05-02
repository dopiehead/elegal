<?php

include("../engine/config.php");

// Optional: disable notices after development
// error_reporting(E_ALL ^ E_NOTICE);

$id     = isset($_POST['id']) ? trim($_POST['id']) : '';
$column = isset($_POST['column']) ? trim($_POST['column']) : '';
$value  = isset($_POST['value']) ? trim($_POST['value']) : '';

if (!empty($id) && !empty($column) && !empty($value)) {
    // Dynamically prepare column name and value for update
    $column = $conn->real_escape_string($column);  // Still escape column name (not directly used in prepared statements)
    
    // Build query using prepared statement
    $sql = "UPDATE clients_on_board SET `$column` = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameters for the prepared statement
        mysqli_stmt_bind_param($stmt, "si", $value, $id); // "s" for string, "i" for integer

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "true";
        } else {
            echo "false";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "false";
    }
}
?>
