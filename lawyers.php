
<?php

     require ("engine/config.php");

     $stmt = mysqli_query($conn,"SELECT * FROM lawyer_profile");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include ('components/links.php'); ?>
    <link rel="stylesheet" href="assets/css/lawyers.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Lawyers</title>
</head>
<body class='bg-light'>

     <?php include 'components/nav.php'; ?>  
    <br><br><br>

             <div class='px-3 mt-5'>

                 <div class = 'd-flex g-3 flex-row flex-column' >

                      <h4 class='fw-bold'>Lawyers of E-legal</h4>

                      <span class='text-sm'>Discover the best representatives across Nigeria</span>


                  </div>

                  <br><br>

                  <div class='package-container d-flex justify-content-evenly flex-md-row flex-column g-5' data-aos = 'fade-up'>

                    
                     <?php 

                          while($lawyer = mysqli_fetch_array($stmt)){

                             if($lawyer){

                                 include('components/lawyer-profile.php');
                               

                     ?>

                                  <div class='package'>

                                      <img src="<?php echo  htmlspecialchars($img); ?>" alt="elegal">

                                      <div class='px-2 d-flex flex-row flex-column mt-1'>

                                         <span>Assosiate at <?php htmlspecialchars($firm); ?> Law firm</span>

                                         <span class='text-sm text-secondary'><?php echo htmlspecialchars($experience);?> years experience</span>

                                         <span class='text-sm text-secondary'><?php echo htmlspecialchars($state);?> State</span>

                                         <span class='text-sm text-secondary'><?php  echo htmlspecialchars($practice_areas); ?></span>

                                          <span>
                                         
                                              <i class='fa fa-star'></i>
                                              <i class='fa fa-star'></i>
                                              <i class='fa fa-star'></i>
                                              <i class='fa fa-star'></i>
                                              <i class='fa fa-star'></i>   

                                         </span>

                                          <div class='d-flex justify-content-between mt-2'>

                                             <a class='btn text-success border border-2 border-success px-2 rounded text-sm' href="">Send message</a>
                                             <a class='btn btn-success text-white px-2 text-sm' href="">View Profile</a>

                                         </div>

                                      </div>




                                  </div><br>

                     <?php 

                              



                             }

                         }



                     ?>

                      


                  </div>




             </div>

             <br><br>

             <?php include 'components/advert.php';?>


     <br><br>

     <?php include 'components/footer.php'; ?>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>

         AOS.init({     
             duration: 500,   // Transition duration in ms (1.2 seconds)
             easing: 'ease-in-out',   // Easing function for transition

    });
  </script>

    
</body>
</html>