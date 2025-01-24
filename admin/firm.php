<?php 
 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM lawyer_firm");
 ?>
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

     include("../components/firm-content.php"); ?>

 <tr> 
 <td><img src="<?php echo"../../../../../elegal/". htmlspecialchars($firm_img); ?>" alt="elegal"></td>         
     <td><?php echo htmlspecialchars($firm_name); ?></td>
     <td><?php echo htmlspecialchars($firm_email); ?></td> 
     <td><?php echo htmlspecialchars($nooflawyers); ?></td>
     <td><?php  echo htmlspecialchars($firm_phone_number); ?></td>
     <td><?php echo htmlspecialchars($firm_location); ?></td>
     <td><a class='btn border-bottom border-1 border-primary text-primary' href="view-details.php?id=<?php echo htmlspecialchars($firm_id); ?>">View</a></td>
 </tr>

<?php } ?>

     </tbody>
     
 </table>