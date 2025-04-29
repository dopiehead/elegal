<?php
// Include the database configuration file
require("../engine/config.php");

// Set the Content-Type header to JSON as we are returning JSON responses
header('Content-Type: application/json');

// Initialize the response array
$response = array();

// SQL query to select all records from the lawyer_firm table
$query = "SELECT * FROM lawyer_firm";

// Prepare the SQL query for execution
$stmt = mysqli_prepare($conn, $query);

// Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
    // Get the result set from the executed statement
    $result = mysqli_stmt_get_result($stmt);

    // Initialize an empty array to store all the firms
    $firms = array();

    // Loop through all the records in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Add each firm's data to the $firms array
        $firms[] = array(
            'date_created' => $row['date_created'],
            'firm_id' => $row['firm_id'],
            'date_found' => $row['date_found'],
            'firm_about' => $row['firm_about'],
            'firm_name' => $row['firm_name'],
            'location' => $row['location'],
            'firm_rating' => $row['firm_rating'],
            'firm_phone_number' => $row['firm_phone_number'],
            'firm_img' => $row['firm_img'],
            'certification_and_accreditation' => $row['certification_and_accreditation'],
            'practice_areas' => $row['practice_areas'],
            'nooflawyers' => $row['nooflawyers']
        );
    }

    // Check if any firms were found
    if (count($firms) > 0) {
        // If firms were found, set status to success and add the firms data
        $response['status'] = 'success';
        $response['data'] = $firms;
        // Set HTTP response code to 200 OK
        http_response_code(200);
    } else {
        // If no firms were found, return an error message
        $response['status'] = 'error';
        $response['message'] = 'No firms found.';
        // Set HTTP response code to 404 Not Found
        http_response_code(404);
    }
} else {
    // If the query execution fails, return an error message
    $response['status'] = 'error';
    $response['message'] = 'Failed to execute the query.';
    // Set HTTP response code to 500 Internal Server Error
    http_response_code(500);
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Output the response as JSON
echo json_encode($response);
?>