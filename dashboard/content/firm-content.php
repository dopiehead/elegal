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
        
        function getValue($array, $key, $default = "not available") {
            return isset($array[$key]) && !empty($array[$key]) ? $array[$key] : $default;
        }
        
        $date = getValue($row, 'date_created');
        $date_found = getValue($row, 'date_found');
        $user_bio = getValue($row, 'firm_about');
        $user_name = getValue($row, 'firm_name');
        $user_password = getValue($row, 'firm_password');
        $user_location = getValue($row, 'location');
        $user_rating = getValue($row, 'firm_rating');
        $user_contact = getValue($row, 'firm_phone_number');
        $user_img = getValue($row, 'firm_img');
        $certification_and_accreditation = getValue($row, 'certification_and_accreditation');
        $practice_areas = getValue($row, 'practice_areas');
        $nooflawyers = getValue($row, 'nooflawyers');
        
         
     } else {

         echo "No user found.";
     }

         mysqli_stmt_close($stmt);   

    ?>