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

                  <input type="text" name="firm_name" id="firm_name" class='bg-secondary border-0 w-100 py-2'>

                  <br>

                 <label class='text-sm text-secondary'   for="">Email address  <span class='text-danger'>*</span></label>

                 <input type="email"  name="firm_email" id="firm_email" class='bg-secondary border-0 w-100 py-2'>

                 <label class='text-sm text-secondary' for="">Phone number  <span class='text-danger'>*</span></label>

                 <input type="text" name="firm_phone_number" id="firm_phone_number" class='bg-secondary border-0 w-100 py-2'> 

                 <label class='text-sm text-secondary'  for="">Date found <span class='text-danger'>*</span></label>

                 <input type="date" name="date_found" id="date_found" class='bg-secondary border-0 w-100 py-2'> 

                  <label class='text-sm text-secondary' for="">Location<span class='text-danger'>*</span></label>

                 <input type="text" name="firm_location" id="firm_location" class='bg-secondary border-0 w-100 py-2' placeholder="Full address">
                 
                 <!--<input type='hidden' name="cases" id="cases" value="0">-->
                 <!--<input type='hidden' name="cases_won" id="cases_won" value="0">-->
                 <!--<input type='hidden' name="cases_lost" id="cases_lost" value="0">-->
                 <!--<input type='hidden' name="lawyer_role" id="lawyer_role" value="">-->
                 <!--<input type='hidden' name="cases" value="0" id="cases">-->

                 <label class='text-sm text-secondary' for="">How many lawyers work in your firm <span class='text-danger'>*</span></label>

                 <input type="text" name="nooflawyers" id="nooflawyers" class='bg-secondary border-0 w-100 py-2'>

                 <label class='text-sm text-secondary form-label' for="">What are you areas of specialization (select multiple if you have more than 1) <span class='text-danger'>*</span></label>
                  
                 <div>

                      <div class='d-flex justify-content-start g-5 flex-wrap mt-2 bg-secondary py-5 px-2 text-sm'>

                         <span class='text-white'><input type="checkbox"  name="practice_areas[]" value="criminal"> Criminal Law</span>
                         <span class='text-white'><input  type="checkbox" name="practice_areas[]" value="civil" > Civil Law</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="corporate"> Corporate Law</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="family"> Family Law</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="intellectual_property"> Intellectual Property</span>         

                         <span class='text-white'><input type="checkbox" name="practice_areas[]"  value="Property"> Property</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Labour"> Labour</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Administrative"> Administrative</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Common"> Common</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Constructive"> Constructive</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Constitutional"> Constitutional</span>
                         <span class='text-white'><input type="checkbox" name="practice_areas[]" value="Energy"> Energy</span>
                          <span class='text-white'><input type="checkbox" name="practice_areas[]" value="pro bono"> Pro bono</span>

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
                         <span class='text-white'><input type="checkbox"  name="certification_accredit[]" value="who" > WHO Award</span>
                         <span class='text-white'>  <input type="checkbox"  name="certification_accredit[]" value="san"> SAN Award</span>
                         <span class='text-white'><input  type="checkbox" name="certification_accredit[]" value="usf"> USF Award</span>
                         <span class='text-white'><input  type="checkbox" name="certification_accredit[]" value="encomium"> Ecomium Award of the year</span>

                 </select>
                     </div>
                 </div>
                 <label class='text-sm text-secondary' for="">Tell us more about you <span class='text-danger'>*</span></label>

                 <textarea name="firm_bio" id="firm_bio" class='bg-secondary border-0 w-100 py-2' rows="5"></textarea>  
                 
                 <label class='text-sm text-secondary' for="">Password <span class='text-danger'>*</span></label>

                 <input type="password" name="firm_password" id="firm_password" class='bg-secondary border-0 w-100 py-2' placeholder='Enter Password'>  

                 <label class='text-sm text-secondary' for="">Confirm password <span class='text-danger'>*</span></label>

                 <input type="password" name="confirm_password" id="confirm_password" class='bg-secondary border-0 w-100 py-2' placeholder='Confrm password'>  
                  
                 <div class='text-center d-flex justify-content-center mt-4 mb-2 gap-1'>

                     <button class='btn btn-success text-sm d-flex justify-content-center align-items-center' id='btn-signup'><span class='spinner-border text-warning'></span> <span class='sign-up-note'>Sign up</span></button>
                     <a class='btn border border-2 border-white text-white' onclick="history.go(-1)">Go back</a>
                     
                 </div>

             </form>

         </div>

     </div>


    
<script>
$(document).ready(function () {
    $(".spinner-border").hide();

    $('#firm-registration-form').on('submit', function (e) {
        e.preventDefault();

        $(".spinner-border").show();
        $('#btn-signup').prop('disabled', true);
        $(".sign-up-note").hide();

        // Collect form data as an object
        let formData = {};
        $(this).serializeArray().forEach(item => {
            // Handle arrays (e.g., practice_areas[])
            if (item.name.endsWith('[]')) {
                let key = item.name.replace('[]', '');
                if (!formData[key]) {
                    formData[key] = [];
                }
                if (item.value) { // Only add non-empty values
                    formData[key].push(item.value);
                }
            } else {
                formData[item.name] = item.value;
            }
        });

        // Ensure practice_areas is an array, even if empty
        formData['practice_areas'] = formData['practice_areas'] || [];

        $.ajax({
            type: "POST",
            url: "engine/firm-register-process.php",
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function (response) {
                $(".spinner-border").hide();
                $(".sign-up-note").show();
                $('#btn-signup').prop('disabled', false);

                let res;
                try {
                    res = typeof response === "string" ? JSON.parse(response) : response;
                } catch (e) {
                    console.error("Invalid JSON response:", response);
                    swal({
                        title: "Error",
                        icon: "error",
                        text: "An unexpected error occurred. Please try again.",
                    });
                    return;
                }

                if (res.success) {
                    swal({
                        title: "Success",
                        icon: "success",
                        text: res.message || "Registration successful!",
                    });
                    $("#firm-registration-form")[0].reset();
                } else if (res.error) {
                    swal({
                        title: "Notice",
                        icon: "warning",
                        text: res.error,
                    });
                }
            },
            error: function (xhr, status, error) {
                $(".spinner-border").hide();
                $(".sign-up-note").show();
                $('#btn-signup').prop('disabled', false);

                console.error("XHR Status:", status);
                console.error("HTTP Code:", xhr.status);
                console.error("XHR Response:", xhr.responseText);
                console.error("Thrown Error:", error);

                let errorMessage = "An error occurred while submitting the form.";
                if (xhr.responseText) {
                    try {
                        const errorObj = JSON.parse(xhr.responseText);
                        if (errorObj.error) {
                            errorMessage = errorObj.error;
                        }
                    } catch (e) {
                        errorMessage = xhr.responseText;
                    }
                }

                swal({
                    title: "Submission Failed",
                    icon: "error",
                    text: errorMessage,
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