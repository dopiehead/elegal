<?php 

require ("engine/config.php");

if(isset($_GET['id'])){

      $article_id = mysqli_escape_string($conn,$_GET['id']);
   
    
} else{

     header("Location: library.php");
     exit();
}

?>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>article details</title>
     <link rel="stylesheet" href="assets/css/library-details.css">
     <?php include ("components/links.php"); ?>
</head>
<body>

    <?php include ("components/nav.php"); ?>

     <div class='d-flex flex-row flex-column justify-content-center align-items-center'>

        <br><br><br>

        <?php 

         $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ? ");

         $stmt->bind_param("i", $article_id);

         $stmt->execute();

         if(!$stmt->execute()){

            echo "Article not found". $conn->error();
         }

         $result = $stmt->get_result();   

         while ($article = $result->fetch_array()) {

             include("components/article-content.php");

             $extension = strtolower(pathinfo($article_img,PATHINFO_EXTENSION));

             $image_extension  = array('jpg','jpeg','png'); 

         }
        
        ?>

        <div class='card mt-4'>

        <?php 

            if (!in_array($extension , $image_extension)) {

                  echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($title,0,2)."</span></div>";                  
   
             } else { ?> 

              <img class='card-img' src="<?php echo htmlspecialchars($article_img); ?>" alt="elegal">

          <?php
             
             }
             
         ?>

             <div class='card-body'>
              
                     <div class='d-flex justify-content-between'>
                
                          <h3 class='fw-bold text-capitalize'><?php echo htmlspecialchars($title); ?></h3>

                     

                     </div>

                     <div class='mt-2'>
                      

                             <div class='d-flex justify-content-start align-items-center g-3 author-body'>

                                 <div class='d-flex flex-row flex-column'>

                                     <span class='fw-bold text-sm text-capitalize'><?php echo htmlspecialchars($author_name); ?></span>


                                 </div>

                             </div>

                

                     </div>

                     <div>

                           <p class='text-sm mt-3 text-secondary'><?php echo htmlspecialchars($article_details); ?></p>

                     </div>

                     <div class='mt-4 d-none'>

                         <button class='btn btn-dark text-white form-control'>Purchase</button>

                     </div>
                     
             </div>

        </div>
     
     </div>

     <br><br>
    <?php include ("components/footer.php"); ?>
</body>
</html>