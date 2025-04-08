<?php 
 require ("../engine/config.php");
 $getuser = mysqli_query($conn, "SELECT * FROM applied_jobs");
?>
<table class='table table-stripe table-hover'>
      <thead>
         <tr class='text-sm'>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Applicant Email</th>
             <th>Applicant phone number</th>
             <th>Applicant location</th>
             <th>Job title</th>
             <th>Company</th>
             <th>Years of experience</th>
             <th>Start date</th>
             <th>End date</th>
             <th class='text-center'>Action</th>
         </tr>
     </thead>
     <tbody>

<?php

 while($application = mysqli_fetch_array($getuser)){

     include("../components/job-applicants-content.php"); 
     


     ?>

 <tr>          
     <td><?php echo htmlspecialchars($application_first_name); ?></td>
     <td><?php echo htmlspecialchars($application_last_name); ?></td>
     <td><?php echo htmlspecialchars($application_email); ?></td> 
     <td><?php  echo htmlspecialchars($application_phone_number); ?></td>
     <td><?php echo htmlspecialchars($application_location); ?></td>
     <td><?php echo htmlspecialchars($application_job_title); ?></td>
     <td><?php echo htmlspecialchars($application_company); ?></td>
     <td><?php echo htmlspecialchars($application_year_of_experience); ?></td>
     <td><?php echo htmlspecialchars($application_start_date); ?></td>
     <td><?php echo htmlspecialchars($application_end_date); ?></td>

     <td>
        <div class='d-flex justify-content-evenly gap-3'>
             <a class='btn border-bottom border-1 border-primary text-primary' href="view/view-details.php?id=<?php echo htmlspecialchars($application_id); ?>&type=job_applicants">View</a>
             <a class='btn border-bottom border-1 border-danger text-danger' href="delete/delete-job-application.php?id=<?php echo htmlspecialchars($application_id);?>">Delete</a>
             <a class='btn border-bottom border-1 border-warning text-warning' href="update/update-job-application.php?id=<?php echo htmlspecialchars($application_id);?>">Update</a>
        </div>
    </td>
 </tr>

<?php } ?>

     </tbody>
     
 </table>