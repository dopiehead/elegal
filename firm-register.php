<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('components/links.php');?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="assets/css/firm-register.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css"> 
    <!-- <link rel="stylesheet" href="assets/css/customSelect.css">  -->
    <title>Create account for Firms</title>
</head>

<body>

     <div class='create_background d-flex justify-content-center align-items-center flex-row flex-column'>
 
         <div class='create-container px-5'>

             <div class='d-flex flex-row flex-column heading-container position-relative justify-content-start mt-4 w-100 w-md-100 g-3'>
                  <span class='fw-bold text-white'>Sign up</span>
                  <span class='text-sm text-white'>Already have an account? <a class='text-white border-bottom border-2 border-secondary pb-1 text-decoration-none' href='login.php'>login</a></span> 
             </div>  
          
             <form id="firm-registration-form">
                   
                  <label class='text-sm text-secondary' for="">Firm name <span class='text-danger'>*</span></label>

                  <input type="text" name="firm_name" class='bg-secondary border-0 w-100 py-2'>

                  <br>

                 <label class='text-sm text-secondary'  for="">Email address  <span class='text-danger'>*</span></label>

                 <input type="email"  name="firm_email" class='bg-secondary border-0 w-100 py-2'>

                 <label class='text-sm text-secondary' for="">Phone number  <span class='text-danger'>*</span></label>

                 <input type="text" name="firm_phone_number" class='bg-secondary border-0 w-100 py-2'> 

                 <label class='text-sm text-secondary' for="">Date found <span class='text-danger'>*</span></label>

                 <input type="date" name="date_found" class='bg-secondary border-0 w-100 py-2'> 

                  <label class='text-sm text-secondary' for="">Location<span class='text-danger'>*</span></label>

                 <input type="text" name="firm_location" class='bg-secondary border-0 w-100 py-2' placeholder="Full address"> 

                 <label class='text-sm text-secondary' for="">How many lawyers work in your firm <span class='text-danger'>*</span></label>

                 <input type="text" name="nooflawyers" class='bg-secondary border-0 w-100 py-2'>

                 <label class='text-sm text-secondary form-label' for="">What are you areas of specialization (select multiple if you have more than 1) <span class='text-danger'>*</span></label>
                  
                 <div>

                      <div class='d-flex justify-content-start g-5 flex-wrap mt-2 bg-secondary py-5 px-2 text-sm'>

                         <span class='text-white'><input type="checkbox"  name="practice_areas[]" value="criminal"> Criminal Law</span>
                         <span class='text-white'><input  type="checkbox" name="practice_areas[]" value="civil" > Civil Law</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="corporate"> Corporate Law</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="family"> Family Law</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="intellectual_property"> Intellectual Property</span>         

                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Property"> Property</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Labour"> Labour</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Administrative"> Administrative</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Common"> Common</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Constructive"> Constructive</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Constitutional"> Constitutional</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Energy"> Energy</span>

                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Public"> Public</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Customary"> Customary</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Admiralty"> Admiralty</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Nigerian Legislature"> Nigerian Legislature</span>
                        <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Literalrule"> Literalrule</span>
                                    
                     </div>

                 </div>

                 <label class='text-sm text-secondary mt-4' for="">Certifications and accreditation (select multiple if you have more than 1) <span class='text-danger'>*</span></label>
                 
                 <div>

                     <div class='d-flex justify-content-evenly g-1 flex-wrap mt-2 bg-secondary py-3 text-sm'>
                         <span class='text-white'><input type="checkbox"  name="certification_accredit[]" value="san" > WHO Award</span>
                         <span class='text-white'>  <input type="checkbox"  name="certification_accredit[]" value="san"> SAN Award</span>
                         <span class='text-white'><input  type="checkbox" name="certification_accredit[]" value="usf"> USF Award</span>
                         <span class='text-white'><input  type="checkbox" name="certification_accredit[]" value="encomium"> Ecomium Award of the year</span>

                 </select>
                     </div>
                 </div>
                 <label class='text-sm text-secondary' for="">Tell us more about you <span class='text-danger'>*</span></label>

                 <textarea name="firm_bio" class='bg-secondary border-0 w-100 py-2' rows="5"></textarea>  
                 
                 <label class='text-sm text-secondary' for="">Password <span class='text-danger'>*</span></label>

                 <input type="password" name="firm_password" class='bg-secondary border-0 w-100 py-2' placeholder='Enter Password'>  

                 <label class='text-sm text-secondary' for="">Confirm password <span class='text-danger'>*</span></label>

                 <input type="password" name="confirm_password" class='bg-secondary border-0 w-100 py-2' placeholder='Confrm password'>  
                  
                 <div class='text-center d-flex justify-content-center mt-4 mb-2 gap-1'>

                     <button class='btn btn-success text-sm d-flex justify-content-center align-items-center' id='btn-signup'><span class='spinner-border text-warning'></span> <span class='sign-up-note'>Sign up</span></button>
                     <a class='btn border border-2 border-white text-white' onclick="history.go(-1)">Go back</a>
                     
                 </div>

             </form>

         </div>

     </div>

   <script>
