<?php

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
     

         <br><br>

         <div class='px-3 mt-5'>



             <div class='col-md-6'>


                 <div class='d-flex into px-2 py-2 g-3'>


                      <div class='profile_img'>

                          <img src="<?php echo htmlspecialchars($img); ?>" alt="">

                      </div>

                     
                      <div class='d-flex flex-row flex-column'>
                     
                         <span class='fs-6 fw-bold text-capitalize text-details'><?php echo strtolower(htmlspecialchars($name)); ?></span><br>
                         <span class='text-capitalize text-details text-sm'>Associate</span>
                         <span class='text-capitalize text-details text-sm'><?php echo htmlspecialchars($practice_areas); ?></span>
                         <span class='text-capitalize text-sm text-details'><i class='fa fa-envelope'></i> <?php echo htmlspecialchars($email); ?></span>
                         <span class='text-capitalize text-sm text-details'><i class='fa fa-phone'></i> <?php echo htmlspecialchars($phone_number); ?></span>



                      </div>

                 </div>


             </div>




             <div class='col-md-6'>



             </div>

         </div>


        <br><br>

        <?php include 'components/footer.php'; ?> 
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
     
    
</body>
</html>