<?php 

 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM courts");

?>
<table class='table table-stripe table-hover'>
      <thead>
         <tr>
             <th>Court img</th>
             <th>court_name</th>
             <th>Court_type</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>

<?php

 while($court = mysqli_fetch_array($getuser)){

     include("../components/court-content.php"); ?>

 <tr>      
     <td><img src="<?php echo"../../../../elegal/".htmlspecialchars($court_img); ?>" alt="elegal"></td>    
     <td><?php echo htmlspecialchars($court_name); ?></td>
     <td><?php echo htmlspecialchars($court_type); ?></td> 
     <td><a class='btn border-bottom border-1 border-primary text-primary' href="view-details.php?id=<?php echo htmlspecialchars($id); ?>">View</a></td>
 </tr>

 <?php } ?>

     </tbody>
     
 </table>