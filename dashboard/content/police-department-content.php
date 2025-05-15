<?php     

$userId = $_SESSION['police_id'];
$userEmail = $_SESSION['police_email'];
$user_type = "police department";   

date_default_timezone_set('Africa/Lagos');
date_default_timezone_get();
$dateToday = date("F d, Y");

$query = "SELECT * FROM police_department WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $userId);     
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    
    function getValue($array, $key, $default = "not available") {
        return isset($array[$key]) && !empty($array[$key]) ? $array[$key] : $default;
    }

    // ✅ Correctly mapped variables from police_department table
    $department_id = getValue($row, 'id');
    $police_department = getValue($row, 'police_department');
    $department_email = getValue($row, 'department_email');
    $department_head = getValue($row, 'department_head');
    $immediate_reporting_officer = getValue($row, 'immediate_reporting_officer');
    $department_phone_number = getValue($row, 'department_phone_number');
    $zonal_head = getValue($row, 'zonal_head');
    $department_location = getValue($row, 'department_location');
    $lga = getValue($row, 'lga');
    $full_address = getValue($row, 'full_address');
    $department_password = getValue($row, 'department_password'); // avoid exposing this in real app
    $vkey = getValue($row, 'vkey');
    $verified = getValue($row, 'verified');
    $created_at = getValue($row, 'created_at');

} else {
    echo "No department found.";
}

mysqli_stmt_close($stmt);   
?>
