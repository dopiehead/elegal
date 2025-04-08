<?php session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: ../login.php");
    exit();
}
else{
    require("../engine/config.php");
    include 'admin-content.php';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert@1.1.3/dist/sweetalert.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@1.1.3/dist/sweetalert.min.js"></script>



    <style>
        body {
            background-color: #f4f6f9;
            font-family:poppins;
        }

        .active-link{
            background-color:rgb(77, 158, 89);
        }

        .nav-link{
            cursor: pointer;
        }

        img{
            height:60px;
            width:80px;
            object-fit:cover;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            background-color: #2c3e50;
            color: white;
            overflow-y: auto;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .sidebar-nav .nav-link {
            color: white;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }
        .sidebar-nav .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .sidebar-nav .nav-link i {
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">

                <div class="position-sticky">

                    <div class="p-4 text-center">
                         <h3 class="text-white">Admin Panel</h3>
                    </div>

                    <ul class="nav flex-column sidebar-nav">

                        <li class="nav-item">

                             <a class="nav-link active-link" id="btn-jobs" ><i class="bi bi-journal-code"></i> Jobs</a>
                        </li>

                        <li class="nav-item">
                             <a class="nav-link" id="btn-applications" ><i class="bi bi-journal-code"></i> Job applications</a>
                        </li>

                        <li class="nav-item">
                             <a class="nav-link" id="btn-court"><i class="bi bi-hammer"></i> Court</a>
                        </li>
                                               
                        <li class="nav-item">
                             <a class="nav-link" id="btn-users"><i class="bi bi-person-circle"></i> Users</a>
                        </li>
                        
                        <li class="nav-item">
                             <a class="nav-link" id="btn-lawyers"><i class="bi bi-nut"></i>Lawyers</a>
                        </li>
                        
                        <li class="nav-item">
                             <a class="nav-link" id="btn-firms"><i class="bi bi-buildings-fill"></i> Firms</a>
                        </li>
                         
                        <li class="nav-item">
                             <a class="nav-link" id="btn-library"><i class="bi bi-collection"></i> Library</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="change_password"><i class="bi bi-key"></i> Change Password</a>
                        </li>

                        <li class="nav-item">

                             <hr class='border border-2 border-white w-100'>  
                        </li>

                        <li class="nav-item text-center">

                            <a class=" mt-1 text-white text-decoration-none" href="../dashboard/logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>

                        </li>

                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between align-items-center my-4">
                    
                    <div class='text-center w-100 m-3'>
                        
                         <span class='spinner-border text-success fs-4'></span>
                         
                    </div>
         
                </div>

                    
                <div class="table-responsive">

                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>

   $(document).ready(function() {

      $(".spinner-border").hide();

      // Default active link behavior (when the page loads)

      $("#btn-lawyers").trigger("click"); 

      // Update active link when any nav-link is clicked
      $(".nav-link").click(function(e) {

         $(".spinner-boder").show();

         e.preventDefault();
         
         // Remove active from all links
         $(".nav-link").removeClass("active-link");
         
         // Add active class to the clicked link
         $(this).addClass("active-link");

         // Determine which button to trigger based on clicked link
         var targetPage = $(this).attr("id");

         // Load the corresponding content in the table
         loadPageContent(targetPage);
      });

      // Define the content loading logic
      function loadPageContent(pageId) {
         var pageMap = {
            "btn-users": "users.php",
            "btn-lawyers": "lawyers.php",
            "btn-firms": "firm.php",
            "btn-library": "libraries.php",
            "btn-court": "courts.php",
            "btn-jobs": "jobs.php",
            "btn-applications": "job-applicants.php",
            "change_password": "change-password.php"
         };

         if (pageMap[pageId]) {
            $(".spinner-border").hide();
            $(".table-responsive").load(pageMap[pageId]);
         }
      }

      // Load content for each button on click
      $("#btn-users").click(function(e) {
         e.preventDefault();
         loadPageContent("btn-users");
      });

      $("#btn-lawyers").click(function(e) {
         e.preventDefault();
         loadPageContent("btn-lawyers");
      });

      $("#btn-firms").click(function(e) {
         e.preventDefault();
         loadPageContent("btn-firms");
      });

      $("#btn-library").click(function(e) {
         e.preventDefault();
         loadPageContent("btn-library");
      });

      $("#btn-court").click(function(e) {
         e.preventDefault();
         loadPageContent("btn-court");
      });

      $("#btn-jobs").click(function(e) {
         e.preventDefault();
         loadPageContent("btn-jobs");
      });

      $("#btn-applications").click(function(e) {
         e.preventDefault();
         loadPageContent("btn-applications");
      });

      $("#change_password").click(function(e) {
         e.preventDefault();
         loadPageContent("change_password");
      });

   });
</script>



<script>
  $(document).on('click', '.btn-verify', function(e) {
    e.preventDefault();
    var id = $(this).attr("id");

    $.ajax({
      type: "POST",
      url: "verify_user.php",               
      data: { id: id },               
      success: function(response) {
        if (response == 1) {
          swal({
            title: "Success",
            text: "User Supreme Court Number Verified",
            icon: "success",
          });

          // Update the text after success
          $("#pending").text("Verified");
          $(".verify").text("Unverify");
        } else {
          console.log("Failed");

          // Corrected SweetAlert for failure
          swal("Failed", "Unable to verify Supreme Court Number", "error");
        }
      }
    });
  });
</script>

<script>
  $(document).on('click', '.btn-unverify', function(e) {
    e.preventDefault();
    var id = $(this).attr("id");

    $.ajax({
      type: "POST",
      url: "unverify_user.php",               
      data: { id: id },               
      success: function(response) {
        if (response == 1) {
          swal({
             title: "Success",
             text: "User Supreme Court Number unverified",
             icon: "success",
          });

          // Update the text after success
          $("#pending").text("pending");
          $(".verify").text("unverified");
        } else {
          console.log("Failed");

       
          swal("Failed", "Unable to unverify Supreme Court Number", "error");
        }
      }
    });
  });
</script>
</body>
</html>