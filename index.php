<?php require ("engine/config.php");

      $condition = "SELECT * FROM lawyer_profile";

      $stmt = mysqli_query($conn,$condition);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php'); ?>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Homepage</title>
</head>
<body class='bg-light'>

     <?php include 'components/nav.php'; ?>  
    
     <div class='hero-section'>

      <div class='hero-text px-3 '>

          <h1>Welcome to E-Legal</h1>

          <p>Let us help you navigate all the aspects of the law. 
          We are here for you!</p>

          <a class='text-dark bg-white btn border mt-3 border-2' href="create-account.php">Get started</a>

      </div>

</div>

     <br><br>
     
     <div class='section-about container'>
         
         <h5 class='text-uppercase text-center my-4 fw-bold'>What we offer</h5><br>

         <div class='d-flex justify-content-center g-5 mt-3 tabs-link'>


             <div class='g-3 py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm text-decoration-none'><a class='text-dark text-decoration-none' href='lawyers.php?category=pro bono'> Pro Bono </a></h6>

             </div>


             
             <div class='g-3 py-1'  data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=constitutional law'>Constitutional Law </a></h6>

             </div>


             <div class=' g-3 py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=company law'>Company Law </a></h6>

             </div>


             <div class=' g-3 py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                  <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=family law'>Family Law </a></h6>

             </div>

             <div class=' g-3  py-1' data-aos='fade-up'>

                  <img src="assets/images/carbon_building.png" alt="elegal">

                   <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=international law'>International law </a></h6>

             </div>

             <div class=' g-3 py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=property law'>Property Law </a></h6>

             </div>


             <div class='g-3  py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=labour law'>Labour Law</h6>

             </div>

             <div class='g-3  py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=administrative law'>Administrative Law </a></h6>

             </div>

             <div class='g-3 py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=constitutional'>Constitutional Law </a></h6>

             </div>


             <div class=' g-3  py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=energy law'>Energy Law </a></h6>

             </div>


             <div class=' g-3  py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                  <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=public law'>Public Law </a></h6>

             </div>

             <div class=' g-3  py-1' data-aos='fade-up'>

                  <img src="assets/images/carbon_building.png" alt="elegal">

                   <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=customary law'>Customary law </a></h6>

             </div>

             <div class=' g-3  py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=administrative law'>Admiralty Law </a></h6>

             </div>


             <div class='g-3  py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=nigerian legislature law'>Nigerian legislature Law </a></h6>

             </div>

             <div class='g-3  py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark' href='lawyers.php?category=the literal rule'>The literal rule </a></h6>

             </div>

             <div class='g-3  py-1' data-aos='fade-up'>

                 <img src="assets/images/carbon_building.png" alt="elegal">

                 <h6 class='fw-bold text-sm'><a class='text-dark text-decoration-none' href='lawyers.php?category=common law'>Common Law </a></h6>

             </div>

         </div>

     </div>

     <br>


     <div  class='px-3 section-voluteer'>
          
         <div class='d-flex flex-md-row flex-column'>
              
             <div class='col-md-3' data-aos='fade-right' data-aos-delay="300">
                 
                 <img src="assets/images/guy-smiling.png" alt="elegal">
         
             </div>

             <div class='col-md-9 volunteer-content'>

                  <div class='d-flex flex-row flex-column'  data-aos='fade-left'>
                  
                       <h3 class='fw-bold'>Volunteer with us</h3>

                       <p>Over 14,000 highly trained volunteers support the delivery of our service. Our volunteers come from a range of backgrounds and find volunteering rewarding, challenging and fun. </p>

                       <p>We have a range of roles in local Citizens Advice and Witness Service, want to find out more?</p>

                       <a class='btn btn-dark text-white  text-sm' href='volunteer.php'>Become a volunteer</a>
                  
                 </div>


             </div>


         </div>

     </div>


     
</div>

<div class='need-container py-2 py-5 mt-5'>

<div class='need-content container' data-aos='fade-up'>

    <div class='d-flex flex-row flex-column g-3'>

        <h3 class='fw-bold text-white'>Need a Lawyer</h3>

        <p class='text-white'>Leave your details and we’ll be in touch within 24 hours</p>

    </div>


    <div>

     <a class='btn btn-secondary text-white rounded' href="lawyers.php">Get in touch</a>

     </div>

</div>

</div>

