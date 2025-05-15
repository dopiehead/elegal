<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'config.php';

$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_password = $_POST['user_password'];
$user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

// Validate inputs
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

if (empty($user_email) || empty($user_password)) {
    echo "All fields are required";
    exit;
}
// Determine the query based on user type
switch ($user_type) {
    case 'user':
        $query = "SELECT * FROM user_profile WHERE user_email = ? AND verified = 1";
        break;
    case 'lawyer':
        $query = "SELECT * FROM lawyer_profile WHERE lawyer_email = ? AND verified = 1";
        break;
    case 'police_officer':
        $query = "SELECT * FROM police_officer WHERE email = ? AND verified = 1";
        break;
    case 'police_department':
        $query = "SELECT * FROM police_department WHERE department_email = ? AND verified = 1";
        break;
    case 'firm':
        $query = "SELECT * FROM lawyer_firm WHERE firm_email = ? AND verified = 1";
        break;
    case 'admin':
        $query = "SELECT * FROM admin WHERE admin_email = ?";
        break;
    default:
        echo "Invalid user type";
        exit;
}

// Prepare and execute query
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $user_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        // Password field mapping by user type
        $password_columns = [
            'user' => 'user_password',
            'lawyer' => 'lawyer_password',
            'police_officer' => 'password',
            'police_department' => 'department_password',
            'firm' => 'firm_password',
            'admin' => 'admin_password'
        ];

        $password_field = $password_columns[$user_type] ?? null;

        if (!$password_field || !isset($row[$password_field])) {
            echo "Password field not found for user type";
            exit;
        }

        if (password_verify($user_password, $row[$password_field])) {

            // ✅ Set session variables based on user type
            switch ($user_type) {
                case 'user':
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["email"] = $row['user_email'];
                    $_SESSION["name"] = $row['user_name'];
                    $_SESSION["location"] = $row['user_location'];
                    $_SESSION["phone"] = $row['user_phone'];
                    $_SESSION['date'] = $row['created_at'];
                    $_SESSION['payment_status'] = $row['payment_status'];
                    break;

                case 'lawyer':
                    $_SESSION["lawyer_id"] = $row['id'];
                    $_SESSION["lawyer_email"] = $row['lawyer_email'];
                    $_SESSION["lawyer_name"] = $row['lawyer_name'];
                    $_SESSION['lawyers_date'] = $row['date'];
                    $_SESSION['lawyer_image'] = __DIR__ . $row['lawyer_img'];
                    $_SESSION['lawyer_contact'] = $row['lawyer_contact'];
                    $_SESSION['lawyer_location'] = $row['lawyer_location'];
                    $_SESSION['payment_status'] = $row['payment_status'];
                    break;

                case 'police_officer':
                    $_SESSION["officer_id"] = $row['officer_id'];
                    $_SESSION["police_name"] = $row['police_name'];
                    $_SESSION["email"] = $row['email'];
                    $_SESSION["rank_name"] = $row['rank_name'];
                    $_SESSION["next_of_kin"] = $row['next_of_kin'];
                    $_SESSION["relationship"] = $row['relationship'];
                    $_SESSION["next_of_kin_telephone"] = $row['next_of_kin_telephone'];
                    $_SESSION["police_phone_number"] = $row['police_phone_number'];
                    $_SESSION["police_dob"] = $row['police_dob'];
                    $_SESSION["team"] = $row['team'];
                    $_SESSION["location"] = $row['location'];
                    $_SESSION["lga"] = $row['lga'];
                    $_SESSION["full_address"] = $row['full_address'];
                    $_SESSION["vkey"] = $row['vkey'];
                    $_SESSION["verified"] = $row['verified'];
                    $_SESSION["date"] = $row['date'];
                    break;

                case 'police_department':
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["police_department"] = $row['police_department'];
                    $_SESSION["department_email"] = $row['department_email'];
                    $_SESSION["department_head"] = $row['department_head'];
                    $_SESSION["immediate_reporting_officer"] = $row['immediate_reporting_officer'];
                    $_SESSION["department_phone_number"] = $row['department_phone_number'];
                    $_SESSION["zonal_head"] = $row['zonal_head'];
                    $_SESSION["department_location"] = $row['department_location'];
                    $_SESSION["lga"] = $row['lga'];
                    $_SESSION["full_address"] = $row['full_address'];
                    $_SESSION["created_at"] = $row['created_at'];
                    break;

                case 'firm':
                    $_SESSION["firm_id"] = $row['firm_id'];
                    $_SESSION["firm_email"] = $row['firm_email'];
                    $_SESSION["firm_name"] = $row['firm_name'];
                    $_SESSION['date_found'] = $row['date_found'];
                    $_SESSION['firm_phone_number'] = $row['firm_phone_number'];
                    $_SESSION['firm_location'] = $row['location'];
                    $_SESSION['firm_img'] = __DIR__ . $row['firm_img'];
                    $_SESSION['payment_status'] = $row['payment_status'];
                    break;

                case 'admin':
                    $_SESSION["admin_id"] = $row['admin_id'];
                    $_SESSION["admin_email"] = $row['admin_email'];
                    $_SESSION['admin_date'] = $row['admin_date'];
                    break;
            }

            echo "1"; // ✅ Login success

        } else {
            echo "Incorrect login details"; // ❌ Wrong password
        }

    } else {
        echo "Email not found or not verified"; // ❌ No matching user
    }
    mysqli_stmt_close($stmt);

} else {
    echo "Error preparing the query"; // ❌ SQL error
}

?>
