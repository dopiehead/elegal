<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('../engine/config.php');

function validateFields(array $fields, array $numericFields = []): array {
    $errors = [];

    foreach ($fields as $key => $value) {
        if (empty($value)) {
            $label = ucwords(str_replace('_', ' ', $key));
            $errors[] = "$label is required.";
        }
    }

    foreach ($numericFields as $key => $value) {
        if (!is_numeric($value)) {
            $label = ucwords(str_replace('_', ' ', $key));
            $errors[] = "$label must be a numeric value.";
        }
    }

    return $errors;
}

// === SANITIZE AND COLLECT INPUT ===
$client_name      = trim($_POST['client_name'] ?? '');
$client_address   = trim($_POST['client_address'] ?? '');
$email            = trim($_POST['email'] ?? '');
$next_of_kin      = trim($_POST['next_of_kin'] ?? '');
$relationship     = trim($_POST['relationship'] ?? '');
$spouse           = trim($_POST['spouse'] ?? '');
$phone_number     = trim($_POST['phone_number'] ?? '');
$work_place       = trim($_POST['work_place'] ?? '');
$occupation       = trim($_POST['occupation'] ?? '');
$lawyer           = trim($_POST['lawyer'] ?? '');
$case_title       = trim($_POST['case_title'] ?? '');
$case_status      = trim($_POST['case_status'] ?? '');
$paid             = trim($_POST['paid'] ?? 0);
$unpaid           = trim($_POST['unpaid'] ?? 0);
$date_created     = trim($_POST['date_created'] ?? date("Y-m-d"));

// === VALIDATION ===
$fields = [
    'client_name'    => $client_name,
    'client_address' => $client_address,
    'email'          => $email,
    'next_of_kin'    => $next_of_kin,
    'relationship'   => $relationship,
    'spouse'         => $spouse,
    'phone_number'   => $phone_number,
    'work_place'     => $work_place,
    'occupation'     => $occupation,
    'lawyer'         => $lawyer,
    'case_title'     => $case_title,
    'case_status'    => $case_status,
    'date_created'   => $date_created,
];

$numericFields = [
    'paid'   => $paid,
    'unpaid' => $unpaid,
];

$errors = validateFields($fields, $numericFields);

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo trim($error). "\n\n";
    }

    exit;
}

// === FILE UPLOAD HANDLING ===
$client_image = null;
if (!empty($_FILES['client_image']['name'])) {
    $target_dir = "../uploads/clients/";
    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

    $filename = basename($_FILES['client_image']['name']);
    $unique_name = time() . "_" . preg_replace('/[^a-zA-Z0-9\._-]/', '_', $filename);
    $target_file = $target_dir . $unique_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_types)) {
        die("Invalid image type. Allowed types: jpg, jpeg, png, gif.");
    }

    if (move_uploaded_file($_FILES["client_image"]["tmp_name"], $target_file)) {
        $client_image = $target_file;
    } else {
        die("Error uploading image.");
    }
}

// === INSERT INTO DATABASE USING PREPARED STATEMENT ===
$sql = "INSERT INTO clients_on_board (
    client_image, client_name, client_address, email, next_of_kin, relationship, spouse,
    phone_number, work_place, occupation, lawyer, case_title, case_status, paid, unpaid, date_created
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param(
        "sssssssssssssiis",
        $client_image,
        $client_name,
        $client_address,
        $email,
        $next_of_kin,
        $relationship,
        $spouse,
        $phone_number,
        $work_place,
        $occupation,
        $lawyer,
        $case_title,
        $case_status,
        $paid,
        $unpaid,
        $date_created
    );

    if ($stmt->execute()) {
        echo "1"; // Success
        // Optionally: header("Location: success.php");
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Statement prepare failed: " . $conn->error;
}

$conn->close();
?>
