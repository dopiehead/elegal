<?php

require("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $errors = [];

    $client = htmlspecialchars($_POST['client']);
    if (empty($client)) {
        $errors[] = "Client is required.";
    }
    
    $lawyer = htmlspecialchars($_POST['lawyer']);
    if (empty($lawyer)) {
        $errors[] = "Lawyer is required.";
    }
    
    $court_case = intval($_POST['court_case']);
    if (empty($_POST['court_case']) || $court_case <= 0) {
        $errors[] = "Court case ID must be a positive number.";
    }
    
    $case_status = htmlspecialchars($_POST['case_status']);
    if (empty($case_status)) {
        $errors[] = "Case status is required.";
    }
    
    $details = htmlspecialchars($_POST['details']);
    if (empty($details)) {
        $errors[] = "Case details are required.";
    }
    
    $category_of_case = htmlspecialchars($_POST['category_of_case']);
    if (empty($category_of_case)) {
        $errors[] = "Category of case is required.";
    }
    
    $court_location = htmlspecialchars($_POST['court_location']);
    if (empty($court_location)) {
        $errors[] = "Court location is required.";
    }
    
    $court_judge = htmlspecialchars($_POST['court_judge']);
    if (empty($court_judge)) {
        $errors[] = "Court judge is required.";
    }

    $paid = 0;

    $unpaid = 0;
    
    $last_appearance = $_POST['last_appearance'];
    if (empty($last_appearance)) {
        $errors[] = "Last appearance date is required.";
    }
    
    $next_appearance = $_POST['next_appearance'];
    if (empty($next_appearance)) {
        $errors[] = "Next appearance date is required.";
    }
    
    $court_remark = htmlspecialchars($_POST['court_remark']);
    if (empty($court_remark)) {
        $errors[] = "Court remark is required.";
    }
     
    if (!empty($errors)) {
        foreach ($errors as $error) {?>
             <?= htmlspecialchars($error)." " ?>
            
      <?php  }
        // Stop script execution if needed
        exit;
    }
    
    // Your DB connection code here (assuming $conn is your DB connection)
    // Example: Prepare and execute the query to store the data in the database

    $query = "INSERT INTO court_cases (client, lawyer, court_case, case_status, paid, unpaid, details, category_of_case, court_location, court_judge, last_appearance, next_appearance, court_remark)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssissssssssss", $client, $lawyer, $court_case, $case_status, $paid, $unpaid, $details, $category_of_case, $court_location, $court_judge, $last_appearance, $next_appearance, $court_remark);

    if ($stmt->execute()) {
        echo "1";
    } else {
        echo "Error submitting court case: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>