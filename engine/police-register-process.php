<?php

require("config.php"); // Assumes $conn is defined here

header('Content-Type: application/json');
$date = date("Y-m-d H:i:s");

// Enable error reporting for development (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Collect JSON POST data
$data = json_decode(file_get_contents("php://input"), true);

// Define required fields
$required_fields = [
    'police_name',
    'email',
    'rank_name',
    'next_of_kin',
    'relationship',
    'next_of_kin_telephone',
    'police_phone_number',
    'police_dob',
    'team',
    'location',
    'lga',
    'full_address',
    'password',
    'confirm_password'
];

// Validate required fields
foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        echo json_encode([
            "status" => "error",
            "message" => "Missing required field: " . ucfirst(str_replace('_', ' ', $field))
        ]);
        exit;
    }
}

// Validate password match
if ($data['password'] !== $data['confirm_password']) {
    echo json_encode(["status" => "error", "message" => "Passwords do not match"]);
    exit;
}

// Check if email already exists
$email_check_sql = "SELECT officer_id FROM police_officer WHERE email = ?";
$email_check_stmt = $conn->prepare($email_check_sql);
$email_check_stmt->bind_param("s", $data['email']);
$email_check_stmt->execute();
$email_check_stmt->store_result();

if ($email_check_stmt->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Email is already registered"]);
    $email_check_stmt->close();
    $conn->close();
    exit;
}
$email_check_stmt->close();

// Prepare data for insertion
$hashed_password = password_hash($data['password'], PASSWORD_BCRYPT);
$vkey = md5(time() . $data['email']);
$verified = 0;

// Insert into database
$sql = "INSERT INTO police_officer (
    police_name,
    email,
    rank_name,
    next_of_kin,
    relationship,
    next_of_kin_telephone,
    police_phone_number,
    police_dob,
    team,
    location,
    lga,
    full_address,
    password,
    vkey,
    verified,
    date
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "ssssssssssssssis",
        $data['police_name'],
        $data['email'],
        $data['rank_name'],
        $data['next_of_kin'],
        $data['relationship'],
        $data['next_of_kin_telephone'],
        $data['police_phone_number'],
        $data['police_dob'],
        $data['team'],
        $data['location'],
        $data['lga'],
        $data['full_address'],
        $hashed_password,
        $vkey,
        $verified,
        $date
    );

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Registration successful"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Preparation failed: " . $conn->error]);
}

$conn->close();

?>
