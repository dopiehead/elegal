
<?php session_start();

?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
    <link rel="stylesheet" href="../assets/css/dashboard/myprofile.css">

</head>

<body class='bg-light'> 

     <div class='px-3'>

         <div class='d-flex gap-3 flex-md-row flex-column'>              

             <?php include ("navigator.php"); ?>
                    
             <div class='dashboard'>
                 
                 <h4>My profile</h4>

                 <div class='d-flex justify-content-between shadow-lg px-3 py-4 mt-4 bg-white border border-1 border-mute'> 

                     <div class='d-flex flex-column-start gap-1'>
                         <img class='user_image' src="../../elegal/assets/images/man.jpg" alt="elegal">
                         <div class='d-flex flex-column flex-row'>
                             <h6 class='fw-bold'>Jack Adams</h6>
                             <span class='text-secondary'>Lawyer</span>
                             <span class='text-secondary'>No 1 iyalla street, ikeja.</span>
                         </div>
                     </div>

                     <div>
                      
                         <a class='btn border border-1 border-mute text-secondary' href=""><span class='fa fa-edit'></span>Edit</a>

                     </div>
                    
                 </div>

                 <!-- end of profile part -->


             
                <div class='px-3 py-2 border border-1 border-mute shadow-lg bg-white mt-4'>

                     <div class='d-flex justify-content-between'>
                         <h5 class='fw-bold'>Personal information</h5>
                         <a class='btn border border-1 border-mute text-secondary' href=""><span class='fa fa-edit'></span> Edit</a>
                     </div>

                     <div class='d-flex justify-content-between text-secondary  flex-md-row flex-column px-3'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                            
                             <label for="">First Name</label>
                             <span class='fw-bold'>Jack</span>

                         </div>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                            
                            <label for="">Last Name</label>
                            <span class='fw-bold'>Adams</span>

                        </div>
                             

                     </div>

                     
                     <div class='d-flex justify-content-between  flex-md-row flex-column px-3'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                             <label for="">Email address</label>
                             <span class='fw-bold'>jackadams@gmail.com</span>
                            
                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Phone number</label>
                             <span class='fw-bold'>2349074543243</span>

                         </div>

                     </div>

                     <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>
                         
                          <label for="">Occupation</label>
                          <span class='fw-bold'>Lawyer</span>

                     </div>


                </div>


                <div class='bg-white px-3 py-3 mt-4 shadow-lg'>


                     <div class='d-flex justify-content-between'>
                         <h5 class='fw-bold'>Address</h5>
                         <a class='btn border border-1 border-mute text-secondary' href=""><span class='fa fa-edit'></span> Edit</a>
                     </div>
                    

                     <div class='text-secondary d-flex flex-md-row flex-column justify-content-between mt-3'>

                           <div class='d-flex flex-row flex-column'>
                               <label for="">Country</label>
                               <span class='fw-bold'>Nigeria</span>

                           </div>

                           <div class='d-flex flex-row flex-column'>
                               <label for="">City/State</label>
                               <span class='fw-bold'>Lagos</span>

                           </div>

                     </div>

                     <div class='d-flex flex-row flex-column mt-3 text-secondary'>
                       
                         <label for="">Supreme Court Number</label>
                         <span class='fw-bold'>110036634</span>

                     </div>
                    


                </div>





             </div>



         </div>
       

     </div>
    
</body>
</html>