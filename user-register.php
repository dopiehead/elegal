<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php');?>
    <link rel="stylesheet" href="assets/css/user-register.css">
    <title>Create account</title>
</head>

<body>

     <div class='h-100 w-100 create_background '>

         <div class='px-5'>

              <a class='text-white fw-bold mt-5' href=""><i class='fa fa-arrow-left'></i></a>
         </div>        

         <div class='d-flex justify-content-center align-items-center g-5 flex-md-row flex-column mt-4 text-white'>

             <div class='create-container px-1'>

                 <span class='fw-bold text-white'>Sign up</span>
                 <span class='text-sm'>Already have an account? <a class='text-white border-bottom border-2 border-secondary pb-1' href='create-account.php'>login</a></span> 
                 
                 <br>

                 <form>
                   
                     <label class='text-sm text-secondary' for="">Fullname(Surname first)</label>

                     <input type="text" class='bg-secondary border-0 w-100 py-2'>

                     <br>

                     <label class='text-sm text-secondary' for="">Email address</label>

                     <input type="email" class='bg-secondary border-0 w-100 py-2'>



                     <label class='text-sm text-secondary' for="">Password</label>

                     <input type="password" class='bg-secondary border-0 w-100 py-2'>



                     <label class='text-sm text-secondary' for="">Confirm Password</label>

                     <input type="password" class='bg-secondary border-0 w-100 py-2'> 


                     <label class='text-sm text-secondary' for="">Occupation</label>

                     <input type="text" class='bg-secondary border-0 w-100 py-2'>



                     <label class='text-sm text-secondary' for="">Date of birth</label>

                     <input type="date" class='bg-secondary border-0 w-100 py-2'>                     



                     <label class='text-sm text-secondary' for="">Tell us about you</label>

                     <textarea class='bg-secondary border-0 w-100 py-2' rows="5"></textarea> 

                     

                     <div class='text-center mt-5'>

                         <button class='btn btn-success text-sm'>Sign up</button>

                     </div>



                    </form>

             </div>

         </div>
        

     </div>
    
</body>
</html>