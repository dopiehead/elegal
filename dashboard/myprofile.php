<?php session_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['lawyer_id']) && !isset($_SESSION['firm_id'])) {
     header("Location: ../login.php");
     exit();
}

require("../engine/config.php");

if (isset($_SESSION["id"])) {
   
  include ("content/user-content.php");
}


if (isset($_SESSION["lawyer_id"])) {
 
   include ("content/lawyer-content.php");
}


if (isset($_SESSION["firm_id"])) {
  
     include ("content/firm-content.php");

}


?>

<html lang="en">
<head>

     <meta charset="UTF-8">
     <title>My profile</title>
     <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
     <script src="../assets/js/sweetalert.min.js"></script> 
     <link rel="stylesheet" href="../assets/css/dashboard/myprofile.css">

</head>

<body class='bg-light text-sm'> 

     <div class='px-1'>

         <div class='d-flex gap-3 flex-md-row flex-column'>              

             <?php include ("navigator.php"); ?>
                    
             <div class='dashboard'>
                 
                 <h4>My profile</h4>

                 <div class='d-flex justify-content-between shadow-lg px-3 py-4 mt-4 bg-white border border-1 border-mute'> 

                     <div class='d-flex flex-column-start gap-1'>

                         <img class='user_image' src="<?php echo "../". htmlspecialchars($user_img); ?>" alt="elegal">

                         <div class='d-flex flex-column flex-row'>

                             <h6 class='fw-bold text-secondary'  ><?php echo htmlspecialchars($user_name); ?></h6>
                             
                             <span class='text-secondary' ><?php echo htmlspecialchars($user_location); ?></span>

                         </div>

                     </div>

                     <div>
                      
                         <a class='btn border border-1 border-mute text-secondary edit'><span class='fa fa-edit'></span>Edit</a>

                     </div>
                    
                 </div>

                 <!-- end of profile part -->


             
                <div class='px-3 py-2 border border-1 border-mute shadow-lg bg-white mt-4'>

                     <div class='d-flex justify-content-between'>

                         <h5 class='fw-bold'>Personal information</h5>

                        

                     </div>

                     <div class='d-flex justify-content-between text-secondary  flex-md-row flex-column px-3'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                        
                             <label for="">Name</label>

                             <span onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $user_name; ?>');" class='fw-bold'><?php echo htmlspecialchars($user_name); ?></span>

                         </div>
                           

                     </div>


                     
                     <div class='d-flex justify-content-between  flex-md-row flex-column px-3'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Email address</label>

                             <span class='fw-bold'><?php echo htmlspecialchars($you); ?></span>
                            
                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Phone number</label>

                             <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $user_contact; ?>');"><?php echo htmlspecialchars($user_contact); ?></span>

                         </div>

                         <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Date of Birth</label>

                             <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $user_dob; ?>');"><?php echo htmlspecialchars($user_dob); ?></span>

                         </div>

                         <?php } ?>

                     </div>



                     <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>
                         
                          <label for="">Occupation</label>
                           
                          <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                          <span class='fw-bold text-capitalize'><?php echo htmlspecialchars($user_type); ?></span>

                          <?php } else { ?>

                          <span class='fw-bold text-capitalize'  onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $user_occupation; ?>');"><?php echo htmlspecialchars($user_occupation); ?></span>

                          <?php } ?>

                     </div>





                     <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>

                              <label for="">Education</label>                       

                              <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $user_education; ?>');"><?php echo htmlspecialchars($user_education); ?></span>

                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>

                             <label for="">Experience</label>                       

                             <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $lawyer_experience; ?>');"><?php echo htmlspecialchars($lawyer_experience); ?></span>

                         </div>

                     <?php }  ?>


                </div>







                <div class='bg-white px-3 py-3 mt-4 shadow-lg'>

                     <div class='d-flex justify-content-between'>
                         <h5 class='fw-bold'>Address</h5>
                         
                     </div>
                    

                     <div class='text-secondary d-flex flex-md-row flex-column flex-wrap justify-content-between mt-3'>

                           <div class='d-flex flex-row flex-column'>

                               <label for="">Country</label>
                               <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $user_location; ?>');"><?php echo htmlspecialchars($user_location); ?></span>

                           </div>

                     </div>





                     <div class='d-flex justify-content-between align-items-start gap-1'>

                     <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                          <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                              <label for="">Supreme Court Number</label>
                              <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $supreme_court_number; ?>');"><?php echo htmlspecialchars($supreme_court_number); ?></span>
                              
                          </div>


                          <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                                  <label for="">Bio</label>  
                                  <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $user_bio; ?>');"><?php echo htmlspecialchars($user_bio); ?></span>

                          </div>


                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                                 <label for="">Currently Engaged</label>  
                                 <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $currently_engaged; ?>');"><?php echo htmlspecialchars($currently_engaged); ?></span>

                          </div>


                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>
       
                                <label for="">Current Position</label>  
                                <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $current_position; ?>');"><?php echo htmlspecialchars($current_position); ?></span>

                         </div>

                     </div>





                     <div class='d-flex justify-content-between'>

                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                              <label for="">Practice Location</label>  
                               <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $practice_location; ?>');"><?php echo htmlspecialchars($practice_location); ?></span>

                         </div>
                   
             </div>

                <br><br>



                     </div>

              <br><br>


             <div class='d-flex  flex-row flex-column bg-white px-3 py-3 shadow-lg m-1'>

                 <div class='d-flex justify-content-between gap-3'> 
                      <h5 class='fw-bold'>Practice areas</h5>
                     <br>
                 </div>

                  <br>

                 <label class='text-secondary' for="">Practice Areas</label>  

                     <?php 

                          $areas = explode(" , ",$practice_areas);

                          foreach($areas as $lawyer_practice_areas){?>

                             <span class='fw-bold text-secondary' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', '<?php echo $lawyer_practice_areas; ?>');"><?php echo htmlspecialchars($lawyer_practice_areas); ?> </span><br>
                     <?php
     
                            }

                     ?>

             </div>

         </div>

             <?php  } ?>
                  
         </div>
       

     </div>

     <script type="text/javascript">

         function showPassword() {
             var x = document.getElementById("password");
             if (x.type === "password") {
                 x.type = "text";
             } else {
                 x.type = "password";
             }
         }
     </script>


