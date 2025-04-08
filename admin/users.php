<?php 
 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM user_profile");
?>

<div class='mb-4'>

     <h3 class='fw-bold'>User's List</h3>

</div>

<table class='table table-stripe table-hover'>
      <thead>
         <tr>
             <th>Name</th>
             <th>Email</th>
             <th>Image</th>
             <th>Phone</th>
             <th>Address</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>

<?php
 while($user = mysqli_fetch_array($getuser)){

     include("../components/user-content.php");     
     
     $extension = strtolower(pathinfo($user_img,PATHINFO_EXTENSION));

     $image_extension  = array('jpg','jpeg','png'); ?>

 <tr>          
     <td><?php echo htmlspecialchars($user_name); ?></td>
     <td><?php echo htmlspecialchars($user_email); ?></td> 
     <td>
     <?php

         if (!in_array($extension , $image_extension)) {

             echo"<div class='text-center border border-secondary px-0'><span class='text-secondary text-uppercase' style='font-size:40px;'>".substr($user_name,0,2)."</span></div>";                  

         } else { ?>  

             <img src="<?php echo "../../../../../elegal/".htmlspecialchars($user_img); ?>" alt="elegal">
        <?php } ?>

    </td>
     <td><?php  echo htmlspecialchars($user_contact); ?></td>
     <td><?php echo htmlspecialchars($user_location); ?></td>
     <td>
         <div class='d-flex justify-content-evenly gap-3x'>
              <a class='btn border-bottom border-1 border-primary text-primary' href="view/view-details.php?id=<?php echo htmlspecialchars($user_id);?>&&type=users">View</a>
              <a class='btn border-bottom border-1 border-success text-success' href="edit/edit-user.php?id=<?php echo htmlspecialchars($user_id);?>&&type=users">Edit</a>
              <a class='btn border-bottom border-1 border-danger text-danger' href="delete/delete-user.php?id=<?php echo htmlspecialchars($user_id);?>&&type=users">Delete</a>
          </div>
      </td>    
 </tr>

<?php } ?>

     </tbody>
     
 </table>