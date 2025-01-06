
<?php

     require ("engine/config.php");

     $stmt = mysqli_query($conn,"SELECT * FROM law_books");

     $stmt_articles = mysqli_query($conn,"SELECT * FROM articles");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice areas</title>
    <?php include ('components/links.php'); ?>
    <link rel="stylesheet" href="assets/css/library.css">
</head>
<body class='bg-light'>
     <?php include("components/nav.php"); ?>
     <br>
     <br>
     <br>
         <div class='px-3 mt-5'>

            <h2 class='fw-bold'>Discover law books, references and articles</h2><br>
             
             <div class='package-container'>

             <?php 

                 while($book = mysqli_fetch_array($stmt)){

                     if($book){

                          include('components/library-content.php');
     
             ?>    

                     <div class='package' data-aos='fade-up'>
                      
                         <img src="<?php echo htmlspecialchars($book_img);?>" alt="">
                         <div class='text-center mt-3 px-3'>
                             <a class='btn btn-success form-control text-white text-sm' href="">Read</a>
                         </div>

                     </div>


                     <?php
                     
                    }


                    }?>

             </div>
 <br><br>

 <div>
       <h4 class='fw-bold'>Articles</h4>

 </div>
 
 <br>  

             <div class='package-container'>

<?php 

    while($article = mysqli_fetch_array($stmt_articles)){

        if($article){

             include('components/article-content.php');

?>    

        <div class='package-article' data-aos='fade-up'>
         
            <img src="<?php echo htmlspecialchars($article_img);?>" alt="elegal">
            <div class=' mt-3 px-3 d-flex flex-row flex-column'>
                <span class='text-sm fw-bold'><?php echo htmlspecialchars($title); ?></span>
                <span class='text-sm text-secondary'><?php echo htmlspecialchars($created_at); ?> / <?php echo htmlspecialchars($author_name); ?></span>
            </div>

        </div>


        <?php
        
       }


       }?>

</div>

        </div>

     <br><br><br>


     <?php include("components/footer.php"); ?>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>

         AOS.init({
                 
             duration: 500,   // Transition duration in ms (1.2 seconds)
             easing: 'ease-in-out',   // Easing function for transition

         });
  </script>
</body>
</html>