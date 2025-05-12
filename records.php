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
                    <button href="create-account.php" class="btn btn-sign-in">
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
             <h2 class="mb-4 police-heading fw-bold">Police Reports & Records</h2> 
             <a class='text-white text-decoration-none btn-button' onclick="toggle()">
                 <span style="cursor:pointer;" class='btn rounded-pill bg-button fw-bold text-white pt-1 pb-2 px-2 shadow'>
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
              <span class="spinner-border text-primary" style="display:none;z-index:3000"></span></div>
        <br>
        <div class="w-100">

              <div id="table-container"> </div>

         </div>
     </div>
       
    </div>

      <!-- modal for more details -->
      <div class="popup-details" id="details-container"> </div>
    <!-- Terms of Settlement Section -->
 
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
      
   <!-- modal Filter -->
<?php include("popup-filter.php");?>
    <!-- modal to insert data -->
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
        $(".btn-sign-in").on("click",function(e){
             e.preventDefault();
             let signin = $(".btn-sign-in").attr("href");
             window.location.href = signin;
    });
    </script>

</body>
</html>