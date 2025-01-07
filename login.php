<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php');?>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Create account</title>
</head>

<body>

     <div class='h-100 w-100 create_background'>

        <br>

         <div class='px-5'>

              <a class='text-white fw-bold mt-5' href=""><i class='fa fa-arrow-left'></i></a>
         </div>

         <div class='container'>

             <h4 class='text-white fw-bold mt-5'>Login to E-legal</h4>
 
         </div>

         <br><br>

         <div class='d-flex justify-content-center align-items-center g-5 flex-md-row flex-column mt-4 text-white'>

             <div class='create-container px-1'>
             
                 <span>Don't have an account? <a class='text-white border-bottom border-2 border-secondary pb-1' href='create-account.php'>Sign up</a></span> 

                 <br>

                 <form>

                    
                     <label class='text-sm text-secondary' for="">Email address</label>

                     <input type="text" class='bg-secondary border-0 w-100 py-2'>

                     <br><br>

                     <label class='text-sm text-secondary' for="">Password</label>

                     <input type="password" class='bg-secondary border-0 w-100 py-2'>

                     <div class='text-center mt-5'>

                         <button class='btn btn-success text-sm'>Log in</button>

                     </div>



                 </form>





             </div>

         </div>
        

     </div>
    
</body>
</html>