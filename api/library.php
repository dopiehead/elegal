<?php

// Include the database configuration file
require ("../engine/config.php");

// Set the Content-Type header to JSON because the response will be in JSON format
header('Content-Type: application/json');

// Initialize the response array, which will hold the data and status
$response = array();

// SQL query to fetch all law books from the database
$query = "SELECT * FROM law_books";

// Prepare the SQL statement
$stmt = $conn->prepare($query);

// Execute the prepared statement
if ($stmt->execute()) {
    // Get the result of the query
    $result = $stmt->get_result();

    // Initialize an array to hold the books data
    $books = array();

    // Fetch each book from the result set and add it to the $books array
    while ($book = $result->fetch_assoc()) {
        // For each book, collect the necessary details
        $books[] = array(
            'book_img' => $book['book_img'],         // The image of the book
            'book_id' => $book['id'],                // The unique ID of the book
            'book_name' => $book['book_name'],       // The name/title of the book
            'created_at' => $book['created_at'],     // The date the book was added
            'book_details' => $book['book_details'], // Details about the book
            'book_price' => $book['book_price'],     // Price of the book
            'author_id' => $book['author_id']        // The ID of the author of the book
        );
    }

    // If books are found, return the data with a success status
    if (count($books) > 0) {
        $response['status'] = 'success';
        $response['data'] = $books; // Add the books data to the response
        http_response_code(200); // Send a 200 OK HTTP status code
    } else {
        // If no books are found, return an appropriate error message
        $response['status'] = 'error';
        $response['message'] = 'No books found.';
        http_response_code(404); // Send a 404 Not Found HTTP status code
    }
} else {
    // If the query fails to execute, return an error response
    $response['status'] = 'error';
    $response['message'] = 'Failed to execute the query.';
    http_response_code(500); // Send a 500 Internal Server Error HTTP status code
}

// Close the prepared statement to free up resources
$stmt->close();

// Return the response as a JSON object
echo json_encode($response);

?>