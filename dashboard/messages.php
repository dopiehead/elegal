
<?php session_start();

?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js'></script>
    <link rel="stylesheet" href="../assets/css/dashboard/messages.css">

</head>

<body class='bg-light'> 

     <div class='px-3'>

         <div class='d-flex gap-3 flex-md-row flex-column'>              

         <?php include ("navigator.php"); ?>
                    
             <div class='dashboard'>
                 
                 <h4 class='mt-5'>Messages</h4>

                  <div>

                     <table class='table table-bordered table-responsive table-hover table-striped text-center  w-100'>

                         <thead class='text-secondary'>
                             <tr>

                                  <th><b>inbox</b></th>
                                  <th>Sender's name</th>
                                  <th>Date recieved</th>

                             </tr>
                        </thead>


                     </table>





                  </div>

           


 
             </div>
       

     </div>
    
</body>
</html>