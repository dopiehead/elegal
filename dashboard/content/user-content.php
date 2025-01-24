<?php 
     $userId = $_SESSION['id'];
     $you = $_SESSION['email'];
     $user_type = "user";
     $userId = mysqli_real_escape_string($conn, $userId);
     $query = "SELECT * FROM user_profile WHERE id = ?";
     $stmt = mysqli_prepare($conn, $query);
     mysqli_stmt_bind_param($stmt, 'i', $userId);     
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
     if ($row = mysqli_fetch_assoc($result)) {

         $date = $row['created_at'];
         $user_bio = $row['user_bio'];
         $user_name = $row['user_name'];
         $user_password = $row['user_password'];
         $user_location = $row['user_location'];
         $user_contact = $row['user_phone'];
         $user_occupation = $row['user_occupation'];
         $user_img = $row['user_img'];
  
     } else {

          echo "No user found.";
     }

     mysqli_stmt_close($stmt);

 ?>