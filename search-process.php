<?php

require("engine/config.php");


$condition = "
    SELECT  
        lawyer_firm.firm_name AS firm_name,
        lawyer_firm.firm_email AS firm_email,
        lawyer_firm.firm_about AS firm_about,
        lawyer_firm.certification_and_accreditation AS certification_and_accreditation,
        lawyer_firm.date_found AS date_found,
        lawyer_firm.nooflawyers AS nooflawyers,
        lawyer_firm.firm_phone_number AS firm_phone_number,
        lawyer_firm.location AS location,
        lawyer_firm.practice_areas AS firm_practice_areas,
        lawyer_firm.verified AS firm_verified,
         lawyer_profile.lawyer_img AS lawyer_img,
        lawyer_profile.lawyer_email AS lawyer_email,
        lawyer_profile.lawyer_name AS lawyer_name,
        lawyer_profile.lawyer_firm AS lawyer_firm,
        lawyer_profile.lawyer_bio AS lawyer_bio,
        lawyer_profile.lawyer_education AS lawyer_education,
        lawyer_profile.lawyer_dob AS lawyer_dob,
        lawyer_profile.lawyer_experience AS lawyer_experience,
        lawyer_profile.lawyer_rating AS lawyer_rating,
        lawyer_profile.lawyer_location AS lawyer_location,
        lawyer_profile.current_position AS current_position,
        lawyer_profile.lawyer_phone_no AS lawyer_phone_no,
        lawyer_profile.practice_areas AS lawyer_practice_areas,
        lawyer_profile.practice_location AS practice_location,
        lawyer_profile.published_articles AS published_articles,
        lawyer_profile.supreme_court_number AS supreme_court_number,
        lawyer_profile.status AS status,
        lawyer_profile.currently_engaged AS currently_engaged,
        lawyer_profile.verified AS lawyer_verified

    FROM lawyer_firm
    JOIN lawyer_profile ON lawyer_profile.lawyer_firm = lawyer_firm.firm_name
    WHERE lawyer_firm.verified = 1 AND lawyer_profile.verified = 1
";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("components/links.php");?>
    <link rel="stylesheet" href="assets/css/search-process.css">
    <title>Search result</title>
</head>
<body class='bg-light'>
    <?php include ("components/nav.php");?>
    <br><br><br> 
    <div class="px-3 mt-4">

<?php
// If there's a search query
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_terms = explode(" ", mysqli_escape_string($conn, $_GET['search']));
    $search_conditions = [];
    
    // Loop through each search term and add a LIKE condition
    foreach ($search_terms as $text) {
        $text = htmlspecialchars($text); // Sanitize each search term
        $search_conditions[] = "
            `firm_name` LIKE '%$text%' OR
            `firm_email` LIKE '%$text%' OR
            `firm_about` LIKE '%$text%' OR
            `certification_and_accreditation` LIKE '%$text%' OR
            `date_found` LIKE '%$text%' OR
            `nooflawyers` LIKE '%$text%' OR
            `firm_phone_number` LIKE '%$text%' OR
            `location` LIKE '%$text%' OR
         
          
            `lawyer_email` LIKE '%$text%' OR
            `lawyer_name` LIKE '%$text%' OR
            `lawyer_bio` LIKE '%$text%' OR
            `lawyer_education` LIKE '%$text%' OR
            `lawyer_dob` LIKE '%$text%' OR
            `lawyer_experience` LIKE '%$text%' OR
            `lawyer_rating` LIKE '%$text%' OR
            `lawyer_location` LIKE '%$text%' OR
            `current_position` LIKE '%$text%' OR
            `lawyer_phone_no` LIKE '%$text%' OR
        
            `practice_location` LIKE '%$text%' OR
            `published_articles` LIKE '%$text%' OR
            `supreme_court_number` LIKE '%$text%' OR
            `status` LIKE '%$text%' OR
            `currently_engaged` LIKE '%$text%' OR
            `created_at` LIKE '%$text%' 
    
        ";
    }

    // Join all conditions with OR
    $condition .= " AND (" . implode(' OR ', $search_conditions) . ")";
}

// Pagination
$num_per_page = 20;
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$initial_page = ($page - 1) * $num_per_page;
$condition .= " LIMIT $initial_page, $num_per_page";

// Execute query
$data = mysqli_query($conn, $condition);
if ($data) {
    $datafound = $data->num_rows;
 
    if($datafound>0){

        echo "<div class='text-center float-right'>Found ". $datafound. " results.</div>";

        while ($lawyer = mysqli_fetch_assoc($data)) {

            echo"<div class='shadow search-package my-4'>";  
            echo "<img src=". $lawyer['lawyer_img']. "><br>";
           
            echo"<div class='px-2 text-secondary'>";
            echo "<span class='text-center text-dark fw-bold text-capitalize'>". $lawyer['lawyer_name']. "</span><br>";

            echo "". $lawyer['lawyer_practice_areas']. "<br>";
            echo "<span>". $lawyer['lawyer_location']. "</span><br>";
            echo "". $lawyer['lawyer_experience']. " years experience<br>";
            echo"</div>";

            echo "<div class='d-flex justify-content-between mt-4 px-2'>
            
               <a class='btn border-success border-2 text-sm text-success '>Send message</a>

               <a href='profile.php?id={$id}' class='btn btn-success text-sm text-white '>View profile </a>
            
            </div>";


            echo"</div>";
             
            
        }
        
    }

} else {
    echo "Error: " . mysqli_error($conn);
}
?>
<br><br>
</div>
<?php include ("components/footer.php");?>
</body>
</html>
