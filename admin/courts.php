<?php 

 require ("../engine/config.php");
 
 $getuser = mysqli_query($conn, "SELECT * FROM courts");

?>

<div class='mb-4'>

     <h3 class='fw-bold'>Courts</h3>

</div>




<table class='table table-stripe table-hover'>
      <thead>
         <tr>
             <th>Court img</th>
             <th>Court name</th>
             <th>Court type</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>

<?php

 while($court = mysqli_fetch_array($getuser)){

     include("../components/court-content.php");
      
     $extension = strtolower(pathinfo($court_img,PATHINFO_EXTENSION));

     $image_extension  = array('jpg','jpeg','png');
     
     ?>

 <tr>      
     <td>
     <?php 
     
          if (!in_array($extension , $image_extension)) {

              echo"<div class='text-center border border-secondary'><span class='text-secondary text-uppercase' style='font-size:50px;'>".substr($court_name,0,2)."</span></div>";                  
 
         } else { ?>  

             <img src="<?php echo"../../../../elegal/".htmlspecialchars($court_img); ?>" alt="elegal">

         <?php }?>
 
    </td>    
     <td><?php echo htmlspecialchars($court_name); ?></td>
     <td><?php echo htmlspecialchars($court_type); ?></td> 
     <td>
        <div>
             <a class='btn border-bottom border-1 border-primary text-primary' href="view/view-details.php?id=<?php echo htmlspecialchars($court_id); ?>&type=courts">Edit</a>
              <a id='<?php echo htmlspecialchars($court_id); ?>' class='btn btn-danger text-sm'><span class='fa fa-trash'></span> Delete</a>
              <a id='<?php echo htmlspecialchars($court_id); ?>' class='btn btn-primary text-sm'><span class='fa fa-eye'></span> View</a>
        
         </div>
    </td>
 </tr>

 <?php } ?>

     </tbody>
     
 </table>