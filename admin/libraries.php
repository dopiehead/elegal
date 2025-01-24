<?php 
 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM law_books");
?>
<table class='table table-stripe table-hover'>
      <thead>
         <tr>
             <th>Book image</th>
             <th>Book Name</th>
             <th>Book price</th>         
             <th>Created_at</th>

         </tr>
     </thead>
     <tbody>

<?php
 while($book = mysqli_fetch_array($getuser)){

     include("../components/library-content.php"); ?>

 <tr> 
     <td><img src="<?php echo "../../../../../elegal/".htmlspecialchars($book_img); ?>" alt="elegal"></td>         
     <td class='text-capitalize'><?php echo htmlspecialchars($book_name); ?></td>
     <td><?php echo htmlspecialchars($book_price); ?></td>
     <td><?php echo htmlspecialchars($created_at); ?></td>
     <td><a class='btn border-bottom border-1 border-primary text-primary' href="view-details.php?id=<?php echo htmlspecialchars($user_id); ?>">View</a></td>
 </tr>

<?php } ?>

     </tbody>
     
 </table>