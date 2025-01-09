<?php 
if(isset($_GET['id']) && !empty($_GET['id'])){
     if(empty($_GET['id'])){
         header("Location:firm.php");
          exit();
     }

     else{
            $id = $_GET['id'];
            require ("engine/config.php");
            $stmt = mysqli_query($conn,"SELECT * FROM lawyer_firm WHERE firm_id = '$id'");
     }
 
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("components/links.php"); ?>
    <link rel="stylesheet" href="assets/css/firm-profile.css">
    <title>firm profile</title>
</head>
<body>

     <?php include ("components/nav.php");?>

     <br><br><br>

    <?php
    
     if($stmt){

         while ($firm = mysqli_fetch_array($stmt)){
           
            include ("components/firm-content.php");

         }


     }

    ?>

     <div class='container d-flex flex-md-row flex-column mt-5'>

         <div class='d-flex flex-row flex-column col-md-6'>
         
            <div class='shadow card pb-2'>

                 <img class='firm_pic' src="<?php echo htmlspecialchars($firm_img); ?>" alt="elegal">
             
                 <div class='d-flex flex-row flex-column px-2'>

                     <span class='mt-1'><?php echo htmlspecialchars($firm_name); ?></span>
                     <span class='text-sm text-secondary'><?php echo htmlspecialchars($found_date); ?></span>
                     <span class='text-sm text-secondary'><?php echo htmlspecialchars($nooflawyers);?> Lawyers</span>
                     <span class='text-sm text-secondary'><?php echo htmlspecialchars($practice_areas); ?></span>
                     <div>
                         <i class='fa fa-star'></i>
                         <i class='fa fa-star'></i>
                         <i class='fa fa-star'></i>
                         <i class='fa fa-star'></i>
                         <i class='fa fa-star'></i>
                     </div>

                     <button class='text-sm border border-2 border-secondary w-100 mt-3'>Get in touch</button>

                 </div>

             </div>

             <div class='mt-5'>

                 <h6 class='fw-bold'>Practice areas</h6>

                 <?php 
                 
                 $practice = explode(",",$practice_areas);

                 foreach($practice as $job_areas){
                  
                ?>
                  <span class='text-sm'><?php echo htmlspecialchars($job_areas); ?></span><br>
 
                 <?php

                 }
                
                 ?>

             </div>

         </div>



         <div class = 'col-md-6'>
              
               <div>

                 <h6 class='fw-bold mb-2 mt-4'>About us</h6>

                 <?php
                 
                     $about = explode("\\n",$firm_about);

                     foreach($about as $getabout){  ?>

                          <p class='text-sm about'><?php echo htmlspecialchars($getabout); ?></p>                   

                 <?php
                     
                         }
                 
                 
                  ?>



                 <button class="btn btn-success">Get in touch</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
               </div>


         </div>


     </div>

     <br><br>

     <div class='container py-2 mt-5'>
              
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

     <?php
         function addSpaceAfterFullStop($text) {

              $pattern = '/\.(?=\S)/'; 

              $replacement = '. <br>'; 
    
              return preg_replace($pattern, $replacement, $text);
         }
?>
 
<script>
    $(document).ready(function() {

        $('.about').each(function() {
     
            //  var text = $(this).html();

            //  var modifiedText = text.replace(/\.(?=\S)/g, '. <br><br>');

            //  $(this).html(modifiedText);
        });
    });
</script>

     <?php include ("components/footer.php");?>

     <script>
  
  $('.top-contents').flickity({
  cellAlign: 'left',
  contain: true,
  autoPlay:true,
  freeScroll: true,
  friction:0.52,       

});

</script>
    
</body>
</html>