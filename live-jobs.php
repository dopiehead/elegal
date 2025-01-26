<?php  session_start();

     require ("engine/config.php");

     $stmt = mysqli_query($conn,"SELECT * FROM law_jobs");

?>

<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <?php include ('components/links.php'); ?>

     <link rel="stylesheet" href="assets/css/job-application.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Live jobs</title>
</head>
<body class='bg-light'>

    <?php include ("components/nav.php"); ?>
    <br><br>

     <div class="px-5 mt-5">

         <h2 class='fw-bold'>Live jobs</h2>
         <br>

        <?php

          if($stmt){
         
          while($row = mysqli_fetch_array($stmt)){
            
               include('components/live-jobs-content.php'); 

            ?>

         <h5 class='bg-dark text-white fw-bold w-100 m-1 py-2 px-2'>Corporate Lawyer</h5>

         <div data-aos = "fade-up">
             
           <div class='d-flex py-3 px-3'>

                <div class='col-md-8 col-6 d-flex justify-content-space-evenly g-5'>
                     <span class='text-sm'><a class='text-dark bg-white rounded rounded-pill px-3 py-2'><?php echo htmlspecialchars($job_type); ?></a></span>
                     <span class='text-sm'><a class='text-dark bg-white rounded rounded-pill px-3 py-2'><?php echo htmlspecialchars($job_experience); ?> years experience</a></span>
                     <span class='text-sm'><a class='text-dark bg-white rounded rounded-pill px-3 py-2'><?php echo htmlspecialchars (number_format($renumeration));?></a></span>                    
                     <span class='text-sm'><a class='text-dark bg-white rounded rounded-pill px-3 py-2'><?php echo htmlspecialchars($noofapplicants); ?> Candidates</a></span>
                     <span class='text-sm'><a class='text-dark bg-white rounded rounded-pill px-3 py-2'>15 Contacted</a></span>
                </div>

                 <div class='col-md-4 col-6 d-flex flex-row flex-column g-5'>
                     <span class='text-sm'>Expires on <?php echo htmlspecialchars($expiry_date);?></span>
                     <span class='text-sm'><i class='fa fa-eye'> <?php echo htmlspecialchars($job_views);?></i> Views</span>
                 </div>
           </div>



         </div>        
         
         <?php  }


}


?>

     <div>

       <span class='text-sm'>Have a new job listing? <a class='text-dark border-bottom border-2 border-secondary pb-1' href="">Create here</a></span>

     </div>

     </div>

     <br><br><br><br>

     <?php include ("components/footer.php");?>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>

         AOS.init({  

             duration: 500,   // Transition duration in ms (1.2 seconds)
             easing: 'ease-in-out',   // Easing function for transition

         });

     </script>

</body>
</html>