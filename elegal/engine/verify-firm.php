<?php
require("config.php");

$verification_message = "";

$alert_class = "alert-danger"; // Default to error

if (isset($_GET['vkey'])) {
    
    $vkey = $_GET['vkey'];

    // Check if the vkey exists in the database and is not already verified
    $sql = "SELECT verified FROM lawyer_firm WHERE vkey = ? LIMIT 1";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $vkey);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($verified);
            $stmt->fetch();

            if ($verified == 0) {
                // Update verification status
                $update_sql = "UPDATE lawyer_firm SET verified = 1 WHERE vkey = ?";
                if ($update_stmt = $conn->prepare($update_sql)) {
                    $update_stmt->bind_param("s", $vkey);
                    if ($update_stmt->execute()) {
                        $verification_message = "Your account has been successfully verified! You can now log in.";
                        $alert_class = "alert-success";
                    } else {
                        $verification_message = "Error verifying your account. Please try again later.";
                    }
                    $update_stmt->close();
                }
            } else {
                $verification_message = "Your account has already been verified.";
                $alert_class = "alert-info";
            }
        } else {
            $verification_message = "Invalid verification key.";
        }

        $stmt->close();
    } else {
        $verification_message = "Error preparing the statement.";
    }

    $conn->close();
} else {
    $verification_message = "No verification key provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4 border-0" style="max-width: 500px; width: 100%;">
        <div class="text-center">
            <img src="https://elegal.ng/assets/icons/logo.png" alt="ElegalNG Logo" width="80">
            <h3 class="mt-3">Email Verification</h3>
        </div>
        <div class="alert <?php echo $alert_class; ?> text-center mt-3">
            <?php echo $verification_message; ?>
        </div>
        <div class="text-center">
            <a href="login.php" class="btn btn-primary w-100">Go to Login</a>
        </div>
    </div>
</div>

</body>
</html>