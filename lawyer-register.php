<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php');?>
    <link rel="stylesheet" href="assets/css/lawyer-register.css">
    <title>Create account</title>
</head>

<body>

     <div class='create_background d-flex justify-content-center align-items-center flex-row flex-column'>
 

         <div class='create-container px-5'>

             <div class='d-flex flex-row flex-column heading-container position-relative justify-content-start mt-4 w-100 w-md-100 g-3'>
                  <span class='fw-bold text-white'>Sign up</span>
                  <span class='text-sm text-white'>Already have an account? <a class='text-white border-bottom border-2 border-secondary pb-1' href='login.php'>login</a></span> 
             </div>  

             
           
             <form>
                   
                  <label class='text-sm text-secondary' for="">Fullname(Surname first) <span class='text-danger'>*</span></label>

                  <input type="text" class='bg-secondary border-0 w-100 py-2'>

                  <br>

                 <label class='text-sm text-secondary' for="">Email address  <span class='text-danger'>*</span></label>

                 <input type="email" class='bg-secondary border-0 w-100 py-2'>

                 <label class='text-sm text-secondary' for="">Supreme court number  <span class='text-danger'>*</span></label>

                 <input type="text" class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">Are you currently engaged with a law firm  <span class='text-danger'>*</span></label>

                 <select class='bg-secondary border-0 w-100 py-2'>
                    
                    <option value="">Yes</option>
                    <option value="">No</option>

                 </select>


                 <label class='text-sm text-secondary' for="">What is your current position? (Write nil if not applicable to you) <span class='text-danger'>*</span></label>

                 <input type="text" class='bg-secondary border-0 w-100 py-2'> 


                 <label class='text-sm text-secondary' for="">How long have you been practicing <span class='text-danger'>*</span></label>

                 <input type="text" class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">What are you areas of specialization (seperate by comma if you have more than 1) <span class='text-danger'>*</span></label>

                 <input type="text" class='bg-secondary border-0 w-100 py-2' placeholder='family law, criminal law'>                     



                 <label class='text-sm text-secondary' for="">Published articles (please paste link if applicable) <span class='text-danger'></span></label>

                 <input type="text" class='bg-secondary border-0 w-100 py-2' placeholder='family law, criminal law'>  



                 <label class='text-sm text-secondary' for="">License number and states(s) in which you are licensed to practise <span class='text-danger'>*</span></label>

                 <input type="text" class='bg-secondary border-0 w-100 py-2' placeholder='family law, criminal law'>  


                 <label class='text-sm text-secondary' for="">Tell us more about you <span class='text-danger'>*</span></label>

                 <textarea class='bg-secondary border-0 w-100 py-2' rows="5"></textarea>  
                 
                 

                 <label class='text-sm text-secondary' for="">Password <span class='text-danger'>*</span></label>

                 <input type="password" class='bg-secondary border-0 w-100 py-2' placeholder='family law, criminal law'>  


                 <label class='text-sm text-secondary' for="">Confirm password <span class='text-danger'>*</span></label>

                 <input type="password" class='bg-secondary border-0 w-100 py-2' placeholder='family law, criminal law'>  

                  
                 <div class='text-center d-flex justify-content-center mt-4 mb-2'>

                       <button class='btn btn-success text-sm d-flex justify-content-center align-items-center'>Sign up</button>

                 </div>

             </form>

         </div>

     </div>
    
</body>
</html>