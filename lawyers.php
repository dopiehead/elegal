
<?php

      require ("engine/config.php");

      $condition = "SELECT * FROM lawyer_profile";

      if(isset($_GET['category'])){

         $category = mysqli_escape_string($conn,$_GET['category']);

         if(!empty($category)){

         $condition .= " WHERE practice_areas like '%".$category."%'";

         }
      }

      elseif(isset($_GET['current_position'])){
          
         if(!empty($_GET['current_position'])){

             $current_position = mysqli_escape_string($conn,$_GET['current_position']);

             $condition .= " WHERE current_position like '%".$current_position."%'";

         }
      }

      else{
        $category = null;
         $current_position = null;
      }

       $stmt = mysqli_query($conn,$condition);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include ('components/links.php'); ?>
    <link rel="st ylesheet" href="assets/css/lawyers.css">
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Lawyers</title>
</head>
<body class='bg-light'>

     <?php include 'components/nav.php'; ?>  

    <br><br><br>

             <div class='px-3 mt-5'>

                 <div class = 'd-flex g-3 flex-row flex-column' >

                      <h4 class='fw-bold'><?php if(!empty($category)){ echo "<span class='text-capitalize'>".$category."</span>"; }  ?> Lawyers of E-legal</h4>

                      <span class='text-sm'>Discover the best representatives across Nigeria</span>

                  </div>

                  <br><br>

                  <div class='package-container d-flex justify-content-between flex-wrap g-5' data-aos = 'fade-up'>
                    
                     <?php 

                          while($lawyer = mysqli_fetch_array($stmt)){

                             if($lawyer){

                                 include('components/lawyer-profile.php');

                                 $extension = strtolower(pathinfo($img,PATHINFO_EXTENSION));

                                 $image_extension  = array('jpg','jpeg','png'); 
                               

                     ?>

                                  <div class='package border'>

                                      <img style='height:14em;' src="<?php echo htmlspecialchars($img); ?>" class='w-100' alt="elegal">

                                      <div class='px-2 py-2 d-flex flex-row flex-column mt-1'>

                                         <span>Assosiate at <?php htmlspecialchars($firm); ?> Law firm</span>

                                         <span class='text-sm text-secondary'><?php echo htmlspecialchars($experience);?> years experience</span>

                                         <span class='text-sm text-secondary'><?php echo htmlspecialchars($state);?> State</span>

                                         <span class='text-sm text-secondary'><?php  echo htmlspecialchars(substr($practice_areas,0,25)); ?></span>

                                         <span>
                                         
                                              <i class='fa fa-star'></i>
                                              <i class='fa fa-star'></i>
                                              <i class='fa fa-star'></i>
                                              <i class='fa fa-star'></i>
                                              <i class='fa fa-star'></i>   

                                         </span>

                                          <div class='d-flex justify-content-between mt-2 g-3'>

                                             <a  id="openModalBtn" class='btn text-success border border-2 border-success px-2 rounded text-sm' href='pricing-list.php'>Send message</a>
                                             <a class='btn btn-success text-white px-2 text-sm' href="profile.php?id=<?php echo htmlspecialchars($id); ?>&&user_type=lawyer">View Profile</a>

                                         </div>

                                      </div>

                                  </div> <br>
               
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


<!-- The Modal -->
<div id="myModal" class="modal">
    <a id="closeModalBtn" class='position-absolute right-0 text-danger fw-bold'>&times;</a>
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3 class='fw-bold'>Hire a lawyer</h3>

    <label  class='mt-2 fw-bold text-secondary text-sm' for="">Email</label>
    <input type="text" class='form-control' placeholder="Enter email">

    <label class='mt-2 fw-bold text-secondary text-sm' for="">Subject</label>
    <input type="text" class='form-control' placeholder="Enter Subject">

    <label class='mt-2 fw-bold  text-secondary text-sm' for="">Body</label>
    <textarea class='form-control' placeholder="Write message..."></textarea>

    <button class='btn btn-primary mt-4'>Send</button>

  </div>
</div>

<script>
 
  $(document).ready(function() {
  
    $("#openModalBtn").click(function() {
      $("#myModal").fadeIn(); 
    });

 
    $(".close").click(function() {
      $("#myModal").fadeOut(); // Hide the modal with fade effect
    });

    // When the user clicks on the "Close Modal" button, close the modal
    $("#closeModalBtn").click(function() {
      $("#myModal").fadeOut(); // Hide the modal with fade effect
    });

    // Close the modal if the user clicks anywhere outside the modal content
    $(window).click(function(event) {
      if ($(event.target).is("#myModal")) {
        $("#myModal").fadeOut(); // Hide the modal if clicked outside
      }
    });
  });
</script>

    
</body>
</html>