<br><br>

 <div>

     <div class='d-flex px-2 justify-content-center align-items-center flex-md-row flex-column'>

         <div class='col-md-6 d-flex justify-content-end flex-row flex-column g-3' data-aos='zoom-in'>
          
             <h4 class='fw-bold'>DISCOVER E-LEGAL</h4>

             <p class='text-sm'>We Are E-Legal, the people’s champion. We give people the knowledge and confidence they need to find their way forward - whoever they are, and whatever their problem.

              We are here to help everyone who needs it with practical advice you can really trust. Our national charity and network of local charities offer confidential advice online, over the phone, and in person, for free.</p>

              <span class=' btn btn-dark text-white px-2 py-1'><a class='text-white text-decoration-none' href='create-account.php'>Sign up here</a></span>

         </div>


         <div class='col-md-6 py-3' data-aos='zoom-in'>

              <iframe class='w-100' height="315" src="https://www.youtube.com/embed/EdwAiHpN1Mg?si=6wyEkzyAnfufyvaZ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

         </div>

     </div>

 
 </div>

 <br>

<?php include "components/advert.php"; ?>

 <br><br>

 <div class='container connect-lawyers px-2'>
   
     <div>

          <h3 class='fw-bold my-3 '>Connect with top Lawyers</h3>

          <br>

          <div class='d-flex justify-content-evenly g-5 flex-md-row flex-column'>

          <?php 

                 $condition = "SELECT * FROM lawyer_profile limit 2";

                 $stmt = mysqli_query($conn,$condition);
                  
                 while($lawyer = mysqli_fetch_array($stmt)){

                     if($lawyer){

                         include('components/lawyer-profile.php');
   

   ?>

             <div class='connect-content col-md-6 d-flex  flex-md-row flex-column' data-aos='fade-up-left'>

                 <div>

                     <img class='w-100' src="<?php echo htmlspecialchars($img); ?>" alt="elegal">

                 </div>

                 <div class='d-flex justify-content-between '>

                     <div class='d-flex flex-column flex-row justify-content-center h-100'>
                         <br>
                         <h5 class='fw-bold ml-1 mt-2'><?php echo htmlspecialchars($name); ?></h5>
                         <span class='text-sm ml-2'>Partner</span>
                         <span class='text-sm ml-2'><?php echo htmlspecialchars($practice_areas);?></span>
                         <span class='text-sm ml-2'><?php echo htmlspecialchars($email);?></span>
                         <span class='text-sm ml-2'><?php echo htmlspecialchars($phone_number);?></span>

                     </div>

                     <div class='h-100 d-flex align-items-end'>

                        <button class='bg-white text-success border border-success fw-bold rounded text-sm' href="profile.php?id='<?php echo htmlspecialchars($id);?>&&user_type=lawyer'">View Profile</button>

                     </div>

                 </div>
               
             </div>


             <?php
             
                     }

                 }
            ?>


          </div>

     </div>

   </div>

  <div>


 <br><br>

 <div>

     <h3 class='text-center fw-bold'>E-Legal Lawyers in Numbers</h3>
    
     <div class='mt-5 d-flex justify-content-around flex-md-row flex-column' data-aos='fade-up'>

         <div class='d-flex flex-row text-center flex-column g-5'>
          
               <h4 class='fw-bold'>3,489</h4>

                <p>SAN lawyers</p>

         </div>




         <div class='d-flex flex-row text-center flex-column g-5'>

              <h4 class='fw-bold'>102,300</h4>

               <p>Solved cases</p>

         </div>



         <div class='d-flex flex-row text-center flex-column g-5'>


             <h4 class='fw-bold'>1,234</h4>

              <p>Pro bono lawyers</p> 


         </div>
         
         

         <div class='d-flex flex-row  text-center flex-column g-5'>

             <h4 class='fw-bold'>4723</h4>

             <p>Total lawyers</p>          
        
        </div>        


     </div>

 </div>

 <br>

 <br>

 <div>

     <h2 class='text-center fw-bold'>Senior Advocates of Nigeria (SAN) Wall Of Fame</h2>

     <br>

     <div class='d-flex justify-content-between align-items-center flex-md-row flex-column g-5 px-2 mt-3 '>
        
         <div class='shadow rounded'  data-aos='fade-up'>

             <div>
           
                  <img class='w-100 rounded' src="assets/images/bamgbose.png" alt="">

              </div>

             <div class='p-2 d-flex g-3 flex-row flex-column'>
                
                 <h5>Timileyin Bamgbose (SAN)</h5>

                 <span class='fs-6'>Partner at Ernest&Young</span>

                 <span class='text-sm text-mute'>20 years experience</span>

                 <span class='text-sm text-mute'>Abuja, FCT</span>

                 <span class='text-sm text-mute'>Corporate, constitutional, criminal law</span>

                 <span>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                 </span>

                 <div class='d-flex justify-content-between'>
                     <a class='btn btn-success' href="">Get in touch</a>
                     <a class='btn border border-success border-2 text-success' href="">View profile</a>
                 </div>


             </div>


         </div>


         <div class='shadow rounded'  data-aos='fade-up'>

             <div>

                  <img class='w-100 rounded' src="assets/images/bamgbose.png" alt="">

             </div>

            <div class='p-2 d-flex g-3 flex-row flex-column'>
   
                 <h5>Timileyin Bamgbose (SAN)</h5>

                 <h6 class='fs-6'>Partner at Ernest&Young</h6>

                 <span class='text-sm text-mute'>20 years experience</span>

                 <span class='text-sm text-mute'>Abuja, FCT</span>

                 <span class='text-sm text-mute'>Corporate, constitutional, criminal law</span>

                 <span>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                       <i class='fa fa-star'></i>
                     <i class='fa fa-star'></i>
                 </span>

                  <div class='d-flex justify-content-between'>
                     <a class='btn btn-success' href="">Get in touch</a>
                     <a class='btn border border-success border-2 text-success' href="">View profile</a>
                 </div>

              </div>


         </div>


         <div class='shadow rounded'  data-aos='fade-up'>

