<?php
require("config.php");
$date = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO police_records (
        offender_name, age, nationality, profession, address, phone_number,
        religion, tribe, lga, height, next_of_kin, place_of_work, employer_name,
        employer_number, employer_address, medical_condition, mug_shot, thumb_print,
        offence, reason_for_arrest, point_of_arrest, state_of_arrest, date_of_arrest,
        time_of_arrest, arrested_by, people_arrested, date_of_release, bailed_by,
        bail_condition, next_appearance, court_process, court_date, court_location,
        court_remark, terms_of_settlement, complainant, complain_category,
        case_reported_by, counter_officer, officer_in_charge, dco_remark, dpo_remark,
        police_station_lga, comments_about_case, date, active
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "sisssssssssssssssssssssssssssssssssssssssssii",
            $_POST['offender_name'] ?? "",
            $_POST['age'] ?? 0,
            $_POST['nationality'] ?? "",
            $_POST['profession'] ?? "",
            $_POST['address'] ?? "",
            $_POST['phone_number'] ?? "",
            $_POST['religion'] ?? "",
            $_POST['tribe'] ?? "",
            $_POST['lga'] ?? "",
            $_POST['height'] ?? "",
            $_POST['next_of_kin'] ?? "",
            $_POST['place_of_work'] ?? "",
            $_POST['employer_name'] ?? "",
            $_POST['employer_number'] ?? "",
            $_POST['employer_address'] ?? "",
            $_POST['medical_condition'] ?? "",
            $_POST['mug_shot'] ?? "",
            $_POST['thumb_print'] ?? "",
            $_POST['offence'] ?? "",
            $_POST['reason_for_arrest'] ?? "",
            $_POST['point_of_arrest'] ?? "",
            $_POST['state_of_arrest'] ?? "",
            $_POST['date_of_arrest'] ?? "",
            $_POST['time_of_arrest'] ?? "",
            $_POST['arrested_by'] ?? "",
            $_POST['people_arrested'] ?? "",
            $_POST['date_of_release'] ?? "",
            $_POST['bailed_by'] ?? "",
            $_POST['bail_condition'] ?? "",
            $_POST['next_appearance'] ?? "",
            $_POST['court_process'] ?? "",
            $_POST['court_date'] ?? "",
            $_POST['court_location'] ?? "",
            $_POST['court_remark'] ?? "",
            $_POST['terms_of_settlement'] ?? "",
            $_POST['complainant'] ?? "",
            $_POST['complain_category'] ?? "",
            $_POST['case_reported_by'] ?? "",
            $_POST['counter_officer'] ?? "",
            $_POST['officer_in_charge'] ?? "",
            $_POST['dco_remark'] ?? "",
            $_POST['dpo_remark'] ?? "",
            $_POST['police_station_lga'] ?? "",
            $_POST['comments_about_case'] ?? "",
            $date,
            0
        );

        if ($stmt->execute()) {
            echo "1";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Preparation failed: " . $conn->error;
    }
}
?>
