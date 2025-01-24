<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #f4f6f9;
            font-family:poppins;
        }

        .active-link{
            background-color:rgb(77, 158, 89);
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
                            <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <h1 class="h2">Users Management</h1>
         
                </div>

                <!-- User Table -->
                <div class="table-responsive">

                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      
      $("#btn-users").click(function(e){
         e.preventDefault();
         $(".table-responsive").load("users.php");
        

      });
          
      $("#btn-lawyers").click(function(e){
         e.preventDefault();
         $(".table-responsive").load("lawyers.php");

      });

      $("#btn-firms").click(function(e){
         e.preventDefault();
         $(".table-responsive").load("firm.php");

      });

      $("#btn-library").click(function(e){
         e.preventDefault();
         $(".table-responsive").load("libraries.php");

      });

 
      $("#btn-court").click(function(e){
         e.preventDefault();
         $(".table-responsive").load("courts.php");

      });


      $("#btn-jobs").click(function(e){
         e.preventDefault();
         $(".table-responsive").load("jobs.php");

      });

       $("#btn-applications").click(function(e){
              e.preventDefault();
         $(".table-responsive").load("job-applicants.php");
       });

      $(document).ready(function(){
         
         $("#btn-jobs").click();
         

      });

      $("#change_password").click(function(e){
         e.preventDefault();
         $(".table-responsive").load("change-password.php");
          
      });
   


    </script>
</body>
</html>