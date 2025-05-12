<?php
header('Content-Type: application/json');

// Include DB connection
require_once 'config.php';

// Read and decode JSON
$input = json_decode(file_get_contents('php://input'), true);

// Required fields
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

foreach ($requiredFields as $field) {
    if (empty($input[$field])) {
        echo json_encode(['error' => "The field '".preg_replace('/_/',' ',$field)."' is required."]);
        exit;
    }
}

// Password match check
if ($input['department_password'] !== $input['confirm_password']) {
    echo json_encode(['error' => "Passwords do not match."]);
    exit;
}

// Sanitize
$police_department = trim($input['police_department']);
$department_email = trim($input['department_email']);
$department_head = trim($input['department_head']);
$immediate_reporting_officer = trim($input['immediate_reporting_officer']);
$department_phone_number = trim($input['department_phone_number']);
$zonal_head = trim($input['zonal_head']);
$department_location = isset($input['department_location']) ? trim($input['department_location']) : null;
$hashed_password = password_hash($input['department_password'], PASSWORD_DEFAULT);

// ✅ Check for existing email
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

// ✅ Insert new record
$sql = "INSERT INTO police_department (
    police_department,
    department_email,
    department_head,
    immediate_reporting_officer,
    department_phone_number,
    zonal_head,
    department_location,
    department_password
) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['error' => 'Database error: ' . $conn->error]);
    exit;
}

$stmt->bind_param(
    "ssssssss",
    $police_department,
    $department_email,
    $department_head,
    $immediate_reporting_officer,
    $department_phone_number,
    $zonal_head,
    $department_location,
    $hashed_password
);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Registration successful.']);
} else {
    echo json_encode(['error' => 'Failed to register. Please try again later.']);
}

$stmt->close();
$conn->close();
?>
