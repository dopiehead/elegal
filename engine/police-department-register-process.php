<?php
header('Content-Type: application/json');
require_once 'config.php';

// Read and decode JSON input
$input = json_decode(file_get_contents('php://input'), true);

// Define required fields
$requiredFields = [
    'police_department',
    'department_email',
    'department_head',
    'immediate_reporting_officer',
    'department_phone_number',
    'zonal_head',
    'department_password',
    'confirm_password'
];

// Check for missing fields
foreach ($requiredFields as $field) {
    if (empty($input[$field])) {
        echo json_encode(['error' => "The field '" . str_replace('_', ' ', $field) . "' is required."]);
        exit;
    }
}

// Check password match
if ($input['department_password'] !== $input['confirm_password']) {
    echo json_encode(['error' => "Passwords do not match."]);
    exit;
}

// Sanitize input
$police_department = trim($input['police_department']);
$department_email = trim($input['department_email']);
$department_head = trim($input['department_head']);
$immediate_reporting_officer = trim($input['immediate_reporting_officer']);
$department_phone_number = trim($input['department_phone_number']);
$zonal_head = trim($input['zonal_head']);
$department_location = isset($input['department_location']) ? trim($input['department_location']) : null;
$hashed_password = password_hash($input['department_password'], PASSWORD_DEFAULT);
$vkey = md5(time() . $department_email);
$verified = 0;
$create_at = date("Y-m-d H:i:s");

// Check if email is already registered
$emailCheck = $conn->prepare("SELECT id FROM police_department WHERE department_email = ?");
$emailCheck->bind_param("s", $department_email);
$emailCheck->execute();
$emailCheck->store_result();

if ($emailCheck->num_rows > 0) {
    echo json_encode(['error' => "This department email is already registered."]);
    $emailCheck->close();
    $conn->close();
    exit;
}
$emailCheck->close();

// Insert new police department record
$sql = "INSERT INTO police_department (
    police_department,
    department_email,
    department_head,
    immediate_reporting_officer,
    department_phone_number,
    zonal_head,
    department_location,
    department_password,
    vkey,
    verified,
    create_at
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['error' => 'Database error: ' . $conn->error]);
    exit;
}

$stmt->bind_param(
    "sssssssssss",
    $police_department,
    $department_email,
    $department_head,
    $immediate_reporting_officer,
    $department_phone_number,
    $zonal_head,
    $department_location,
    $hashed_password,
    $vkey,
    $verified,
    $create_at
);

if ($stmt->execute()) {
    // Send verification email
    require '../PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'elegal.ng';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'info@elegal.ng';
    $mail->Password = 'Qbr0uX3mwA';
    $mail->setFrom('info@elegal.ng', 'ElegalNG');
    $mail->addAddress($department_email);
    $mail->addReplyTo('info@elegal.ng');
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to ElegalNG';

    $mailContent = "
    <html>
    <head>
        <meta name='color-scheme' content='light only'>
        <meta name='supported-color-schemes' content='light only'>
    </head>
    <body style='font-family: Arial, sans-serif; padding: 10px;'>
        <div>
            <img src='https://elegal.ng/assets/icons/logo.png' height='50' width='50' alt='ElegalNG Logo'>
        </div>
        <br>
        <div style='font-size: 15px;'>
            <h6>Hello {$police_department},</h6>
            <p>Thank you for signing up with ElegalNG! We're excited to have you on board.</p>
            <p>To complete your registration, please verify your email:</p>
            <p><a href='https://elegal.ng/engine/verify-user.php?vkey={$vkey}' style='background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;'>Verify Account</a></p>
            <p>If you did not sign up, please ignore this email.</p>
            <p>Contact support: <a href='mailto:info@elegal.ng'>info@elegal.ng</a></p>
            <p>Best regards,<br>The ElegalNG Team</p>
        </div>
    </body>
    </html>";

    $mail->Body = $mailContent;

    if ($mail->send()) {
        echo json_encode(['success' => true, 'message' => 'Registration successful. Verification email sent.']);
    } else {
        echo json_encode(['error' => 'Registration successful, but email failed: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['error' => 'Failed to register. Please try again later.']);
}

$stmt->close();
$conn->close();
?>