<script type="text/javascript">
$(".edit").on("click", function() {
    // Apply the dotted border only to the clicked span element
    $(this).find('span').css("border-bottom", "1px dotted rgb(47, 47, 47)");

    // Call the changeBackground function if needed (assuming you want to change background of the clicked element)
    changeBackground(this);

    // Call the saveData function, assuming you pass the necessary parameters
    var id = $(this).data('id');  // Assuming you have an 'id' attribute on the element
    var column = $(this).data('column');  // Assuming you have a 'column' attribute
    saveData(this, id, column);
});

// Function to change background of the clicked element
function changeBackground(obj) {
    $(obj).removeClass("bg-success");
    $(obj).css("border-bottom","1px dotted rgba(0, 70, 90, 0.3");
    $(obj).addClass("simple");
}

// Function to save data through an AJAX request
function saveData(obj, id, column) {
    var customer = {
        id: id,
        column: column,
        value: obj.innerHTML
    };

    $.ajax({
        type: "POST",
        url: "engine/saveData.php",
        data: customer,
        dataType: 'json',
        success: function(data) {
            if (data) {
                swal({
                    title: "Success",
                    text: "Record saved",
                    icon: "success"
                });

                // Remove the background change after success
                $(obj).removeClass("bg-danger");
                $(obj).removeClass("simple");

                swal({
                    text: "Item was modified successfully",
                    icon: "success"
                });
            }
        }
    });
}
</script>

</body>
</html>