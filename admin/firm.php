<?php 
 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM lawyer_firm");
 ?>


<div class='mb-4'>

     <h3 class='fw-bold'>Firm</h3>

</div>


<table class='table table-stripe table-hover'>
      <thead>
         <tr>
             <th>Firm image</th>
             <th>Firm Name</th>
             <th>Firm Email</th>
             <th>No of lawyers</th>
             <th>Firm Phone</th>
             <th>Firm Address</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>

<?php
 while($firm = mysqli_fetch_array($getuser)){

     include("../components/firm-content.php");
     
     $extension = strtolower(pathinfo($firm_img,PATHINFO_EXTENSION));

     $image_extension  = array('jpg','jpeg','png'); 
     
     ?>

 <tr> 
    
     <td>

         <?php 
         
             if (!in_array($extension , $image_extension)) {

                 echo"<div class='text-center border border-secondary'><span class='text-secondary text-uppercase' style='font-size:50px;'>".substr($firm_name,0,2)."</span></div>";                  

             } else { ?>  
    
               <img src="<?php echo"../../../../../elegal/". htmlspecialchars($firm_img); ?>" alt="elegal">

         <?php }?>
     </td>         
     <td><?php echo htmlspecialchars($firm_name); ?></td>
     <td><?php echo htmlspecialchars($firm_email); ?></td> 
     <td><?php echo htmlspecialchars($nooflawyers); ?></td>
     <td><?php  echo htmlspecialchars($firm_phone_number); ?></td>
     <td><?php echo htmlspecialchars($firm_location); ?></td>
     <td>
        <div class='d-flex justify-content-evenly gap-1'>
              <a class='btn border-bottom border-1 border-primary text-primary' href="view/view-details.php?id=<?php echo htmlspecialchars($firm_id); ?>&&type=firm">View</a>
              <a class='btn border-bottom border-1 border-success text-success' href="edit/edit-details.php?id=<?php echo htmlspecialchars($firm_id);?>&&type=firm">Edit</a>
              <a class='btn border-bottom border-1 border-danger text-danger' href="delete/delete-details.php?id=<?php echo htmlspecialchars($firm_id);?>&&type=firm">Delete</a>
         </div>
        
    </td>
 </tr>  

<?php } ?>

     </tbody>
     
 </table>