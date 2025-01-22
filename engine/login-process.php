<?php session_start();

 error_reporting(E_ALL ^ E_NOTICE);

 require 'config.php';

 $user_email = mysqli_escape_string($conn, $_POST['user_email']);

 $user_password = $_POST['user_password'];

 $user_type = mysqli_escape_string($conn, $_POST['user_type']);


if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

     echo "Invalid email format";
 
     exit;
}


if (empty($user_email) || empty($user_password)) {

     echo "All fields are required";

} elseif ($user_email == '') {

     echo "Email field is required"; 

} elseif ($user_password == '') {

     echo "Password field is required";

} else {
    // Determine the query based on user type
    if ($user_type == 'user') {

         $query = "SELECT * FROM user_profile WHERE user_email = ? AND verified = 1";

    } elseif ($user_type == 'lawyer') {

         $query = "SELECT * FROM lawyer_profile WHERE lawyer_email = ? AND verified = 1";

    } elseif ($user_type == 'firm') {

         $query = "SELECT * FROM lawyer_firm WHERE firm_email = ? AND verified = 1";

    } elseif ($user_type == 'admin') {

         $query = "SELECT * FROM admin WHERE admin_email = ?";

    } else {

         echo "Invalid user type";

         exit;
    }

    
    if ($stmt = mysqli_prepare($conn, $query)) {

         mysqli_stmt_bind_param($stmt, 's', $user_email);

         mysqli_stmt_execute($stmt);
 
         $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
        
            if (password_verify($user_password, $row[$user_type . '_password'])) {
               

                 if ($user_type == 'user') {

                     $_SESSION["id"] = $row['id'];
                     $_SESSION["email"] = $row['user_email'];
                     $_SESSION["name"] = $row['user_name'];
                     $_SESSION["location"] = $row['user_location'];
                     $_SESSION["phone"] = $row['user_phone'];
                     $_SESSION['date'] = $row['created_at'];

                } elseif ($user_type == 'lawyer') {

                     $_SESSION["lawyer_id"] = $row['id'];
                     $_SESSION["lawyer_email"] = $row['lawyer_email'];
                     $_SESSION["lawyer_name"] = $row['lawyer_name'];
                     $_SESSION['lawyers_date'] = $row['date'];
                     $_SESSION['lawyer_image'] = __DIR__ . $row['lawyer_img'];
                     $_SESSION['lawyer_contact'] = $row['lawyer_contact'];
                     $_SESSION['lawyer_location'] = $row['lawyer_location'];

                } elseif ($user_type == 'firm') {

                     $_SESSION["firm_id"] = $row['firm_id'];
                     $_SESSION["firm_email"] = $row['firm_email'];
                     $_SESSION["firm_name"] = $row['firm_name'];
                     $_SESSION['date_found'] = $row['date_found'];
                     $_SESSION['firm_phone_number'] = $row['firm_phone_number'];
                     $_SESSION['firm_location'] = $row['location'];
                     $_SESSION['firm_img'] = __DIR__ . $row['firm_img'];
                } elseif ($user_type == 'admin') {

                     $_SESSION["admin_id"] = $row['admin_id'];
                     $_SESSION["admin_email"] = $row['admin_email'];
                     $_SESSION['admin_date'] = $row['admin_date'];
                     $_SESSION['admin_password'] = $row['admin_password'];
                }

                     echo "1";  // Success

            } else {
                     echo "Incorrect login details";  // Invalid password
            }
        } else {

                 echo "Email not found or not verified";  // Email does not exist or not verified
        }
              
           mysqli_stmt_close($stmt);

    } else {

           echo "Error preparing the query";  // SQL preparation error
    }
}
?>
