<?php session_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['lawyer_id']) && !isset($_SESSION['firm_id'])) {
     header("Location: ../login.php");
     exit();
}

?>

<html lang="en">
     
<head>

     <meta charset="UTF-8">
     <title>My profile</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
     <link rel="stylesheet" href="../assets/css/dashboard/notifications.css">

</head>

<body class='bg-light'> 

     <div class='px-3'>

         <div class='d-flex gap-3 flex-md-row flex-column'>              

         <?php include ("navigator.php"); ?>
                    
             <div class='dashboard'>
                 
                 <h4 class='mt-5'>Notifications</h4>

                  <div class='bg-white px-2 py-4 bg-white text-center text-secondary shadow-lg mt-4'>

                    You have no notifications yet

                  </div>

           


 
             </div>
       

     </div>
    
</body>
</html>