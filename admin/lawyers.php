<?php 
 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM lawyer_profile");
?>
<div class='mb-4'>

     <h3 class='fw-bold'>Lawyer's List</h3>

</div>


<table class='table table-stripe table-hover'>
      <thead>
         <tr>
             <th class='text-center text-secondary'>Lawyer Name</th>
             <th class='text-center text-secondary'>Lawyer Email</th>
             <th class='text-center text-secondary'>Lawyer Image</th>
             <th class='text-center text-secondary'>Lawyer Phone</th>
             <th class='text-center text-secondary'>Lawyer Address</th>
             <th class='text-center text-secondary'>Status</th>
             <th class='text-center text-secondary'>Verify user</th>
             <th class='text-center text-secondary'>Action</th>
         </tr>
     </thead>
     <tbody>

<?php

 while($lawyer = mysqli_fetch_array($getuser)){

     include("../components/lawyer-profile.php");

     $extension = strtolower(pathinfo($img,PATHINFO_EXTENSION));

     $image_extension  = array('jpg','jpeg','png'); 
     
     ?>

 <tr>          
     <td><?php echo htmlspecialchars($name); ?></td>
     <td><?php echo htmlspecialchars($email); ?></td> 
     <td>
          <?php if (!in_array($extension , $image_extension)) {

             echo"<div class='text-center border border-secondary'><span class='text-secondary text-uppercase' style='font-size:50px;'>".substr($firm_name,0,2)."</span></div>";                  
         
           } else { ?>  

           <img src="<?php echo"../../../../../elegal/".htmlspecialchars($img); ?>" alt="elegal">

          <?php } ?>

     </td>
     <td><?php  echo htmlspecialchars($phone_number); ?></td>
     <td><?php echo htmlspecialchars($state); ?></td>
     <td><span><?php if($status==0){ echo "<span id='spending' class='text-warning'>pending</span>";} else{echo "<span class='text-success' id='verified'>verified</span>";} ?></span></td>
     <td>
       <a class='btn btn-success'>
     <?php 
      if ($status == 0) {
        echo "<span id='" . htmlspecialchars($id) . "' class='verified btn-verify'>Verify</span>";
      } else {
        echo "<span id='" . htmlspecialchars($id) . "' class='btn-unverify'>Unverify</span>";
      }
    ?>
        </a>
    </td>

     <td>
        <div class='d-flex justify-content-evenly gap-2'>     
              <a class='btn border-bottom border-1 border-primary text-primary text-sm' href="view/view-details.php?id=<?php echo htmlspecialchars($id); ?>&&type=lawyers"> <i class='fa fa-edit'> </i>Edit</a>
              <a class='btn btn-danger text-sm'><span class='fa fa-trash'></span> Delete</a>
              <a class='btn btn-primary text-sm'><span class='fa fa-eye'></span> View</a>
         </div>  
    </td>
 </tr>

<?php } ?>

     </tbody>
     
 </table>