<?php 

require ("engine/config.php");
if(isset($_GET['id'])){
     $book_id = mysqli_escape_string($conn,$_GET['id']);
    
} else{
     header("Location: library.php");
     exit();
}

?>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>library details</title>
     <link rel="stylesheet" href="assets/css/library-details.css">
     <?php include ("components/links.php"); ?>
</head>
<body>

    <?php include ("components/nav.php"); ?>

     <div class='d-flex flex-row flex-column justify-content-center align-items-center'>

        <br><br><br>

        <?php 

         $stmt = $conn->prepare("SELECT * FROM law_books WHERE id = ?");

         $stmt->bind_param("i", $book_id); // Assuming $book_id is an integer

         $stmt->execute();

         $result = $stmt->get_result();   

         while ($book = $result->fetch_array()) {

             include("components/library-content.php");

             $extension = strtolower(pathinfo($book_img,PATHINFO_EXTENSION));

             $image_extension  = array('jpg','jpeg','png'); 

         }
        
        ?>

        <div class='card mt-4'>

        <?php 

            if (!in_array($extension , $image_extension)) {

                  echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($book_name,0,2)."</span></div>";                  
   
             } else { ?> 

              <img class='card-img' src="<?php echo htmlspecialchars($book_img); ?>" alt="elegal">

          <?php
             
             }
             
         ?>

             <div class='card-body'>
              
                     <div class='d-flex justify-content-between'>
                
                          <h3 class='fw-bold text-capitalize'><?php echo htmlspecialchars($book_name); ?></h3>

                           <h3 class='text-warning fw-bold'><i class='fa fa-naira-sign'></i>  <?php echo htmlspecialchars($book_price); ?></h3>

                     </div>

                     <div class='mt-2'>
                      
                     <?php 

                         $stmt2 = $conn->prepare("SELECT * FROM authors WHERE id = ?");

                         $stmt2->bind_param("i", $author_id); // Assuming $book_id is an integer

                         $stmt2->execute();

                         $author = $stmt2->get_result();   

                         while ($book_author = $author->fetch_array()) {

                              $extension = strtolower(pathinfo($book_author['author_img'],PATHINFO_EXTENSION));

                              $image_extension  = array('jpg','jpeg','png'); 

                     ?>
                             <div class='d-flex justify-content-start align-items-center g-3 author-body'>

                             <?php 

                                  if (!in_array($extension , $image_extension)) {

                                     echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($book_name,0,2)."</span></div>";                  

                                 } else { ?> 

                                     <img src="<?php echo htmlspecialchars($book_author['author_img']); ?>" alt="elegal">

                             <?php } ?>
                             
                                 <div class='d-flex flex-row flex-column'>

                                     <span class='fw-bold text-sm text-capitalize'><?php echo htmlspecialchars($book_author['author_name']); ?></span>

                                     <span class='text-sm text-secondary'>Author</span>

                                 </div>

                             </div>

                          <?php

                              }
        
                          ?>

                     </div>

                     <div>

                           <p class='text-sm mt-3 text-secondary'><?php echo htmlspecialchars($book_details); ?></p>

                     </div>

                     <div class='mt-4'>

                         <button class='btn btn-dark text-white form-control'>Purchase</button>

                     </div>
                     
             </div>

        </div>
     
     </div>

     <br><br>
    <?php include ("components/footer.php"); ?>
</body>
</html>