<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
    <link rel="stylesheet" href="../assets/css/dashboard/firm-dashboard.css">
    

    <title>Firm dashboard</title>
</head>
<body class='bg-light'>
   

     <div> 

             <div class='profile-container w-100 bg-white pt-2 pb-3 px-3 mb-2'>

                  <div class='position-relative'>
                      <a class='text-dark fw-bold' href=""><i class='fa fa-sign-out'></i></a>
                  </div>

                  <div class='d-flex justify-content-around'>
                     <img src="../assets/images/firms/Frame 35 (1).png" alt="e-legal">
                  
                  </div>    
                  
                  <div>
                     
                      <h4 class='fw-bold'>Osuya & Osuya</h4>

                  </div>

             </div>



               <!-- navigation container -->


             
             <div class='d-flex justify-content-between flex-md-row flex-column mt-5'>

                 <ul class='list-unstyled d-flex justify-content-center align-items-start flex-row flex-column py-2 px-3 bg-white link-content'>

                     <li class='bg-light'>
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none' id='clients_onboard'>Clients onboard</a>
                          <span class='fa fa-arrow-right'></span>
                     </li>

                     <li class='bg-light'>
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none' id='ongoing_cases'>Ongoing cases</a>
                          <span class='fa fa-arrow-right'></span>
                    </li>

                     <li class='bg-light'>
                        
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none' id="concluded_cases">Concluded cases</a>
                          <span class='fa fa-arrow-right'></span>
                    
                     </li>

                     <li class='bg-light'>
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none' id="lawyers_onboard">Lawyers onboard</a>
                          <span class='fa fa-arrow-right'></span>
                    </li>

                     <li class='bg-light'>
                        
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none' id="money_in">Money in</a>
                          <span class='fa fa-arrow-right'></span>
                    
                     </li>    
                    
                    
                     <li class='bg-light'>
                        
                         <span class='text-success fa fa-user-alt fa-1x'></span>
                         <a class='text-secondary text-decoration-none' id="money_out">Money out</a>
                         <span class='fa fa-arrow-right'></span>
                  
                     </li> 


                     <li class='bg-light'>
                        
                         <span class='text-success fa fa-user-alt fa-1x'></span>
                         <a class='text-secondary text-decoration-none' id="case_definition">Case definition</a>
                         <span class='fa fa-arrow-right'></span>
                  
                     </li> 


                     <li class='bg-light'>
                        
                         <span class='text-success fa fa-user-alt fa-1x'></span>
                         <a class='text-secondary text-decoration-none' id="to_do_list">To do list</a>
                         <span class='fa fa-arrow-right'></span>
                 
                     </li> 


                     <li class='bg-light'>
                        
                         <span class='text-success fa fa-user-alt fa-1x'></span>
                         <a class='text-secondary text-decoration-none' id="reminder">Reminder</a>
                         <span class='fa fa-arrow-right'></span>
                 
                     </li> 


                 </ul>     
                 
                 

                            <!-- main content  -->

                 <div class='b-part px-3'>

                           <div class='table-container'></div>


                 </div>




             </div>

     </div> 
     <br><br>

     <script>

        $("#clients_onboard").click(function(){
      
            $(".table-container").load("../components/dashboard/clients-onboard.php");
        });

        
       
     </script>
 
</body>
</html>
