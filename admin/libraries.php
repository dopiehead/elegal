<?php 
 require ("../engine/config.php");
 
 $getuser = mysqli_query($conn, "SELECT * FROM law_books");
?>


<div class='mb-4'>

     <h3 class='fw-bold'>Library</h3>

</div>


<table class='table table-stripe table-hover'>
      <thead>
         <tr>
             <th>Book image</th>
             <th>Book Name</th>
             <th>Book price</th>         
             <th>Created at</th>
             <th>Action</th>

         </tr>
     </thead>
     <tbody>

<?php
 while($book = mysqli_fetch_array($getuser)){

     include("../components/library-content.php");

     $extension = strtolower(pathinfo($book_img,PATHINFO_EXTENSION));

     $image_extension  = array('jpg','jpeg','png');
     
     ?>

 <tr> 
     <td>
          
     <?php 
     
          if (!in_array($extension , $image_extension)) {

              echo"<div class='text-center border border-secondary'><span class='text-secondary text-uppercase' style='font-size:50px;'>".substr($book_name,0,2)."</span></div>";                  

         } else { ?>  
         
             <img src="<?php echo "../../../../../elegal/".htmlspecialchars($book_img); ?>" alt="elegal">

     <?php } ?>
            
     </td>                
     <td class='text-capitalize'><?php echo htmlspecialchars($book_name); ?></td>
     <td><?php echo htmlspecialchars($book_price); ?></td>
     <td><?php echo htmlspecialchars($created_at); ?></td>
     <td>
        <div class='d-flex justify-content-evenly text-sm'>
             <a class='btn border-bottom border-1 border-primary text-primary' href="view/view-details.php?id=<?php echo htmlspecialchars($book_id); ?>&&type=libraries">View</a>
              <a class='btn border-bottom border-1 border-danger text-danger' href="view/delete-details.php?id=<?php echo htmlspecialchars($book_id);?>&&type=libraries">Delete</a>
              <a class='btn border-bottom border-1 border-warning text-warning' href="view/edit-details.php?id=<?php echo htmlspecialchars($book_id);?>&&type=libraries">Edit</a>
         </div>
    </td>
 </tr>

<?php } ?>

     </tbody>
     
 </table>