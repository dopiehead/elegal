
<?php  session_start();

     require ("engine/config.php");

     $stmt = mysqli_query($conn,"SELECT * FROM user_profile");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php'); ?>
    <link rel="stylesheet" href="assets/css/users.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Users</title>
</head>
<body class='bg-light'>

     <?php include 'components/nav.php'; ?>  

     <br><br><br>

      <div class='mt-4 px-3 d-flex flex-row flex-column'>

         <h4 class='fw-bold'>Users of E-legal</h4>

         <span class='text-sm text-secondary'>Connect with users of E-legal</span>

     </div>
     <br>

     <div class='px-3 mt-5 mt-md-4'>
         
                 
          <div class='package-container d-flex'>

         <?php 

          while($user = mysqli_fetch_array($stmt)){

             if($user){

                 include('components/user-content.php');

                 $extension = strtolower(pathinfo($user['user_img'],PATHINFO_EXTENSION));

                     $image_extension  = array('jpg','jpeg','png'); 
     
         ?>   
                     <div class='package' data-aos='fade-up'>

                         <?php 
                         
                                  if (!in_array($extension , $image_extension)) {

                                     echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($user_name,0,2)."</span></div>";
                           
                                 } else { ?>

                                      <img src="<?php echo htmlspecialchars(trim($user_img)); ?>" alt="elegal">
                               
                         <?php
                         
                                 } 
                         
                         ?>          

                          <div class='d-flex flex-row flex-column p-2'>

                              <span class='text-sm fw-bold text-dark text-capitalize'><?php echo htmlspecialchars(trim($user_name)); ?></span>

                              <span class='text-sm text-secondary text-capitalize'><?php echo htmlspecialchars(trim($user_occupation)); ?></span>

                          </div>

                          <div class='mt-2 d-flex justify-content-between px-3'>

                             <a class='btn btn-success text-white rounded text-sm text-decoration-none' href="pricing-list.php">Get in touch</a>

                             <a class='btn border border-2 border-secondary text-secondary rounded text-sm' href="user-profile.php?id=<?php echo htmlspecialchars($user_id); ?> &&user_type = user">View Profile</a>

                          </div>
                          


                     </div>

         <?php 

             }


         }

         ?>
   

         </div>


     </div>

     <br><br>

     <div class='zoom-in'>
         <?php include ('components/afford.php'); ?>
     </div>

     <br><br>

     <?php include ('components/footer.php');?>

     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>

         AOS.init({     
             duration: 500,   // Transition duration in ms (1.2 seconds)
             easing: 'ease-in-out',   // Easing function for transition

         });
     </script>
    
</body>
</html>