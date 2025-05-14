<?php

$details = "";

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

              <a class='text-white fw-bold mt-5' href='index.php' ><i class='fa fa-arrow-left'></i></a>

         </div>

         <div class='container'>

             <h4 class='text-white fw-bold mt-5'>Login to E-legal</h4>
 
         </div>

         <br><br>

         <div class='d-flex justify-content-center align-items-center g-5 flex-md-row flex-column mt-4 text-white'>

             <div class='create-container px-1'>
             
                 <span>Don't have an account? <a class='text-white border-bottom border-2 border-secondary pb-1 text-decoration-none' href='create-account.php'>Sign up</a></span> 

                 <br>

                 <form id='login-form'>

                      <label class='text-sm text-secondary' for="">Choose role</label>

                      <select name="user_type" class='bg-secondary border-0 w-100 py-2 text-sm user_type'>

                         <option value="user">Client</option>

                         <option value="lawyer">Counselor</option>

                         <option value="firm">Law Firm</option>

                         <option value="police">Police Officer</option>

                         <option value="police_department">Police Department</option>

                         <option value="admin">Admin</option>
                    
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


     <input type="hidden" id="details" value="<?= htmlspecialchars($details); ?>">

     <script>
    $(document).ready(function () {
        // Initially hide the spinner
        $(".spinner-border").hide();

        // Use ID consistently for the login button
        $("#btn-login").on("click", function (e) {
            e.preventDefault();

            $(".spinner-border").show();
            $("#btn-login").prop("disabled", true);
            $(".sign-in-note").hide();

            let details = $("#details").val();
            let user_type = $(".user_type").val();
            let formData = $("#login-form").serialize(); // Get form data

            $.ajax({
                type: "POST",
                url: "engine/login-process.php",
                data: formData,
                success: function (response) {
                    $(".spinner-border").hide();
                    $(".sign-in-note").show();
                    $("#btn-login").prop("disabled", false);

                    if (response == 1) {
                        // Redirect based on details or user type
                        if (details !== "") {
                            window.location.href = details;
                        } else {
                            switch (user_type) {
                                case "admin":
                                    window.location.href = "admin/admin-dashboard.php";
                                    break;

                                case "firm":
                                    window.location.href = "dashboard/firm-dashboard.php";
                                    break;

                                case "police_department":
                                    window.location.href = "dashboard/police-department-dashboard.php";
                                    break;  

                                case "police":
                                    window.location.href = "dashboard/police-dashboard.php";
                                    break;                                    

                                default:
                                    window.location.href = "dashboard/mydashboard.php";
                            }
                        }
                    } else {
                        swal({
                            icon: "warning",
                            text: response,
                            title: "Notice"
                        });
                        $("input").css("border", "1px solid red");
                    }
                },
                error: function (err) {
                    $(".spinner-border").hide();
                    $("#btn-login").prop("disabled", false);
                    swal({
                        icon: "error",
                        text: "An error occurred while processing your request.",
                        title: "Error"
                    });
                }
            });
        });
    });
</script>


</body>
</html>