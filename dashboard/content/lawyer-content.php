 <?php 
        
         $userId = $_SESSION['lawyer_id'];
         $you = $_SESSION['lawyer_email'];    
         $user_type = "lawyer";
         $query = "SELECT * FROM lawyer_profile WHERE id = ?";
         $stmt = mysqli_prepare($conn, $query);
         mysqli_stmt_bind_param($stmt, 'i', $userId);     
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         if ($row = mysqli_fetch_assoc($result)) {
             $user_img = $row['lawyer_img'];
             $date = $row['created_at'];
             $user_firm = $row['lawyer_firm'];
             $user_bio = $row['lawyer_bio'];
             $user_dob = $row['lawyer_dob'];
             $user_name = $row['lawyer_name'];
             $user_password = $row['lawyer_password'];
             $user_location = $row['lawyer_location'];
             $user_education = $row['lawyer_education'];
             $supreme_court_number = $row['supreme_court_number'];
             $currently_engaged = $row['currently_engaged'];
             $current_position = $row['current_position'];
             $practice_areas = $row['practice_areas'];
             $published_articles = $row['published_articles'];
             $practice_location = $row['practice_location'];
             $lawyer_experience = $row['lawyer_experience'];
             $user_contact = $row['lawyer_phone_no'];
            
   
        } else {

             echo "No user found.";
        }

          mysqli_stmt_close($stmt);

  ?>