<?php 

$userId = $_SESSION['police_id'];
$you = $_SESSION['police_email'];
$user_type = "police";     

$query = "SELECT * FROM police_officer WHERE officer_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $userId);     
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    
    function getValue($array, $key, $default = "not available") {
        return isset($array[$key]) && !empty($array[$key]) ? $array[$key] : $default;
    }

    // Use correct column names
    $officer_id = getValue($row, 'officer_id');
    $police_name = getValue($row, 'police_name');
    $email = getValue($row, 'email');
    $rank_name = getValue($row, 'rank_name');
    $next_of_kin = getValue($row, 'next_of_kin');
    $relationship = getValue($row, 'relationship');
    $next_of_kin_telephone = getValue($row, 'next_of_kin_telephone');
    $police_phone_number = getValue($row, 'police_phone_number');
    $team = getValue($row, 'team');
    $location = getValue($row, 'location');
    $password = getValue($row, 'password');
    $vkey = getValue($row, 'vkey');
    $verified = getValue($row, 'verified');
    $date_created = getValue($row, 'date');

} else {
    echo "No user found.";
}
mysqli_stmt_close($stmt);   
?>
