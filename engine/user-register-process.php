<?php
require("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate user input
    $full_name = trim($_POST['user_name']);
    $email = trim($_POST['user_email']);
    $password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = trim($_POST['phone_number']);
    $user_img = $_FILES['user_img']['name'] ?? ''; // Optional field for image
    $occupation = trim($_POST['user_occupation']);
    $date_of_birth = trim($_POST['date_of_birth']);
    $about_you = trim($_POST['user_bio']);
    $created_at = date("Y-m-d H:i:s");
    $user_location = trim($_POST['user_location']);
    $payment_status = trim($_POST['payment_status'])??'0';
    $verified = trim($_POST['verified'])??'0';

    // Validate required fields
    if (empty($full_name) || empty($email) || empty($password) || empty($confirm_password) || empty($phone_number) || empty($occupation) || empty($date_of_birth) || empty($about_you)) {
        echo "All fields are required.";
        exit;
    }

    // Password match validation
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Email format validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Phone number validation (example for 10-digit phone number)
    if (!preg_match('/^\d{11}$/', $phone_number)) {
        echo "Invalid phone number. Please enter a 11-digit number.";
        exit;
    }

    // Password strength validation (example: at least 8 characters, 1 uppercase, 1 number)
    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
        echo "Password must be at least 8 characters long, contain at least one uppercase letter, and one number.";
        exit;
    }

    // Handle image upload if an image is provided
    $image_path = '';
    if (!empty($user_img)) {
        $target_dir = "uploads/"; // Define the directory where images will be stored
        $target_file = $target_dir . basename($user_img);
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is a valid image type (e.g., jpg, png, gif)
        $valid_image_types = ['jpg', 'png', 'gif'];
        if (!in_array($image_file_type, $valid_image_types)) {
            echo "Only JPG, PNG, and GIF files are allowed for the profile image.";
            exit;
        }

        // Move the uploaded image to the target directory
        if (!move_uploaded_file($_FILES['user_img']['tmp_name'], $target_file)) {
            echo "Failed to upload the image.";
            exit;
        }

        $image_path = $target_file; // Store the image path in the database
    }

    // Hash the password for storage
    $hashed_password = password_hash($password,  PASSWORD_BCRYPT);

    // Prepare SQL query to insert the new user into the database
    $sql = "INSERT INTO user_profile (user_name, user_email, user_password, user_img, user_bio, user_phone, user_location, user_occupation, date_of_birth, created_at, payment_status, verified)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssssssssss", $full_name, $email, $hashed_password, $image_path, $about_you, $phone_number, $user_location, $occupation, $date_of_birth, $created_at, $payment_status, $verified);

        // Execute the query
        if ($stmt->execute()) {

              echo "User registered successfully.";
        } else {
              echo "Failed to register user. Please try again.";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing the statement.";
    }

    // Close the database connection
    $conn->close();
}
?>
