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
    $payment_status = 0;
    $vkey=md5(time().$email);
    $verified = 0;

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
    $sql = "INSERT INTO user_profile (user_name, user_email, user_password, user_img, user_bio, user_phone, user_location, user_occupation, date_of_birth, created_at, payment_status, vkey, verified)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("sssssssssssss", $full_name, $email, $hashed_password, $image_path, $about_you, $phone_number, $user_location, $occupation, $date_of_birth, $created_at, $payment_status, $vkey, $verified);

        // Execute the query
        if ($stmt->execute()) {
            require '../PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'elegal.ng';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Username = 'info@elegal.ng';
            $mail->Password = "Qbr0uX3mwA";
            $mail->setFrom('info@elegal.ng', 'ElegalNG');
            $mail->addAddress($email);
            $mail->addReplyTo('info@elegal.ng');
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to ElegalNG';

            $mailContent = "
            <html>
            <head>
                 <meta name='color-scheme' content='light only'>
                 <meta name='supported-color-schemes' content='light only'>
                 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'>
            </head>
            <body style='font-family: Arial, sans-serif; padding: 10px;'>
                <div class='text-left'>
                     <img src='https://elegal.ng/assets/icons/logo.png' height='50' width='50' alt='ElegalNG Logo'>
                </div>
                <br><br>
                <div style='font-size: 15px;'>
                    <h6>Hello {$full_name},</h6>
                    <p>Thank you for signing up with ElegalNG! We're excited to have you on board.</p>
                    <p>To complete your registration and activate your account, please verify your email by clicking the link below:</p>
                    <p><a href='https://elegal.ng/engine/verify-user.php?vkey={$vkey}' style='background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;'>Verify Account</a></p>
                    <br>
                    <p>If you did not sign up for this account, please ignore this email.</p>
                    <p>Need help? Contact our support team at <a href='mailto:info@elegal.ng'>info@elegal.ng</a>.</p>
                    <p>Best regards,<br>The ElegalNG Team</p>
                </div>
            </body>
            </html>";

            $mail->Body = $mailContent;

            if (!$mail->send()) {
                  echo "Error in sending verification email: " . $mail->ErrorInfo;
            } else {
                echo "1";
            }
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