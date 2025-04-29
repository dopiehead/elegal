<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("engine/config.php");
$host = $_SERVER['HTTP_HOST'];
$base_domain = "elegal.ng";
if ($host !== $base_domain && strpos($host, '.' . $base_domain) !== false) {
    $username = str_replace('.' . $base_domain, '', $host);  
     $username = preg_replace("/-/"," ",$username); 
    // First check if it's a lawyer
    $stmt = $conn->prepare("SELECT * FROM lawyer_profile WHERE lawyer_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $lawyer_found = $result->num_rows; 
    if ( $lawyer_found > 0) {
        $row = $result->fetch_assoc();
        include("contents/lawyer-content.php");
    } else {
        // Then check if it's a firm
        $stmt = $conn->prepare("SELECT * FROM lawyer_firm WHERE firm_name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
         $firm_found = $result->num_rows; 
        if ($firm_found > 0) {
            $row = $result->fetch_assoc();
            include("contents/firm-content.php");
        } else {
            // You can show a 404 or redirect to homepage here
            header("location:dashboard/profile.php");
            exit;
        }
    }

    // Handle image extension if $user_img is set
    if (!empty($user_img)) {
        $extension = strtolower(pathinfo($user_img, PATHINFO_EXTENSION));
        $image_extension = ['jpg', 'jpeg', 'png'];
    }
}

function timeAgo($time) {
    $time = strtotime($time);
    $diff = time() - $time;

    if ($diff < 60) return $diff . " seconds ago";
    $diff = round($diff / 60);
    if ($diff < 60) return $diff . " minutes ago";
    $diff = round($diff / 60);
    if ($diff < 24) return $diff . " hours ago";
    $diff = round($diff / 24);
    if ($diff < 7) return $diff . " days ago";
    if ($diff < 30) return round($diff / 7) . " weeks ago";
    if ($diff < 365) return round($diff / 30) . " months ago";
    return round($diff / 365) . " years ago";
}

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
     <link rel="stylesheet" href="assets/css/template.css">
     <style>
        .swal2-container {
              z-index: 9999 !important; /* Make sure SweetAlert has a very high z-index */ 
         }
         .user_image{
     height:90px;
     width:90px;
     border-radius:50%; 
     object-fit: cover;
}

body{
     font-family:poppins;
}

.dashboard{

    width:75%;
    margin-left:28%;
}

.fa-camera{
    left:-15px;
}

@media screen and (max-width: 768px){
     
    .dashboard{

        margin-left:0;
    }
    
     
 }


.navigator{

     width:25%;
     height:100%;
     background-color: #52727c;
     position: fixed;
}

@media screen and (max-width: 768px){ 

    
.navigator{

     background-color: #52727c;
     position: relative;
}

}



@media screen and (max-width: 768px){ 
    .dashboard, .navigator{         
        width:100%;
    }
}

.active-link-profile{
    border: 1px solid white;
    padding:10px 10px;
}


li a:hover{
    border: 1px solid white;
    padding:10px 10px; 
}
     </style>

</head>

<body class='bg-light text-sm'> 

     <div class='px-1 w-100'>

             <div class='d-flex gap-3 flex-md-row flex-column'>              

             <div class='navigator bg-success'>
                 
             
             <?php include ("dashboard/navigator.php"); ?>
             
             </div>
                    
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

                         <img class='user_image' src="<?="https://elegal.ng/"."../../".htmlspecialchars($user_img); ?>" alt="elegal">

                         <?php  } ?>

                         <div class='d-flex flex-column flex-row'>

                             <h6 class='fw-bold text-secondary text-capitalize'  ><?= htmlspecialchars($user_name); ?></h6>
                             
                             <small class='text-secondary' ><?= htmlspecialchars($user_location); ?></small>

                         </div>

                     </div>

                 </div>

                 <!-- end of profile part -->

             
                <div class='px-3 py-2 border border-1 border-mute shadow-lg bg-white mt-4'>

                     <div class='d-flex justify-content-between'>
                         
                         <?php if($lawyer_found > 0 ): ?>
                         
                         <h5 class='fw-bold'>Personal information</h5> 
                         
                         <?php else: ?>
                         
                          <h5 class='fw-bold'>Firm information</h5> 
                         
                         <?php endif; ?>

                     </div>

                     <div class='d-flex justify-content-between text-secondary  flex-md-row flex-column px-3'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                        
                             <?php if($lawyer_found > 0 ): ?>
                             
                             <label for="">Name</label>
                              
                              <?php else: ?>
                              
                               <label for="">Firm Name</label>
                              
                              <?php endif; ?>
                 
                              <span><?= htmlspecialchars($user_name); ?></span>
                           
                         </div>

                     </div>


                     
                     <div class='d-flex justify-content-between  flex-md-row flex-column px-3'>

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Email address</label>

                             <strong class='fw-bold text-success'><?=htmlspecialchars($user_email); ?></strong>
                            
                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3'>

                             <label for="">Phone number</label>
                     
                                 <span class='fw-bold'><?= htmlspecialchars($user_contact); ?></span>
                           
                         </div>

               

                         <div class='d-flex flex-row flex-column text-secondary mt-3'>
                             
                              <?php if($lawyer_found > 0 ): ?>

                             <label for="">Date of Birth</label>

                             <span class='fw-bold'><?=htmlspecialchars($user_dob); ?></span>
                              
                              <?php else :  ?>
                              
                              <label for="">Date found</label> 
                              
                               <span><?= htmlspecialchars($date_found)?></span>
                              
                              <?php endif; ?>

                         </div>
                         
                         
                         
                           <div class='d-flex flex-row flex-column text-secondary mt-3'>
                             
                              <?php if($lawyer_found == 0 ): ?>

                             <label for="">Number of Lawyers</label>

                             <span class='fw-bold'><?=htmlspecialchars($nooflawyers); ?></span>
                              
                              <?php endif; ?>

                         </div>


                     </div>

                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>
                             
                              <?php if($lawyer_found > 0 ): ?>

                              <label for="">Education</label>                       

                              <span class='fw-bold text-capitalize'><?=htmlspecialchars($user_education); ?></span>
                              
                               <?php else :  ?>
                               
                               <label for="">Certification and Accreditation</label> 
                              
                               <span><?= htmlspecialchars($certification_and_accreditation)?></span>
                              
                              <?php endif; ?>

                         </div>


                         <div class='d-flex flex-row flex-column text-secondary mt-3 px-3'>

                             <?php if($lawyer_found > 0 ): ?>

                             <label for="">Experience</label>                       

                             <span class='fw-bold text-capitalize'><?=htmlspecialchars($lawyer_experience); ?></span>
                             
                             <?php else : ?>
   
                             <label for="">Joined date</label>                       

                             <span class='fw-bold text-capitalize'><?=htmlspecialchars(timeAgo($date_created)); ?></span>
                             
                             <?php endif; ?>

                         </div>


                </div>

                <div class='bg-white px-3 py-3 mt-4 shadow-lg'>

                     <div class='d-flex justify-content-between'>
                         <h5 class='fw-bold'>Address</h5>
                         
                     </div>
                    

                     <div class='text-secondary d-flex flex-md-row flex-column flex-wrap justify-content-between mt-3'>

                           <div class='d-flex flex-row flex-column'>

                               <label for="">Country</label>

                                      <span class='fw-bold'><?=htmlspecialchars($user_location); ?></span>
                     
                           </div>

                     </div>
                     
         <?php if($lawyer_found > 0 ): ?>

                     <div class='d-flex justify-content-between align-items-start gap-1'>


                          <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                              <label for="">Supreme Court Number</label>
                              <span class='fw-bold'><?=htmlspecialchars($supreme_court_number); ?></span>
                              
                          </div>

                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                                 <label for="">Currently Engaged</label>  
                                 <span class='fw-bold'><?=htmlspecialchars($currently_engaged); ?></span>

                          </div>


                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>
       
                                <label for="">Current Position</label>  
                                <span class='fw-bold'><?=htmlspecialchars($current_position); ?></span>

                         </div>

                     </div>
        
        <?php endif; ?>
        

                     <div class='d-flex justify-content-between'>

                         <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                              <label for="">Practice Location</label>  
                               <span class='fw-bold'><?=htmlspecialchars($practice_location); ?></span>

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

                             <span class='fw-bold text-secondary mb-1'><?=htmlspecialchars($lawyer_practice_areas); ?> </span>
                     
                     <?php 
                     
                         }

                      ?>

                     <div class='d-flex flex-row flex-column mt-3 text-secondary'>

                         <label for="">Bio</label> 
               
                         <span class='fw-bold' onmouseover="changeBackground(this)" onfocus='changeBackground(this)' contenteditable='true' onblur="saveData(this, '<?php echo$userId;?>','lawyer_bio');"><?php echo htmlspecialchars($user_bio); ?></span>
                       
                     </div>

</div>

             </div>

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