<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php');?>
    <link rel="stylesheet" href="assets/css/user-register.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">
    <title>Create account</title>
</head>

<body>

     <div class='create_background d-flex justify-content-center align-items-center flex-row flex-column'>
   
         <div class='create-container px-5'>

             <div class='d-flex flex-row flex-column heading-container position-relative justify-content-start mt-4 w-100 w-md-100 g-3'>
                  <span class='fw-bold text-white'>Sign up</span>
                  <span class='text-sm text-white'>Already have an account? <a class='text-white border-bottom border-2 border-secondary pb-1 text-decoration-none' href='login.php'>login</a></span> 
             </div>            
           
             <form id='user-registration-form'>

                 <input type="hidden" name='user_img' class='bg-secondary border-0 w-100 py-2'>
                   
                  <label class='text-sm text-secondary' for="">Fullname(Surname first)</label>

                  <input type="text" name="user_name" class='bg-secondary border-0 w-100 py-2'>

                  <br>

                 <label class='text-sm text-secondary' for="">Email address</label>

                 <input type="email" name='user_email' class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">Password</label>

                 <input type="password" name='user_password' class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">Confirm Password</label>

                 <input type="password" name='confirm_password' class='bg-secondary border-0 w-100 py-2'> 


                 <label class='text-sm text-secondary' for="">Occupation</label>

                 <input type="text" name='user_occupation' class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">Telephone</label>

                 <input type="text" name='phone_number' class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">Location</label>

                 <input type="text" name='user_location' class='bg-secondary border-0 w-100 py-2' placeholder='Full address zipcode, street no, e.t.c'>


                 <label class='text-sm text-secondary' for="">Date of birth</label>

                 <input type="date" name='date_of_birth' class='bg-secondary border-0 w-100 py-2 text-sm'>                     


                 <label class='text-sm text-secondary' for="">Tell us about you</label>

                 <textarea name="user_bio" class='bg-secondary border-0 w-100 py-2' rows="5"></textarea>                      
                  
                 <div class='text-center d-flex justify-content-center mt-4 mb-2 gap-1'>
                        
                       <button class='btn btn-success text-sm d-flex justify-content-center align-items-center' id='btn-signup'><span class='spinner-border text-warning'></span> <span class='sign-up-note'>Sign up</span></button>
                       <span class='btn border border-2 border-white text-white' onclick="history.go(-1)">Go back</span>

                 </div>

             </form>

         </div>

     </div>

     <script>
        
$(document).ready(function() {
 
    $(".spinner-border").hide();

    // Handle form submission
    $('#user-registration-form').on('submit', function(e) {
        e.preventDefault();  // Prevent the default form submission
         let form = $('#user-registration-form').serialize();
        // Show spinner, disable submit button, and hide sign-up note
        $(".spinner-border").show();
        $('#btn-signup').prop('disabled', true);
        $(".sign-up-note").hide();

        // Create FormData object
        let formData = new FormData(this);

        // Send the form data via AJAX
        $.ajax({
            type: "POST",
            url: "engine/user-register-process.php",
            data: formData,
            processData: false, // Don't let jQuery try to process the data
            contentType: false, // Let FormData set content-type correctly
            success: function(response) {
                $(".spinner-border").hide();  // Hide the spinner
                $(".sign-up-note").show();    // Show the sign-up note

                if (response == 1) {
                    swal({ 
                          title: "Success",
                          text: "Registration successful. Please check your email for verification.",
                         icon: "success",
                    });

                    // Reset the form
                    $("#user-registration-form")[0].reset();
                    $("#user-registration-form").val('');
                    $("#user-registration-form").trigger('reset');
                    $('#btn-signup').prop('disabled', false);  // Re-enable the submit button
                } else {
                    swal({
                         title: "Notice",
                         icon: "warning",
                         text: response,
                    });
                    $('#btn-signup').prop('disabled', false);  // Re-enable the submit button
                    $('input').css('border', '1px solid red');     // Highlight invalid fields
                    $('textarea').css('border', '1px solid red');  // Highlight invalid textarea
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $(".spinner-border").hide();  // Hide the spinner in case of error
                $('#btn-signup').prop('disabled', false);  // Re-enable the submit button
                console.log(errorThrown);  // Log the error
                swal({
                    icon: "error",
                    text: "An error occurred. Please try again.",
                });
            }
        });
    });
});
</script>

    
</body>
</html>