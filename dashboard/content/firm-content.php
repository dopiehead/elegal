   <?php     
        
     $userId = $_SESSION['firm_id'];
     $you = $_SESSION['firm_email'];
     $user_type = "firm";     
     $query = "SELECT * FROM lawyer_firm WHERE firm_id = ?";
     $stmt = mysqli_prepare($conn, $query);
     mysqli_stmt_bind_param($stmt, 'i', $userId);     
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
     if ($row = mysqli_fetch_assoc($result)) {
        
         $date = $row['date_created'];
         $date_found = $row['date_found'];
         $user_bio = $row['firm_about'];
         $user_name = $row['firm_name'];
         $user_password = $row['firm_password'];
         $user_location = $row['location'];
         $user_rating = $row['firm_rating'];
         $user_contact = $row['firm_phone_number'];
         $user_img = $row['firm_img'];
         $certification_and_accreditation = $row['certification_and_accreditation'];
         $practice_areas = $row['practice_areas'];
         $nooflawyers = $row['nooflawyers'];
         
     } else {

         echo "No user found.";
     }

         mysqli_stmt_close($stmt);   

    ?>