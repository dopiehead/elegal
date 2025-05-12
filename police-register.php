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

             <form id="police-registration-form">
                   
                  <label class='text-sm text-secondary' for="police_name">Full name<span class='text-danger'>*</span></label>

                  <input type="text" name='police_name' class='bg-secondary border-0 w-100 py-2 px-1'>

                  <br>

                 <label class='text-sm text-secondary' for="">Email address  <span class='text-danger'>*</span></label>

                 <input type="email" name="email" class='bg-secondary border-0 w-100 py-2 px-1' placeholder="Email address">


                 <label class='text-sm text-secondary' for="">Rank name<span class='text-danger'>*</span></label>

                 <input type="text" name="rank_name" class='bg-secondary border-0 w-100 py-2 px-1' placeholder="Department head">
  

                 <label  class='text-sm text-secondary' for="">Next of kin  <span class='text-danger'>*</span></label>

                 <input type="text" name="next_of_kin" class='bg-secondary border-0 w-100 py-2 px-1' placeholder="Next of Kin">


                 <label  class='text-sm text-secondary' for="">Relationship with Next of kin  <span class='text-danger'>*</span></label>

                 <input type="text" name="relationship" class='bg-secondary border-0 w-100 py-2 px-1'>


                 <label  class='text-sm text-secondary' for="">Next of kin (Telephone)  <span class='text-danger'>*</span></label>

                 <input type="text" name="next_of_kin_telephone" class='bg-secondary border-0 w-100 py-2 px-1' placeholder="Telephone">

                                      
                 <label  class='text-sm text-secondary' for=""> Telephone <span class='text-danger'>*</span></label>

                 <input type="text" name="department_phone_number" class='bg-secondary border-0 w-100 py-2' placeholder="Your phone number">


                 <label class='text-sm text-secondary' for="">Team (What team do you belong to ?)  <span class='text-danger'>*</span></label>

                 <input type="text" name="team" class='bg-secondary border-0 w-100 py-2 px-1'> 


                 <label class='text-sm text-secondary' for="">Location <span class='text-danger'></span></label>

                 <input type="text" name="location" class='bg-secondary border-0 w-100 py-2 px-1'> 


                 <label class='text-sm text-secondary' for="">Password <span class='text-danger'>*</span></label>

                 <input type="password" name="password" class='bg-secondary border-0 w-100 py-2 px-1' placeholder='Enter password'>  


                 <label class='text-sm text-secondary' for="">Confirm password <span class='text-danger'>*</span></label>

                 <input type="password" name="confirm_password" class='bg-secondary border-0 w-100 py-2 px-1' placeholder='Confirm password'>  
                  

                 <div class='text-center d-flex justify-content-center mt-4 mb-2 gap-1'>

                      <button class='btn btn-success text-sm d-flex justify-content-center align-items-center' id='btn-signup'><span class='spinner-border text-warning'></span> <span class='sign-up-note'>Sign up</span></button>
                      <span class='btn border border-2 border-white text-white' onclick="history.go(-1)">Go back</span>

                 </div>

             </form>

         </div>

     </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $(".spinner-border").hide();

    $('#police-registration-form').on('submit', function (e) {
        e.preventDefault();

        $(".spinner-border").show();
        $('#btn-signup').prop('disabled', true);
        $(".sign-up-note").hide();

        // Collect form data
        let formData = {};
        $(this).serializeArray().forEach(item => {
            formData[item.name] = item.value;
        });

        $.ajax({
            type: "POST",
            url: "engine/police-register-process.php",
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

                if (res.status === "success") {
                    swal({
                        title: "Success",
                        icon: "success",
                        text: res.message || "Registration successful!",
                    });
                    $("#police-registration-form")[0].reset();
                } else {
                    swal({
                        title: "Notice",
                        icon: "warning",
                        text: res.message || "Something went wrong.",
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
                        if (errorObj.message) {
                            errorMessage = errorObj.message;
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