<div>

     <img class='w-100 rounded' src="assets/images/bamgbose.png" alt="">

</div>

<div class='p-2 d-flex g-3 flex-row flex-column'>

    <h5>Timileyin Bamgbose (SAN)</h5>

    <h6 class='fs-6'>Partner at Ernest&Young</h6>

    <span class='text-sm text-mute'>20 years experience</span>

    <span class='text-sm text-mute'>Abuja, FCT</span>

    <span class='text-sm text-mute'>Corporate, constitutional, criminal law</span>

    <span>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
          <i class='fa fa-star'></i>
        <i class='fa fa-star'></i>
    </span>

     <div class='d-flex justify-content-between'>
        <a class='btn btn-success' href="">Get in touch</a>
        <a class='btn border border-success border-2 text-success' href="">View profile</a>
    </div>

 </div>


</div>




<div class='shadow rounded'  data-aos='fade-up'>

     <div>

         <img class='w-100 rounded' src="assets/images/bamgbose.png" alt="">

     </div>

     <div class='p-2 d-flex g-3 flex-row flex-column'>

          <h5>Timileyin Bamgbose (SAN)</h5>

          <h6 class='fs-6'>Partner at Ernest&Young</h6>

          <span class='text-sm text-mute'>20 years experience</span>

          <span class='text-sm text-mute'>Abuja, FCT</span>

          <span class='text-sm text-mute'>Corporate, constitutional, criminal law</span>

          <span>
             <i class='fa fa-star'></i>
              <i class='fa fa-star'></i>
              <i class='fa fa-star'></i>
              <i class='fa fa-star'></i>
              <i class='fa fa-star'></i>
         </span>

         <div class='d-flex justify-content-between'>
             <a class='btn btn-success' href="">Get in touch</a>
             <a class='btn border border-success border-2 text-success' href="">View profile</a>
         </div>

     </div>


 </div>


</div>

<div class='d-flex justify-content-between text-sm mt-2 px-2'>
    <span>Are you a SAN? Apply for a spot in our Wall Of Fame</span>
    <span>View more</span>

</div>

 </div>


 <!-- advertising -->

 <div class='container mt-3'>

      <div class='text-center px-3 py-2'  data-aos='zoom-in' data-aos-easing='ease-out-cubic'>

          <div class='mb-2'>

               <h5 class='my-2 fw-bold'>Want to get noticed? Run an advert here!</h5>
           
              <img class='w-75 h-auto' src="assets/images/advert/ad-image.png" alt="elegal">

          </div>

          <div class='text-center'>

                 <span class='border-bottom'>Run an ad here</span>

          </div>

      </div>


 </div>

 <br> <br>


