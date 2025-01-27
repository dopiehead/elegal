<?php

require("engine/config.php");

$condition = "SELECT
     law_firm.firm_name AS firm_name,
     law_firm.firm_email AS firm_email,
     law_firm.firm_about AS firm_about,
     law_firm.certification_and_accreditation AS firm_accreditation_and_certification,
     law_firm.date_found AS firm_date_found,
     law_firm.nooflawyers AS firm_nooflawyers,
     law_firm.firm_phone_number AS firm_phone_number,
     law_firm.location AS firm_location,
     law_firm.practice_areas AS firm_practice_areas,
     law_firm.verified AS verified,

     
     lawyer_profile.lawyer_email AS lawyer_email,
     lawyer_profile.lawyer_password AS lawyer_password,
     lawyer_profile.lawyer_name AS lawyer_name,
     lawyer_profile.lawyer_img AS lawyer_img,
     lawyer_profile.lawyer_firm AS lawyer_firm,
     lawyer_profile.lawyer_bio AS lawyer_bio,
     lawyer_profile.lawyer_education AS lawyer_education,
     lawyer_profile.lawyer_dob AS lawyer_dob,
     lawyer_profile.lawyer_experience AS lawyer_experience,
     lawyer_profile.lawyer_rating AS lawyer_rating,
     lawyer_profile.lawyer_location AS lawyer_location,
     lawyer_profile.current_position AS current_position,
     lawyer_profile.lawyer_phone_no AS lawyer_phone_no,
     lawyer_profile.practice_areas AS practice_areas,
     lawyer_profile.practice_location AS practice_location,
     lawyer_profile.published_articles AS published_articles,
     lawyer_profile.supreme_court_number AS supreme_court_number,
     lawyer_profile.status AS status,
     lawyer_profile.currently_engaged AS currently_engaged,
     lawyer_profile.created_at AS created_at,
     lawyer_profile.verified AS lawyer_verified
FROM law_firm 
JOIN lawyer_profile ON law_firm.firm_id = lawyer_profile.lawyer_firm
WHERE law_firm.verified = 1 AND lawyer_profile.verified = 1";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_page = explode(" ", mysqli_escape_string($conn, $_GET['search']));
    foreach ($search_page as $text) {
        $text = htmlspecialchars($text); // Sanitize each search term
        $condition .= " AND (
            (`product_name` LIKE '%$text%' 
            OR `product_details` LIKE '%$text%' 
            OR `product_category` LIKE '%$text%' 
            OR `product_location` LIKE '%$text%')
            OR (`law_firm`.`firm_name` LIKE '%$text%'
            OR `law_firm`.`firm_email` LIKE '%$text%'
            OR `law_firm`.`firm_about` LIKE '%$text%'
            OR `law_firm`.`certification_and_accreditation` LIKE '%$text%'
            OR `law_firm`.`date_found` LIKE '%$text%'
            OR `law_firm`.`nooflawyers` LIKE '%$text%'
            OR `law_firm`.`firm_phone_number` LIKE '%$text%'
            OR `law_firm`.`location` LIKE '%$text%'
            OR `law_firm`.`practice_areas` LIKE '%$text%'
            OR `law_firm`.`verified` LIKE '%$text%')
            OR (`lawyer_profile`.`lawyer_email` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_password` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_name` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_img` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_firm` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_bio` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_education` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_dob` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_experience` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_rating` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_location` LIKE '%$text%'
            OR `lawyer_profile`.`current_position` LIKE '%$text%'
            OR `lawyer_profile`.`lawyer_phone_no` LIKE '%$text%'
            OR `lawyer_profile`.`practice_areas` LIKE '%$text%'
            OR `lawyer_profile`.`practice_location` LIKE '%$text%'
            OR `lawyer_profile`.`published_articles` LIKE '%$text%'
            OR `lawyer_profile`.`supreme_court_number` LIKE '%$text%'
            OR `lawyer_profile`.`status` LIKE '%$text%'
            OR `lawyer_profile`.`currently_engaged` LIKE '%$text%'
            OR `lawyer_profile`.`created_at` LIKE '%$text%'
            OR `lawyer_profile`.`verified` LIKE '%$text%')
        )";
    }
}

$num_per_page = 20;
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$initial_page = ($page - 1) * $num_per_page;
$condition .= " LIMIT $initial_page, $num_per_page";
$data = mysqli_query($conn, $condition);
$datafound = mysqli_num_rows($data); // This returns the number of rows found
echo "$datafound data found";
?>
