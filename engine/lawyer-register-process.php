<?php
header('Content-Type: application/json');
require("config.php");
require("../vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
    exit;
}

if (!isset($_SERVER['CONTENT_TYPE']) || stripos($_SERVER['CONTENT_TYPE'], 'application/json') === false) {
    http_response_code(400);
    echo json_encode(["error" => "Content-Type must be application/json"]);
    exit;
}

$raw_input = file_get_contents('php://input');
file_put_contents('debug_log.txt', "Raw Input: " . $raw_input . "\n", FILE_APPEND);

$inputData = json_decode($raw_input, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    $json_error_msg = json_last_error_msg();
    file_put_contents('debug_log.txt', "JSON Error: " . $json_error_msg . "\n", FILE_APPEND);
    http_response_code(400);
    echo json_encode(["error" => "Invalid JSON input: " . $json_error_msg]);
    exit;
}

// Extract & sanitize input
$lawyer_email = trim($inputData['lawyer_email'] ?? '');
$lawyer_password = $inputData['lawyer_password'] ?? '';
$confirm_password = $inputData['confirm_password'] ?? '';
$lawyer_name = trim($inputData['lawyer_name'] ?? '');
$lawyer_img = ''; // default blank
$lawyer_firm_id = trim($inputData['lawyer_firm_id'] ?? '');
$lawyer_firm = trim($inputData['lawyer_firm'] ?? '');
$lawyer_bio = trim($inputData['lawyer_bio'] ?? '');
$lawyer_education = trim($inputData['lawyer_education'] ?? '');
$lawyer_qualification = trim($inputData['lawyer_qualification'] ?? '');
$cases = 0;
$cases_won = 0;
$cases_lost = 0;
$lawyer_dob = trim($inputData['lawyer_dob'] ?? '');
$lawyer_experience = trim($inputData['lawyer_experience'] ?? '');
$lawyer_rating = 0;
$lawyer_location = trim($inputData['lawyer_location'] ?? '');
$current_position = trim($inputData['current_position'] ?? '');
$lawyer_phone_no = trim($inputData['lawyer_phone_no'] ?? '');
$practice_areas = isset($inputData['practice_areas']) && is_array($inputData['practice_areas']) ? implode(',', array_map('trim', $inputData['practice_areas'])) : '';
$practice_location = trim($inputData['practice_location'] ?? '');
$published_articles = trim($inputData['published_article'] ?? '');
$supreme_court_number = trim($inputData['supreme_court_number'] ?? '');
$lawyer_role = 'lawyer';
$employment_status = 'active';
$payment_status = 0;
$status = 0;
$currently_engaged = trim($inputData['currently_engaged'] ?? '');
$created_at = date("Y-m-d H:i:s");
$vkey = $lawyer_email ? md5(time() . $lawyer_email) : '';
$verified = 0;

// Validations
if ($lawyer_password && $lawyer_password !== $confirm_password) {
    http_response_code(400);
    echo json_encode(["error" => "Passwords do not match"]);
    exit;
}

if ($lawyer_email && !filter_var($lawyer_email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid email format"]);
    exit;
}

if ($lawyer_phone_no && !preg_match('/^\d{11}$/', $lawyer_phone_no)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid phone number. Please enter an 11-digit number"]);
    exit;
}

if ($lawyer_password && (strlen($lawyer_password) < 8 || !preg_match('/[A-Z]/', $lawyer_password) || !preg_match('/\d/', $lawyer_password))) {
    http_response_code(400);
    echo json_encode(["error" => "Password must be at least 8 characters long, contain at least one uppercase letter, and one number"]);
    exit;
}

if ($lawyer_dob && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $lawyer_dob)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid date of birth format. Use YYYY-MM-DD"]);
    exit;
}

// Check if email exists
if ($lawyer_email) {
    $sql = "SELECT lawyer_email FROM lawyer_profile WHERE lawyer_email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $lawyer_email);
        $stmt->execute();
        if ($stmt->fetch()) {
            $stmt->close();
            http_response_code(400);
            echo json_encode(["error" => "Email already registered"]);
            exit;
        }
        $stmt->close();
    }
}

// Hash password
$hashed_password = $lawyer_password ? password_hash($lawyer_password, PASSWORD_BCRYPT) : '';

// Insert into DB
$sql = "INSERT INTO lawyer_profile (
    lawyer_email, lawyer_password, lawyer_name, lawyer_img, lawyer_firm_id, lawyer_firm,
    lawyer_bio, lawyer_education, lawyer_qualification, cases, cases_won, cases_lost,
    lawyer_dob, lawyer_experience, lawyer_rating, lawyer_location, current_position,
    lawyer_phone_no, practice_areas, practice_location, published_articles,
    supreme_court_number, lawyer_role, employment_status, payment_status, status,
    currently_engaged, created_at, vkey, verified
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "ssssssssiiiiisissssssssssssssi",
        $lawyer_email,
        $hashed_password,
        $lawyer_name,
        $lawyer_img,
        $lawyer_firm_id,
        $lawyer_firm,
        $lawyer_bio,
        $lawyer_education,
        $lawyer_qualification,
        $cases,
        $cases_won,
        $cases_lost,
        $lawyer_dob,
        $lawyer_experience,
        $lawyer_rating,
        $lawyer_location,
        $current_position,
        $lawyer_phone_no,
        $practice_areas,
        $practice_location,
        $published_articles,
        $supreme_court_number,
        $lawyer_role,
        $employment_status,
        $payment_status,
        $status,
        $currently_engaged,
        $created_at,
        $vkey,
        $verified
    );

    if ($stmt->execute()) {
        // Send Email
        if ($lawyer_email) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = getenv('SMTP_HOST') ?: 'elegal.ng';
                $mail->Port = getenv('SMTP_PORT') ?: 465;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Username = getenv('SMTP_USERNAME') ?: 'info@elegal.ng';
                $mail->Password = getenv('SMTP_PASSWORD') ?: 'Qbr0uX3mwA';
                $mail->setFrom('info@elegal.ng', 'ElegalNG');
                $mail->addAddress($lawyer_email);
                $mail->isHTML(true);
                $mail->Subject = 'Welcome to ElegalNG';

                $mailContent = "
                <html><body>
                    
                    <h6>Hello " . htmlspecialchars($lawyer_name) . ",</h6>
                    <p>Thank you for signing up with ElegalNG.</p>
                    <p>Please verify your account:</p>
                    <a href='https://elegal.ng/engine/verify-lawyer.php?vkey={$vkey}'>Verify Account</a>
                    <p>If you did not register, ignore this email.</p>
                </body></html>";

                $mail->Body = $mailContent;

                if ($mail->send()) {
                    http_response_code(201);
                    echo json_encode(["success" => "1", "message" => "Registration successful. Please verify your email."]);
                } else {
                    http_response_code(201);
                    echo json_encode(["success" => "1", "message" => "Registration successful, but failed to send verification email."]);
                }
            } catch (Exception $e) {
                http_response_code(201);
                echo json_encode(["success" => "1", "message" => "Registration successful, but failed to send verification email."]);
            }
        } else {
            http_response_code(201);
            echo json_encode(["success" => "1", "message" => "Registration successful."]);
        }
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to register lawyer: " . $stmt->error]);
    }
    $stmt->close();
} else {
    http_response_code(500);
    echo json_encode(["error" => "Database error: " . $conn->error]);
}

$conn->close();
?>