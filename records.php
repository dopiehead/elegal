<html lang="en">
<head>

     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Legal Records Hub - Records</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap Icons -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet"> 
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link rel="stylesheet" href="assets/css/record.css">

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" stroke="#6f42c1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 22V12h6v10" stroke="#6f42c1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                eLegal Records Hub
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="police-records.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="records.php">Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="police-record-about.php">About</a>
                    </li>
                </ul>
                <div class="ms-auto d-flex align-items-center">
                    <button class="btn btn-sign-in">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                    </button>
                    <button class="btn btn-help">
                        <i class="bi bi-question-circle me-1"></i> Help
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Records Table -->
    <div class="container records-table">
        <div class='d-flex justify-content-between'>
             <h2 class="mb-4">Police Reports & Records</h2> 
             <a class='text-white text-decoration-none btn-add' onclick="toggle()">
                 <span style="cursor:pointer;" class='btn bg-warning fw-bold text-dark pt-1 pb-2 px-2 shadow'>
                      <i class='fa fa-plus'></i>
                      Add new record
                 </span>
             </a>
        </div>
        
        <div class='rounded rounded-pill border-0 shadow-lg py-3 ps-2 pe-3 d-flex justify-content-around'>
            
             <input name="q" id="q" type="search" class='form-control rounded rounded-pill border-0 search-box' placeholder="&#xF002;  Live search" style="font-family:Arial,Fontawesome;"> 
            
             <div class="">
                <a class='text-danger bg-light filter-button' onclick="filter()">
                    <span class="fas fa-sliders fa-2x"></span>
                </a>
            </div>
            
        </div>
        
        <br>
               
        <br>
        <div class='w-100 d-flex justify-content-center align-items-center'>
              <span class="spinner-border text-success" style="display:none;z-index:3000"></span></div>
        <br>
        <div class="w-100">

            <div style="height:500px;" class="overflow-auto table-parent bg-light rounded rounded-5 px-4">

                 <div id="table-container">

                 </div>

             </div>
     </div>
       
    </div>

     <!-- Case Overview Section -->
     <section class="case-overview">
        <div class="container">
            <h2>Case Overview</h2>
            <div class="case-details">
                <div class="case-item">
                    <div class="case-label">Case Title:</div>
                    <div class="case-value">Withdrawal of Commerciality</div>
                </div>
                <div class="case-item">
                    <div class="case-label">Case Number:</div>
                    <div class="case-value"><span class="case-number">PN-2023-BCA</span></div>
                </div>
                <div class="case-item">
                    <div class="case-label">Filing Date:</div>
                    <div class="case-value">Mar 24, 2023</div>
                </div>
                <div class="case-item">
                    <div class="case-label">Resolution Date:</div>
                    <div class="case-value">Mar 28, 2023</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms of Settlement Section -->
    <section class="terms-settlement">
        <div class="container">
            <h2>Terms of Settlement</h2>
            <div class="terms-content">
                <div class="terms-left">
                    <div class="terms-item">
                        <p><strong>1. Stipulations:</strong> The parties hereto agree to the following stipulations:</p>
                    </div>
                    <div class="terms-item">
                        <p><strong>2. Obligations of the Parties:</strong></p>
                    </div>
                </div>
                <div class="terms-right">
                    <div class="terms-item">
                        <p><strong>Explanations for Terms:</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Relevant Notes Section -->
    <section class="notes-section">
        <div class="container">
            <h2>Relevant Notes</h2>
            
            <div class="note-item">
                <p>- Legal Counsel's Comment: These documents are pivotal as they not only provide insight into the client's current standing but also illuminate the long-term implications for the client's future legal positioning.</p>
            </div>
            
            <div class="note-item">
                <p>- Case Implication: The case's outcome could set a significant legal precedent, influencing future court decisions and shaping the interpretation of key legal principles.</p>
            </div>
            
            <div class="note-item">
                <p>- Additional Context: The significantly more affordable legal costs associated with one option could be a decisive factor in the client's choice, making it a compelling reason for their preference.</p>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <h3>Subscribe to our newsletter</h3>
            <form class="newsletter-form">
                <input type="email" placeholder="Input your email" class="form-control">
                <button type="submit" class="btn">Subscribe</button>
            </form>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <a href="#" class="footer-logo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" stroke="#6f42c1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 22V12h6v10" stroke="#6f42c1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                eLegal Records Hub
            </a>
            
            <div class="footer-links">
                <a href="#">Pricing</a>
                <a href="#">About us</a>
                <a href="#">Features</a>
                <a href="#">Help Center</a>
                <a href="#">Contact us</a>
                <a href="#">FAQs</a>
                <a href="#">Careers</a>
            </div>
            
            <div class="footer-bottom">
                <div>
                    <select class="form-select form-select-sm">
                        <option>English</option>
                 
                    </select>
                </div>
                
                <p>© 2024 E-legal, Inc • Privacy • Terms • Sitemap</p>
                
                <div class="social-icons">
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>
    
    
   <!-- Popup Filter -->
