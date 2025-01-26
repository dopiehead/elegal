<?php 
       
        
   $admin_id = $_SESSION['admin_id'];
   $admin_email = $_SESSION['admin_email'];
   $user_type = "admin";     
   $query = "SELECT * FROM admin WHERE admin_id = ?";
   $stmt = mysqli_prepare($conn, $query);
   mysqli_stmt_bind_param($stmt, 'i', $admin_id);     
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   if ($row = mysqli_fetch_assoc($result)) {
      
       $date = $row['admin_date'];
       $admin_password = $row['admin_password'];
       $admin_email = $row['admin_email'];
 
       
   } else {

       echo "No user found.";
   }

       mysqli_stmt_close($stmt);   

  ?>


