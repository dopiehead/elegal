<?php

// Start the session (if required for authentication or other session handling)
session_start();

// Include the database configuration file
include("../engine/config.php");

// Set the Content-Type header to application/json to indicate we're returning JSON
header('Content-Type: application/json');

// Initialize the response array
$response = array();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if form data is set and validate
    $errors = [];

    // Collect POST data
    $job_id = isset($_POST['job_id']) ? mysqli_real_escape_string($conn, $_POST['job_id']) : '';
    $first_name = isset($_POST['first_name']) ? mysqli_real_escape_string($conn, $_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? mysqli_real_escape_string($conn, $_POST['last_name']) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $phone_number = isset($_POST['phone_number']) ? mysqli_real_escape_string($conn, $_POST['phone_number']) : '';
    $location = isset($_POST['location']) ? mysqli_real_escape_string($conn, $_POST['location']) : '';
    $relocation = isset($_POST['relocation']) ? mysqli_real_escape_string($conn, $_POST['relocation']) : '0';
    $job_title = isset($_POST['job_title']) ? mysqli_real_escape_string($conn, $_POST['job_title']) : '';
    $company = isset($_POST['company']) ? mysqli_real_escape_string($conn, $_POST['company']) : '';
    $start_date = isset($_POST['start_date']) ? mysqli_real_escape_string($conn, $_POST['start_date']) : '';
    $end_date = isset($_POST['end_date']) ? mysqli_real_escape_string($conn, $_POST['end_date']) : '';
    $years_of_experience = isset($_POST['years_of_experience']) ? (int)$_POST['years_of_experience'] : 0;
    $highest_education = isset($_POST['highest_education']) ? mysqli_real_escape_string($conn, $_POST['highest_education']) : '';
    $cv_upload = isset($_FILES['cv_upload']) ? $_FILES['cv_upload']['name'] : '';
    $year_called_to_bar = isset($_POST['year_called_to_bar']) ? (int)$_POST['year_called_to_bar'] : 0;
    $cover_letter = isset($_POST['cover_letter']) ? mysqli_real_escape_string($conn, $_POST['cover_letter']) : '';
    $portfolio_link = isset($_POST['portfolio_link']) ? mysqli_real_escape_string($conn, $_POST['portfolio_link']) : '';
    $created_at = date("Y-m-d H:i:s"); // current timestamp

    // Error handling for required fields
    if (empty($first_name)) {
        $errors[] = "First name is required.";
    }

    if (empty($last_name)) {
        $errors[] = "Last name is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }

    if (empty($job_id)) {
        $errors[] = "Job ID is required.";
    }

    // If there are errors, return them
    if (!empty($errors)) {
        $response['status'] = 'error';
        $response['message'] = implode(" ", $errors);
        http_response_code(400); // Bad request
        echo json_encode($response);
        exit;
    }

    // Prepare the SQL Query for insertion
    $sql = "INSERT INTO applied_jobs (
         job_id, 
         first_name, 
         last_name, 
         email,
         phone_number,
         location,
         relocation,
         job_title,
         company,
         start_date, 
         end_date, 
         years_of_experience,
         highest_education, 
         cv_upload, 
         year_called_to_bar, 
         cover_letter, 
         portfolio_link, 
         created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $job_id, $first_name, $last_name, $email, $phone_number, $location, $relocation, $job_title, $company, $start_date, $end_date, $years_of_experience, $highest_education, $cv_upload, $year_called_to_bar, $cover_letter, $portfolio_link, $created_at);
        
        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            $response['status'] = 'success';
            $response['message'] = 'Job application submitted successfully.';
            http_response_code(201); // Created
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error executing query: ' . mysqli_error($conn);
            http_response_code(500); // Internal server error
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error preparing statement: ' . mysqli_error($conn);
        http_response_code(500); // Internal server error
    }

    // Close the database connection
    mysqli_close($conn);

} else {
    // If the request is not POST, return an error
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method. Please use POST.';
    http_response_code(405); // Method Not Allowed
    echo json_encode($response);
}

?>