<?php

$counter = "";
require("config.php");
$gettotal = $conn->prepare("SELECT * FROM police_records WHERE active = 0");
if($gettotal->execute()){
    $resultTotal = $gettotal->get_result();
    $totalRecords =  $resultTotal->num_rows;
    $num_per_page = 20;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $initial_page = ($page - 1) * $num_per_page;
    $from = $initial_page + 1;
    $to = min($initial_page + $num_per_page, $totalRecords);
}  
    echo"
    <div style='color:var(--primary-purple);' class='d-flex justify-content-between align-content-center'>
       <span class='fw-bold text-danger'>Total number of record: ". $totalRecords."</span>
        <p> ".$from." - ".$to." of <span class='fw-bold'>".$totalRecords."</span></p>
    </div>";

    echo"<div style='height:500px;' class='overflow-auto table-parent bg-light rounded rounded-5 px-4'>";

// Build base query
$baseQuery = "SELECT * FROM police_records WHERE active = 0";
// Handle search query
if (isset($_POST['q']) && !empty($_POST['q'])) {
    $search = explode(" ", $conn->real_escape_string($_POST['q']));
    foreach ($search as $text) {
        $escaped = $conn->real_escape_string($text);
        $baseQuery .= " AND (
            `record_id` LIKE '%$escaped%' OR
            `offender_name` LIKE '%$escaped%' OR
            `offence` LIKE '%$escaped%' OR
            `point_of_arrest` LIKE '%$escaped%' OR
            `state_of_arrest` LIKE '%$escaped%' OR
            `date_of_arrest` LIKE '%$escaped%' OR
            `time_of_arrest` LIKE '%$escaped%' OR   
            `bailed_by` LIKE '%$escaped%' OR
            `bail_condition` LIKE '%$escaped%' OR
            `next_appearance` LIKE '%$escaped%' OR
            `terms_of_settlement` LIKE '%$escaped%' OR
            `court_process` LIKE '%$escaped%' OR
            `court_date` LIKE '%$escaped%' OR
            `court_location` LIKE '%$escaped%' OR
            `police_station_lga` LIKE '%$escaped%' OR
            `comments_about_case` LIKE '%$escaped%' OR
            `people_arrested` LIKE '%$escaped%' OR
            `reason_for_arrest` LIKE '%$escaped%' OR
            `officer_in_charge` LIKE '%$escaped%' OR
            `dco_remark` LIKE '%$escaped%' OR
            `dpo_remark` LIKE '%$escaped%' OR
            `court_remark` LIKE '%$escaped%' OR
            `counter_officer` LIKE '%$escaped%' OR
            `case_reported_by` LIKE '%$escaped%' OR
            `arrested_by` LIKE '%$escaped%' OR
            `complainant` LIKE '%$escaped%' OR
            `complain_category` LIKE '%$escaped%' OR
            `mug_shot` LIKE '%$escaped%' OR
            `thumb_print` LIKE '%$escaped%' OR
            `nationality` LIKE '%$escaped%' OR
            `profession` LIKE '%$escaped%' OR
            `age` LIKE '%$escaped%' OR
            `address` LIKE '%$escaped%' OR
            `next_of_kin` LIKE '%$escaped%' OR
            `place_of_work` LIKE '%$escaped%' OR
            `phone_number` LIKE '%$escaped%' OR
            `employer_name` LIKE '%$escaped%' OR
            `employer_number` LIKE '%$escaped%' OR
            `employer_address` LIKE '%$escaped%' OR
            `religion` LIKE '%$escaped%' OR
            `tribe` LIKE '%$escaped%' OR
            `lga` LIKE '%$escaped%' OR
            `height` LIKE '%$escaped%'
        )";        
    }
}

// Activity filter (date-only handling with string conversion)
$activityFilter = isset($_POST['activityFilter']) && !empty($_POST['activityFilter']) ? $conn->real_escape_string($_POST['activityFilter']) : "";
if ($activityFilter) {
    if ($activityFilter === 'daily') {
         $baseQuery .= " AND DATE(date_of_arrest) = CURDATE()";
    } elseif ($activityFilter === 'weekly') {
         $baseQuery .= " AND YEARWEEK(STR_TO_DATE(date_of_arrest, '%Y-%m-%d'), 1) = YEARWEEK(CURDATE(), 1)";
    } elseif ($activityFilter === 'monthly') {
         $baseQuery .= " AND DATE_FORMAT(STR_TO_DATE(date_of_arrest, '%Y-%m-%d'), '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')";
    } elseif ($activityFilter === 'yearly') {
         $baseQuery .= " AND YEAR(STR_TO_DATE(date_of_arrest, '%Y-%m-%d')) = YEAR(CURDATE())";
    }
}

// Location filter
$locationFilter = isset($_POST['locationFilter']) && !empty($_POST['locationFilter']) ? $conn->real_escape_string($_POST['locationFilter']) : "";
if ($locationFilter) {
     $baseQuery .= " AND state_of_arrest LIKE '%$locationFilter%'";
}

