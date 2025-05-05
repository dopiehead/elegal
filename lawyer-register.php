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
  
                 <div>

                      <div class='d-flex justify-content-start g-5 flex-wrap mt-2 bg-secondary py-5 px-2 text-sm'>

                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox"  name="practice_areas[]" value="criminal"> Criminal Law</span>
                         <span class='text-white d-flex justify-content-start g-1'><input  type="checkbox" name="practice_areas[]" value="civil" > Civil Law</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="corporate"> Corporate Law</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="family"> Family Law</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="intellectual_property"> Intellectual Property</span>         

                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Property"> Property</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Labour"> Labour</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Administrative"> Administrative</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Common"> Common</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Constructive"> Constructive</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Constitutional"> Constitutional</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Energy"> Energy</span>

                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Public"> Public</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Customary"> Customary</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Admiralty"> Admiralty</span>
                         <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Nigerian Legislature"> Nigerian Legislature</span>
                        <span class='text-white d-flex justify-content-start g-1'><input type="checkbox" name="practice_areas[]" value="Literalrule"> Literalrule</span>
                          <span><input type="text" placeholder ="Others" name="practice_areas[]"> </span>          
                     </div>

                 </div>


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
                $(document).ready(function () {
                    $(".spinner-border").hide();
                
                    $('#lawyer-registration-form').on('submit', function (e) {
                        e.preventDefault();
                
                        $(".spinner-border").show();
                        $('#btn-signup').prop('disabled', true);
                        $(".sign-up-note").hide();
                
                        let formData = new FormData(this);
                
                        $.ajax({
                            type: "POST",
                            url: "engine/lawyer-register-process.php",  // Adjust path as needed
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                $(".spinner-border").hide();
                                $(".sign-up-note").show();
                
                                let res = typeof response === "string" ? JSON.parse(response) : response;
                
                                if (res.success) {
                                    swal({
                                        title: "Success",
                                        icon: "success",
                                        text: res.success,
                                    });
                
                                    $("#lawyer-registration-form")[0].reset();
                                    $('#btn-signup').prop('disabled', false);
                                } else if (res.error) {
                                    swal({
                                        title: "Notice",
                                        icon: "warning",
                                        text: res.error,
                                    });
                                    $('#btn-signup').prop('disabled', false);
                                }
                            },
                            error: function () {
                                $(".spinner-border").hide();
                                $('#btn-signup').prop('disabled', false);
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


     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->
</body>
</html>