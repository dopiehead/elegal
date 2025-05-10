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
         
         body{
             font-family:poppins,sans-serif;
         }
     
         .custom-file-wrapper {
             display: inline-block;
             position: relative;
             overflow: hidden;
             cursor: pointer;
             color: #007bff;
             font-weight: bold;
             padding: 8px 12px;
             border: 1px solid #007bff;
             border-radius: 4px;
             background-color: #f8f9fa;
             }. 

         .custom-file-wrapper input[type="file"] {
            
         }

         #file-name-display {
             margin-left: 10px;
             font-style: italic;
             color: #333;
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

                         <img class='user_image' src="<?= "../". htmlspecialchars($user_img); ?>" alt="elegal">

                         <?php } ?>

                         <div class='d-flex flex-column flex-row'>

                             <h6 class='fw-bold text-secondary text-capitalize'  ><?= htmlspecialchars($user_name); ?></h6>
                             
                             <small class='text-secondary text-capitalize' ><?= htmlspecialchars($user_location); ?></small>
                             <?php if(isset($_SESSION["lawyer_id"])) : ?>
                             <small class='text-secondary text-capitalize' ><?= htmlspecialchars($lawyer_role); ?></small>
                             <small class='text-primary text-capitalize' ><?= htmlspecialchars($employment_status); ?></small>
                             <?php endif; ?>
                             <span class="custom-file-wrapper bg-light px-2 py-1 text-center">
                               <i class='fa fa-camera'></i>
                                    <input type="file" name="firm_img" id="firm_img" style=" position: absolute; left: 0;top: 0;opacity: 0;cursor: pointer;width: 100%;">
                              </span>
                             <span id="file-name-display">No file chosen</span>
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

                     <div class='d-flex justify-content-start text-secondary  flex-md-row flex-column px-3 gap-5'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                        
                             <label for="name">Name</label>
                              
                             <?php if(isset($_SESSION['id'])) { ?>
                                  <span class='text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'user_name');" class='fw-bold'><?= htmlspecialchars($user_name); ?></span>
                             <?php } else { ?>
                                  <span class='text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'lawyer_name');" class='fw-bold'><?= htmlspecialchars($user_name); ?></span>
                             <?php } ?>
                         </div>
                           
                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                        
                         <label for="">Password</label>

                         <?php
                             // Assuming $user_password is the actual password
                             $masked_password = substr(str_repeat('*', strlen($user_password)),0,14); // Create a string of '*' of the same length as the password
                         ?>

                         <?php if(isset($_SESSION['id'])) { ?>

                             <span id='password' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'user_password');" class='fw-bold'><?= htmlspecialchars($masked_password); ?></span>

                         <?php } else{ ?>

                             <span id='password' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true'  onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'lawyer_password');" class='fw-bold'><?= htmlspecialchars($masked_password); ?></span>
                         
                         <?php } ?>
                    </div>

                     </div>


                     
                     <div class='d-flex justify-content-between  flex-md-row flex-column px-3'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Email address</label>

                             <strong class='fw-bold text-success'><?= htmlspecialchars($you); ?></strong>
                            
                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Phone number</label>

                             <?php if(isset($_SESSION['id'])) { ?>
                                 <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'user_phone');"><?= htmlspecialchars($user_contact); ?></span>
                             <?php } else { ?>
                                 <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'lawyer_phone_no');"><?= htmlspecialchars($user_contact); ?></span>
                             <?php } ?>
                         </div>

                         <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Date of Birth</label>

                             <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', '<?= htmlspecialchars($user_dob); ?>');"><?= htmlspecialchars($user_dob); ?></span>

                         </div>

                         <?php } ?>

                     </div>



                     <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>
                         
                          <label for="">Occupation</label>
                           
                          <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                          <span class='fw-bold text-capitalize'><?= htmlspecialchars($user_type); ?></span>
                          
                          <?php 
                          
                             if (isset($_SESSION['lawyer_id'])) {

                                  $getlawyerfirm = $conn->prepare("SELECT * FROM lawyer_profile WHERE id = ?");
    
                                  $getlawyerfirm->bind_param("i", $_SESSION['lawyer_id']);

                                  if ($getlawyerfirm->execute()) {
        
                                     $resultlawyerfirm = $getlawyerfirm->get_result();

                                        if ($rowlawyerfirm = $resultlawyerfirm->fetch_assoc()) {
            
                                             if (empty($rowlawyerfirm['lawyer_firm_id']) && empty($rowlawyerfirm['lawyer_firm'])) {
                // Lawyer has no firm assigned — fetch all firms
                                                    $getfirm = $conn->prepare("SELECT * FROM lawyer_firm");
                                                    $getfirm->execute();
                                                    $result = $getfirm->get_result();
                          ?>

                <select name="firm_name" id="firm_name" required>
                    <option value="">-- Select a Firm --</option>
                    <?php while ($rowfirm = $result->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($rowfirm['firm_id']) ?>">
                            <?= htmlspecialchars($rowfirm['firm_name']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>

            <?php
            } else {
                // Firm already assigned, display name
                echo htmlspecialchars($rowlawyerfirm['lawyer_firm']);
            }
        }
    }
}
?>

                          <?php } else { ?>

                          <span class='fw-bold text-capitalize'  onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'user_occupation');"><?=htmlspecialchars($user_occupation); ?></span>

                          <?php } ?>

                     </div>

                     <?php if (isset($_SESSION['lawyer_id']) && !empty($_SESSION['lawyer_id'])) { ?>

                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>

                              <label for="">Education</label>                       

                              <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'lawyer_education');"><?= htmlspecialchars($user_education); ?></span>

                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>

                             <label for="">Experience</label>                       

                             <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'lawyer_experience');"><?= htmlspecialchars($lawyer_experience)." years"; ?></span>

                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>

                              <label for="">Qualification</label>                       

                                 <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'lawyer_qualification');"><?= htmlspecialchars($lawyer_qualification); ?></span>

                         </div> 

                     <?php }  ?>

                </div>


                <div class='bg-white px-3 py-3 mt-4 shadow-lg'>

                     <div class='d-flex justify-content-between'>
                         <h5 class='fw-bold'>Address</h5>
                         
                     </div>
                    

                     <div class='text-secondary d-flex flex-md-row flex-column flex-wrap justify-content-start gap-5 mt-3'>
                           <div class='d-flex flex-row flex-column'>    
                               <label for="">Country</label>
                              <span class='fw-bold'>Nigeria</span>

                           </div>
                           <div class='d-flex flex-row flex-column'>

                               <label for="">State</label>

                               <?php if(isset($_SESSION['id'])) { ?>
                                     <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'user_location');"><?= htmlspecialchars($user_location); ?></span>
                               <?php } else { ?>
                                      <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?= htmlspecialchars($userId);?>', 'lawyer_location');"><?= htmlspecialchars($user_location); ?></span>
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


                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>
       
                               <label for="">Current Firm </label>  
                              <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'lawyer_firm');"><?php echo htmlspecialchars($lawyer_firm); ?></span>

                         </div>

                     </div>

                     <div class='d-flex justify-content-between'>

                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                              <label for="">Practice Location</label>  
                               <span class='fw-bold text-capitalize' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>', 'practice_location');"><?php echo htmlspecialchars($practice_location); ?></span>

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
     
     <script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {
        $("#firm_name").on("change", function () {
            let id = $(this).val();

            if (id.length > 0) {
                $.ajax({
                    url: "add-firm.php",
                    method: "POST",
                    data: {
                        id: id  // Corrected: send as an object key-value pair
                    },
                    success: function (response) {
                        if (response == 1) {
                            swal({
                                icon: "success",
                                title: "Success!!",
                                text: "Firm has been updated"
                            });
                        } else {
                            swal({
                                icon: "warning",
                                title: "Notice",
                                text: response
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        swal({
                            icon: "error",
                            title: "Error",
                            text: "An error occurred: " + error
                        });
                    }
                });
            }
        });
    });
</script>


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
    
     <script>
document.getElementById("firm_img").addEventListener("change", function () {
    const fileName = this.files[0] ? this.files[0].name : "No file chosen";
    document.getElementById("file-name-display").textContent = fileName;
});
</script>

</body>
</html>