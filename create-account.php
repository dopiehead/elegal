<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php');?>
    <link rel="stylesheet" href="assets/css/create-account.css">
    <title>Create account</title>
</head>

<body>

     <div class='h-100 w-100 create_background'>

        <br>

         <div class='px-5'>

              <a class='text-white fw-bold mt-5' onclick='history.go(-1)'><i class='fa fa-arrow-left'></i></a>
              
         </div>

         <div class='container'>

             <h5 class='text-white fw-bold mt-5'>Sign up to join E-legal</h5>
 
         </div>

         <br><br>

         <div class='d-flex justify-content-center align-items-center g-5 flex-md-row flex-column mt-4'>
           
             <div class='create-container'>
                 <span class='text-success '><a class='text-success' href='user-register.php'><i class='fa fa-user-alt fa-3x'></i></a></span>
                 <span class='text-sm text-white'><a class='text-white text-decoration-none' href='user-register.php'>I am a user/explorer</a></span>
             </div>

             <div class='create-container'>
                  <span><a class='text-white' href='lawyer-register.php'><img src="assets/images/law-icon.png" alt=""></a></span>
                 <span class='text-sm text-white'><a class='text-white text-decoration-none' href='lawyer-register.php'>I am a legal practioner</a></span>
             </div>

             <div class='create-container'>
                 <span><a class='text-white' href='firm-register.php'><img src="assets/images/building-icon.png" alt=""></a></span>
                 <span class='text-sm text-white'><a class='text-white text-decoration-none' href='firm-register.php'>I am a firm</a></span>
             </div>

             <div class='create-container'>
                 <span><a class='text-white' href='police-department-register.php'><img class="police-logo" src="assets/images/police-dept-icon.png" alt=""></a></span>
                 <span class='text-sm text-white'><a class='text-white text-decoration-none' href='police-department-register.php'>Police department</a></span>
             </div>

             <div class='create-container'>
                 <span><a class='text-white' href='police-register.php'><img class="police-logo" src="assets/images/police-icon-new.png" alt=""></a></span>
                 <span class='text-sm text-white'><a class='text-white text-decoration-none' href='police-register.php'>Police officer</a></span>
             </div>

         </div>
        

     </div>
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->    
</body>
</html>