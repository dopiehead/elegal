<?php require ('../../engine/config.php'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!--   
 
 <div class='px-3 mt-4 mb-1'>

   <span class='text-sm text-secondary'>7 tasks today!</span>
   
 </div> -->
<br>
 <div class='my-2'>
 
     <input style='font-family:arial,sans-serif' 
    type="search" 
    class="form-control rounded-pill border border-muted bg-white py-3 search-input" 
    placeholder="&#xf002; Search for task" 
    aria-label="Search for task"
  >
 </div>
 <br>

 <div class='px-3 mt-4'>

     <div class='d-flex justify-content-between'>

          <h4 class='fw-bold text-dark'>Recent tasks</h4>

          <span class='text-danger text-capitalize '>see all <i class='fa fa-chevron-right'></i></span>

     </div>
        
 </div>


 <?php 
$divTemplate = "

<div class='shadow px-3 py-5 mt-2 d-flex justify-content-between bg-white'>

     <div class='d-flex justify-content-start gap-3'>

        <div>
            
             <input type='radio' class='fs-3 bg-success'>
        
        </div>

        <div class='d-flex flex-row flex-column text-center'>

             <h6 class='fw-bold text-dark'>Tayo's court case</h6>

             <span class='text-sm text-secondary'>Today, 10:30 AM</span>
        
        </div>

    
     </div>



     <div>
     
     <a class='text-primary text-sm text-decoration-underline pb-1 show-details'>View details</a>
         
     </div>
   





</div>";

// Loop to generate and display 3 divs
for ($i = 0; $i < 3; $i++) {
    echo $divTemplate;
}

?>


<div id='popup-reminder' style='background-color:white;box-shadow:0px 0px 15px rgba(0,0,0,0.5);' class='popup-reminder'>

    <a class='text-danger closeButton' id='closeButton'>&times;</a>

     <h4 class='fw-bold text-dark'>Tayo's court case</h4>

     <div class='d-flex flex-row flex-column'>

         <span class='text-sm'><b class='text-dark'>Due date</b> :Sunday, 23 April 2025</span>

         <span class='text-sm mt-1'><b class='text-dark'>Status:</b> <span class='px-3 rounded rounded-pill bg-warning text-white p-1'>In progress</span></span>
     </div>

     <div class='mt-4'>

         <h6 class='fw-bold'>Description</h6>

         <p class='text-sm text-secondary'>

         Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias doloremque nostrum ut molestiae commodi veniam iusto quaerat laboriosam et, cum accusantium officiis nisi, corporis, fugiat rerum nesciunt voluptatum deleniti blanditiis?
         </p>

     </div>



</div>
