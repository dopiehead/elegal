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

                 <label class='text-sm text-secondary form-label' for="">What are you areas of specialization (seperate by comma if you have more than 1) <span class='text-danger'>*</span></label>

                 <select name="practice_areas[]" id="practice_areas" multiple="multiple" class='bg-secondary border-0 w-100 py-2 form-control text-sm position-relative'>
                 <!-- <option value=""selected>Select practice area</option> -->
                       <option value="criminal">Criminal Law</option>
                       <option value="civil">Civil Law</option>
                       <option value="corporate">Corporate Law</option>
                       <option value="family">Family Law</option>
                        <option value="intellectual_property">Intellectual Property</option>
                 </select>                  

                 <label class='text-sm text-secondary' for="">Certifications and accreditation <span class='text-danger'>*</span></label>

                 <select type="text" name="certification_accredit[]" id='certification_accreditation' multiple="multiple" class='bg-secondary border-0 w-100 py-2 form-control text-sm text-white'>

                      <option value="san">Select Award</option>
                      <option value="san">SAN Award</option>
                      <option value="usf">USF Award</option>
                      <option value="encomium">Ecomium Award of the year</option>

                 </select>

                 <label class='text-sm text-secondary' for="">Tell us more about you <span class='text-danger'>*</span></label>

                 <textarea name="firm_bio" class='bg-secondary border-0 w-100 py-2' rows="5"></textarea>  
                 
                 <label class='text-sm text-secondary' for="">Password <span class='text-danger'>*</span></label>

                 <input type="password" name="firm_password" class='bg-secondary border-0 w-100 py-2' placeholder='Enter Password'>  

                 <label class='text-sm text-secondary' for="">Confirm password <span class='text-danger'>*</span></label>

                 <input type="password" name="confirm_password" class='bg-secondary border-0 w-100 py-2' placeholder='Confrm password'>  
                  
                 <div class='text-center d-flex justify-content-center mt-4 mb-2 gap-1'>

                       <button id="btn-signup" class='btn btn-success text-sm d-flex justify-content-center align-items-center'>Sign up</button>

                       <a class='btn border border-2 border-white text-white' onclick="history.go(-1)">Go back</a>
                 </div>

             </form>

         </div>

     </div>
        
     <!-- <script>

        $('#practice_areas,#certification_accreditation').select2({
             placeholder: 'Select Practice areas',
             width: '100%',      
        });
  
</script>  -->
    
     <script>
$(document).ready(function() {
    // Initially hide the spinner
    $(".spinner-border").hide();

    // Handle form submission
    $('#firm-registration-form').on('submit', function(e) {
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
            url: "engine/firm-register-process.php",
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
                    $("#firm-registration-form")[0].reset();
                    $("#firm-registration-form").val("");
                    $('#btn-signup').prop('disabled', false);  // Re-enable the submit button
                } else {
                    swal({
                         title: "Notice",
                         icon: "warning",
                         text: response,
                    });
                    $('#btn-signup').prop('disabled', false);  // Re-enable the submit button
                    $('input').css('border-color', 'red');     // Highlight invalid fields
                    $('textarea').css('border-color', 'red');  // Highlight invalid textarea
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $(".spinner-border").hide();  // Hide the spinner in case of error
                $('#btn-signup').prop('disabled', false);  // Re-enable the submit button
                console.log(errorThrown);  // Log the error
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

 

</body>
</html>