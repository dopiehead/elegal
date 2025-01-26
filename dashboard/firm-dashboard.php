<?php session_start();
      require("../engine/config.php");

if(!isset($_SESSION['firm_id'])){
      header("location:../login.php");
      exit();
} else
     {


      include ("content/firm-content.php");

     }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
    <link rel="stylesheet" href="../assets/css/dashboard/firm-dashboard.css">
    <title>Firm dashboard</title>
    <style>

   body{
        font-family: "Helvetica Neue",Helvetica,Arial
   }

    </style>
</head>

<body class='bg-light'>
   
     <div> 

             <div class='profile-container w-100 bg-dark pt-2 pb-3 px-3 mb-2'>

                  <div class='position-relative'>
                      <a class='text-white fw-bold' href="../logout.php"><i class='fa fa-sign-out'></i></a>
                  </div>

                  <div class='d-flex justify-content-around border border-white border-3 rounded-circle '>
               
               <?php 
                     $extension = strtolower(pathinfo($user_img,PATHINFO_EXTENSION));

                     $image_extension  = array('jpg','jpeg','png');
                
                     if (!in_array($extension , $image_extension)) {

                          echo"<div class='text-center px-1'><span class='text-secondary text-white text-uppercase' style='font-size:50px;'>".substr($user_name,0,2)."</span></div>";                  

                     } else { ?>    

                           <img src="<?php echo "../assets/". htmlspecialchars($user_img); ?>" alt="e-legal">
                  
                     <?php    }   ?>

                  </div>    
                  
                  <div>
                     
                      <h4 class='fw-bold text-white'><?php echo htmlspecialchars($user_name); ?></h4>

                  </div>

             </div>

               <!-- navigation container -->
            
             <div class='d-flex justify-content-between flex-md-row flex-column mt-3'>

                 <ul class='list-unstyled d-flex justify-content-center align-items-start flex-row flex-column py-2 px-3 bg-white link-content'>

                     <li class='bg-light'>
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none link-button active-button' id='clients_onboard'>Clients onboard</a>
                          <span class='fa fa-arrow-right' id="clients_onboard"></span>
                     </li>

                     <li class='bg-light'>
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none  link-button' id='ongoing_cases'>Ongoing cases</a>
                          <span class='fa fa-arrow-right' id="ongoing_cases"></span>
                    </li>

                     <li class='bg-light'>
                        
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none link-button' id="concluded_cases">Concluded cases</a>
                          <span class='fa fa-arrow-right' id="concluded_cases"></span>
                    
                     </li>

                     <li class='bg-light'>
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none link-button' id="lawyers_onboard">Lawyers onboard</a>
                          <span class='fa fa-arrow-right' id="lawyers_onboard"></span>
                    </li>

                     <li class='bg-light'>
                        
                          <span class='text-success fa fa-user-alt fa-1x'></span>
                          <a class='text-secondary text-decoration-none link-button' id="money_in">Money in</a>
                          <span class='fa fa-arrow-right' id="money_in"></span>
                    
                     </li>    
                    
                    
                     <li class='bg-light'>
                        
                         <span class='text-success fa fa-user-alt fa-1x'></span>
                         <a class='text-secondary text-decoration-none link-button' id="money_out">Money out</a>
                         <span class='fa fa-arrow-right' id="money_out"></span>
                  
                     </li> 


                     <li class='bg-light'>
                        
                         <span class='text-success fa fa-user-alt fa-1x'></span>
                         <a class='text-secondary text-decoration-none link-button' id="case_definition">Case definition</a>
                         <span class='fa fa-arrow-right' id="case_definition"></span>
                  
                     </li> 

                     <li class='bg-light'>
                        
                         <span class='text-success fa fa-user-alt fa-1x'></span>
                         <a class='text-secondary text-decoration-none link-button' id="todo_list">To do list</a>
                         <span class='fa fa-arrow-right' id="todo_list"></span>
                 
                     </li> 


                     <li class='bg-light'>
                        
                         <span class='text-success fa fa-user-alt fa-1x'></span>
                         <a class='text-secondary text-decoration-none link-button' id="reminder">Reminder</a>
                         <span class='fa fa-arrow-right' id="reminder"></span>
                 
                     </li> 

                 </ul>     
                                                              <!-- main content  -->

                 <div class='b-part px-3'>

                           <div class='table-container container'></div>


                 </div>

             </div>

     </div> 

      <div>

             <div class='popup' id="case_details"></div>

      </div>


     <br><br>

     <script>
             $(document).ready(function () {
              $("#clients_onboard").trigger("click");
             });
     </script>

     <script>

    function loadContent(page) {
         $(".table-container").load(page).focus();
    }

    $(".link-button").click(function () {

         $(".link-button").removeClass("active-button");
         $(this).addClass("active-button");
    });

    $("#clients_onboard").click(function() {
         loadContent("../components/dashboard/clients-onboard.php");
    });

    $("#ongoing_cases").click(function() {
         loadContent("../components/dashboard/ongoing_cases.php");
    });

    $("#concluded_cases").click(function() {
         loadContent("../components/dashboard/concluded_cases.php");
    });

    $("#lawyers_onboard").click(function() {
         loadContent("../components/dashboard/lawyers_onboard.php");
    });

    $("#case_definition").click(function() {
         loadContent("../components/dashboard/case_definition.php");
    });

    $("#money_in").click(function() {
         loadContent("../components/dashboard/money_in.php");
    });

    $("#money_out").click(function() {
         loadContent("../components/dashboard/money_out.php");
    });

    $("#todo_list").click(function() {
         loadContent("../components/dashboard/todo-list.php");
    });

    $("#reminder").click(function() {
         loadContent("../components/dashboard/reminder.php");
    });


</script>

<script>

      $(document).on('click',".ongoing_cases",function(){
           var cases = $(this).attr("id");
          
           $.ajax({
                type: "POST",
                url: "../components/dashboard/components/ongoing_cases_content.php",               
                data : {id:cases},               
                success: function(response) {
                     $("#case_details").html(response).show();
                }
           });

      });

</script>


<script>

      $(document).on('click',".conclude_cases",function(){
           var case_closed = $(this).attr("id");
          
           $.ajax({
                type: "POST",
                url: "../components/dashboard/components/ongoing_cases_content.php",
                data : {id:case_closed},
                success: function(response) {
                     $("#case_details").html(response).show();
                }
           });
      });
   
</script>



<script>

      $(document).on('click',".close-btn",function(){
             $("#case_details").hide();
      });

</script>

 
<script>

     $(document).on('click',".show-details",function(){
       
           $("#popup-reminder").show();
          
     });


     $(document).on('click',"#closeButton",function(){
       
       $("#popup-reminder").hide();
      
 });

</script>



</body>
</html>
