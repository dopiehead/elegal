<?php

require("config.php"); // Assumes $conn is defined here

header('Content-Type: application/json');
$date = date("Y-m-d H:i:s");

// Enable error reporting (for development only)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Collect POST data
$data = json_decode(file_get_contents("php://input"), true);

// Validate required fields
$required_fields = [
    'police_name', 'email', 'rank_name', 'next_of_kin',
    'relationship', 'next_of_kin_telephone', 'department_phone_number',
    'team', 'location', 'password', 'confirm_password'
];

foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        echo json_encode([
            "status" => "error",
            "message" => "Missing required field: " . ucfirst(preg_replace('/_/', ' ', $field))
        ]);
        exit;
    }
}

// Password match check
if ($data['password'] !== $data['confirm_password']) {
    echo json_encode(["status" => "error", "message" => "Passwords do not match"]);
    exit;
}

// ✅ Check if email already exists
$email_check_sql = "SELECT id FROM police_officer WHERE email = ?";
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

// Hash the password
$hashed_password = password_hash($data['password'], PASSWORD_BCRYPT);

// Generate verification key
$vkey = md5(time() . $data['police_name']);
$verified = 0;

// Prepare insert statement
$sql = "INSERT INTO police_officer (
    police_name, email, rank_name, next_of_kin, relationship,
    next_of_kin_telephone, department_phone_number, team, location, password, vkey, verified, date
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "sssssssssssis",
        $data['police_name'],
        $data['email'],
        $data['rank_name'],
        $data['next_of_kin'],
        $data['relationship'],
        $data['next_of_kin_telephone'],
        $data['department_phone_number'],
        $data['team'],
        $data['location'],
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
