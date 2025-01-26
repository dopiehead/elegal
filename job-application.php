
<?php  session_start();
     require ("engine/config.php");
     if(isset($_GET['id']) && !empty($_GET['id'])){
         $id = $_GET['id'];
         if(empty($id)){
             header('Location:jobs.php');
         }
         else{
             $stmt = mysqli_query($conn,"SELECT * FROM law_jobs WHERE id ='".$id."'");
             while($row = mysqli_fetch_array($stmt)){
                 if($row){                   
                     include ('components/live-jobs-content.php');

                 }
         }
     } 
    }
?>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <?php include ('components/links.php'); ?>

     <link rel="stylesheet" href="assets/css/job-application.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Job Application</title>
</head>
<body>

 
     <?php include 'components/nav.php';?>
     <br><br><br> 

     <div class='container mt-5'>

         <h2 class='fw-bold'>Job application for Corporate Attorney </h2>
     
     </div>

     <div class='container d-flex flex-row flex-column g-3' data-aos='fade-up'>

         <h5 class='text-white bg-dark fw-bold px-2 py-2 mt-4'>Personal information</h5>
         <br>

         <form id="application-form">

         <div class='d-flex g-3 flex-md-row flex-column px-5'>

             <div class='col-md-6'>

                   <input type="hidden" name="job_id" value='<?php if(!empty($id)){echo htmlspecialchars($id); } ?>'>

                   <label class='text-sm' for="">First name </label>

                   <input type="text" name="first_name" id="" class='form-control  bg-light'>

             </div>



             <div class='col-md-6'>
                     <label  class='text-sm' for="">Last name</label>
                    <input type="text" name="last_name" class='form-control  bg-light'>

             </div>


         </div>


         <div class='d-flex g-3 flex-md-row flex-column mt-3 px-5'>

              <div class='col-md-6'>
                  <label  class='text-sm' for="">Email address</label>
                  <input type="text" name="email" class='form-control bg-light'>

              </div>


              <div class='col-md-6'>
                   <label  class='text-sm' for="">Phone number</label>
                   <input type="text" name="phone_number" class='form-control  bg-light'>

              </div>

         </div>


         <div>

              <div class='mt-3 px-5'>

                 <div  class='col-md-6'>

                         <label  class='text-sm' for="">Location</label>

                         <select name="location" id="" class='form-control text-sm text-capitalize'>

                          <?php 

                                 require 'engine/connection.php';
                                 $getStates = mysqli_query($con,"SELECT * from states_in_nigeria GROUP by state"); ?>
                                 <option value="">Entire Nigeria</option>
                         <?php 
                                 while ($states = mysqli_fetch_array($getStates)) { ?>            
                                 <option value="<?php echo $states['state']?>"><?php echo $states['state']?></option>

                         <?php	} ?>
                                                    
                         </select>

                 </div>

                 <div>


                 </div>

              <div class='mt-2 text-sm px-5'>
                
                 <input type="checkbox" name="relocation">
                 <span class='text-sm'>I'm willing to relocate</span>
                
             </div>

         </div>



         <div>


          <h5 class='text-white bg-dark fw-bold px-2 py-2 mt-4'>Most recent jobs</h5>
          <br>

           <div class='d-flex g-3 flex-md-row flex-column px-5'>

                 <div class='col-md-6'>
                     <label class='text-sm' for="">Job title </label>
                     <input type="text" name="job_title" value="<?php if(!empty($job_title)){echo htmlspecialchars($job_title); } ?>" class='form-control  bg-light'>

                 </div>

                 <div class='col-md-6'>
                     <label class='text-sm' for="">Company </label>
                     <input type="text" name="company" value="<?php if(!empty($company_name)){ echo htmlspecialchars($company_name); } ?>" class='form-control  bg-light'>

                 </div>

           </div>

           <div class='d-flex g-3 flex-md-row flex-column mt-3 px-5'>

               <div class='col-md-6'>
                     <label class='text-sm' for="">Start date </label>
                     <input type="date" name="start_date" class='form-control  bg-light'>

               </div>

               <div class='col-md-6'>
                     <label class='text-sm' for="">End date </label>
                     <input type="date" name="end_date" class='form-control  bg-light'>

               </div>

           </div>

         </div>


         <div>
              <h5 class='text-white bg-dark fw-bold px-2 py-2 mt-4'>Career Summary</h5>
              <br>

              <div class='d-flex g-3 flex-md-row flex-column px-5'>

                  <div class='col-md-6'>
                        <label class='text-sm' for="">Years of experience </label>
                       <input type="number" name="years_of_experience" min="0" class='form-control bg-light'>

                  </div>

                  <div class='col-md-6'> 
                        <label class='text-sm' for="">Highest education</label>
                        <select name="highest_education" class='form-control  bg-light'>
                              <option value="ll.b">LL.B</option> 
                              <option value="BL">BL</option>   
                              <option value="ll.m">LL.M</option>
                              <option value="ll.d">LL.D</option>
                        </select>
                  
                  </div>
    

              </div>

              <div class='d-flex g-3 flex-md-row flex-column mt-3 px-5'>

                  <div class='col-md-6'>
                       <label class='text-sm' for="">Upload CV </label>
                       <input type="file" name="cv_upload"  accept=".pdf, .docx" class='form-control  bg-light'>

                  </div>

                  <div class='col-md-6'> 
                        <label class='text-sm' for="">Year called to bar </label>
                        <input type="date" name="year_called_to_bar" min="1900-01-01" class='form-control  bg-light'>
                  
                  </div>
    

              </div>
              
              
              <div class='d-flex g-3 flex-md-row flex-column mt-3 px-5'>

                  <div class='col-md-6'>
                       <label class='text-sm' for="">Upload cover letter </label>
                       <input type="file" name="cover_letter"  accept=".pdf, .docx" class='form-control  bg-light'>

                  </div>

                  <div class='col-md-6'> 
                        <label class='text-sm' for="">portfolio link </label>
                        <input type="url" name="portfolio_link" class='form-control  bg-light'>
                  
                  </div>
    

              </div>

         </div>

         <div class="text-center mt-4">
               <button type="submit" name="submit" class="btn btn-dark px-4 py-2"><span id='loading' class='spinner-border text-warning text-sm'></span> <span id='button-name'>Submit Application</span></button>
          </div>

    </div>

    </form>
</div>
    <br><br>
    <?php include 'components/footer.php';?>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>

         AOS.init({     
             duration: 500,   // Transition duration in ms (1.2 seconds)
             easing: 'ease-in-out',   // Easing function for transition

    });
  </script>
<script>

 $("#loading").hide();
$(document).ready(function() {

    $('#application-form').submit(function(e) {

        e.preventDefault(); 

        $('#button-name').hide();

        $("#loading").show();

        var formData = new FormData(this); 
        $.ajax({
             url: 'engine/job-application-process.php', // Replace with the correct PHP file path
             type: 'POST',
             data: formData,
             processData: false, // Don't process the files
             contentType: false, // Set content-type as false to allow FormData to handle it
             success: function(response) {
                $("#loading").hide();
                $('#button-name').show(); 
                if(response == "1") {
                    swal({
                        title: 'Success!',
                        icon: 'success',
                        text: 'Application submitted successfully!',
                    });

                    $('#application-form').trigger('reset'); // Reset the form after submission
                } else {
                    swal({
                        icon: "warning",
                        title: "Notice",
                        text: response, // Show the error message from the server
                    });
                }
            },
            error: function() {
                // Handle error case
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'There was an error submitting your application. Please try again.',
                });
            }
        });
    });
});
</script>

    
    
</body>
</html>