<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <?php include ('components/links.php');?>
     <link rel="stylesheet" href="assets/css/pricing-list.css">
     <title>Pricing List</title>
     <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- FontAwesome for icons -->
</head>
<body class='bg-light'>
     <div class="container py-5">

          <!-- Header Section -->
          <div class="text-center mb-5">
               <h4 class="fw-bold">Consult a Lawyer</h4>
               <p class="text-muted">Choose a package that suits your needs.</p>
          </div>

          <!-- Pricing Plans Section -->
          <div class="row row-cols-1 row-cols-md-3 g-4">
               
               <!-- Basic Package -->
               <div class="col">
                    <div class="card border-light shadow-sm rounded p-4">
                         <h5 class="card-title text-center text-primary">Basic Package</h5>
                         <div class="text-center mb-3">
                              <span class="fw-bold fs-3">NGN 1000</span><br>
                              <span class="text-secondary">per day</span>
                         </div>
                         <ul class="list-unstyled">
                              <li><i class="fa fa-circle text-success"></i> Chat with your choice of lawyer</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all lawyers</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all features</li>
                              <li><i class="fa fa-circle text-success"></i> Consult with experts</li>
                              <li><i class="fa fa-circle text-success"></i> Renew daily</li>
                         </ul>
                         <div class="text-center mt-4">
                              <button class="btn btn-outline-dark rounded-pill py-2 px-4">Pay</button>
                         </div>
                    </div>
               </div>

               <!-- Gold Package -->
               <div class="col">
                    <div class="card border-warning shadow-sm rounded p-4">
                         <h5 class="card-title text-center text-warning">Gold Package</h5>
                         <div class="text-center mb-3">
                              <span class="fw-bold fs-3">NGN 2500</span><br>
                              <span class="text-muted">weekly</span>
                         </div>
                         <ul class="list-unstyled">
                              <li><i class="fa fa-circle text-success"></i> Chat with your choice of lawyer</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all lawyers</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all features</li>
                              <li><i class="fa fa-circle text-success"></i> Consult with experts</li>
                              <li><i class="fa fa-circle text-success"></i> Renew weekly</li>
                              <li><span class="text-success fw-bold">Save NGN 21,000</span></li>
                         </ul>
                         <div class="text-center">
                              <button class="btn btn-warning text-white rounded-pill py-2 px-4">Pay</button>
                         </div>
                    </div>
               </div>

               <!-- Platinum Package -->
               <div class="col">
                    <div class="card border-light shadow-sm rounded p-4">
                         <h5 class="card-title text-center text-info">Platinum Package</h5>
                         <div class="text-center mb-3">
                              <span class="fw-bold fs-3">NGN 4000</span><br>
                              <span class="text-secondary">monthly</span>
                         </div>
                         <ul class="list-unstyled">
                              <li><i class="fa fa-circle text-success"></i> Chat with your choice of lawyer</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all lawyers</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all features</li>
                              <li><i class="fa fa-circle text-success"></i> Consult with experts</li>
                              <li><i class="fa fa-circle text-success"></i> Renew daily</li>
                              <li><span class="text-success fw-bold">Save NGN 27,000</span></li>
                         </ul>
                         <div class="text-center">
                              <button class="btn btn-info text-white rounded-pill py-2 px-4">Pay</button>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Expert Consultation Offer -->
          <div class="text-center mt-5">
               <p class="text-muted">Consult an expert from <b class="text-success">Essential Nigeria</b> for just NGN 3000 monthly</p>
          </div>

     </div>

     <!-- Bootstrap JS and Popper.js -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->
</body>
</html>
