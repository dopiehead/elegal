<?php
// This code would be part of your user dashboard or profile page
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require("engine/config.php");

// Check if user is logged in
if (!isset($_SESSION['lawyer_id']) && !isset($_SESSION['firm_id'])) {
    header("Location: index.php");
    exit;
}

// Determine user type and get profile information
if (isset($_SESSION["lawyer_id"])) {
    $user_id = $_SESSION["lawyer_id"];
    $query = "SELECT id, lawyer_name FROM lawyer_profile WHERE id = ?";
    $user_type = "lawyer";
} else {
    $user_id = $_SESSION["firm_id"];
    $query = "SELECT id, firm_name FROM lawyer_firm WHERE id = ?";
    $user_type = "firm";
}

// Get the profile name
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Get the profile name based on user type
    $profile_name = ($user_type == "lawyer") ? $row['lawyer_name'] : $row['firm_name'];
    $profile_name = strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '', $profile_name));
    // Generate the subdomain URL
    $base_domain = "elegal.ng";
    $profile_url = "http://" . $profile_name . "." . $base_domain;
    
    // Display the profile URL to the user
    echo "<div class='alert alert-success'>
        <h4>Your Profile URL</h4>
        <p>Your custom profile URL is: <a href='{$profile_url}' target='_blank'>{$profile_url}</a></p>
        <p>Share this link with clients and colleagues!</p>
    </div>";
}

$stmt->close();
$conn->close();
?>