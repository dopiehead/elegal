<?php
require("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Collect data from the form
    $firm_name = trim($_POST['firm_name']);
    $firm_email = trim($_POST['firm_email']);
    $firm_password = $_POST['firm_password'];
    $confirm_password = $_POST['confirm_password'];
    $firm_phone_number = trim($_POST['firm_phone_number']);
    $firm_bio = $_POST['firm_bio'];
    $date_found = $_POST['date_found'];
    $nooflawyers = trim($_POST['nooflawyers']);
    $firm_img = $_FILES['firm_img']['name'] ?? ''; // Optional field for image
    $firm_location = trim($_POST['firm_location']);
    $firm_rating = $_POST['firm_rating'] ?? 0; // Default to '0' if not set
    $verified = $_POST['verified'] ?? 0; // Default to '0' if not set
    $created_at = date("Y-m-d H:i:s"); // Only define once
    // Handle practice areas selection
    $practice_areas = isset($_POST['practice_areas']) ? $_POST['practice_areas'] : [];
    $selectedareas = implode(' , ', $practice_areas);

    // Handle certification and accreditation
    $certification_and_accreditation = isset($_POST['certification_accredit']) ? implode(" , ", $_POST['certification_accredit']) : '';

    // Validation
    if (empty($firm_name) || empty($firm_email) || empty($firm_password) || empty($confirm_password) || empty($firm_phone_number) || empty($date_found) || empty($nooflawyers) || empty($selectedareas) || empty($firm_bio)) {
        echo "All fields are required.";
        exit;
    }

    if ($firm_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    if (!filter_var($firm_email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if (!preg_match('/^\d{11}$/', $firm_phone_number)) {
        echo "Invalid phone number. Please enter an 11-digit number.";
        exit;
    }

    if (strlen($firm_password) < 8 || !preg_match('/[A-Z]/', $firm_password) || !preg_match('/\d/', $firm_password)) {
        echo "Password must be at least 8 characters long, contain at least one uppercase letter, and one number.";
        exit;
    }

    // For image upload
    $image_path = '';
    if (!empty($firm_img)) {
        $target_dir = "uploads/"; // Define the directory where images will be stored
        $target_file = $target_dir . basename($firm_img);
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
        if (!move_uploaded_file($_FILES['firm_img']['tmp_name'], $target_file)) {
            echo "Failed to upload the image.";
            exit;
        }

        $image_path = $target_file; // Store the image path for database insertion
    }

    // Hash the password before storing it in the database
    $hashed_password = password_hash($firm_password, PASSWORD_BCRYPT);

    // Correct SQL query with matching column names and placeholders
    $sql = "INSERT INTO lawyer_firm (
         firm_name, 
         firm_email, 
         firm_password, 
         firm_about, 
         certification_and_accreditation,
         date_found,
         nooflawyers,
         firm_phone_number, 
         firm_rating,
         location, 
         practice_areas,
         firm_img,
         date_created,
         verified
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ssssssssssssss", 
             $firm_name, 
             $firm_email, 
             $hashed_password, 
             $firm_bio, 
             $certification_and_accreditation, 
             $date_found, 
             $nooflawyers, 
             $firm_phone_number, 
             $firm_rating, 
             $firm_location, 
             $selectedareas, 
             $image_path, 
             $created_at, // Get current timestamp
             $verified
        );

        // Execute the query
        if ($stmt->execute()) {
            echo "1";
        } else {
            echo "Failed to register firm. Please try again. Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement. " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
