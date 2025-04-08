<?php
session_start();

if (!isset($_SESSION["id"]) && !isset($_SESSION["lawyer_id"]) && !isset($_SESSION["firm_id"])) { 
    echo "<script>location.href='login.php'</script>";
    exit();
}
?>

<?php 
// Session data handling
if (isset($_SESSION['lawyer_id'])) {
    $sender = $_SESSION['lawyer_email'];
    $senderName = $_SESSION['lawyer_name'];
    $user_id = $_SESSION['lawyer_id'];
}

if (isset($_SESSION['firm_id'])) {
    $sender = $_SESSION['firm_email'];
    $senderName = $_SESSION['firm_name'];
    $user_id = $_SESSION['firm_id'];
}

if (isset($_SESSION['id'])) {
    $sender = $_SESSION['email'];
    $senderName = $_SESSION['name'];
    $user_id = $_SESSION['id'];
}

require '../engine/config.php';

if (isset($_GET['user_name'])) {
    $user_name = mysqli_real_escape_string($conn, $_GET['user_name']);
}

$sql = "UPDATE messages SET has_read = 1 WHERE sender_email='" . htmlspecialchars($user_name) . "' AND receiver_email = '" . htmlspecialchars($sender) . "'";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Chat</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
    <script src="../assets/js/jquery-1.11.3.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin-top: 70px;
        }

        .chat-header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
        }

        .chat-header .user-avatar {
            background-color: #28a745;
            border-radius: 50%;
            padding: 10px;
            font-size: 20px;
            color: white;
            font-weight: bold;
        }

        .message-box {
            max-height: 400px;
            overflow-y: auto;
            padding-top: 70px; /* To make space for the fixed header */
        }

        .receiver-box,
        .sender-box {
            margin-bottom: 15px;
            padding: 10px 15px;
           
            max-width: 75%;
            word-wrap: break-word;
        }

        .receiver-box {
            background-color: rgba(255, 30, 0, 0.5);
            float: left;
            color: white;
            border-radius: 0px 25px 25px 25px;
        }

        .sender-box {
            background-color: rgba(0, 70, 90, 0.4);
            float: right;
            color: white;
            border-radius: 25px 25px 0px 25px;
        }

        .message-form-container {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }

        .message-input {
            width: 80%;
            padding: 10px;
            font-size: 14px;
            border-radius: 25px;
            border: 1px solid #ccc;
            resize: none;
        }

        .send-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .send-button:hover {
            background-color: #218838;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .message-box {
                max-height: 250px;
            }

            .message-form-container {
                bottom: 50px;
            }
        }
    </style>
</head>
<body>

<div class="chat-header d-flex justify-content-between align-items-center">
    <a href="messages.php" class="text-white">
        <i class="fa fa-chevron-left"></i> Back
    </a>
    <div class="user-avatar">
        <?php echo substr($user_name, 0, 2); ?>
    </div>
</div>

<?php 
$read = mysqli_query($conn, "SELECT * FROM messages WHERE is_sender_deleted = 0 AND (sender_email='" . htmlspecialchars($sender) . "' AND receiver_email = '" . htmlspecialchars($user_name) . "' OR sender_email='" . htmlspecialchars($user_name) . "' AND receiver_email = '" . htmlspecialchars($sender) . "')");
?>

<div class="container message-box">
    <div id="messages-container">
        <?php
        while ($messages = mysqli_fetch_array($read)) {
            if ($messages['sender_email'] == $user_name) {
        ?>
            <div class="receiver-box">
         
                <p><?php echo $messages['compose']; ?></p>
                <small>Received on: <?php echo $messages['date']; ?></small>
            </div>
        <?php
            } else {
        ?>
            <div class="sender-box">
      
                <p><?php echo $messages['compose']; ?></p>
                <?php if ($messages['has_read'] == 1) { ?>
                    <small style="color: green;">Seen on: <?php echo $messages['date']; ?></small>
                <?php } else { ?>
                    <small>Sent on: <?php echo $messages['date']; ?></small>
                <?php } ?>
            </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<div class="message-form-container">
    <form method="post" id="message-form">
        <input type="hidden" name="user_name" value="<?php echo $sender; ?>">
        <input type="hidden" name="sentby" value="<?php echo $sender; ?>">
        <input type="hidden" name="name" value="<?php echo $senderName; ?>">
        <input type="hidden" name="receiver_name" value="<?php echo $user_name; ?>">

        <textarea name="message" id="message" class="message-input" rows="3" placeholder="Type your message here..."></textarea>
        <button type="button" class="send-button" id="submit">
            <i class="fa fa-paper-plane"></i> Send
        </button>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#submit').on('click', function(e) {
      
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../engine/message-process.php",
            data: $('#message-form').serialize(),
            success: function(response) {
                $('#message').val('');
                var objDiv = document.getElementById('messages-container');
                objDiv.scrollTop = objDiv.scrollHeight;
            }
        });
    });

    setInterval(function() {
        $("#messages-container").load(location.href + " #messages-container");
    }, 2500);
});
</script>

</body>
</html>
