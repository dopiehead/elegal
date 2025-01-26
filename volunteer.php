<?php session_start(); 



 require ("engine/config.php"); 

 $getvolunteer = mysqli_query($conn, "SELECT * FROM volunteers");


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php');?>
    <link rel="stylesheet" href="assets/css/volunteer.css">
    <title>Volunteer</title>
</head>
<body>
    <?php include("components/nav.php");?>
    <br><br><br>

      <div class='mt-4 mb-2 px-3'>
 
         <h2 class='fw-bold'>Join our team of volunteers</h2>

      </div>


     <div class='d-flex volunteer-container px-3 mt-4'>
        <?php
         
          if($getvolunteer){

               while($volunteer = mysqli_fetch_array($getvolunteer)){ 
                  
                   include ("components/volunteer-content.php");

                ?>

                 <div class='volunteer'>
                   
                     <img src="<?php echo htmlspecialchars($volunteer_img); ?>" alt="elegal">

                     <div class='d-flex flex-column flex-row mt-1 px-2 volunteer-details text-white text-center'>
                        
                         <span class='text-sm text-capitalize'><?php echo htmlspecialchars($volunteer_name); ?> ESQ</span>

                         <span class='text-sm text-capitalize'><?php echo htmlspecialchars($practice_areas); ?></span>

                     </div>



                 </div>  

         <?php   }


          }
        
        
        ?>

     </div>



     <div class='px-3 mt-5'>

      <h6 class='text-center fw-bold'>Kindly fill this form to join</h6>

          <div class='d-flex form-board mt-4'>

              <form id='volunteer-form'>

                 <label class='text-secondary text-sm' for="">First name</label>
                 <input type="text" class='form-control bg-light border-0'>

                 <label class='text-secondary text-sm' for="">Last name</label>
                 <input type="text" class='form-control bg-light border-0'>

                 <label class='text-secondary text-sm' for="Email address">Email address</label>
                 <input type="email" class='form-control bg-light border-0'>

                 <label class='text-secondary text-sm' for="">Area of specialization(s)</label>
                 <textarea name="" id="" class='form-control border-0 bg-light'></textarea>

                <label class='text-secondary text-sm' for="">Why do you want to volunteer?</label>
                <input type="text" class='form-control bg-light border-0'>
                 
                <?php if(isset($_SESSION['id']) &&  isset($_SESSION['']) && isset($_SESSION[''])){ ?>
    
                <button class='btn btn-primary px-3 py-2 mt-5 text-sm form-control btn-submit' name='submit' >Submit</button>

                <?php } else { ?>

                    <button class='btn btn-primary px-3 py-2 mt-5 text-sm form-control btn-log' href='login.php' name='submit' >Submit</button>
                    
                 <?php } ?>

              </form>






          </div>



     </div>




     <br><br>
     <?php include("components/footer.php");?>


</body>
</html>