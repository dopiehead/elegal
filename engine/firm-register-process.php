<?php
require("config.php");
header('Content-Type: application/json');
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input data
    $inputData = json_decode(file_get_contents('php://input'), true);
    // Collect data from the JSON input
    $firm_name = trim($inputData['firm_name']);
    $firm_email = trim($inputData['firm_email']);
    $firm_password = $inputData['firm_password'];
    $confirm_password = $inputData['confirm_password'];
    $firm_phone_number = trim($inputData['firm_phone_number']);
    $firm_bio = $inputData['firm_bio'];
    $date_found = $inputData['date_found'];
    $nooflawyers = trim($inputData['nooflawyers']);
    $firm_img = $inputData['firm_img'] ?? ''; // Optional field for image
    $firm_location = trim($inputData['firm_location']);
    $firm_rating = $inputData['firm_rating'] ?? 0;
    $verified = $inputData['verified'] ?? 0;
    $payment_status = $inputData['payment_status'] ?? 0;
    $created_at = date("Y-m-d H:i:s");
    $vkey = md5(time() . $firm_email); // Generate a verification key
    // Handle practice areas selection
    $practice_areas = isset($inputData['practice_areas']) ? implode(',', $inputData['practice_areas']): " ";
    // Handle certification and accreditation
    $certification_and_accreditation = isset($inputData['certification_accredit']) ? implode(", ", $inputData['certification_accredit']) : '';
    // Validation
    if (empty($firm_name) || empty($firm_email) || empty($firm_password) || empty($confirm_password) || empty($firm_phone_number) || empty($date_found) || empty($nooflawyers) || empty($practice_areas) || empty($firm_bio)) {
        echo json_encode(["error" => "All fields are required."]);
        exit;
    }

    if ($firm_password !== $confirm_password) {
        echo json_encode(["error" => "Passwords do not match."]);
        exit;
    }

    if (!filter_var($firm_email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["error" => "Invalid email format."]);
        exit;
    }

    if (!preg_match('/^\d{11}$/', $firm_phone_number)) {
        echo json_encode(["error" => "Invalid phone number. Please enter an 11-digit number."]);
        exit;
    }

    if (strlen($firm_password) < 8 || !preg_match('/[A-Z]/', $firm_password) || !preg_match('/\d/', $firm_password)) {
        echo json_encode(["error" => "Password must be at least 8 characters long, contain at least one uppercase letter, and one number."]);
        exit;
    }

    // Image Upload
    $image_path = '';
    if (!empty($firm_img)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($firm_img);
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate image type
        $valid_image_types = ['jpg', 'png', 'gif'];
        if (!in_array($image_file_type, $valid_image_types)) {
            echo json_encode(["error" => "Only JPG, PNG, and GIF files are allowed for the profile image."]);
            exit;
        }

        if (file_exists($target_file)) {
            echo json_encode(["error" => "File already exists. Please upload a different image."]);
            exit;
        }

        if (!move_uploaded_file($firm_img, $target_file)) {
            echo json_encode(["error" => "Failed to upload the image."]);
            exit;
        }

        $image_path = $target_file;
    }

    // Hash the password
    $hashed_password = password_hash($firm_password, PASSWORD_BCRYPT);

    // Correct SQL query
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
        payment_status,
        verified,
        vkey
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "ssssssssssssssss",
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
            $practice_areas,
            $image_path,
            $created_at,
            $payment_status,
            $verified,
            $vkey
        );

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
            $mail->addAddress($firm_email);
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
                <div style='text-align: left;'>
                     <img src='https://elegal.ng/assets/icons/logo.png' height='50' width='50' alt='ElegalNG Logo'>
                </div>
                <br><br>
                <div style='font-size: 15px;'>
                    <h6>Hello {$firm_name},</h6>
                    <p>Thank you for signing up with ElegalNG! We're excited to have you on board.</p>
                    <p>To complete your registration and activate your account, please verify your email by clicking the link below:</p>
                    <p><a href='https://elegal.ng/engine/verify-firm.php?vkey={$vkey}' style='background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;'>Verify Account</a></p>
                    <br>
                    <p>If you did not sign up for this account, please ignore this email.</p>
                    <p>Need help? Contact our support team at <a href='mailto:info@elegal.ng'>info@elegal.ng</a>.</p>
                    <p>Best regards,<br>The ElegalNG Team</p>
                </div>
            </body>
            </html>";

            $mail->Body = $mailContent;

            if (!$mail->send()) {
                echo json_encode(["error" => "Error in sending verification email: " . $mail->ErrorInfo]);
            } else {
                echo json_encode(["success" => "1"]);
            }
        } else {
            echo json_encode(["error" => "Failed to register firm. Please try again. Error: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Error preparing the statement: " . $conn->error]);
    }

    $conn->close();
}
?>