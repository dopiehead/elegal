<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <?php include ('components/links.php'); ?>

     <link rel="stylesheet" href="assets/css/view-application.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>View application</title>
</head>
<body class='bg-light'>

       <?php include ("components/nav.php");?>
       <br><br>

<div class='d-flex justify-content-between mt-5 px-3 container'>

         <div class='d-flex g-3'>

             <div>

                 <img class='app_img' src="assets/images/woman-law.png" alt="">

             </div>

             <div class='d-flex flex-row flex-column'>

                 <h5 class='fw-bold'>Nneka Harry</h5>
                 
                 <span>corporate, family, constitutional</span>
                 <a class='text-dark pb-1 border-bottom border-1 border-secondary w-50' href="">View profile</a>

             </div>

             
         </div>

         <div>
 
           <a class='text-dark border border-2 border-secondary  px-2 text-capitalize hover:text-white' id='message' onclick='message()'>message</a>     


         </div>
</div>

   <br><br>

   <!-- part b  -->

 <div  class='container'>

     <h5 class='fw-bold text-white bg-dark py-2 px-2'>Personal information</h5>

     <br><br>

     <div class='d-flex text-sm'>

          <div class='col-md-6'>
               <label for="">first name</label>
              <input type="text" class='form-control'>

          </div>

          <div class='col-md-6'>
                <label for="">last name</label>
               <input type="text" class='form-control'>
            
          </div>

     </div>


     <div class='d-flex text-sm'>

          <div class='col-md-6'>
               <label for="">Email address</label>
              <input type="text" class='form-control'>
          </div>

          <div class='col-md-6'>
                <label for="">Phone number</label>
               <input type="text" class='form-control'>           
          </div>

     </div>



     <div class='d-flex text-sm'>

          <div class='col-md-6'>
               <label for="">location</label>
              <input type="text" class='form-control'>
              <br>
              <div>
                <span><input type="checkbox"> <span>I'm willing to relocate</span></span>
              </div>


          </div>

          <div class='col-md-6'>
             
          
          </div>



     </div>

     
 </div>

<br><br>

 <div class='container'>


 <h5 class='fw-bold text-white bg-dark py-2 px-2'>Most recent job</h5>

 <div class='d-flex flex-md-row flex-column text-sm'>

     <div class='col-md-6'>
         <label for="">Job title</label>
         <input type="text" class='form-control'>

     </div>

     <div class='col-md-6'>
         <label for="">Company</label>
         <input type="text" class='form-control'> 
     </div>

 </div>



 <div class='d-flex flex-md-row flex-column text-sm'>

     <div class='col-md-6'>

         <label for="">Start date</label>
         <input type="text" class='form-control'>

     </div>

     <div class='col-md-6'>
         <label for="">End date</label>
         <input type="text" class='form-control'> 

         <div class='mt-2'>           
             <span><input type="checkbox"> I currently work here</span>
         </div>
     </div>

 </div>


<br><br>

<h5 class='fw-bold text-white bg-dark py-2 px-2'>Career summary</h5>

<div class='d-flex flex-md-row flex-column text-sm'>

     <div class='col-md-6'>

         <label for="">Years of experience</label>
         <input type="text" class='form-control'>

     </div>

     <div class='col-md-6'>

         <label for="">Highest education</label>
         <input type="text" class='form-control'> 

     </div>

</div>



<div class='d-flex flex-md-row flex-column text-sm'>

     <div class='col-md-6'>

         <label for="">Upload CV</label>
         <input type="text" class='form-control'>

     </div>

     <div class='col-md-6'>
        
         <label for="">Year called to bar</label>
         <input type="text" class='form-control'> 

     </div>

</div>



<div class='d-flex flex-md-row flex-column text-sm'>

     <div class='col-md-6'>

         <label for="">Upload Cover letter</label>
         <input type="file" class='form-control'>

     </div>

     <div class='col-md-6'>
        
         <label for="">Portfolio link</label>
         <input type="text" class='form-control'> 

     </div>

</div>



<br><br>


 <div class='popup px-3 shadow-lg'>

     <h5 class='text-center fw-bold mt-2'>Compose email</h5>


     <div class='text-sm'>

         <label for="">Candidate's email address</label>
         <input type="text" class='form-control'>

         <label for="">Subject</label>
         <input type="text" class='form-control'>

         <label for="">Message</label>
         <textarea class='form-control' placeholder="...Write a message" wrap="physical"> </textarea>    
         
         <div class='text-center m-4 d-flex justify-content-between'>
              
              <button class='d-flex justify-content-end btn btn-danger' id='close'> Cancel</button>
              <button class='btn btn-dark'>Send <i class='fa fa-arrow-right'></i></button>

         </div>
        

     </div>




 </div>



</div>
       <?php include ("components/footer.php");?>

       <script>

          function message(){

             document.querySelector('.popup').style.display ='block';
          
          }


          $("#close").click(function(){

             $('.popup').hide();
        
          });

       </script>

</body>
</html>