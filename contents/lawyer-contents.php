<?php
$userId = $row['id'] ?? "N/A";
$user_img = $row['lawyer_img'] ?? "https://placeholder.com";  // Placeholder image
$date = $row['created_at'] ?? "N/A";
$user_firm = $row['lawyer_firm'] ?? "N/A";
$user_email = $row['lawyer_email'] ?? "";  // Empty string for email if not available
$user_bio = $row['lawyer_bio'] ?? "";  // Empty string for bio if not available
$user_dob = $row['lawyer_dob'] ?? "N/A";  // Date of birth (if unavailable, use "N/A")
$user_name = $row['lawyer_name'] ?? "N/A";  // Name
$user_password = $row['lawyer_password'] ?? "N/A";  // Password (note: consider hashing for real-world apps)
$user_location = $row['lawyer_location'] ?? "N/A";  // Location
$user_education = $row['lawyer_education'] ?? "N/A";  // Education
$supreme_court_number = $row['supreme_court_number'] ?? "N/A";  // Supreme Court number
$current_position = $row['current_position'] ?? "N/A";  // Current position
$currently_engaged = $row['currently_engaged'] ?? "N/A"; 
$practice_areas = $row['practice_areas'] ?? "";  // Empty string for practice areas if not available
$published_articles = $row['published_articles'] ?? "N/A";  // Articles
$practice_location = $row['practice_location'] ?? "N/A";  // Practice location
$lawyer_experience = $row['lawyer_experience'] ?? "N/A";  // Lawyer experience
$user_contact = $row['lawyer_phone_no'] ?? "N/A";  // Phone number
?>