$(document).ready(function() {
    // Cache jQuery selectors for repeated use
    const $spinner = $(".spinner-border");
    const $signupBtn = $('#btn-signup');
    const $signUpNote = $(".sign-up-note");
    const $firmRegistrationForm = $('#firm-registration-form');
    const $inputs = $('input, textarea');

    // Initially hide the spinner and sign-up note
    $spinner.hide();
  
    // Handle form submission
    $firmRegistrationForm.on('submit', function(e) {
        e.preventDefault();  // Prevent default form submission

        // Show spinner, disable submit button, and hide sign-up note
        $spinner.show();
        $signupBtn.prop('disabled', true);
        $signUpNote.hide();

        // Create a JSON object to send as the API request body
        let data = {
            firm_name: $('#firm_name').val(),
            firm_email: $('#firm_email').val(),
            firm_password: $('#firm_password').val(),
            confirm_password: $('#confirm_password').val(),
            firm_phone_number: $('#firm_phone_number').val(),
            firm_bio: $('#firm_bio').val(),
            date_found: $('#date_found').val(),
            nooflawyers: $('#nooflawyers').val(),
            firm_location: $('#firm_location').val(),
            firm_rating: $('#firm_rating').val() || 0, // Default to 0 if empty
            verified: $('#verified').val() || 0, // Default to 0 if empty
            payment_status: $('#payment_status').val() || 0, // Default to 0 if empty
            practice_areas: $('#practice_areas').val() || [], // Default to empty array if no areas selected
            certification_accredit: $('#certification_accredit').val() || [], // Default to empty array if no certs selected
        };

        // Send the form data as a JSON object to the API via AJAX
        $.ajax({
            type: "POST",
            url: "engine/firm-register-process.php", // Replace with your API endpoint
            contentType: "application/json",  // Set content type to JSON
            data: JSON.stringify(data), // Send data as JSON string
            success: function(response) {
                // Hide spinner, show the sign-up note
                $spinner.hide();
                $signUpNote.show();

                if (response.success == "1") {
                    swal({ 
                          title: "Success",
                          text: "Registration successful. Please check your email for verification.",
                          icon: "success",
                    });

                    // Reset the form and re-enable the submit button
                    $firmRegistrationForm[0].reset();
                    $signupBtn.prop('disabled', false);
                } else {
                    swal({
                         title: "Notice",
                         icon: "warning",
                         text: response.error || "An error occurred, please try again.",
                    });
                    $signupBtn.prop('disabled', false);  // Re-enable the submit button

                    // Highlight invalid fields
                    $inputs.css('border-color', 'red');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Hide spinner and re-enable the submit button
                $spinner.hide();
                $signupBtn.prop('disabled', false);

                // Log detailed error for debugging
                console.error("Error Details: ", textStatus, errorThrown);

                // Show error alert
                swal({
                    title: 'Error',
                    icon: "error",
                    text: "An error occurred. Please try again.",
                });
            }
        });
    });
});
</script>

     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->
</body>
</html>