<?php 
 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM user_profile");
?>
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

     include("../components/user-content.php"); ?>

 <tr>          
     <td><?php echo htmlspecialchars($user_name); ?></td>
     <td><?php echo htmlspecialchars($user_email); ?></td> 
     <td><img src="<?php echo "../../../../../elegal/".htmlspecialchars($user_img); ?>" alt="elegal"></td>
     <td><?php  echo htmlspecialchars($user_contact); ?></td>
     <td><?php echo htmlspecialchars($user_location); ?></td>
     <td><a class='btn border-bottom border-1 border-primary text-primary' href="view-details.php?id=<?php echo htmlspecialchars($user_id); ?>">View</a></td>
 </tr>

<?php } ?>

     </tbody>
     
 </table>