<?php include ('components/afford.php'); ?>

 <br><br>


 <div class='mt-3'>


     <h4 class='fw-bold px-4'>CONNECT WITH LAWYERS IN LOCATIONS AROUND YOU</h4>

     <br>
     
     <div class='d-flex justify-content-between align-items-center px-3 flex-md-row flex-column lawyer-content-container' data-aos='fade-in'>


     <?php 

        


        while($lawyer = mysqli_fetch_array($stmt)){

              if($lawyer){

                  include('components/lawyer-profile.php');
     

     ?>

         <div class='d-flex flex-row flex-column shadow'>

             <img class='w-100' src="<?php echo htmlspecialchars($img); ?>" alt="elegal">

             <div class='d-flex flex-row flex-column px-2 py-3'>

                   <h5 class='text-capitalize fw-bold'><?php echo htmlspecialchars($name); ?>, Esq</h5>
                   <span class='text-dark fs-6'>Associate at <?php echo htmlspecialchars($firm);?> Law Firm</span>
                   <span class='text-secondary text-sm'><?php echo htmlspecialchars($experience); ?> years experience</span>
                   <span class='text-secondary text-sm'><?php echo htmlspecialchars($state); ?> state</span>
                   <span class='text-secondary text-sm'><?php echo htmlspecialchars (substr($practice_areas,0,25)); ?></span>
                   <span class='text-secondary text-sm'>
                          <i class='fa fa-star'></i>
                          <i class='fa fa-star'></i>
                          <i class='fa fa-star'></i>
                          <i class='fa fa-star'></i>
                          <i class='fa fa-star'></i>
                   </span>

                   <div class='d-flex justify-content-between mt-2 g-3'>
                     <a class='btn btn-success text-white  text-sm'>Send a message</a>
                     <a class='btn border border-success text-success text-sm' href="profile.php?id=<?php echo htmlspecialchars($id); ?>&&user_type=lawyer">View Profile</a>
                   </div>

             </div>

         </div>

         <?php  }  }  ?>

     </div>
         
 </div>

<br><br>



 <div class='mt-3'>

 <h4 class='fw-bold px-4'>CONNECT WITH SPECIFIC LAWYERS </h4>

<br>

<div class='d-flex justify-content-between align-items-center px-3 flex-md-row flex-column  lawyer-content-container' data-aos='fade-up'>


<?php 

     $condition = "SELECT * FROM lawyer_profile";

     $stmt = mysqli_query($conn,$condition);

     while($lawyer = mysqli_fetch_array($stmt)){

          if($lawyer){

              include('components/lawyer-profile.php');

?>

    <div class='d-flex flex-row flex-column shadow'>

         <img class='w-100' src="<?php echo htmlspecialchars($img); ?>" alt="elegal">

         <div class='d-flex flex-row flex-column px-2 py-3'>

              <h5 class='text-capitalize text-dark fw-bold'><?php echo htmlspecialchars($name); ?>, Esq</h5>
              <span class='text-dark fs-6'>Associate at <?php echo htmlspecialchars($firm); ?> Law Firm</span>
              <span class='text-secondary text-sm'><?php echo htmlspecialchars($experience) ?> years experience</span>
              <span class='text-secondary text-sm'><?php echo htmlspecialchars($state);?> state</span>
              <span class='text-secondary text-sm'><?php echo htmlspecialchars (substr($practice_areas,0,25)); ?></span>
              <span class='text-secondary text-sm'>
                     <i class='fa fa-star'></i>
                     <i class='fa fa-star'></i>
                     <i class='fa fa-star'></i>
                     <i class='fa fa-star'></i>
                     <i class='fa fa-star'></i>
              </span>

              <div class='d-flex justify-content-between mt-2 g-3'>
                <a class='btn btn-success text-white  text-sm' href="">Send a message</a>
                <a class='btn border border-success text-success text-sm' href="profile.php?id=<?php echo htmlspecialchars($id); ?>&&user_type=lawyer">View Profile</a>
              </div>

         </div>

     </div>


     <?php

        }

     }
     
     ?>


</div>

