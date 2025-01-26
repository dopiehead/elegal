<?php session_start();

     require ("engine/config.php");

     $stmt = mysqli_query($conn,'SELECT * FROM law_jobs');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php'); ?>
    <link rel="stylesheet" href="assets/css/jobs.css">
    <title>Jobs</title>
   
</head>
<body class='bg-light'>
     <?php include("components/nav.php"); ?> 
     <br><br>
     <div class='px-3 mt-5'>

        <h4 class='fw-bold'>Discover the perfect job for you</h4>
        <span class='text-sm'>Connect with firms today!</span>

     </div>
     <br><br>

     <div>
          
     <div class='package-container mt-4 px-3' data-aos='fade-up'>

     <?php 

         while($job = mysqli_fetch_array($stmt)){

             if($job){

                  include('components/jobs-content.php');

                  $extension = strtolower(pathinfo($company_image,PATHINFO_EXTENSION));

                  $image_extension  = array('jpg','jpeg','png'); 


     ?>

                <div class='package shadow'>


                <?php   if (!in_array($extension , $image_extension)) {

                           echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($user_name,0,2)."</span></div>";                  

                 } else { ?>   
                          <img src="<?php echo htmlspecialchars($company_image); ?>" alt="">

                  <?php } ?>
                  
                         <div class='px-3 d-flex flex-row flex-column  mt-1'>

                              <span class='text-dark fw-bold'><?php echo htmlspecialchars($company_name); ?></span>
                              <span class='text-secondary text-sm mt-2'><?php echo htmlspecialchars($established); ?></span>
                              <span class="text-secondary text-sm"><?php echo htmlspecialchars($nooflawyers); ?> lawyers</span>
                              <span class="text-sm text-secondary"><?php echo htmlspecialchars($job_location); ?></span>
                              <span class="text-sm text-secondary"><?php echo htmlspecialchars($practice_areas); ?></span>

                              <div>
                                  <span class='fa fa-star'></span>
                                  <span class='fa fa-star'></span>
                                  <span class='fa fa-star'></span>
                                  <span class='fa fa-star'></span>
                                   <span class='fa fa-star'></span>
                             </div>

                        <div class='d-flex justify-content-between mt-1'>
                          
                             <a class='btn btn-success text-white text-sm' href="job-application.php?id=<?php echo htmlspecialchars($job_id); ?>">Apply</a>

                             <a class='btn border border-2 border-success rounded text-success text-sm' href="job-profile.php?id=<?php echo htmlspecialchars($job_id); ?>">View Profile</a>

                        </div>

                    </div>
                    <br>

                </div>


<?php 

            }

        }

?>

          </div>

     </div>

     <div class='mt-3 px-2' data-aos='fade-left'>
         
         <a class='text-dark border-bottom border-bottom-2 border-bottom-dark' href="job-application.php">Are you hiring? Create a job application here</a>
       
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
</body>
</html>