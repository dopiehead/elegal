<?php  session_start(); 
error_reporting(E_ALL);        // Report all errors
ini_set('display_errors', 1);

$user_id = $_SESSION['id'] ?? $_SESSION['lawyer_id'] ?? $_SESSION['firm_id'] ?? exit(header('Location: ../login.php'));

require ("../engine/config.php");

if(isset($_SESSION['id'])):
      $get_notifications = $conn->prepare("SELECT * FROM user_notifications WHERE recipient_id = ? and pending = 0");

elseif(isset($_SESSION['lawyer_id'])):
      $get_notifications = $conn->prepare("SELECT * FROM lawyer_notifications WHERE recipient_id = ? and pending = 0");

else:
      $get_notifications = $conn->prepare("SELECT * FROM firm_notifications WHERE recipient_id = ? and pending = 0");
endif;

if($get_notifications->bind_param("i",$user_id)){
      $get_notifications->execute();
      $result = $get_notifications->get_result(); ?>

<html lang="en">
     
<head>

     <meta charset="UTF-8">
     <title>Notifications</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
     <!-- javascript -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.min.js"></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
     <link rel="stylesheet" href="../assets/css/dashboard/notifications.css">

</head>

<body class='bg-light'> 

     <div class='px-1'>

         <div class='d-flex gap-3 flex-md-row flex-column'>              

         <?php include ("navigator.php"); ?>
                    
             <div class='dashboard pe-4'>
                 
                 <h4 class='mt-5'>Notifications</h4>

                  <div class='bg-white px-2 py-4 bg-white text-center text-secondary shadow-lg mt-4'>
      
                  <?php  while($row = $result->fetch_assoc()): ?>
        
        <div class='px-2 py-2 d-flex justify-content-center align-items-center flex-row flex-column bg-white shadow-lg bg-white gap-3'>
            <span>From: <b class='text-danger'>Admin</b></span>

           <div style =' display:flex; justify-content:space-between;' class='align-items-center w-100'>
               <span class='text-primary fa fa-bell fa-2x'></span>
               <h6 class='text-secondary fw-bold'><?= htmlspecialchars($row['message']) ?></h6>
                <span class='text-dark text-sm text-capitalize'><?= htmlspecialchars($row['date']) ?></span>
           </div>
             <div class='d-flex justify-content-end w-100'>
                  <a style='cursor:pointer' class='btn-delete' id='<?= htmlspecialchars($row['id']) ?>'><span class='fa fa-trash  text-danger p-1'></span></a>
             </div>


        </div>

    </div>

<?php 
       endwhile;
        
?>
  <?php   
  
      }

      else { ?>

      <div clsss='container'>

      <div class='w-100 shadow-lg d-flex align-items-center justify-content-center  p-4'>
       
           <span class='text-secondary'>You have no new notification</span>
      
      </div>

  </div>

  <?php

      }

 ?>
     
     </div>

 
      <script>
         $(".btn-delete").click(function(){
           let id = $(this).attr("id");
            $.ajax({
                    url:"delete-notification.php?id=" + id,
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        if(data==1){
                            swal.Fire({
                                title:"Success",
                                text:"Notification has been deleted successfully",
                                icon:"success"

                            });
                        }
                        else{
                             
                             swal.Fire({
                                 title:"Notice",
                                 text:data,
                                 icon:"warning"                               
                             });
                        }
                    }   
            })
            
         });


      </script>    
    
</body>
</html>