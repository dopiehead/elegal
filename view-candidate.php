
<?php session_start(); ?>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <?php include ('components/links.php'); ?>

     <link rel="stylesheet" href="assets/css/view-candidate.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>View Candidates</title>

</head>

<body class='bg-light'>

     <?php include ("components/nav.php");?>
     <br><br><br>
     
     <div class='container d-flex justify-content-between mt-5'>

         <h3 class='fw-bold'>Total applicants</h3>

         <button class='border border-2 border-secondary py-1 px-2 text-sm sms-send'>Send bulk SMS</button>

     </div>

     <br><br>

     <div class='container'>

     <div class='row'>



  
          <div class='col-md-6'>

          <div class='bg-secondary py-3 px-2 text-white'>

               <div>

                   <img src="" alt="">

              </div>

              <div>

                  <h6 class='fw-bold'>Nneka Harry</h6> 

                  <span>Corporate, family, constitutional law</span> 
        
                   <div class='mt-4'>

                       <a class='text-white pb-2 border-bottom border-2 border-white' href="">View application</a>

                  </div>

              </div>

         </div>

     </div>    
        
        
     <div class='col-md-6'>

         <div class='bg-secondary py-3 px-2 text-white'>

                 <div>

                     <img src="" alt="">

                 </div>
             
                 <div>

                     <h6 class='fw-bold'>Nneka Harry</h6> 

                     <span>Corporate, family, constitutional law</span> 

                     <div class='mt-4'>

                         <a class='text-white pb-2 border-bottom border-2 border-white' href="">View application</a>

                     </div>

                  </div>

         </div>

     </div> 

</div>    
    

     <div class='row'>

         <div class='col-md-6'>

             <div class='bg-secondary py-3 px-2 text-white'>

                 <div>

                      <img src="" alt="">

                 </div>

                 <div>

                     <h6 class='fw-bold'>Nneka Harry</h6> 

                     <span>Corporate, family, constitutional law</span> 
        
                     <div class='mt-4'>

                         <a class='text-white pb-2 border-bottom border-2 border-white' href="">View application</a>
                      </div>
                 </div>

             </div>

         </div> 


         <div class='col-md-6'>

             <div class='bg-secondary py-3 px-2 text-white'>

                 <div>

                     <img src="" alt="">

                 </div>

                 <div>

                      <h6 class='fw-bold'>Nneka Harry</h6> 

                     <span>Corporate, family, constitutional law</span> 
        
                     <div class='mt-4'>

                          <a class='text-white pb-2 border-bottom border-2 border-white' href="">View application</a>

                      </div>

                 </div>

             </div>

         </div> 

     </div>

     </div>
 
     <br><br>

     <?php include("components/footer.php");?>
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->
</body>

</html>