
<?php  session_start();

     require ("engine/config.php");

     $stmt = mysqli_query($conn,"SELECT * FROM law_books");

     $stmt_articles = mysqli_query($conn,"SELECT * FROM articles");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>library</title>
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

                          $extension = strtolower(pathinfo($book_img,PATHINFO_EXTENSION));

                          $image_extension  = array('jpg','jpeg','png'); 
     
             ?>    

                     <div class='package' data-aos='fade-up'>

                          <?php 
                      
                          if (!in_array($extension , $image_extension)) {

                              echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($user_name,0,2)."</span></div>";                  

                         } else { ?>  
                      
                             <img src="<?php echo htmlspecialchars($book_img);?>" alt="">

                         <?php } ?>

                         <div class='text-center mt-3 px-3'>

                             <a class='btn btn-success form-control text-white text-sm' href="library-details.php?id=<?php echo htmlspecialchars($book_id); ?>">Read</a>

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
         
            <a href="article-details.php?id=<?php echo htmlspecialchars($article_id); ?>"><img src="<?php echo htmlspecialchars($article_img);?>" alt="elegal"></a>
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

        <br><br>

         <div class='px-3' data-aos='fade-up'>

             <h4 class='text-capitalize fw-bold text-dark'>references</h4>

             <div class='d-flex justify-content-between flex-md-row flex-column g-3 mt-4'>
 
                 <div class='shadow-lg bg-white px-3 py-2'>

                     <table class='table-responsive border-0'>

                         <thead  class='py-2 bg-dark text-white'>

                             <tr>
                                <th>Related Clauses</th>                             
                             </tr>

                         </thead>

                         <tbody class='text-sm mt-3'>

                             <tr>
                                 <td>References to Loan Agreement</td>
                             </tr>

                             <tr>
                                 <td>References to Agreements, Laws e.t.c</td>
                             </tr>

                             <tr>
                                 <td>References to Documents</td>
                             </tr>

                             <tr>
                                 <td>References to Statuses</td>
                             </tr>

                             <tr>
                                 <td>References to Agreements</td>
                             </tr>

                             <tr>
                                 <td>References to time</td>
                             </tr>

                             <tr>
                                 <td>References to Regulations</td>
                             </tr>

                          
                         </tbody>

                     </table>


                 </div>



                 <div class='shadow-lg bg-white px-3 py-2'>

                      <table class='table-responsive border-0'>

                          <thead class='py-2 bg-dark text-white'>

                             <tr>
                                   <th>Parent Clauses</th>                             
                             </tr>
    
                         </thead>

                         <tbody class='text-sm mt-3'>

                             <tr>

                                <td>References to Loan Agreement</td>
                             </tr>

                             <tr>
                                 <td>References to Agreements, Laws e.t.c</td>
                             </tr>

                             <tr>
                                 <td>References to Documents</td>
                             </tr>

                              <tr>
                                 <td>References to Statuses</td>
                              </tr>

                             <tr>
                                 <td>References to Agreements</td>
                              </tr>

                             <tr>
                                 <td>References to time</td>
                             </tr>

                             <tr>
                                 <td>References to Regulations</td>
                             </tr>

   

                         </tbody>

                     </table>



                 </div>




                 <div class='shadow-lg bg-white px-3 py-2'>

                     <table class='table-responsive border-0'>

                         <thead class='py-2 bg-dark text-white'>

                              <tr>
                                  <th>Related Clauses</th>                             
                              </tr>

                         </thead>

                         <tbody class='text-sm mt-3'>

                          <tr>
                               <td>References to Loan Agreement</td>
                         </tr>

                         <tr>
                                 <td>References to Agreements, Laws e.t.c</td>
                         </tr>

                         <tr>
                              <td>References to Documents</td>
                         </tr>

                         <tr>
                             <td>References to Statuses</td>
                         </tr>

                         <tr>
                                <td>References to Agreements</td>
                         </tr>

                         <tr>
                               <td>References to time</td>
                         </tr>

                         <tr>
                              <td>References to Regulations</td>
                         </tr>

 
                     </tbody>

                 </table>                 

             </div>


             <div class='shadow-lg bg-white px-3 py-2'>

                 <table class='table-responsive border-0'>

                     <thead class='py-2 bg-dark text-white'>

                         <tr>
                             <th>Related Clauses</th>                             
                         </tr>

                     </thead>

                     <tbody class='text-sm mt-3'>

                          <tr>
                               <td>References to Loan Agreement</td>
                         </tr>

                         <tr>
                                 <td>References to Agreements, Laws e.t.c</td>
                         </tr>

                         <tr>
                              <td>References to Documents</td>
                         </tr>

                         <tr>
                             <td>References to Statuses</td>
                         </tr>

                         <tr>
                                <td>References to Agreements</td>
                         </tr>

                         <tr>
                               <td>References to time</td>
                         </tr>

                         <tr>
                              <td>References to Regulations</td>
                         </tr>

 
                     </tbody>

                 </table>                 

             </div>

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