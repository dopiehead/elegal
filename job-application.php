

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

         <div class='d-flex g-3 flex-md-row flex-column'>

             <div class='col-md-6'>

                   <label class='text-sm' for="">First name </label>

                   <input type="text" name="" id="" class='form-control  bg-light'>

             </div>



             <div class='col-md-6'>
                     <label  class='text-sm' for="">Last name</label>
                    <input type="text" class='form-control  bg-light'>

             </div>


         </div>


         <div class='d-flex g-3 flex-md-row flex-column'>

              <div class='col-md-6'>
                  <label  class='text-sm' for="">Email address</label>
                  <input type="text" class='form-control bg-light'>

              </div>


              <div class='col-md-6'>
                   <label  class='text-sm' for="">Phone number</label>
                   <input type="text" class='form-control  bg-light'>

              </div>

         </div>


         <div>

              <div>

                 <div  class='col-md-6'>
                     <label  class='text-sm' for="">Location</label>
                     <select name="" id="" class='form-control text-sm'>
                         <option value="">Select Location</option>
                         <option value="">Lagos</option>
                     </select>

                 </div>

                 <div>


                 </div>

              <div class='mt-2 text-sm'>
                
                 <input type="checkbox">
                 <span class='text-sm'>I'm willing to relocate</span>
                
             </div>

         </div>



         <div>


          <h5 class='text-white bg-dark fw-bold px-2 py-2 mt-4'>Most recent jobs</h5>
          <br>

           <div class='d-flex g-3 flex-md-row flex-column'>

                 <div class='col-md-6'>
                     <label class='text-sm' for="">Job title </label>
                     <input type="text" class='form-control  bg-light'>

                 </div>

                 <div class='col-md-6'>
                     <label class='text-sm' for="">Company </label>
                     <input type="text" class='form-control  bg-light'>

                 </div>

           </div>

           <div class='d-flex g-3 flex-md-row flex-column mt-2'>

               <div class='col-md-6'>
                     <label class='text-sm' for="">Start date </label>
                     <input type="text" class='form-control  bg-light'>

               </div>

               <div class='col-md-6'>
                     <label class='text-sm' for="">End date </label>
                     <input type="text" class='form-control  bg-light'>

               </div>

           </div>

         </div>


         <div>
              <h5 class='text-white bg-dark fw-bold px-2 py-2 mt-4'>Career Summary</h5>
              <br>

              <div class='d-flex g-3 flex-md-row flex-column'>

                  <div class='col-md-6'>
                        <label class='text-sm' for="">Years of experience </label>
                       <input type="text" class='form-control bg-light'>

                  </div>

                  <div class='col-md-6'> 
                        <label class='text-sm' for="">Highest education</label>
                        <input type="text" class='form-control  bg-light'>
                  
                  </div>
    

              </div>

              <div class='d-flex g-3 flex-md-row flex-column mt-2'>

                  <div class='col-md-6'>
                       <label class='text-sm' for="">Upload CV </label>
                       <input type="text" class='form-control  bg-light'>

                  </div>

                  <div class='col-md-6'> 
                        <label class='text-sm' for="">Year called to bar </label>
                        <input type="text" class='form-control  bg-light'>
                  
                  </div>
    

              </div>
              
              
              <div class='d-flex g-3 flex-md-row flex-column mt-2'>

                  <div class='col-md-6'>
                       <label class='text-sm' for="">Upload cover letter </label>
                       <input type="text" class='form-control  bg-light'>

                  </div>

                  <div class='col-md-6'> 
                        <label class='text-sm' for="">portfolio link </label>
                        <input type="text" class='form-control  bg-light'>
                  
                  </div>
    

              </div>

         </div>

         <div class="text-center mt-4">
               <button type="submit" class="btn btn-dark px-4 py-2">Submit Application</button>
          </div>



    </div>
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
    
    
</body>
</html>