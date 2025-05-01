<?php
session_start();

$lawyer_id = $_SESSION['lawyer_id'] ?? null;
$lawyer_name = $_SESSION['lawyer_name'] ?? null;


if (!$lawyer_id) {
    header("Location: ../login.php");
    exit();
}

require("../engine/config.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- External resources -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/css/dashboard/notifications.css">
    <link rel="stylesheet" href="../assets/css/dashboard/myfirm.css">
</head>

<body class="bg-light">
    <div class="px-1">
        <div class="d-flex gap-3 flex-md-row flex-column">              
            <?php include("navigator.php"); ?>
            
            <div class="dashboard pe-4">
                <h4 class="mt-5">Firm</h4>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Firm name</th>
                                <th>Found date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT 
                                         f.firm_id,
                                         f.firm_name,
                                         f.firm_img,
                                         f.date_found,
                                         p.lawyer_firm_id,
                                         p.lawyer_role,
                                         p.id AS lawyer_id
                                      FROM lawyer_profile p
                                      INNER JOIN lawyer_firm f ON f.firm_id = p.lawyer_firm_id
                                      WHERE p.id = ? AND p.lawyer_role='secretary'";

                            $getfirm = $conn->prepare($query);

                            if (!$getfirm) {
                                echo "<tr><td colspan='3'>Prepare failed: " . $conn->error . "</td></tr>";
                            } else {
                                $getfirm->bind_param("i", $lawyer_id);
                                if ($getfirm->execute()) {
                                    $result = $getfirm->get_result();

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['firm_name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['date_found']) . "</td>";
                                        echo "<td><a onclick='toggle()' class='btn btn-sm btn-primary'>Add case</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>Execution failed: " . $getfirm->error . "</td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class='popup' id="popup">
       <a class='text-white bg-secondary border-white border-2 close' onclick="toggle()">&times;</a> 
     <div>
         <h4>Create Court Case</h4>
         <form id="courtForm" method="POST">

            <!-- Client Name -->
            <div class="mb-3 mt-2">
                <label for="client" class="form-label">Client</label>
                <input type="text" id="client" name="client" class="form-control" required>
            </div>

            <!-- Lawyer Name -->
            <div class="mb-3">
                <label for="lawyer" class="form-label">Lawyer</label>
                <input type="text" id="lawyer" name="lawyer" class="form-control text-capitalize" value="<?= htmlspecialchars($lawyer_name) ?>" required>
            </div>

            <!-- Court Case Number -->
            <div class="mb-3">
                <label for="court_case" class="form-label">Court Case Number</label>
                <input type="number" id="court_case" name="court_case" class="form-control" required>
            </div>

            <!-- Case Status -->
            <div class="mb-3">
                <label for="case_status" class="form-label">Case Status</label>
                <input type="text" id="case_status" name="case_status" class="form-control" required>
            </div>

            <!-- Details (textarea) -->
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea id="details" name="details" class="form-control" rows="4" required></textarea>
            </div>

            <!-- Category of Case -->
            <div class="mb-3">
                <label for="category_of_case" class="form-label">Category of Case</label>
                <input type="text" id="category_of_case" name="category_of_case" class="form-control" required>
            </div>

            <!-- Court Location (select) -->
            <div class="mb-3">
                <label for="court_location" class="form-label">Court Location</label>
                <select id="court_location" name="court_location" class="form-select" required>
                    <option value="" disabled selected>Select Court Location</option>
                    <option value="Court A">Court A</option>
                    <option value="Court B">Court B</option>
                    <option value="Court C">Court C</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <!-- Court Judge -->
            <div class="mb-3">
                <label for="court_judge" class="form-label">Court Judge</label>
                <input type="text" id="court_judge" name="court_judge" class="form-control" required>
            </div>

            <!-- Last Appearance -->
            <div class="mb-3">
                <label for="last_appearance" class="form-label">Last Appearance</label>
                <input type="date" id="last_appearance" name="last_appearance" class="form-control" required>
            </div>

            <!-- Next Appearance -->
            <div class="mb-3">
                <label for="next_appearance" class="form-label">Next Appearance</label>
                <input type="date" id="next_appearance" name="next_appearance" class="form-control" required>
            </div>

            <!-- Court Remark -->
            <div class="mb-3">
                <label for="court_remark" class="form-label">Court Remark</label>
                <input type="text" id="court_remark" name="court_remark" class="form-control" required>
            </div>

            <button name="submit" type="submit" class="btn btn-primary btn-submit"><span class='spinner-border text-light'></span> <span class='submit-note'>Submit</span></button>
         </form>

     </div>
 
 </div>
 <script>   
    function toggle() {
         var popup = document.getElementById('popup');
         popup.classList.toggle('active');
        }
</script>

<script>
    $(document).ready(function () {
        $('.btn-submit').on("click",function (e) {
            e.preventDefault(); // prevent default form submission
            $(".spinner-border").show();
            $(".submit-note").hide();
              let courtForm = $("#courtForm").serialize();
            $.ajax({
                url: '../engine/submit-case.php',
                type: 'POST',
                data: courtForm,
                success: function (response) {
                    $(".spinner-border").hide();
                    $(".submit-note").show();
                    // Trim response to avoid whitespace issues
                    response = response.trim();

                    if (response === "1") {
                        swal({
                            title: "Success",
                            text: "Court case successfully submitted.",
                            icon: "success"
                        });
                        $('#courtForm')[0].reset(); // clear the form
                        $('#popup').hide(100);
                    } else {
                        swal({
                            title: "Notice",
                            text: response,
                            icon: "warning"
                        });
                    }
                },
                error: function (xhr, status, error) {
                    $(".spinner-border").hide();
                    $(".submit-note").show();
                    swal({
                        title: "Error",
                        text: "Something went wrong while submitting the form. Please try again.",
                        icon: "error"
                    });
                    console.error("AJAX Error:", error);
                }
            });
        });
    });
</script>
</body>
</html>

