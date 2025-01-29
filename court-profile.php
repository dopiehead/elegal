<?php  session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {

      $id = $_GET['id'];

      require("engine/config.php");

      $court_type = isset($_GET['court_type']) && !empty($_GET['court_type']) ? $_GET['court_type'] : null;

       if ($court_type === 'state' || $court_type === 'federal') {     
       
          $stmt = mysqli_query($conn, "SELECT * FROM courts WHERE id = '$id' AND court_type = '$court_type'");
      
          $court = mysqli_fetch_array($stmt);

          if($court){

              include ("components/court-content.php");
        }


    }

}

else{

     header("Location: court.php");
     exit();
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("components/links.php");?>
    <link rel="stylesheet" href="assets/css/court-profile.css">
    <title>Court profile</title>
</head>
<body>
    <?php  include ("components/nav.php"); ?>
    <br><br><br>

    <div class='container mt-5'>

        <h3 class='text-capitalize fw-bold'><?php if($court_type=='federal'){ echo "The federal courts";} else{ echo "The state courts";} ?></h3>

         <div class='mt-3'>

             <div class='card shadow-lg rounded rounded-2'>

                 <img src="<?php echo htmlspecialchars($court_img);?>" alt="">

                 <span class='mt-3 mb-3 mx-2'><?php echo htmlspecialchars($court_name); ?></span>

             </div>


             <div class='d-flex justify-content-between align-items-center'>
               
                 <div class='col-md-4 col-2'>
                     
                   <!-- hello -->

                 </div>

                 <div class='col-md-8 col-10'>

                 <?php 
                 
                 $about = explode ('\\n', $court_about);

                 foreach ($about as $words) { ?>

                     <p class='text-sm'><?php echo htmlspecialchars($words); ?></p><br>

                 <?php 
                     }
                 ?>

                   
                
                 </div>
              

                
             </div>

           

         </div>



         <div class='history-container border border-2 border-success p-3'>

             <div class='history-content'>
                  
                 <h4>Learn about <b>historical people</b> and past heroes in the legal world here</h4>
                 <a class='btn btn-success text-white mt-3 text-sm explore-button' href="past-heroes.php">Explore</a>

  
             </div>


             <div class='history-image-container'>

               <img src="assets/images/seeker.png" alt="elegal">

             </div>
        


         </div>
        



    </div>

    <br><br>
    <?php include ("components/footer.php"); ?>  
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->    
</body>
</html>