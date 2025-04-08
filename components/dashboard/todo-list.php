<div class='bg-success text-white w-100 px-3 py-4 d-flex justify-content-between'>
     <a class='text-white text-decoration-none border-bottom border-2 border-white pb-2' href="">Daily</a>
     <a class='text-white text-decoration-none' href="">Weekly</a>
     <a class='text-white text-decoration-none' href="">Monthly</a>
</div>

<div class='mt-4 px-3 py-4 shadow-lg bg-white'>
 
     <h6 class='text-sm'>Good morning <b>John</b></h6>

     <div class='d-flex justify-content-between'>

         <div class='d-flex flex-row flex-column'> 

             <h6 class='fw-bold text-primary fs-6'>Today</h6>

             <span class='fw-bold fs-6'>15 jan, 2025</span>

        </div>
     
         <div class='d-flex flex-row flex-column text-center'>

             <span class='text-success'>Completed</span>

             <span><span class='text-success'>5/</span><span class='text-danger'>10</span></span>

         </div>

     </div>


</div>

<?php 
$divTemplate = "
<div class='shadow px-3 py-5 mt-2 d-flex justify-content-between bg-white'>
    <div class='d-flex flex-column flex-row'>
        <span class='fw-bold'>10</span>
        <span>AM</span>
    </div>
    <div class='d-flex flex-row flex-column text-center'>
        <span class='fw-bold'>Meeting with client</span>
        <span class='text-sm text-secondary' >official</span>
    </div>
    <div>
        <span class='fa fa-star'></span>
        <span class='fa fa-circle text-success'></span>
    </div>
</div>";

// Loop to generate and display 3 divs
for ($i = 0; $i < 3; $i++) {
    echo $divTemplate;
}

?>






