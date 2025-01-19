<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
    <link rel="stylesheet" href="../assets/css/dashboard/chat.css">
</head>

<body class='bg-light'>

     <div class='d-flex justify-content-between'>
        
         <div class='bg-white shadow-lg px-3 py-2 profile-container h-100 vh-100 overflow-y-auto'>

             <div class='d-flex justify-content-start align-items-center gap-2 chat-profile'>

                 <span onclick='history.go(-1)' class='fa fa-chevron-left fw-bold'></span>
                 <img src="../assets/images/woman.png" alt="">
                 <h6>Messages</h6>

             </div>

             <div class='mt-3 w-100'>

                <input type="search" class='bg-light border-0 rounded rounded-pill p-1 text-sm form-control focus:border-0' placeholder='Search..'>

             </div>

             <div class='mt-5 d-flex flex-row flex-column gap-5 '>             

             <?php  

$divTemplate = "
    <div class='profile-body d-flex justify-content-between gap-3 %s'>
        <div class='d-flex justify-content-center gap-2'>
            <div>
                <img src='../assets/images/man.jpg' alt='elegal'>
                <span class='fa fa-circle text-sm text-success position:absolute'></span>
            </div>
            <div>
                <h6 class='fw-bold text-sm'>John Doe</h6>
                <span class='text-sm text-secondary'>Good morning sir</span>
            </div>
        </div>
        <div class='d-flex flex-column flex-row gap-2'>
            <span class='text-sm'>16:45am</span>
            <span class='text-primary fa fa-check'></span>
        </div>
    </div>
";

for ($i = 0; $i < 5; $i++) {
  
    $bgClass = ($i == 2) ? "bg-light px-2 py-2" : "";
    
    echo sprintf($divTemplate, $bgClass);
}

?>

                 </div>


             </div>


         <!-- body part -->

         <div class='col-md-9 chat-body vh-100 overflow-y-auto'>
         
              <div class='d-flex justify-content-between align-items-center px-2 py-2 bg-white w-100 position-fixed top-2'>
                  
                  <div class='d-flex gap-2'>
                    
                     <img src="../assets/images/man.jpg" alt="">
                     
                      <div class='d-flex flex-row flex-column gap-1'>
                       
                          <h6>John Doe</h6>
                          <span class='text-success text-sm'>Online</span>
                          
                      </div>

                  </div>

                  <div>

                        <a class='btn text-secondary border border-2 border-mute' href="">View Profile</a>

                  </div>





              </div>

            <br>

             <div class='mt-5 w-100 px-3 d-flex flex-row flex-column'>

                  <div class='w-100 mt-3'>
 
                       <div class='from-container bg-white py-4 px-2 w-50 mt-2 d-flex  flex-row flex-column'>
             
                              <span>Good morning sir</span>

                              <span class='text-sm text-secondary'>2:47</span>

                        </div>
                           
                  </div>


                  <div>


                     <div class='to-container bg-white py-4 px-3 w-50 mt-5 d-flex justify-content-between'>

                          <span>How are you boss ?</span>

                          <div>
                             <span class='text-sm text-secondary'>16:47</span>
                             <span class='fa fa-check text-sm text-success'></span>
                         </div>

                     </div>


                  </div>




                  <div>


                     <div class='to-container bg-white py-4 px-3 w-50 mt-5 d-flex justify-content-between'>

                          <span>I am good.</span>

                          <div>
                             <span class='text-sm text-secondary'>16:47</span>
                         
                         </div>

                     </div>


                  </div>



            </div>
            
             
            <br><br>








             <div class='text-body bg-white  px-1 py-1 row position-fixed'>
             

                   <div class='col-md-10'>

                         <textarea name="" id="" class='bg-light border-0 ' placeholder='Type your message here' rows='3'></textarea>

                   </div>

                   <div class='col-md-2'>

                         <button class='btn btn-success form-control'>Send</button>

                   </div>

                 

             </div>


         </div>

     </div>    
    
</body>
</html>