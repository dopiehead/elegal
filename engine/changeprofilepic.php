<?php session_start();
require 'engine/config.php';

$myid = mysqli_real_escape_string($conn, $_POST['id']);

$imageFolder = ""; // Default value, set later

// Check which session is active and set the corresponding image folder path
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $imageFolder = "assets/images/users/";
} elseif (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) {
    $imageFolder = "assets/images/lawyers/";
} elseif (isset($_SESSION['firm_id']) && !empty($_SESSION['firm_id'])) {
    $imageFolder = "assets/images/firms/";
}

// Check if image folder is set, if not, exit
if (empty($imageFolder)) {
    echo "No session active for user, lawyer, or firm.";
    exit;
}

// Get the uploaded file details
$basename = mysqli_real_escape_string($conn, basename($_FILES["fileupload"]["name"]));
$maxsize = 4 * 1024 * 1024; // 4 MB limit
$imageExtension = strtolower(pathinfo($basename, PATHINFO_EXTENSION));
$allowed_extensions = array("jpg", "jpeg", "png");

// Validate file extension
if (!in_array($imageExtension, $allowed_extensions)) {
    echo "Please upload a valid image in PNG, JPG, or JPEG format.";
    exit;
}

// Check the file size
$imageSize = $_FILES['fileupload']['size'];
if ($imageSize > $maxsize) {
    echo "Image file size exceeds the 4MB limit.";
    exit;
}

// Temporary file location
$image_temp_name = $_FILES["fileupload"]["tmp_name"];
$myimage = $imageFolder . $basename;

// Try to upload the file
$upload = move_uploaded_file($image_temp_name, $myimage);
if (!$upload) {
    echo "Error uploading the image.";
    exit;
}

// Prepare the SQL query based on the session active user type
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
     $sql = "UPDATE user_profile SET user_img = '".htmlspecialchars($myimage)."' WHERE id = '".htmlspecialchars($myid)."'";
} elseif (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) {
     $sql = "UPDATE lawyer_profile SET lawyer_img = '".htmlspecialchars($myimage)."' WHERE id = '".htmlspecialchars($myid)."'";
} elseif (isset($_SESSION['firm_id']) && !empty($_SESSION['firm_id'])) {
     $sql = "UPDATE firm_profile SET firm_img = '".htmlspecialchars($myimage)."' WHERE firm_id = '".htmlspecialchars($myid)."'";
} else {
     echo "No valid user type found.";
     exit;
}

// Execute the query
$bgt = mysqli_query($conn, $sql);
if ($bgt) {
    // Update session variables with the new image path
    if (isset($_SESSION['id'])) {
        $_SESSION['image'] = $myimage;
    }
    
    if (isset($_SESSION['lawyer_id'])) {
        $_SESSION['lawyer_image'] = $myimage;
    }
    if (isset($_SESSION['firm_id'])) {
        $_SESSION['firm_image'] = $myimage;
    }

    echo "1";  // Success
} else {
    echo "Error in changing picture.";
}
?>
