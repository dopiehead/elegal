<?php

     require ("engine/config.php");

     $stmt = mysqli_query($conn,'SELECT * FROM lawyer_firm');

?>



<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <?php include ('components/links.php'); ?>

     <link rel="stylesheet" href="assets/css/firm.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Firm</title>
</head>
<body>

 
     <?php include 'components/nav.php';?>
     <br><br><br>

     <div class='px-3 d-flex flex-row flex-column' data-aos='fade-up'>

         <div class='mt-5 mb-3'>

             <h4 class='fw-bold'>Law Firms of E-Legal</h4>
             <span class='mt-3'>Discover the best law firms across Nigeria</span>

         </div>

         <div class='package-container mt-4'>

         <?php 

               while($firm = mysqli_fetch_array($stmt)){

                  if($firm){

                       include('components/firm-content.php');

                       $extension = strtolower(pathinfo($firm_img,PATHINFO_EXTENSION));

                       $image_extension  = array('jpg','jpeg','png'); 

         ?>

                         <div class='package'>

                               <?php   if (!in_array($extension , $image_extension)) {

                                     echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:180px;'>".substr($firm_name,0,2)."</span></div>";                  

                               } else { ?>                               

                                     <img src="<?php echo htmlspecialchars($firm_img); ?>" alt="">
                              
                                     <?php } ?>

                             <div class='px-3 d-flex flex-row flex-column mt-1'>

                                 <span class='text-dark fw-bold'><?php echo htmlspecialchars($firm_name); ?></span>
                                 <span class='text-secondary text-sm mt-2'><?php echo htmlspecialchars($nooflawyers); ?></span>
                                 <span class="text-secondary text-sm"><?php echo htmlspecialchars($found_date); ?></span>
                                 <span class="text-sm text-secondary"><?php echo htmlspecialchars($firm_location); ?></span>
                                 <div>
                                      <span class='fa fa-star'></span>
                                      <span class='fa fa-star'></span>
                                      <span class='fa fa-star'></span>
                                      <span class='fa fa-star'></span>
                                      <span class='fa fa-star'></span>
                                 </div>

                                 <div class='d-flex justify-content-between mt-1'>
                                   
                                      <a class='btn btn-success text-white text-sm' href="">Get in Touch</a>

                                      <a class='btn border border-2 border-success rounded text-success text-sm' href="firm-profile.php?id=<?php echo htmlspecialchars($firm_id); ?>">View Profile</a>

                                 </div>



                             </div>




                         </div>


         <?php 

                              


     
                     }

                 }



         ?>



         </div>

         <div class='mt-2'>

              <a class='text-dark border-bottom border-bottom-2 border-dark p-1 mt-1 text-decoration-none' href="">View Lawyers around you</a>

         </div>
       
         <br><br>

         <div class='text-center' data-aos='fade-up'>

               <a class='btn text-secondary border border-2 border-secondary' href="firm-register.php">Register your firm</a>

         </div>
         <br><br>

         <div class='d-flex py-4 flex-md-row flex-column'>

              <div class='d-flex flow-row flex-column g-3 col-md-8'  data-aos='fade-right'>

                  <h3 class='fw-bold find-out'>Find out who is hiring today!
            Get connected to reputable firms with the click of a button.</h3>
                 <a class='btn btn-success rounded text-sm btn-viewjobs mt-2' href="https://www.ejobs.ng">View jobs</a>


             </div>

             <div class='col-md-4 img-background d-flex justify-conntent-end'  data-aos='fade-left'>
                  
                  <img src="assets/images/seeker.png" alt="elegal">


             </div>

         </div>

    </div>

    <br><br>
    <?php include 'components/footer.php';?>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>

         AOS.init({     
             duration: 500,   // Transition duration in ms (1.2 seconds)
             easing: 'ease-in-out',   // Easing function for transition

    });
  </script>
    
    
</body>
</html>