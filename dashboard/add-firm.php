<?php session_start();

// Check if lawyer_id exists in the session
$lawyer_id = isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id']) ? $_SESSION['lawyer_id'] : null;

if ($lawyer_id != null) {
    
    require ("../engine/config.php");

    // Check if 'id' is set and not empty
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        
        $firm_id = $_POST['id'];

        // Prepare the query to fetch the firm name based on firm_id
        $getFirmName = $conn->prepare("SELECT firm_id, firm_name FROM lawyer_firm WHERE firm_id = ?");
        
        $getFirmName->bind_param('i', $firm_id);

        if ($getFirmName->execute()) {
            
            $result = $getFirmName->get_result();

            // Check if a firm was found
            if ($row = $result->fetch_assoc()) {
                
                $firm_name = $row['firm_name'];

                // Now, update the lawyer_profile table with the firm name and firm id
                $stmt = $conn->prepare("UPDATE lawyer_profile SET lawyer_firm = ?, lawyer_firm_id = ? WHERE id = ?");
                
                $stmt->bind_param("sii", $firm_name, $firm_id, $lawyer_id);

                if ($stmt->execute()) {
                   
                    echo 1; 
                    // Success response
                } else {
                    echo "Update failed. Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Firm not found."; // Handle case where the firm doesn't exist
            }
        } else {
            echo "Failed to fetch firm. Error: " . $getFirmName->error; // Handle query failure
        }

        $getFirmName->close();
    } else {
        echo "Invalid ID provided.";  // Handle case when ID is not provided or empty
    }

    $conn->close();
} else {
    echo "Unauthorized access.";  // Handle case when the lawyer_id is not in the session
}
?>