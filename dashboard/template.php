<?php session_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['lawyer_id'])) {
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


$extension = strtolower(pathinfo($user_img,PATHINFO_EXTENSION));

$image_extension  = array('jpg','jpeg','png'); 

?>

<html lang="en">
<head>

     <meta charset="UTF-8">
     <title>My profile</title>
     <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>
     <link rel="stylesheet" href="../assets/css/dashboard/myprofile.css">
     <style>
        .swal2-container {
              z-index: 9999 !important; /* Make sure SweetAlert has a very high z-index */ 
         }
     </style>

</head>

<body class='bg-light text-sm'> 

     <div class='px-1'>

         <div class='d-flex gap-3 flex-md-row flex-column'>              

             <?php include ("navigator.php"); ?>
                    
             <div class='dashboard'>
                 
                 <h4>My profile</h4>

                 <div class='d-flex justify-content-between shadow-lg px-3 py-4 mt-4 bg-white border border-1 border-mute'> 

                     <div class='d-flex flex-column-start gap-2'>

                     <?php    
                
                          if (!in_array($extension , $image_extension)) {

                            echo "<div class='text-center rounded-circle border border-1 border-success px-2 py-1 position-relative'>
                            <strong class='text-secondary text-uppercase' style='font-size:40px;'>".substr($user_name, 0, 2)."</strong>"; ?>

                            
                            <span class='fa fa-camera position-absolute bottom-0 start-100 ' style='cursor:pointer;'>
                                <input type='file' name='fileupload' class='position-relative top-0 start-0 w-100 h-100 opacity-0'>
                            </span>
                            
                          </div>
                                    
                             
                         <?php } else { ?> 

                         <img class='user_image' src="<?php echo "../". htmlspecialchars($user_img); ?>" alt="elegal">

                         <?php } ?>

                         <div class='d-flex flex-column flex-row'>

                             <h6 class='fw-bold text-secondary text-capitalize'  ><?php echo htmlspecialchars($user_name); ?></h6>
                             
                             <small class='text-secondary' ><?php echo htmlspecialchars($user_location); ?></small>

                         </div>

                     </div>

                     <div>
                      
                         <a class='btn border border-1 border-mute text-secondary btn-edit'><span class='fa fa-edit'></span>Edit</a>

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
                              
                             <?php if(isset($_SESSION['id'])) { ?>
                                  <span onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?php echo$userId;?>', 'user_name');" class='fw-bold'><?php echo htmlspecialchars($user_name); ?></span>
                             <?php } else { ?>
                                  <span onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?php echo$userId;?>', 'lawyer_name');" class='fw-bold'><?php echo htmlspecialchars($user_name); ?></span>
                             <?php } ?>
                         </div>
                           


                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                        
                         <label for="">Password</label>

                         <?php
                             // Assuming $user_password is the actual password
                             $masked_password = substr(str_repeat('*', strlen($user_password)),0,14); // Create a string of '*' of the same length as the password
                         ?>

                         <?php if(isset($_SESSION['id'])) { ?>

                             <span id='password' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?php echo$userId;?>', 'user_password');" class='fw-bold'><?php echo htmlspecialchars($masked_password); ?></span>

                         <?php } else{ ?>

                             <span id='password' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?php echo$userId;?>', 'lawyer_password');" class='fw-bold'><?php echo  htmlspecialchars($masked_password); ?></span>
                         
                         <?php } ?>
                    </div>

                     </div>


                     
                     <div class='d-flex justify-content-between  flex-md-row flex-column px-3'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Email address</label>

                             <strong class='fw-bold text-success'><?php echo htmlspecialchars($you); ?></strong>
                            
                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Phone number</label>

                             <?php if(isset($_SESSION['id'])) { ?>
                                 <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'user_phone');"><?php echo htmlspecialchars($user_contact); ?></span>
                             <?php } else { ?>
                                 <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'lawyer_phone_no');"><?php echo htmlspecialchars($user_contact); ?></span>
                             <?php } ?>
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

                          <span class='fw-bold text-capitalize'  onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'user_occupation');"><?php echo htmlspecialchars($user_occupation); ?></span>

                          <?php } ?>

                     </div>

                     <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>

                              <label for="">Education</label>                       

                              <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'lawyer_education');"><?php echo htmlspecialchars($user_education); ?></span>

                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>

                             <label for="">Experience</label>                       

                             <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'lawyer_experience');"><?php echo htmlspecialchars($lawyer_experience); ?></span>

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

                               <?php if(isset($_SESSION['id'])) { ?>
                                     <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'user_location');"><?php echo htmlspecialchars($user_location); ?></span>
                               <?php } else { ?>
                                      <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'lawyer_location');"><?php echo htmlspecialchars($user_location); ?></span>
                               <?php } ?>
                           </div>

                     </div>

                     <div class='d-flex justify-content-between align-items-start gap-1'>

                     <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                          <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                              <label for="">Supreme Court Number</label>
                              <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'supreme_court_number');"><?php echo htmlspecialchars($supreme_court_number); ?></span>
                              
                          </div>

                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                                 <label for="">Currently Engaged</label>  
                                 <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'currently_engaged');"><?php echo htmlspecialchars($currently_engaged); ?></span>

                          </div>


                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>
       
                                <label for="">Current Position</label>  
                                <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'current_position');"><?php echo htmlspecialchars($current_position); ?></span>

                         </div>

                     </div>

                     <div class='d-flex justify-content-between'>

                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                              <label for="">Practice Location</label>  
                               <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'practice_location');"><?php echo htmlspecialchars($practice_location); ?></span>

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

                 <label class='text-secondary' for="">Practice Areas (Seperate each by commas) </label>  

                     <?php 

                          $areas = explode(" , ",$practice_areas);

                          foreach($areas as $lawyer_practice_areas){?>

                             <span class='fw-bold text-secondary' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'lawyer_practice_areas');"><?php echo htmlspecialchars($lawyer_practice_areas); ?> </span><br>
                     <?php
     
                            }

                     ?>

                     <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                         <label for="">Bio</label> 
                         <?php if(isset($_SESSION['id'])) { ?> 
                         <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>','user_bio');"><?php echo htmlspecialchars($user_bio); ?></span>
                         <?php } else { ?>
                         <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>','lawyer_bio');"><?php echo htmlspecialchars($user_bio); ?></span>
                         <?php } ?>
                     </div>

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

   $(".btn-edit").click(function(){ 

          $("span").css("border-bottom", "1px dotted red");
      
   });

function changeBackground(obj) {
      
    $(obj).addClass("border-1 border-mute");
    

    }

    function saveData(obj, id, column) {
        var customer = {
            id: id,
            column: column,
            value: obj.innerHTML
        }
        $.ajax({
            type: "POST",
            url: "saveData.php",
            data: customer,
      
            success: function(data){
                if (data) {

                Swal.fire({

                     title:"Success",
                     text:"Record saved",
                     icon:"success"

                });  
                 
                  $(obj).removeClass("border-mute");
                   
                }

                else {

                     Swal.fire({

                         title:"error",
                         text:"Error in saving record",
                         icon:"warning"  

                     });
                }
            }
       });
    };
    </script>


</body>
</html>