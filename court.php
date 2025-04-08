<?php session_start();

     require ("engine/config.php");

     $federal_court = mysqli_query($conn,"SELECT * FROM courts WHERE court_type = 'federal'");
     $state_court = mysqli_query($conn,"SELECT * FROM courts WHERE court_type = 'state'");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php'); ?>
    <link rel="stylesheet" href="assets/css/court.css">
    <title>Court</title>
</head>
<body class='bg-light'>
     <?php include("components/nav.php"); ?>
     <br><br>

     <div class='px-3 mt-5 mb-4' data-aos='fade-up'>

         <h2 class='fw-bold'>Know all you need to about courts in Nigeria</h2>
         <span class='text-sm'>The Nigerian constitution recognizes courts as either Federal or State courts. A primary difference between both is that the President appoints justices/judges to federal courts, while State Governors appoint judges to state courts.</span>


     </div>
     <br>

     <div class='px-3 mt-4' data-aos='fade-up'>

         <h4 class='fw-bold'>Federal Courts</h4>
         <br>

         <div class='package'>

         <?php 

              while ($court = mysqli_fetch_array($federal_court)) {
         
                   if($court){
             
                      include('components/court-content.php');

                      $extension = strtolower(pathinfo($court_img,PATHINFO_EXTENSION));

                      $image_extension  = array('jpg','jpeg','png'); 

          ?>

                          <div class='package-container d-flex flex-row flex-column'>

                    <?php 
                    
                          if (!in_array($extension , $image_extension)) {

                             echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($court_name,0,2)."</span></div>";                  

                         } else { ?>     

                             <img src="<?php echo htmlspecialchars($court_img); ?>" alt="elegal">

                         <?php }  ?>

                             <div class='mt-4 px-2'>

                                  <h6 class='fs-6 fw-bold'><?php echo htmlspecialchars($court_name); ?></h6>


                             </div>

                             <div class='mt-3 px-3'>

                                 <a class='text-secondary btn border border-2 border-secondary ' href="court-profile.php?id=<?php echo htmlspecialchars($court_id); ?>&&court_type=federal">Learn more</a>

                             </div>


                         </div>
                   

         <?php  

                  }

             }


         
         ?>

         </div>    

     </div>

     <br>

     <div class='px-3 mt-5' data-aos='fade-up'>

         <h4 class='fw-bold mb-3'>State Courts</h4>

         <div class='package mt-2'>

         <?php 

              while ($court = mysqli_fetch_array($state_court)) {
         
                   if($court){
             
                      include('components/court-content.php');

                      $extension = strtolower(pathinfo($court_img,PATHINFO_EXTENSION));

                      $image_extension  = array('jpg','jpeg','png');

          ?>
                          <div class='package-container d-flex flex-row flex-column'>

                          <?php 
                    
                               if (!in_array($extension , $image_extension)) {

                                  echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($court_name,0,2)."</span></div>";                  

                              } else { ?>     
    
 
                               <img src="<?php echo htmlspecialchars($court_img); ?>" alt="elegal">
                         
                               <?php } ?>


                               <div class='mt-4 px-2'>

                                   <h6 class='fs-6 fw-bold'><?php echo htmlspecialchars($court_name); ?></h6>


                               </div>

                               
                             <div class='mt-3 px-3'>

                             <a class='text-secondary btn border border-2 border-secondary ' href="court-profile.php?id=<?php echo htmlspecialchars($court_id); ?>&&court_type=state">Learn more</a>

                             </div>


                         </div>
         <?php

                   }


                }


         ?>


         </div>
         
         <div class='mt-4'>

             <span class='text-sm w-75 w-md-100'>Each of the states (currently thirty-six) is constitutionally allowed to have all of these courts. However, the predominantly Muslim northern states tend to have Sharia courts rather than Customary courts. The predominantly Christian southern states tend to have Customary courts and not Sharia courts.</span>
    

         </div>
 </div>


     <div class='px-3 mt-5'>

         <h4 class='fw-bold'>Court Divisions</h4>

         <div class='text-center mt-4 container'>
             
             <table class='table-responsive w-100'>

                  <thead>

                      <tr class='fw-bold'>

                        <th >Divisions</th>
                        <th>Areas</th>                       

                      </tr>

                  </thead>

                  <tbody>

                     <tr>

                         <td>Abuja (Head quaters)</td>
                         <td>Shehu Shagari Way, Central District</td>

                     </tr>

                     <tr>

                         <td>Abakiliki</td>
                         <td>C/o High Court of Justice, Abakaliki, Ebonyi State</td>

                     </tr>

                     <tr>
                         
                         <td>Abeokuta</td>
                         <td>IBB, Boulevard, Kobape Road, Adjacent Federal Secretariat, Oke-Mosan, P.M.B. 2118, Abeokuta</td>
 
                     </tr>

                     <tr>

                         <td>Ado-Ekiti</td>
                         <td>Iyin Road, Ado-Ekiti, Ekiti State</td>

                     </tr>

                     <tr>

                         <td>Awka</td>
                         <td>Customary Court of Appeal Complex, Court Road, Akwa, Anambra State.</td>

                     </tr>

                     <tr>
                         
                         <td>Akure</td>
                         <td>Quarter 33,Bode George Road, Alagbaka G.R.A. P.M.B 641, Akure</td>


                     </tr>

                     <tr>

                         <td>Asaba</td>
                         <td>Plot 97, Phase 111, High Court Road, P.M.B. 91026, Asaba, Delta.</td>

                     </tr>

                     <tr>
                          <td>Bauchi</td>
                          <td>No. 4 Club Close, Off Dalhatu Bafarawa Street, GRA Bauchi. Bauchi State.</td>

                     </tr>

                     <tr>
                        <td>Benin</td>
                        <td>1, Iwogban Road Off Benin-Auchi Road, Ikpoba Hill,  P.M.B. 1190, Benin City.</td>

                     </tr>
                     
                     <tr>
                        
                         <td>Calabar</td>
                         <td>Muritala Muhammed High Way, Calabar C/River State, P.M.B. 1225, Calabar.</td>
                         
                     </tr>

                     <tr>
                        <td>Damaturu</td>
                        <td>Adjacent to Sharia Court of appeal Complex, Maiduguri Road, Damaturu, Yobe State.</td>
                     </tr>

                     <tr>

                        <td>Dutse</td>
                        <td>Ali Sa’ad Drive, Dutse, Jigawa State.</td>

                     </tr>



                  </tbody>
      



             </table>


         </div>


     </div>





     <br><br>
     <?php include("components/footer.php"); ?>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>

         AOS.init({     
             duration: 500,   // Transition duration in ms (1.2 seconds)
             easing: 'ease-in-out',   // Easing function for transition

    });
  </script>
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->    
</body>
</html>