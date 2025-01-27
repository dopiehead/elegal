<?php session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['lawyer_id']) && !isset($_SESSION['firm_id'])){
    $_SESSION['id']= null;
    $_SESSION['firm_id']= null;
    $_SESSION['lawyer_id']= null;
}


require ("engine/config.php");

if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = $_GET['id'];

 if(isset($_GET['user_type']) && !empty($_GET['user_type'])){
 
      $user_type = $_GET['user_type'];

      if($user_type =='lawyer'){

          $stmt = mysqli_query($conn,"SELECT * FROM lawyer_profile WHERE id ='".$id."'");
        
          while($lawyer = mysqli_fetch_array($stmt)){

             if($lawyer){

                  include 'components/lawyer-profile.php';

                  $extension = strtolower(pathinfo($img,PATHINFO_EXTENSION));

                  $image_extension  = array('jpg','jpeg','png'); 

             } else {
           
            header("Location: index.php");

            exit;

             }
         }

      }



      if($user_type=='user'){

         $stmt = mysqli_query($conn,"SELECT * FROM user_profile WHERE id ='".$id."'");
        
         while($user = mysqli_fetch_array($stmt)){

              if($user){

                 include 'components/user-profile.php';

             } else {
         
                   header("Location: index.php");

                    exit;

             }
         }

     }



}

}


?>

<?php 


function format_paragraphs($text) {
    // Trim whitespace and then split by double new lines (paragraphs)
    $paragraphs = preg_split('/\n\s*\n/', trim($text));

    // Loop through the paragraphs and wrap each one in <p> tags
    foreach ($paragraphs as &$paragraph) {
        $paragraph = '<p>' . htmlspecialchars(trim($paragraph)) . '</p>';
    }

    // Join the paragraphs back together with newlines or spaces (optional)
    return implode("\n", $paragraphs);
}

?>


<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include ('components/links.php'); ?>
     <link rel="stylesheet" href="assets/css/index.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
     <title>Profile</title>
