<?php 

 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM law_jobs");

?>

<div class='mb-4'>

     <h3 class='fw-bold'>Posted Jobs</h3>

</div>




<table class='table table-stripe table-hover'>
      <thead>
         <tr class='text-capitalize'>
             <th>company image</th>
             <th>company name</th>
             <th>no of lawyers</th>
             <th>job type</th>
             <th>job location</th>
             <th>no of applicant</th>
             <th>job experience</th>
             <th>experience level</th>
             <th class='text-center'>Action</th>
         </tr>
     </thead>
     <tbody>

<?php

 while($job = mysqli_fetch_array($getuser)){

     include("../components/jobs-content.php");
     
     $extension = strtolower(pathinfo($company_image,PATHINFO_EXTENSION));

     $image_extension  = array('jpg','jpeg','png'); ?>

 <tr>      
     <td>

     <?php 

         if (!in_array($extension , $image_extension)) {

             echo"<div class='text-center border border-secondary'><span class='text-secondary text-uppercase' style='font-size:50px;'>".substr($company_name,0,2)."</span></div>";                  

         } else { ?> 

             <img src="<?php echo"../../../../elegal/".htmlspecialchars($company_image); ?>" alt="elegal"></td>
         
         <?php } ?>
     <td><?php echo htmlspecialchars($company_name); ?></td>
     <td><?php echo htmlspecialchars($nooflawyers); ?></td> 
     <td><?php echo htmlspecialchars($job_type);?></td>
     <td><?php echo htmlspecialchars($job_location);?></td>
     <td><?php echo htmlspecialchars($noofapplicant);?></td>
     <td><?php echo htmlspecialchars($job_experience);?></td>
     <td><?php echo htmlspecialchars($experience_level);?></td>
     <td>
        <div class='d-flex justify-content-evenly gap-3'>
             <a class='btn border-bottom border-1 border-primary text-primary' href="view/view-details.php?id=<?php echo htmlspecialchars($job_id); ?>&&type=jobs"> View</a>
             <a class='btn border-bottom border-1 border-warning text-warning' href="edit/edit-job.php?id=<?php echo htmlspecialchars($job_id);?>"> Edit</a>
             <a class='btn border-bottom border-1 border-danger text-danger' href="delete/delete-job.php?id=<?php echo htmlspecialchars($job_id);?>"> Delete</a>
         </div>
     </td>
 </tr>

 <?php } ?>

     </tbody>
     
 </table>