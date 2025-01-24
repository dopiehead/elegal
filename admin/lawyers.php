<?php 
 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM lawyer_profile");
?>
<table class='table table-stripe table-hover'>
      <thead>
         <tr>
             <th>Lawyer Name</th>
             <th>Lawyer Email</th>
             <th>Lawyer Image</th>
             <th>Lawyer Phone</th>
             <th>Lawyer Address</th>
             <th>Status</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>

<?php
 while($lawyer = mysqli_fetch_array($getuser)){

     include("../components/lawyer-profile.php"); ?>

 <tr>          
     <td><?php echo htmlspecialchars($name); ?></td>
     <td><?php echo htmlspecialchars($email); ?></td> 
     <td><img src="<?php echo"../../../../../elegal/".htmlspecialchars($img); ?>" alt="elegal"></td>
     <td><?php  echo htmlspecialchars($phone_number); ?></td>
     <td><?php echo htmlspecialchars($state); ?></td>
     <td><span class='text-warning'>pending</span></td>
     <td><a class='btn border-bottom border-1 border-primary text-primary' href="view-details.php?id=<?php echo htmlspecialchars($id); ?>">View</a></td>
 </tr>

<?php } ?>

     </tbody>
     
 </table>