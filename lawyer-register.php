<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php');?>
    <link rel="stylesheet" href="assets/css/lawyer-register.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">
    <title>Create account</title>
</head>

<body>


     <div class='create_background d-flex justify-content-center align-items-center flex-row flex-column'>
 

         <div class='create-container px-5'>

             <div class='d-flex flex-row flex-column heading-container position-relative justify-content-start mt-4 w-100 w-md-100 g-3'>
                  <span class='fw-bold text-white'>Sign up</span>
                  <span class='text-sm text-white'>Already have an account? <a class='text-decoration-none text-white border-bottom border-2 border-secondary pb-1' href='login.php'>login</a></span> 
             </div>  

             <form id="lawyer-registration-form">
                   
                  <label class='text-sm text-secondary' for="">Fullname(Surname first) <span class='text-danger'>*</span></label>

                  <input type="text" name='lawyer_name' class='bg-secondary border-0 w-100 py-2'>

                  <br>

                 <label class='text-sm text-secondary' for="">Email address  <span class='text-danger'>*</span></label>

                 <input type="email" name="lawyer_email" class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">Education(Seperate higher institutions by a comma)<span class='text-danger'>*</span></label>

                 <input type="text" name="lawyer_education" class='bg-secondary border-0 w-100 py-2' placeholder="Seperate higher institutions by a comma">



                 <label  class='text-sm text-secondary' for="">Supreme court number  <span class='text-danger'>*</span></label>

                 <input type="text" name="supreme_court_number" class='bg-secondary border-0 w-100 py-2'>

                   
                 <label  class='text-sm text-secondary' for="">Telephone <span class='text-danger'>*</span></label>

                 <input type="text" name="telephone" class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">Are you currently engaged with a law firm  <span class='text-danger'>*</span></label>

                 <select name="currently_engaged" class='bg-secondary border-0 w-100 py-2'>
                    
                    <option value="yes">Yes</option>
                    <option value="no">No</option>

                 </select>


                 <label class='text-sm text-secondary' for="">What is your current position? (Write nil if not applicable to you) <span class='text-danger'>*</span></label>

                 <select name="current_position" class='bg-secondary border-0 w-100 py-2'> 

                               <option value="ll.b">LL.B</option>
                               <option value="bl">BL</option>
                               <option value="ll.m">LL.M</option>
                               <option value="phd">PHD</option>
                               <option value="san">SAN</option>

                 </select>


                 <label class='text-sm text-secondary' for="">What is your current work place? <span class='text-danger'></span></label>

                 <input type="text" name="lawyer_firm" class='bg-secondary border-0 w-100 py-2'> 





                 <label class='text-sm text-secondary' for="">How long have you been practicing <span class='text-danger'>*</span></label>

                 <input type="text" name="lawyer_experience" class='bg-secondary border-0 w-100 py-2'>




   
                 <label class='text-sm text-secondary' for="">Date of birth <span class='text-danger'>*</span></label>

                 <input type="date" name="lawyer_dob"  max="2009-01-01"  class='bg-secondary border-0 w-100 py-2'>


                 <label class='text-sm text-secondary' for="">What are you areas of specialization (seperate by comma if you have more than 1) <span class='text-danger'>*</span></label>

                 <select name="practice_areas[]" multiple  class='bg-secondary border-0 w-100 py-2 text-sm'> 
                    

                        <option value='public law'>Public Law</option>
                        <option value='property law'>Property Law</option>
                        <option value='labour law'>Labour Law</option>
                        <option value='admininstrative law'>Administrative Law</option>
                        <option value='common law'>Common Law</option>
                        <option value='constructivity law'>Constructivity law</option>
                        <option value='constitutional law'>Constitutional Law</option>
                        <option value='energy'>Energy Law</option>
                        <option value='family'>Family Law</option>
                        <option value='public'>Public Law</option>
                        <option value='customary'>Customary Law</option>
                        <option value='admiralty'>Admiralty Law</option>
                         <option value='nigerian legislature'>Nigerian Legislature</option>
                         <option value='literal rule'>Literalrule</option>
                    
                 </select>



                 <label class='text-sm text-secondary' for="">Published articles (Please paste link if applicable) <span class='text-danger'></span></label>

                 <input type="text" name="published_article" class='bg-secondary border-0 w-100 py-2' placeholder='family law articles, criminal law articles'>  



                 <label class='text-sm text-secondary' for="">License number and states(s) in which you are licensed to practise <span class='text-danger'>*</span></label>

                 <input type="text" name="practice_location" class='bg-secondary border-0 w-100 py-2' placeholder='seperate by a comma(,)'>  



                 <label class='text-sm text-secondary' for="">Location (This will only be seen by you) <span class='text-danger'> *</span></label>

                 <input type="text" name="lawyer_location" class='bg-secondary border-0 w-100 py-2' placeholder='Full address zip code, house no e.t.c'>  




                 <label class='text-sm text-secondary' for="">Tell us more about you <span class='text-danger'>*</span></label>

                 <textarea name="lawyer_bio" class='bg-secondary border-0 w-100 py-2' rows="5"></textarea>  
                 
                 

                 <label class='text-sm text-secondary' for="">Password <span class='text-danger'>*</span></label>

                 <input type="password" name="lawyer_password" class='bg-secondary border-0 w-100 py-2' placeholder='Enter password'>  


                 <label class='text-sm text-secondary' for="">Confirm password <span class='text-danger'>*</span></label>

                 <input type="password" name="confirm_password" class='bg-secondary border-0 w-100 py-2' placeholder='Confirm password'>  

                  
                 <div class='text-center d-flex justify-content-center mt-4 mb-2 gap-1'>

                      <button class='btn btn-success text-sm d-flex justify-content-center align-items-center' id='btn-signup'><span class='spinner-border text-warning'></span> <span class='sign-up-note'>Sign up</span></button>
                      <span class='btn border border-2 border-white text-white' onclick="history.go(-1)">Go back</span>
                 </div>

             </form>

         </div>

     </div>
     <script>
$(document).ready(function() {
    // Initially hide the spinner
    $(".spinner-border").hide();

    // Handle form submission
    $('#lawyer-registration-form').on('submit', function(e) {
        e.preventDefault();  // Prevent the default form submission

        // Show spinner, disable submit button, and hide sign-up note
        $(".spinner-border").show();
        $('#btn-signup').prop('disabled', true);
        $(".sign-up-note").hide();

        // Create FormData object
        let formData = new FormData(this);

        // Send the form data via AJAX
        $.ajax({
            type: "POST",
            url: "engine/lawyer-register-process.php",
            data: formData,
            processData: false, // Don't let jQuery try to process the data
            contentType: false, // Let FormData set content-type correctly
            success: function(response) {
                 $(".spinner-border").hide();  // Hide the spinner
                 $(".sign-up-note").show();    // Show the sign-up note

                 if (response == 1) {
                    swal({
                         title: "Success",
                         icon: "success",
                         text: "You have successfully registered. Please check your email for a verification link.",
                      
                    });

                    // Reset the form
                    $("#lawyer-registration-form")[0].reset();
                    $("#lawyer-registration-form input").val(""); // Clears input fields
                    $("#lawyer-registration-form select").val(""); // Clears select fields
                    $("#lawyer-registration-form textarea").val(""); // Clears textarea fields
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
                     title: "Error",
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