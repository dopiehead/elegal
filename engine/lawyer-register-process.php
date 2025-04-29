<?php
require("config.php");

header("Content-Type: application/json");  // Set content type as JSON

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize and fetch data from POST
    $lawyer_name = trim($_POST['lawyer_name']);
    $lawyer_email = trim($_POST['lawyer_email']);
    $lawyer_password = $_POST['lawyer_password'];
    $confirm_password = $_POST['confirm_password'];
    $telephone = trim($_POST['telephone']);
    $lawyer_img = $_FILES['lawyer_img']['name'] ?? '';  // Optional profile image
    $supreme_court_number = trim($_POST['supreme_court_number']);
    $lawyer_education = trim($_POST['lawyer_education']);
    $lawyer_dob = trim($_POST['lawyer_dob']);
    $lawyer_bio = trim($_POST['lawyer_bio']);
    $currently_engaged = trim($_POST['currently_engaged']);
    $current_position = trim($_POST['current_position']);
    $lawyer_firm = trim($_POST['lawyer_firm']);
    $lawyer_experience = trim($_POST['lawyer_experience']);
    $created_at = date("Y-m-d H:i:s");
    $lawyer_location = trim($_POST['lawyer_location']);
    $practice_location = trim($_POST['practice_location']);
    $practice_areas = implode(" , ", $_POST['practice_areas']);  
    $published_article = trim($_POST['published_article']);
    $lawyer_rating = $_POST['lawyer_rating'] ?? '0';
    $status = $_POST['status'] ?? '0';
    $payment_status = $_POST['payment_status'] ?? '0';

    // Validation checks
    if (empty($lawyer_name) || empty($lawyer_email) || empty($lawyer_password) || empty($confirm_password) || empty($telephone) || empty($currently_engaged) || empty($current_position) || empty($lawyer_bio) || empty($supreme_court_number)) {
        echo json_encode(["error" => "All fields are required."]);
        exit;
    }

    if ($lawyer_password !== $confirm_password) {
        echo json_encode(["error" => "Passwords do not match."]);
        exit;
    }

    if (!filter_var($lawyer_email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["error" => "Invalid email format."]);
        exit;
    }

    if (!preg_match('/^\d{11}$/', $telephone)) {
        echo json_encode(["error" => "Invalid phone number. Please enter an 11-digit number."]);
        exit;
    }

    if (strlen($lawyer_password) < 8 || !preg_match('/[A-Z]/', $lawyer_password) || !preg_match('/\d/', $lawyer_password)) {
        echo json_encode(["error" => "Password must be at least 8 characters long, contain at least one uppercase letter, and one number."]);
        exit;
    }

    // Handle image upload
    $image_path = '';
    if (!empty($lawyer_img)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($lawyer_img);
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $valid_image_types = ['jpg', 'png', 'gif'];

        if (!in_array($image_file_type, $valid_image_types)) {
            echo json_encode(["error" => "Only JPG, PNG, and GIF files are allowed for the profile image."]);
            exit;
        }

        if (file_exists($target_file)) {
            echo json_encode(["error" => "File already exists. Please upload a different image."]);
            exit;
        }

        if (!move_uploaded_file($_FILES['lawyer_img']['tmp_name'], $target_file)) {
            echo json_encode(["error" => "Failed to upload the image."]);
            exit;
        }

        $image_path = $target_file;
    }

    // Hash the password
    $hashed_password = password_hash($lawyer_password, PASSWORD_BCRYPT);

    // Prepare SQL query
    $sql = "INSERT INTO lawyer_profile (
        lawyer_email, lawyer_password, lawyer_name, lawyer_img, lawyer_firm, lawyer_bio, 
        lawyer_education, lawyer_dob, lawyer_experience, lawyer_rating, lawyer_location, 
        current_position, lawyer_phone_no, practice_areas, practice_location, published_articles, 
        supreme_court_number, paymemt_status, status, currently_engaged, created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssssssssssssssss", 
            $lawyer_email, $hashed_password, $lawyer_name, $image_path, $lawyer_firm, $lawyer_bio,
            $lawyer_education, $lawyer_dob, $lawyer_experience, $lawyer_rating, $lawyer_location, 
            $current_position, $telephone, $practice_areas, $practice_location, $published_article, 
            $supreme_court_number, $payment_status, $status, $currently_engaged, $created_at
        );

        if ($stmt->execute()) {
            echo json_encode(["success" => "Lawyer successfully registered."]);
        } else {
            echo json_encode(["error" => "Failed to register lawyer. Please try again. Error: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Error preparing the statement. " . $conn->error]);
    }

    $conn->close();
}
?>