<div class="popup-filter position-fixed  bg-white shadow p-4 border rounded" style="z-index: 999; display: none;">
    <!-- Close Button -->
    <div class="d-flex justify-content-end">
        <button class="btn-close" aria-label="Close" onclick="filter()"></button>
    </div>

    <!-- Header -->
    <h5 class="fw-bold border-bottom pb-2 mb-3">Filter Records</h5>

    <!-- Filter Form -->
    <form>
        <div class="mb-3">
            <label for="activityFilter" class="form-label fw-bold">Select by Activity</label>
            <select name="activityFilter" id="activityFilter" class="form-select text-capitalize">
                <option value="">All</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="locationFilter" class="form-label fw-bold">By Location</label>
            <select name="locationFilter" id="locationFilter" class="form-select text-capitalize">
                <option value="">All</option>
                <?php
                require("engine/connection.php");
                $getstate = $con->prepare("SELECT DISTINCT state FROM states_in_nigeria");
                if ($getstate->execute()) {
                    $result_state = $getstate->get_result();
                    while ($data_state = $result_state->fetch_assoc()) { ?>
                        <option value="<?= htmlspecialchars($data_state['state']) ?>"><?= htmlspecialchars($data_state['state']) ?></option>
                    <?php }
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="categoryFilter" class="form-label fw-bold">By Category</label>
            <select name="categoryFilter" id="categoryFilter" class="form-select text-capitalize">
                <option value="">All</option>
                <option>Missing</option>
                <option>Armed Robbery</option>
                <option>Stolen Vehicles</option>
                <option>Death Cases</option>
                <option>Rape Cases</option>
                <option>Murder Cases</option>
                <option>Kidnap Cases</option>
                <option>Manslaughter</option>
                <option>Assault</option>
                <option>Domestic Violence</option>
            </select>
        </div>

        <div class="mb-3">
        <label for="orderBy" class="form-label fw-bold">Sort By</label>         
        <select name="orderBy" id="orderBy" class="form-select text-capitalize">
            <option value="date_of_arrest_DESC" >Date of Arrest (Newest)</option>
            <option value="date_of_arrest_ASC">Date of Arrest (Oldest)</option>
            <option value="offender_name_ASC" >Offender Name (A-Z)</option>
            <option value="offender_name_DESC">Offender Name (Z-A)</option>
            <option value="age_ASC">Age (Youngest First)</option>
            <option value="age_DESC">Age (Oldest First)</option>
            <option value="court_date_ASC" >Court Date (Earliest First)</option>
            <option value="court_date_DESC">Court Date (Latest First)</option>
        </select>

        </div>
    </form>
</div>
 
<?php include("popup.php");?>
     
    <!-- jQuery (v3.7.1) CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        function toggle(){
            $(".popup").toggle();
        }
        function filter(){
            $(".popup-filter").toggle();
        }
    </script>

<script>
    $("#table-container").load("engine/police-record-engine.php");

    $("#q").on("keyup", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        getData(x);
    });

    $("#activityFilter").on("change", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        getData(x, activityFilter);
    });  
    
    $("#locationFilter").on("change", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        getData(x, activityFilter, locationFilter);
    });   
    
    $("#categoryFilter").on("change", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        let categoryFilter = $("#categoryFilter").val();
        getData(x, activityFilter, locationFilter, categoryFilter);
    });


    $("#activityFilter, #locationFilter, #categoryFilter").on("change", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        let categoryFilter = $("#categoryFilter").val();
        getData(x, activityFilter, locationFilter, categoryFilter);
    });

    $("#orderBy").on("change",function(e){
         e.preventDefault();
        let orderBy = $("#orderBy").val();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        let categoryFilter = $("#categoryFilter").val();
        getData(x, activityFilter, locationFilter, categoryFilter,orderBy);
    });
 

    $(document).on("click", ".btn-success", function(e) {
        e.preventDefault();
        let x = $("#q").val();
        let activityFilter = $("#activityFilter").val();
        let locationFilter = $("#locationFilter").val();
        let categoryFilter = $("#categoryFilter").val();
        let orderBy = $("#orderBy").val();
        let page = $(this).attr("id");
        getData(x, activityFilter, locationFilter, categoryFilter, orderBy, page);
    });

    function getData(x, activityFilter, locationFilter, categoryFilter, orderBy, page) {
        $(".spinner-border").show();
        $.ajax({
            url: "engine/police-record-engine.php",
            type: "POST",
            data: {
                "q": x,
                "activityFilter": activityFilter,
                "locationFilter": locationFilter,
                "categoryFilter": categoryFilter,
                "orderBy": orderBy,
                "page": page
            },
            success: function(data) {
                $(".spinner-border").hide();
                $("#table-container").html(data).show();
            },
            error: function(xhr,status, error) {
                $(".spinner-border").hide(); // Hide the spinner on error
                 console.error("AJAX Error:", status, error); // Log the error details
                 $("#table-container").html("<div class='alert alert-danger w-100'>An error occurred while loading the data. Please try again later.</div>");
            }
        });
    }
</script>

</body>
</html>