</head>
<body class='bg-light'>

         <?php include 'components/nav.php'; ?>  

         <link rel="stylesheet" href="assets/css/profile.css">
     

         <br><br><br>

 <div class='px-3'>

     <div class='col-md-6 intro d-flex flex-md-row flex-column mt-5  px-3 py-2 g-3'>

          <div class='profile_img'>
  
              <?php  if (!in_array($extension , $image_extension)) {

                 echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($user_name,0,2)."</span></div>";                  

             } else { ?>  

                 <img src="<?php echo htmlspecialchars($img); ?>" alt="">

             <?php    }   ?> 

         </div>

    
         <div class='d-flex flex-row flex-column intro-content'>
    
             <span class='fs-6 fw-bold text-capitalize text-details'><?php echo strtolower(htmlspecialchars($name)); ?></span><br>
              <span class='text-capitalize text-details text-sm'>Associate</span>
              <span class='text-capitalize text-details text-sm'><?php echo htmlspecialchars($practice_areas); ?></span>

              <?php if(isset($_SESSION['id']) && isset($_SESSION['id']) && isset($_SESSION['id'])){?>
              <span class='text-capitalize text-sm text-details'><i class='fa fa-envelope'></i> <?php echo htmlspecialchars($email); ?></span>
              <span class='text-capitalize text-sm text-details'><i class='fa fa-phone'></i> <?php echo htmlspecialchars($phone_number); ?></span>
              <?php } else {?>                 
                <span class='text-capitalize text-sm text-details'><i class='fa fa-envelope'></i> <a class='text-details text-decoration-none' href='pricing-list.php'>Click to see more</a></span>
                <span class='text-capitalize text-sm text-details'><i class='fa fa-phone'></i> <a class='text-details text-decoration-none' href='pricing-list.php'>Click to see more</a></span>

             <?php } ?>
         </div>

     </div>

     <div class='col-md-6'>

     </div>

 </div>




         <div class='px-4 mt-5 d-flex flex-md-row flex-column'>

             <div class='col-md-6'>

                 <div>
                     <h4 class='mt-4 fw-bold'>EDUCATION</h4>

                         <?php
                      
                              $edu = explode(",",$education);
                              foreach($edu as $school){
                                 echo "<span class='text-uppercase text-sm d-flex flex-row flex-column'>". htmlspecialchars(trim($school))."</span> ";
                              }

                         ?>
                   
                 </div>

                 <div>

                     <h4 class='fw-bold text-uppercase mt-4'> practice areas </h4>

                     <?php
                      
                         $practice = explode(",",$practice_areas);
                             foreach($practice as $areas){
                                 echo "<span class='text-uppercase text-sm d-flex flex-row flex-column'>". htmlspecialchars(trim($areas))."</span> ";
                             }

                     ?>



                 </div>

                 <div>
                  
                     <button class='btn border border-2 border-secondary text-secondary text-sm mt-3 '>Send message</button>

                 </div>

             </div>




             <div class='col-md-6 d-flex flex-row flex-column'>

             <span class='text-sm'><?php echo format_paragraphs($about); ?></span>

             <a class='btn btn-secondary text-white mt-3 text-sm w-25' href="">Get in touch</a>

             </div>



         </div>


         <div class='px-4 py-2 mt-5'>
              
             <div>

                 <h6 class='fw-bold m-4'>Top review</h4>

                 <div class='mb-2 mt-2'>

                      <div class='top-contents'>

                         <div class='top-container g-5'>

                             <div class='d-flex justify-content-flex-start g-3 py-3 px-2'>

                                     <img class='top-img rounded rounded-circle' src="assets/images/woman.png" alt="">

                                     <div class='d-flex flex-row flex-column'>
                                         <span class='text-sm text-dark text-capitalize fw-bold'>Jane doe</span>
                                         <span class='text-sm text-secondary text-capitalize'>Business fraud case</span>
                                     </div>

                             </div>

                         
                                 <p class='text-sm text-secondary mt-3'>Every day, they strive to improve their service to the clients by developing the right blend of technology and creativity to make sure every job done is done as efficiently as possible</p>



                         </div>

                         <div class='top-container g-5'>

                             <div class='d-flex justify-content-flex-start g-3 py-3 px-2'>

                                     <img class='top-img rounded rounded-circle' src="assets/images/woman.png" alt="">

                                     <div class='d-flex flex-row flex-column'>

                                         <span class='text-sm text-dark text-capitalize fw-bold'>Jane Doe</span>
                                         <span class='text-sm text-secondary text-capitalize'>Business fraud case</span>
                                     </div>

                             </div>

                         
                                 <p class='text-sm text-secondary mt-3'>Every day, they strive to improve their service to the clients by developing the right blend of technology and creativity to make sure every job done is done as efficiently as possible</p>



                         </div>

                         <div class='top-container g-5'>

                             <div class='d-flex justify-content-flex-start g-3 py-3 px-2'>

                                     <img class='top-img rounded rounded-circle' src="assets/images/woman.png" alt="">

                                     <div class='d-flex flex-row flex-column'>
                                         <span class='text-sm text-dark text-capitalize fw-bold'>Jane doe</span>
                                         <span class='text-sm text-secondary text-capitalize'>Business fraud case</span>
                                     </div>

                             </div>

                         
                                 <p class='text-sm text-secondary mt-3'>Every day, they strive to improve their service to the clients by developing the right blend of technology and creativity to make sure every job done is done as efficiently as possible</p>



                         </div>



                      </div>
                      
                 </div>

             </div>

         </div>


        <br><br>

        <?php include 'components/footer.php'; ?> 
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>
         AOS.init();
     </script>


       <script>
  
          $('.top-contents').flickity({
          cellAlign: 'left',
          contain: true,
          autoPlay:true,
          freeScroll: true,
          friction:0.52,       

  });

</script>
     
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->   
</body>
</html>