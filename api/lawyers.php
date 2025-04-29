<?php
// Include database configuration file
require ("../engine/config.php");

// Set the Content-Type to JSON, as we're sending JSON responses
header('Content-Type: application/json');

// Initialize the response array
$response = array();

// SQL query to fetch all lawyer profiles
$condition = "SELECT * FROM lawyer_profile";

// Prepare the SQL statement
$stmt = $conn->prepare($condition);

// Execute the prepared statement
if ($stmt->execute()) {
    // Get the result of the query execution
    $result = $stmt->get_result();

    // Check if any record was found
    if ($result->num_rows > 0) {
        // Initialize an empty array to store lawyer profiles
        $lawyers = array();

        // Loop through the result set and fetch all records
        while ($row = $result->fetch_assoc()) {
            // Exclude sensitive data like password
            unset($row['lawyer_password']);

            // Store each lawyer profile data into the lawyers array
            $lawyers[] = array(
                'user_img' => $row['lawyer_img'],
                'created_at' => $row['created_at'],
                'lawyer_firm' => $row['lawyer_firm'],
                'lawyer_bio' => $row['lawyer_bio'],
                'lawyer_dob' => $row['lawyer_dob'],
                'lawyer_name' => $row['lawyer_name'],
                'lawyer_location' => $row['lawyer_location'],
                'lawyer_education' => $row['lawyer_education'],
                'supreme_court_number' => $row['supreme_court_number'],
                'currently_engaged' => $row['currently_engaged'],
                'current_position' => $row['current_position'],
                'practice_areas' => $row['practice_areas'],
                'published_articles' => $row['published_articles'],
                'practice_location' => $row['practice_location'],
                'lawyer_experience' => $row['lawyer_experience'],
                'lawyer_phone_no' => $row['lawyer_phone_no']
            );
        }

        // If records are found, respond with success and the lawyer profiles
        $response['status'] = 'success';
        $response['data'] = $lawyers;
        http_response_code(200); // Send HTTP response status code 200 for successful data retrieval
    } else {
        // If no data is found in the table
        $response['status'] = 'error';
        $response['message'] = 'No lawyers found in the database.';
        http_response_code(404); // Send HTTP response status code 404 for not found
    }
} else {
    // If the query execution fails
    $response['status'] = 'error';
    $response['message'] = 'Failed to execute query.';
    http_response_code(500); // Send HTTP response status code 500 for server error
}

// Close the prepared statement
$stmt->close();

// Return the response as JSON
echo json_encode($response);
?>