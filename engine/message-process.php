<?php session_start(); 
require 'config.php'; // Assuming this file contains database connection details

// Escape and sanitize input data
$sender_email = mysqli_real_escape_string($conn, $_POST['sentby']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$compose = mysqli_real_escape_string($conn, $_POST['message']);
$receiver_email = mysqli_real_escape_string($conn, $_POST['sentto']);
$is_sender_deleted = isset($_POST['is_sender_deleted']) ? mysqli_real_escape_string($conn, $_POST['is_sender_deleted']) : 0;
$is_receiver_deleted = isset($_POST['is_receiver_deleted']) ? mysqli_real_escape_string($conn, $_POST['is_receiver_deleted']) : 0;
$has_read = isset($_POST['has_read']) ? mysqli_real_escape_string($conn, $_POST['has_read']) : 0;
$date = date('Y-m-d H:i:s');

// Validate input
if (empty($compose)) {
    echo "Message field is required";
} elseif (empty($subject)) {
    echo "Subject field is required";
} else {
    // Prepare the SQL query using a prepared statement
    $insert_query = $conn->prepare("INSERT INTO messages 
                                    (sender_email, name, subject, compose, receiver_email, has_read, is_sender_deleted, is_receiver_deleted, date) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters to the prepared statement
    $insert_query->bind_param("sssssiiss", 
        $sender_email, $name, $subject, $compose, $receiver_email, $has_read, $is_sender_deleted, $is_receiver_deleted, $date);

    // Execute the query
    if ($insert_query->execute()) {
        // Send email using PHPMailer
        require '../PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;  // Enable verbose debug output
        $mail->isSMTP();       // Send using SMTP
        $mail->Host = 'estores.ng';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Username = 'info@estores.ng';
        $mail->Password = "j(Mr7DlV7Oog";
        $mail->setFrom('info@estores.ng', 'estores.ng');
        $mail->addAddress($receiver_email);
        $mail->addReplyTo('info@estores.ng');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->MsgHTML("
            <html>
            <head>
                <style>
                    #img { text-align: center; }
                </style>
            </head>
            <body>
                <div id='img'>
                    <img src='https://estores.ng/assets/icons/logo_e_stores.png' alt='Logo' height='50' width='50'>
                </div>
                <br><br>
                <div>
                    You have a message from <b>".$name."</b> regarding <b>".$subject."</b>
                </div>
                <br><br>
                <div>
                    ".$compose."
                </div>
                <br><br>
                <div>
                    <a href='https://estores.ng/chat.php?user_name=$sender_email' class='form-control'>Login to view message</a>
                </div>
            </body>
            </html>
        ");

        // Send the email and handle any errors
        if (!$mail->send()) {
            $error = "Error in sending link: " . $mail->ErrorInfo;
            echo $error;
        } else {
            echo "1"; // Successfully sent email and inserted into database
        }
    } else {
        // If query failed
        echo "Error: " . $insert_query->error;
    }
    $insert_query->close();
}
?>
