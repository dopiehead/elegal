<?php

require("config.php");

header("Content-Type: application/json");

// Accept only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["error" => "Only POST requests are allowed."]);
    exit;
}

// Fetch and sanitize input
$lawyer_name = trim($_POST['lawyer_name']);
$lawyer_email = trim($_POST['lawyer_email']);
$lawyer_password = $_POST['lawyer_password'];
$confirm_password = $_POST['confirm_password'];
$telephone = trim($_POST['telephone']);
$lawyer_img = $_FILES['lawyer_img']['name'] ?? '';
$supreme_court_number = trim($_POST['supreme_court_number']);
$lawyer_education = trim($_POST['lawyer_education']);
$lawyer_qualification = trim($_POST['lawyer_qualification'] ?? '');
$lawyer_dob = trim($_POST['lawyer_dob']);
$lawyer_bio = trim($_POST['lawyer_bio']);
$currently_engaged = trim($_POST['currently_engaged']);
$current_position = trim($_POST['current_position']);
$lawyer_firm = trim($_POST['lawyer_firm']);
$lawyer_firm_id = $_POST['lawyer_firm_id'] ?? null;
$lawyer_experience = trim($_POST['lawyer_experience']);
$lawyer_location = trim($_POST['lawyer_location']);
$practice_location = trim($_POST['practice_location']);
$practice_areas = implode(", ", $_POST['practice_areas']);
$published_article = trim($_POST['published_article']);
$lawyer_rating = intval($_POST['lawyer_rating'] ?? 0);
$status = intval($_POST['status'] ?? 0);
$payment_status = intval($_POST['payment_status'] ?? 0);
$employment_status = trim($_POST['employment_status'] ?? '');
$lawyer_role = trim($_POST['lawyer_role'] ?? '');
$cases = intval($_POST['cases'] ?? 0);
$cases_won = intval($_POST['cases_won'] ?? 0);
$cases_lost = intval($_POST['cases_lost'] ?? 0);
$verified = intval($_POST['verified'] ?? 0);
$created_at = date("Y-m-d H:i:s");

// Validation
if (
    empty($lawyer_name) || empty($lawyer_email) || empty($lawyer_password) ||
    empty($confirm_password) || empty($telephone) || empty($currently_engaged) ||
    empty($current_position) || empty($lawyer_bio) || empty($supreme_court_number)
) {
    echo json_encode(["error" => "Required fields are missing."]);
    exit;
}

if (!filter_var($lawyer_email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["error" => "Invalid email format."]);
    exit;
}

if ($lawyer_password !== $confirm_password) {
    echo json_encode(["error" => "Passwords do not match."]);
    exit;
}

if (!preg_match('/^\d{11}$/', $telephone)) {
    echo json_encode(["error" => "Invalid phone number. Must be 11 digits."]);
    exit;
}

if (strlen($lawyer_password) < 8 || !preg_match('/[A-Z]/', $lawyer_password) || !preg_match('/\d/', $lawyer_password)) {
    echo json_encode(["error" => "Password must be at least 8 characters, include 1 uppercase and 1 number."]);
    exit;
}

// Image Upload
$image_path = '';
if (!empty($lawyer_img)) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($lawyer_img);
    $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($image_type, $allowed_types)) {
        echo json_encode(["error" => "Invalid image format. Allowed: JPG, PNG, GIF."]);
        exit;
    }

    if (file_exists($target_file)) {
        echo json_encode(["error" => "Image already exists. Please rename your file."]);
        exit;
    }

    if (!move_uploaded_file($_FILES['lawyer_img']['tmp_name'], $target_file)) {
        echo json_encode(["error" => "Failed to upload image."]);
        exit;
    }

    $image_path = $target_file;
}

// Hash password
$hashed_password = password_hash($lawyer_password, PASSWORD_BCRYPT);

// SQL
$sql = "INSERT INTO lawyer_profile (
    lawyer_email, lawyer_password, lawyer_name, lawyer_img, lawyer_firm_id, lawyer_firm,
    lawyer_bio, lawyer_education, lawyer_qualification, cases, cases_won, cases_lost,
    lawyer_dob, lawyer_experience, lawyer_rating, lawyer_location, current_position,
    lawyer_phone_no, practice_areas, practice_location, published_articles,
    supreme_court_number, lawyer_role, employment_status, paymemt_status, status,
    currently_engaged, created_at, verified
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param(
        "ssssssssiiiisssssssssssssssii",
        $lawyer_email, $hashed_password, $lawyer_name, $image_path, $lawyer_firm_id, $lawyer_firm,
        $lawyer_bio, $lawyer_education, $lawyer_qualification, $cases, $cases_won, $cases_lost,
        $lawyer_dob, $lawyer_experience, $lawyer_rating, $lawyer_location, $current_position,
        $telephone, $practice_areas, $practice_location, $published_article,
        $supreme_court_number, $lawyer_role, $employment_status, $payment_status, $status,
        $currently_engaged, $created_at, $verified
    );

    if ($stmt->execute()) {
        require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

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
                    <h6>Hello {$lawyer_name},</h6>
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

                echo json_encode(["success" => "Lawyer registered successfully."]);
            }
     
    } else {
        echo json_encode(["error" => "Failed to insert: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Statement error: " . $conn->error]);
}

$conn->close();
