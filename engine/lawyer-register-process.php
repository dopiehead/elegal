<?php
require("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lawyer_name = trim($_POST['lawyer_name']);
    $lawyer_email = trim($_POST['lawyer_email']);
    $lawyer_password = $_POST['lawyer_password'];
    $confirm_password = $_POST['confirm_password'];
    $telephone = trim($_POST['telephone']);
    $lawyer_img = $_FILES['lawyer_img']['name'] ?? ''; // Optional field for image
    $supreme_court_number = trim($_POST['supreme_court_number']);
    $lawyer_education = trim($_POST['lawyer_education']);
    $lawyer_dob = trim($_POST['lawyer_dob']);
    $lawyer_bio = trim($_POST['lawyer_bio']);
    $currently_engaged = trim($_POST['currently_engaged']);
    $current_position = trim($_POST['current_position']);
    $lawyer_firm = trim($_POST['lawyer_firm']);
    $lawyer_experience = trim($_POST['lawyer_experience']);
    $created_at = date("Y-m-d H:i:s"); // Only define once
    $lawyer_location = trim($_POST['lawyer_location']);
    $practice_location = trim($_POST['practice_location']);
    $practice_areas = trim($_POST['practice_areas']);
    $published_article = trim($_POST['published_article']);
    $lawyer_rating = $_POST['lawyer_rating'] ?? '0'; // Default to '0' if not set

    // Validation
    if (empty($lawyer_name) || empty($lawyer_email) || empty($lawyer_password) || empty($confirm_password) || empty($telephone) || empty($currently_engaged) || empty($current_position) || empty($lawyer_bio) || empty($supreme_court_number)) {
        echo "All fields are required.";
        exit;
    }

    if ($lawyer_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    if (!filter_var($lawyer_email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if (!preg_match('/^\d{11}$/', $telephone)) {
        echo "Invalid phone number. Please enter an 11-digit number.";
        exit;
    }

    if (strlen($lawyer_password) < 8 || !preg_match('/[A-Z]/', $lawyer_password) || !preg_match('/\d/', $lawyer_password)) {
        echo "Password must be at least 8 characters long, contain at least one uppercase letter, and one number.";
        exit;
    }

    $image_path = '';

    if (!empty($lawyer_img)) {
        $target_dir = "uploads/"; // Define the directory where images will be stored
        $target_file = $target_dir . basename($lawyer_img);
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate image type
        $valid_image_types = ['jpg', 'png', 'gif'];
        if (!in_array($image_file_type, $valid_image_types)) {
            echo "Only JPG, PNG, and GIF files are allowed for the profile image.";
            exit;
        }

        // Check if file already exists to prevent overwriting
        if (file_exists($target_file)) {
            echo "File already exists. Please upload a different image.";
            exit;
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['lawyer_img']['tmp_name'], $target_file)) {
            echo "Failed to upload the image.";
            exit;
        }

        $image_path = $target_file; // Store the image path for database insertion
    }

    // Hash the password before storing it in the database
    $hashed_password = password_hash($lawyer_password,  PASSWORD_BCRYPT);

    // Correct SQL query with matching column names and placeholders
    $sql = "INSERT INTO lawyer_profile (
        lawyer_email, 
        lawyer_password, 
        lawyer_name, 
        lawyer_img, 
        lawyer_firm, 
        lawyer_bio, 
        lawyer_education, 
        lawyer_dob, 
        lawyer_experience, 
        lawyer_rating, 
        lawyer_location, 
        current_position, 
        lawyer_phone_no, 
        practice_areas, 
        practice_location, 
        published_articles, 
        supreme_court_number, 
        currently_engaged, 
        created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Binding parameters to the SQL statement
        $stmt->bind_param("sssssssssssssssssss", 
            $lawyer_email, 
            $hashed_password, 
            $lawyer_name, 
            $image_path, 
            $lawyer_firm, 
            $lawyer_bio,
            $lawyer_education,
            $lawyer_dob,
            $lawyer_experience, 
            $lawyer_rating, 
            $lawyer_location, 
            $current_position, 
            $telephone, 
            $practice_areas, 
            $practice_location, 
            $published_article, 
            $supreme_court_number, 
            $currently_engaged, 
            $created_at
        );

        if ($stmt->execute()) {
            echo "Lawyer registered successfully.";
        } else {
            echo "Failed to register lawyer. Please try again. Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement. " . $conn->error;
    }

    $conn->close();
}
?>
