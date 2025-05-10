<?php
require("config.php");
$date = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO police_records (
        offender_name, offence, point_of_arrest, date_of_arrest, time_of_arrest,
        date_of_release, bailed_by, bail_condition, next_appearance, terms_of_settlement,
        court_process, court_date, court_location, police_station_lga, comments_about_case,
        people_arrested, reason_for_arrest, officer_in_charge, dco_remark, dpo_remark,
        court_remark, counter_officer, case_reported_by, arrested_by, complainant,
        complain_category, mug_shot, thumb_print, nationality, profession,
        age, address, next_of_kin, place_of_work, phone_number, employer_name,
        employer_number, employer_address, religion, tribe, lga, height,
        date, active
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "sssssssssssssssssssssssssssssssssssssssssssii",
            $_POST['offender_name'] ?? "",
            $_POST['offence'] ?? "",
            $_POST['point_of_arrest'] ?? "",
            $_POST['date_of_arrest'] ?? "",
            $_POST['time_of_arrest'] ?? "",
            $_POST['date_of_release'] ?? "",
            $_POST['bailed_by'] ?? "",
            $_POST['bail_condition'] ?? "",
            $_POST['next_appearance'] ?? "",
            $_POST['terms_of_settlement'] ?? "",
            $_POST['court_process'] ?? "",
            $_POST['court_date'] ?? "",
            $_POST['court_location'] ?? "",
            $_POST['police_station_lga'] ?? "",
            $_POST['comments_about_case'] ?? "",
            $_POST['people_arrested'] ?? "",
            $_POST['reason_for_arrest'] ?? "",
            $_POST['officer_in_charge'] ?? "",
            $_POST['dco_remark'] ?? "",
            $_POST['dpo_remark'] ?? "",
            $_POST['court_remark'] ?? "",
            $_POST['counter_officer'] ?? "",
            $_POST['case_reported_by'] ?? "",
            $_POST['arrested_by'] ?? "",
            $_POST['complainant'] ?? "",
            $_POST['complain_category'] ?? "",
            $_POST['mug_shot'] ?? "",
            $_POST['thumb_print'] ?? "",
            $_POST['nationality'] ?? "",
            $_POST['profession'] ?? "",
            $_POST['age'] ?? "",
            $_POST['address'] ?? "",
            $_POST['next_of_kin'] ?? "",
            $_POST['place_of_work'] ?? "",
            $_POST['phone_number'] ?? "",
            $_POST['employer_name'] ?? "",
            $_POST['employer_number'] ?? "",
            $_POST['employer_address'] ?? "",
            $_POST['religion'] ?? "",
            $_POST['tribe'] ?? "",
            $_POST['lga'] ?? "",
            $_POST['height'] ?? "",
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
