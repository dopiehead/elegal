<?php

$details = null;
if(isset($_GET['details']) && !empty($_GET['details'])){
     $details = $_GET['details'];
}

?>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include ('components/links.php');?>
     <link rel="stylesheet" href="assets/css/login.css">
     <title>Login page</title>
</head>

<body>

     <div class='h-100 w-100 create_background'>

        <br>

         <div class='px-5'>

              <a class='text-white fw-bold mt-5' onclick="history.go(-1)"><i class='fa fa-arrow-left'></i></a>

         </div>

         <div class='container'>

             <h4 class='text-white fw-bold mt-5'>Login to E-legal</h4>
 
         </div>

         <br><br>

         <div class='d-flex justify-content-center align-items-center g-5 flex-md-row flex-column mt-4 text-white'>

             <div class='create-container px-1'>
             
                 <span>Don't have an account? <a class='text-white border-bottom border-2 border-secondary pb-1' href='create-account.php'>Sign up</a></span> 

                 <br>

                 <form id='login-form'>

                      <label class='text-sm text-secondary' for="">Choose role</label>

                      <select name="user_type" class='bg-secondary border-0 w-100 py-2 text-sm'>

                         <option value="user">Client</option>

                         <option value="lawyer">Counselor</option>

                         <option value="firm">Law Firm</option>
                    
                      </select>

                      <br><br>

                     <label class='text-sm text-secondary' for="">Email address</label>

                     <input type="text" name='user_email' class='bg-secondary border-0 w-100 py-2 text-sm'>

                     <br><br>

                     <label class='text-sm text-secondary' for="">Password</label>

                     <input type="password" name="user_password" class='bg-secondary border-0 w-100 py-2 text-sm'>

                     <div class='text-center mt-5'>

                           <button class='btn btn-success text-sm btn-login' id='btn-login'><span class='spinner-border text-warning'></span> <span class='sign-in-note'>Log in</span></button>


                     </div>

                 </form>

             </div>

         </div>
        
     </div>

     <script>

$(document).ready(function() {

     $(".spinner-border").hide();

     $(".btn-login").on("click", function(e) {

        e.preventDefault();

         $(".spinner-border").show();

         $('#btn-login').prop('disabled', true);
    
         $(".sign-in-note").hide();

        let details = $("#details").val();

        let formData = $("#login-form").serialize(); // Get form data

        $.ajax({
             type: "POST",

             url: "engine/login-process.php",

             data: formData,

             success: function(response) {
        
                 $(".spinner-border").hide();
                 $(".sign-in-note").show();
                 $('#btn-login').prop('disabled', false);

                if (response == 1) {
                 
                     $("#login-form")[0].reset();
             
                     if (details !== "") {

                         window.location.href = details;

                    } else {

                         window.location.href = "dashboard/dashboard.php"; // Default redirect
                    }

                } else {
                  
                    swal({

                         icon: "warning",
                         text: response,
                         title: "Notice"

                    });

                     $("input").css('border', '1px solid red');
                }
            },
            error: function(err) {

                 $(".spinner-border").hide();
               
                swal({

                     icon: "error",
                     text: err,
                     title: "Error"
                });
            }
        });
    });
});
</script>


    
</body>
</html>