// Category filter
$categoryFilter = isset($_POST['categoryFilter']) && !empty($_POST['categoryFilter']) ? $conn->real_escape_string($_POST['categoryFilter']) : "";
if ($categoryFilter) {
     $baseQuery .= " AND complain_category LIKE '%$categoryFilter%'";
}

// Order By handling
$orderBy = isset($_POST['orderBy']) ? $_POST['orderBy'] : 'date_of_arrest_DESC';
switch ($orderBy) {
    case 'date_of_arrest_DESC':
        $baseQuery .= " ORDER BY date_of_arrest DESC";
        break;
    case 'date_of_arrest_ASC':
        $baseQuery .= " ORDER BY date_of_arrest ASC";
        break;
    case 'offender_name_ASC':
        $baseQuery .= " ORDER BY offender_name ASC";
        break;
    case 'offender_name_DESC':
        $baseQuery .= " ORDER BY offender_name DESC";
        break;
    case 'age_ASC':
        $baseQuery .= " ORDER BY age ASC";
        break;
    case 'age_DESC':
        $baseQuery .= " ORDER BY age DESC";
        break;
    case 'court_date_ASC':
        $baseQuery .= " ORDER BY court_date ASC";
        break;
    case 'court_date_DESC':
        $baseQuery .= " ORDER BY court_date DESC";
        break;
    default:
        $baseQuery .= " ORDER BY date_of_arrest DESC";
        break;
}

// Pagination


$finalQuery = $baseQuery . " LIMIT $initial_page, $num_per_page";
$counter = $initial_page + 1;

$excludedFields = [
    'active', 'mug_shot', 'medical_condition', 'age', 'nationality', 'profession', 'address', 'phone_number',
    'religion', 'tribe', 'lga', 'height', 'next_of_kin',
    'place_of_work', 'employer_name', 'employer_number', 'employer_address'
];

// Execute query
$getlist = $conn->prepare($finalQuery);
if ($getlist->execute()) {
    $result = $getlist->get_result();
    echo "<table class='table table-bordered' border='2'>";

    if ($result->num_rows > 0) {
        $firstRow = $result->fetch_assoc();

        echo "<thead><tr>";
        echo "<th class='fw-bold'>Number</th>"; 
        foreach (array_keys($firstRow) as $header) {
            if (!in_array($header, $excludedFields)) {
                echo "<th class='fw-bold text-capitalize'>" . htmlspecialchars(preg_replace('/_/', ' ', $header)) . "</th>";
            }
        }
        echo"<th class='fw-bold'>Action</th>";
        echo "</tr></thead><tbody>";
        // First row

         echo "<tr>";
         echo "<td>".$counter++."</td>";
        foreach ($firstRow as $key => $value) {
              if ($key === 'record_id') {
                    $value = encryptId($value); // Encrypt record_id only
                }
                if (!in_array($key, $excludedFields)) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
        }
        echo"<td><a class=' btn-more btn text-more' id='".$firstRow['record_id']."'>View details</a></td>";
        echo "</tr>";

        // Remaining rows
        while ($row = $result->fetch_assoc()) {
         
            echo "<tr>";
            echo "<td>".$counter++."</td>";
            foreach ($row as $key => $value) {
                if ($key === 'record_id') {
                    $value = encryptId($value); // Encrypt record_id only
                }
                if (!in_array($key, $excludedFields)) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }

            }

            echo"<td><a class=' btn-more btn  text-more' id='".$row["record_id"]."'>View details</a></td>";
            
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<tr><td colspan='100%'>No records found.</td></tr></table>";
    }
}
echo"</div>";
// Pagination display

$total_num_page = ceil($totalRecords / $num_per_page);
$radius = 2;
echo "<div class='text-center mt-3'>";
if ($page > 1) {
     $previous = $page - 1;
     echo '<span id="page_num"><a class="btn btn-pagination btn-success mx-1 prev" id="' . $previous . '">&lt;</a></span>';
}

for ($i = 1; $i <= $total_num_page; $i++) {
    if (($i >= 1 && $i <= $radius) || ($i > $page - $radius && $i < $page + $radius) || ($i <= $total_num_page && $i > $total_num_page - $radius)) {
        if ($i == $page) {
            echo '<a class="btn btn-pagination btn-success active-button mx-1" id="' . $i . '">' . $i . '</a>';
        } else {
            echo '<a class="btn btn-pagination btn-outline-success mx-1" id="' . $i . '">' . $i . '</a>';
        }
    } elseif ($i == $page - $radius || $i == $page + $radius) {
        echo "... ";
    }
}

if ($page < $total_num_page) {
    $next = $page + 1;
    echo '<span id="page_num"><a class="btn btn-pagination btn-success mx-1 next" id="' . $next . '">&gt;</a></span>';
}
echo "</div>";
?>
<?php
function encryptId($id) {
    $secret = 73829; // A secret multiplier (prime number is a good choice)
    $offset = 123456789; // Optional additive offset
    return ($id * $secret) + $offset;
}

function decryptId($encrypted) {
    $secret = 73829;
    $offset = 123456789;
    return (int)(($encrypted - $offset) / $secret);
}
?>


