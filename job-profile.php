<?php 
if(isset($_GET['id']) && !empty($_GET['id'])){
     if(empty($_GET['id'])){
         header("Location:jobs.php");
          exit();
     }

     else{
            $id = $_GET['id'];
            require ("engine/config.php");
            $stmt = mysqli_query($conn,"SELECT * FROM law_jobs WHERE id = '$id'");
     }
 
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("components/links.php"); ?>
    <link rel="stylesheet" href="assets/css/job-profile.css">
    <title>Job Details</title>
</head>
<body>

     <?php include ("components/nav.php");?>

     <br><br><br>

    <?php
    
     if($stmt){

         while ($job = mysqli_fetch_array($stmt)){
           
            include ("components/jobs-content.php");

         }


     }

    ?>

     <div class='container d-flex flex-md-row flex-column mt-5'>

         <div class='d-flex flex-row flex-column col-md-6'>
         
            <div>

            <div  class='shadow card pb-2'>

                 <img class='firm_pic' src="<?php echo htmlspecialchars($company_image); ?>" alt="elegal">
             
                 <div class='d-flex flex-row flex-column px-2'>

                     <span class='mt-1'><?php echo htmlspecialchars($company_name); ?></span>
                     <span class='text-sm text-secondary'><?php echo htmlspecialchars($established); ?></span>
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
 
             </div>

             <div class='mt-5 d-flex flex-row flex-column'>

                 <span class='fw-bold'><?php echo htmlspecialchars($job_location); ?></span>

                 <span class='fw-bold text-capitalize'><?php echo htmlspecialchars($job_type); ?></span>

                 <span><?php echo htmlspecialchars($practice_areas); ?></span>

                 <span class='text-secondary'><?php echo htmlspecialchars($created_at); ?></span>

             

             </div>
              
               <br>

             <div>

                 <h5 class='fw-bold'>Job description</h5>

                 <p class='text-sm'><?php echo htmlspecialchars($job_description); ?></p>

                 <a class='btn btn-secondary text-white mt-3' href="job-application.php?id=<?php echo htmlspecialchars($job_id); ?>">Apply</a>

             </div>

         </div>



         <div class = 'col-md-6 mt-5'>
          
              <div class='d-flex flex-row flex-column'>
                  
              <br>
                
                 <span><b>Minimum Qualification: </b><span class='text-sm'><?php echo htmlspecialchars($job_qualification); ?></span></span>
                 <span><b>Experience level: </b><span class='text-sm'><?php echo htmlspecialchars($job_experience); ?></span></span>
                 <span><b>Experience length: </b><span class='text-sm'><?php echo htmlspecialchars($experience_length); ?></span></span>

              </div>

              <div class='mt-4'>
               
                 <h5 class='fw-bold '>Job description</h5>

            

                 <div class='mt-3'>

                     <h6 class='fw-bold'>Responsibilities</h6> 
                     <p class='text-sm'><?php echo htmlspecialchars($responsibilities); ?></p>

                 </div>

                 <div>
                     
                     <h5 class='fw-bold'>Job requirements</h5>

                     <p class='text-sm'><?php echo htmlspecialchars($job_requirements); ?></p>

                 </div>


                 <div>

                      <p><b>Renumeration: </b><span class='text-sm'><?php echo htmlspecialchars(number_format($renumeration)); ?> NGN</span></p>

                 </div>

                 
              </div>









              
              


         </div>


     </div>

     <br><br>

    

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