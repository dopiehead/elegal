<?php 

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Include your database configuration
    require("../engine/config.php");

    // Prepare the SQL query using a prepared statement
    $stmt = $conn->prepare("UPDATE lawyer_profile SET status = 1 WHERE id = ?");
    
    if ($stmt === false) {
        die('MySQL prepare failed: ' . $conn->error);
    }

    // Bind the 'id' parameter to the prepared statement
    $stmt->bind_param("i", $id); // 'i' stands for integer (id is assumed to be an integer)

    // Execute the statement
    if ($stmt->execute()) {
        echo "1"; // Successfully updated
    } else {
        echo "0"; // Failed to update
    }

    // Close the statement
    $stmt->close();
}
?>
