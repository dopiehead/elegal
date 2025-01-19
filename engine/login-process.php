<?php 
 session_start();

 error_reporting(E_ALL ^ E_NOTICE);  

 require 'config.php';

 $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
 $user_password = $_POST['user_password'];
 $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);


if (empty($user_email) || empty($user_password)) {

     echo "All fields are required";

     exit;
}

function loginUser($conn, $user_email, $user_password, $user_type) {
   
     $table = ''; 
     $email_column = '';
     $password_column = '';
     $id_column = '';
     $name_column = '';
     $location_column = '';
     $phone_column = '';
     $image_column = '';

     switch ($user_type) {
        case 'lawyer':
            $table = 'lawyer_profile';
            $email_column = 'lawyer_email';
            $password_column = 'lawyer_password';
            $id_column = 'id';
            $name_column = 'lawyer_name';
            $location_column = 'lawyer_location';
            $phone_column = 'lawyer_phone_no';
            $image_column = 'lawyer_img';
            break;

        case 'firm':
            $table = 'lawyer_firm';
            $email_column = 'firm_email';
            $password_column = 'firm_password';
            $id_column = 'firm_id';
            $name_column = 'firm_name';
            $location_column = 'location';
            $phone_column = 'firm_phone_number';
            $image_column = 'firm_img';
            break;

        case 'user':
            $table = 'user_profile';
            $email_column = 'user_email';
            $password_column = 'user_password';
            $id_column = 'id';
            $name_column = 'user_name';
            $location_column = 'user_location';
            $phone_column = 'user_phone';
            $image_column = 'user_img';
            break;

        case 'admin':
            $table = 'admin';
            $email_column = 'admin_email';
            $password_column = 'admin_password';
            $id_column = 'admin_id';
            $name_column = 'admin_email'; 
            break;
    }

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM $table WHERE $email_column = ? AND verified = 1");

    $stmt->bind_param("s", $user_email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
         $row = $result->fetch_assoc();

        // Use password_verify() to check the entered password against the stored hashed password
        if (password_verify($user_password, $row[$password_column])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["{$user_type}_id"] = $row[$id_column];
            $_SESSION["{$user_type}_email"] = $row[$email_column];
            $_SESSION["{$user_type}_name"] = $row[$name_column];
            $_SESSION["{$user_type}_location"] = isset($row[$location_column]) ? $row[$location_column] : '';
            $_SESSION["{$user_type}_phone"] = isset($row[$phone_column]) ? $row[$phone_column] : '';

            // Set user-specific image session
            if (isset($row[$image_column])) {
                $_SESSION["{$user_type}_image"] = __DIR__ . $row[$image_column]; 
            }

            echo "1";  // Success message

        } else {
            echo "Incorrect login details"; // Error message if password does not match
        }

    } else {
        echo "Incorrect login details"; // Error message if email not found
    }

    $stmt->close();
}

loginUser($conn, $user_email, $user_password, $user_type);

$conn->close();
?>