<br><br>


 <div class='px-3 mt-5 d-flex justify-content-between g-3 flex-md-row flex-column'  data-aos='fade-up'>
     
     <div class=' p-2 border border-2 border-success rounded seeker-container'>
  
             <p class='w-75 w-md-100 text-sm'>Are you a lawyer looking for <b>work in a reputable firm?</b> Join E-Legal today!</p>

             <a class='btn btn-secondary text-white text-sm' href="create-account.php">Get started</a>

         <div class='d-flex justify-content-end bg-seeker'>

             <div class='w-25'>

                 <img class='w-75 h-auto shadow-md' src="assets/images/seeker.png" alt="elegal"> 
                 
             </div>
             
         </div>

     </div>

         <div class='p-2 border border-2 border-success  seeker-container rounded'>
  
              <p class='w-75 w-md-100 text-sm'>Are you a lawyer looking for <b>work in a reputable firm?</b> Join E-Legal today!</p>

              <a class='btn btn-secondary text-white text-sm' href="create-account.php">Get started</a>
 
              <div class='d-flex justify-content-end bg-seeker'>

                   <div class='w-25'>

                        <img class='w-75 h-auto shadow-md' src="assets/images/chess.png" alt="elegal"> 
      
                  </div>
  
             </div>

         </div>


         <div class=' p-2 border border-2 border-success  seeker-container rounded'>
  
              <p class='w-75 w-md-100 text-sm'>Are you a lawyer looking for <b>work in a reputable firm?</b> Join E-Legal today!</p>

              <a class='btn btn-secondary text-white text-sm' href="create-account.php">Get started</a>
 
              <div class='d-flex justify-content-end bg-seeker'>

                   <div class='w-25'>

                        <img class='w-75 h-auto shadow-md' src="assets/images/seeker.png" alt="elegal"> 
      
                  </div>
  
             </div>

         </div>


         <div class='p-2 border border-2 border-success  seeker-container rounded'  data-aos='fade-up'>
  
              <p class='w-75 w-md-100 text-sm'>Are you a lawyer looking for <b>work in a reputable firm?</b> Join E-Legal today!</p>

              <a class='btn btn-secondary text-white text-sm' href="">Get started</a>
 
              <div class='d-flex justify-content-end bg-seeker'>

                   <div class='w-25'>

                        <img class='w-75 h-auto shadow-md' src="assets/images/chess.png" alt="elegal"> 
      
                  </div>
  
             </div>

         </div>         


     </div>

     <br><br>





     <div class='d-flex justify-content-between connect-home px-3 flex-md-row flex-column' >
           
          <div class='d-flex justify-content-between g-3 connect-container border border-success px-2 py-3'  data-aos='fade-right'>

              <div class='d-flex justify-content-center  align-items-start flex-row flex-column w-100'>

                   <p class='text-sm'>Find out <b>who is hiring</b> today!
                          Get connected to reputable firms with the click of a button.</p>
                   <a class='btn btn-dark text-white text-sm w-75' href="">Get started</a>

             </div>

         <div class='image-container-profile'>

               <img class='profiler w-100' src="assets/images/profile.png" alt="">

         </div>

     </div>


         <div class='d-flex justify-content-between g-3  connect-container border  border-success px-2 py-3' data-aos='fade-left'>

                 <div class='d-flex justify-content-center  align-items-start flex-row flex-column w-100'>

                      <p class='text-sm'>Find out <b>who is hiring</b> today!
                         Get connected to reputable firms with the click of a button.</p>
                      <a class='btn btn-dark text-white text-sm w-75' href="">Get started</a>

                  </div>

                  <div class='image-container-profile'>

                       <img class='profiler w-100' src="assets/images/profile.png" alt="">

                  </div>
         </div>

     </div>

     <br><br>







     <div class='d-flex banner-learn border border-success px-3 py-2'  data-aos='fade-up'>

         <div class='banner-learn-content d-flex h-100'>

             <div>

                 <br>

             <h3>Learn about <b>historical people</b> and past heroes in the legal world here!</h3>

             <a class='btn btn-success text-white w-25' href="past-heroes.php">Explore</a>
            
            </div>

         </div>


         <div class='d-flex justify-content-end banner-learn-img'>
             
              <img class='shadow' src="assets/images/chess-table.png" alt="elegal">

         </div>



     </div>
     
     <br><br>

     <div class='px-3'>
         
         <h4 class='fw-bold'> Groups you may like</h4><br>

         <div class='d-flex group-home justify-content-between' data-aos='fade-up'>

             <div class='group-container rounded-top shadow pb-2'>

                 <img class='w-100 rounded-top' src="assets/images/law-logo.png" alt="">

                 <div class='d-flex flex-row flex-column g-1 px-2 py-2'>
                    <h5 class='fw-bold'>Law school ‘23</h5>
                    <span>Graduants of law school 2023</span>
                    <span class='text-sm text-secondary'>36 members</span>
                    <span class='text-secondary text-sm'>8 posts</span>
                    <span class='text-secondary text-sm'>opened June 2024</span>
                    <br>
                    <div>
                         <a class='text-secondary border border-success px-3 py-1' href="">Join</a>
                    </div>

                 </div>

             </div>

             <div class='group-container  rounded-top  shadow pb-2'>

                  <img class='w-100  rounded-top' src="assets/images/book.png" alt="">

                  <div class='d-flex flex-row flex-column g-1 px-2 py-2'>
                       <h5 class='fw-bold'>Law school ‘23</h5>
                       <span>Graduants of law school 2023</span>
                       <span class='text-sm text-secondary'>36 members</span>
                       <span class='text-secondary text-sm'>8 posts</span>
                       <span class='text-secondary text-sm'>opened June 2024</span>
                           <br>
                         <div>
                             <a class='border border-success px-3 py-1 text-secondary' href="">Join</a>
                         </div>

                  </div>

             </div> 
 
             <div class='group-container rounded-top shadow pb-2'>

                 <img class='w-100  rounded-top' src="assets/images/group-paper.png" alt="">

                 <div class='d-flex flex-row flex-column g-1 px-2 py-2'>
                     <h5 class='fw-bold'>Law school ‘23</h5>
                     <span>Graduants of law school 2023</span>
                     <span class='text-sm text-secondary'>36 members</span>
                     <span class='text-secondary text-sm'>8 posts</span>
                     <span class='text-secondary text-sm'>opened June 2024</span>
                     <br>
                     <div>
                         <a class='border text-secondary border-success px-3 py-1' href="">Join</a>
                     </div>

                 </div>

             </div>


             <div class='group-container rounded-top shadow pb-2'>

             <img class='w-100 rounded-top' src="assets/images/groupie.png" alt="">

                 <div class='d-flex flex-row flex-column g-1 px-2 py-2'>
                     <h5 class='fw-bold'>Law school ‘23</h5>
                     <span>Graduants of law school 2023</span>
                     <span class='text-sm text-secondary'>36 members</span>
                     <span class='text-secondary text-sm'>8 posts</span>
                     <span class='text-secondary text-sm'>opened June 2024</span>
                     <br>
                     <div>
                         <a class='border border-success px-3 py-1 text-secondary' href="">Join</a>
                     </div>

                 </div>

             </div>

         </div>

     </div>

     <br><br>
    
     <div class='px-2' data-aos='fade-up'>

         <h4 class='fw-bold'>Watch videos you may like</h4>

         <br>


         <div class="d-flex video-container justify-content-evenly g-3">

             <div>
                 <span>Law school ‘23</span>
                  <video  controls>
                   
                     <source src="assets/videos/vecteezy.mp4">
                   
                  </video>
              
             </div>

             <div>
                  <span>Law school ‘23</span>
                  <video  controls>

                     <source src="assets/videos/video.mp4">
                   
                  </video>
        
             </div>

             <div>
                 <span>Law school ‘23</span>
                 <video controls>

                     <source src="assets/videos/vecteezy.mp4">

                 </video>
       
             </div>

             <div> 
                 <span>Law school ‘23</span>
                 <video controls>

                     <source src="assets/videos/video.mp4">
                     
                 </video>
              
                     
             </div>

         </div>




     </div>

     <br><br>

     <h4 class='mt-5 px-2 fw-bold'>News & Articles</h4>

     <div class="news px-2 mt-5" data-aos='fade-up'>

         <div class='d-flex flex-row flex-column'>

             <img src="assets/images/Frame 37.png" alt="elegal">
             
              <h6>Reflections on 2022: My Nigerian Law School Experience</h6>

              <span class='text-secondary text-sm'>31/12/2022 / RUKKY OTIVE-IGBUZOR</span>

         </div>

         <div class='d-flex flex-row flex-column'>

              <img src="assets/images/Frame 38.png" alt="elegal">

              <h6>Reflections on 2022: My Nigerian Law School Experience</h6>

              <span class='text-secondary text-sm'>31/12/2022 / RUKKY OTIVE-IGBUZOR</span>

         </div>


         <div class='d-flex flex-row flex-column'>

             <img src="assets/images/Frame 39.png" alt="elegal">
             
              <h6>Reflections on 2022: My Nigerian Law School Experience</h6>

              <span class='text-secondary text-sm'>31/12/2022 / RUKKY OTIVE-IGBUZOR</span>

         </div>


         <div class='d-flex flex-row flex-column'>

             <img src="assets/images/Frame 40.png" alt="elegal">
             
              <h6>Reflections on 2022: My Nigerian Law School Experience</h6>

              <span class='text-secondary text-sm'>31/12/2022 / RUKKY OTIVE-IGBUZOR</span>

         </div>


     </div>



     <br><br>
     
     <br><br>
     
     <br>

     <?php include 'components/footer.php'; ?> 
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>
          AOS.init();
     </script>
</body>
</html>







