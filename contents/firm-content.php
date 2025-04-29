<?php 
$userId = isset($row['firm_id']) && !empty($row['firm_id']) ? $conn->real_escape_string($row['firm_id']) : " ";
$date_created = isset($row['date_created']) && !empty($row['date_created']) ? $conn->real_escape_string($row['date_created']) : " ";
$date_found = isset($row['date_found']) && !empty($row['date_found']) ? $conn->real_escape_string($row['date_found']) : " ";
$user_bio = isset($row['firm_about']) && !empty($row['firm_about']) ? $conn->real_escape_string($row['firm_about']) : " ";
$user_name = isset($row['firm_name']) && !empty($row['firm_name']) ? $conn->real_escape_string($row['firm_name']) : "Not available ";
$user_email = isset($row['firm_email']) && !empty($row['firm_email']) ? $conn->real_escape_string($row['firm_email']) : " ";
$user_password = isset($row['firm_password']) && !empty($row['firm_password']) ? $conn->real_escape_string($row['firm_password']) : " ";
$user_location = isset($row['location']) && !empty($row['location']) ? $conn->real_escape_string($row['location']) : "Not available ";
$user_rating = isset($row['firm_rating']) && !empty($row['firm_rating']) ? $conn->real_escape_string($row['firm_rating']) : "Not available ";
$user_contact = isset($row['firm_phone_number']) && !empty($row['firm_phone_number']) ? $conn->real_escape_string($row['firm_phone_number']) : "Not available ";
$user_img = isset($row['firm_img']) && !empty($row['firm_img']) ? $conn->real_escape_string($row['firm_img']) : "https://fakeimg.pl/600x400";
$certification_and_accreditation = isset($row['certification_and_accreditation']) && !empty($row['certification_and_accreditation']) ? $conn->real_escape_string($row['certification_and_accreditation']) : " Not available ";
$practice_areas = isset($row['practice_areas']) && !empty($row['practice_areas']) ? $conn->real_escape_string($row['practice_areas']) : " Not available ";
$practice_location = isset($row['practice_location']) && !empty($row['practice_location']) ? $conn->real_escape_string($row['practice_location']) : " Not available";
$nooflawyers = isset($row['nooflawyers']) && !empty($row['nooflawyers']) ? $conn->real_escape_string($row['nooflawyers']) : " ";

?>