<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'config.php';

$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_password = $_POST['user_password'];
$user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    exit("Invalid email format");
}
if (empty($user_email) || empty($user_password)) {
    exit("All fields are required");
}

$user_tables = [
    'user' => ['table' => 'user_profile', 'email_col' => 'user_email'],
    'lawyer' => ['table' => 'lawyer_profile', 'email_col' => 'lawyer_email'],
    'firm' => ['table' => 'lawyer_firm', 'email_col' => 'firm_email'],
    'police' => ['table' => 'police_officer', 'email_col' => 'police_email'],
    'police_department' => ['table' => 'police_department', 'email_col' => 'department_email'],
    'admin' => ['table' => 'admin', 'email_col' => 'admin_email', 'verified' => false],
];

if (!isset($user_tables[$user_type])) {
    exit("Invalid user type");
}

$table = $user_tables[$user_type]['table'];
$email_col = $user_tables[$user_type]['email_col'];
$verified_check = isset($user_tables[$user_type]['verified']) && !$user_tables[$user_type]['verified'] ? "" : " AND verified = 1";
$query = "SELECT * FROM $table WHERE $email_col = ?$verified_check";

if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $user_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $password_col = $user_type . '_password';
        if (password_verify($user_password, $row[$password_col])) {
            // Set session data dynamically or per type
            $_SESSION['user_type'] = $user_type;

            foreach ($row as $key => $value) {
                $_SESSION[$key] = $value;
            }

            echo "1"; // Success
        } else {
            echo "Incorrect login details";
        }
    } else {
        echo "Email not found or not verified";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing the query";
}
?>
