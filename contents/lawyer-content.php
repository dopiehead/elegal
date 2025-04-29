<?php 
     
     $userId = isset($row['id']) && !empty($row['id']) ?  $conn->real_escape_string($row['id']) :"N/A";
     $user_img = isset($row['lawyer_img']) && !empty($row['lawyer_img']) ? $conn->real_escape_string($row['lawyer_img']) : "https://fakeimg.pl/600x400";
     $date = isset($row['created_at']) && !empty($row['created_at']) ? $conn->real_escape_string($row['created_at']) : " ";
     $user_firm = isset($row['lawyer_firm']) && !empty($row['lawyer_firm']) ? $conn->real_escape_string($row['lawyer_firm']) : " ";
     $user_bio = isset($row['lawyer_bio']) && !empty($row['lawyer_bio']) ? $conn->real_escape_string($row['lawyer_bio']) : " ";
     $user_dob = isset($row['lawyer_dob']) && !empty($row['lawyer_dob']) ? $conn->real_escape_string($row['lawyer_dob']) : " ";
     $user_name = isset($row['lawyer_name']) && !empty($row['lawyer_name']) ? $conn->real_escape_string($row['lawyer_name']) : " ";
     $user_email = isset($row['lawyer_email']) && !empty($row['lawyer_email']) ? $conn->real_escape_string($row['lawyer_email']) : " ";
     $user_password = isset($row['lawyer_password']) && !empty($row['lawyer_password']) ? $conn->real_escape_string($row['lawyer_password']) : " ";
     $user_location = isset($row['lawyer_location']) && !empty($row['lawyer_location']) ? $conn->real_escape_string($row['lawyer_location']) : " ";
     $user_education = isset($row['lawyer_education']) && !empty($row['lawyer_education']) ? $conn->real_escape_string($row['lawyer_education']) : " ";
     $supreme_court_number = isset($row['supreme_court_number']) && !empty($row['supreme_court_number']) ? $conn->real_escape_string($row['supreme_court_number']) : " ";
     $currently_engaged = isset($row['currently_engaged']) && !empty($row['currently_engaged']) ? $conn->real_escape_string($row['currently_engaged']) : " ";
     $current_position = isset($row['current_position']) && !empty($row['current_position']) ? $conn->real_escape_string($row['current_position']) : " ";
     $practice_areas = isset($row['practice_areas']) && !empty($row['practice_areas']) ? $conn->real_escape_string($row['practice_areas']) : " ";
     $published_articles = isset($row['published_articles']) && !empty($row['published_articles']) ? $conn->real_escape_string($row['published_articles']) : " ";
     $practice_location = isset($row['practice_location']) && !empty($row['practice_location']) ? $conn->real_escape_string($row['practice_location']) : " ";
     $lawyer_experience = isset($row['lawyer_experience']) && !empty($row['lawyer_experience']) ? $conn->real_escape_string($row['lawyer_experience']) : " ";
     $user_contact = isset($row['lawyer_phone_no']) && !empty($row['lawyer_phone_no']) ? $conn->real_escape_string($row['lawyer_phone_no']) : " ";

?>