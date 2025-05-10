     <?php require("../engine/config.php");?>
     <ul class='d-flex flex-row flex-column justify-content-center align-items-center gap-5 navigator full-height shadow-lg list-unstyled px-4 py-4'>
     <li><a class='text-white text-decoration-none' href='../index.php'><span class='fa fa-house'></span> Home</a></li>
         <li><a class='text-white text-decoration-none active-link-dashboard' href='mydashboard.php'><span class='fa fa-border-all'></span> Dashboard</a></li>
         
         <?php if(isset($_SESSION['lawyer_id'])): ?>
         <li><a class='text-white text-decoration-none active-link-firm' href='myfirm.php'><span class='fa fa-users'></span> My Firm</a></li>
         <?php endif; ?>
         
         
         <li><a class='text-white text-decoration-none active-link-profile' href='myprofile.php'> <span class='fa fa-user-alt'></span> My Profile</a></li>
         <li><a class='text-white text-decoration-none active-link-messages' href='messages.php'><span class='fa fa-envelope'></span> Messages</a></li>
          
         <?php

             error_reporting(E_ALL);
             ini_set('display_errors', 1);
             
             // Get user ID from session or redirect if none found
             $user_id = $_SESSION['id'] ?? $_SESSION['lawyer_id'] ?? $_SESSION['firm_id'] ?? exit(header('Location: ../login.php'));
            
               // Determine the correct notifications table based on session
             if (isset($_SESSION['id'])) {
                 $query = "SELECT * FROM user_notifications WHERE recipient_id = ? AND pending = 0";
             } elseif (isset($_SESSION['lawyer_id'])) {
                  $query = "SELECT * FROM lawyer_notifications WHERE recipient_id = ? AND pending = 0";
             } else {
                 $query = "SELECT * FROM firm_notifications WHERE recipient_id = ? AND pending = 0";
             }
                  // Prepare and execute the statement
             $get_notifications = $conn->prepare($query);
             
             if ($get_notifications && $get_notifications->bind_param("i", $user_id)) {
                  $get_notifications->execute();
                   $result = $get_notifications->get_result();
                    $datafound = $result->num_rows;
             }
         ?>

         <li class='position-relative'><a class='text-white text-decoration-none active-link-notification' href='notifications.php'><span class='fa fa-bell'></span> Notifications <?php if($datafound > 0): ?><span style='font-size:13px;' class='fa fa-circle text-danger position-absolute'></span><?php endif; ?></a></li>
         <li><a class='text-white text-decoration-none' href='logout.php'><span class='fa fa-sign-out'></span> Logout</a></li>
     </ul>