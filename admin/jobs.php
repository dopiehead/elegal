<?php 

 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM law_jobs");

?>
<table class='table table-stripe table-hover'>
      <thead>
         <tr class='text-capitalize'>
             <th>company_image</th>
             <th>company name</th>
             <th>no of lawyers</th>
             <th>job type</th>
             <th>job location</th>
             <th>no of applicant</th>
             <th>job experience</th>
             <th>experience level</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>

<?php

 while($job = mysqli_fetch_array($getuser)){

     include("../components/jobs-content.php"); ?>

 <tr>      
     <td><img src="<?php echo"../../../../elegal/".htmlspecialchars($company_image); ?>" alt="elegal"></td>    
     <td><?php echo htmlspecialchars($company_name); ?></td>
     <td><?php echo htmlspecialchars($nooflawyers); ?></td> 
     <td><?php echo htmlspecialchars($job_type);?></td>
     <td><?php echo htmlspecialchars($job_location);?></td>
     <td><?php echo htmlspecialchars($noofapplicant);?></td>
     <td><?php echo htmlspecialchars($job_experience);?></td>
     <td><?php echo htmlspecialchars($experience_level);?></td>
     <td><a class='btn border-bottom border-1 border-primary text-primary' href="view-details.php?id=<?php echo htmlspecialchars($id); ?>">View</a></td>
 </tr>

 <?php } ?>

     </tbody>
     
 </table>