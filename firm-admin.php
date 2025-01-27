
<?php  session_start();

    if(isset($_GET['id']) && !empty($_GET['id'])){

          $firm_id = $_GET['id'];

         require ("engine/config.php");

     $stmt = mysqli_query($conn,"SELECT * FROM lawyer_firm WHERE id = '$firm_id'");
     
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firm Admin</title>
    <?php include ('components/links.php');?>
</head>
<body>
     <?php include ('components/nav.php');?>
     <br>
     <br>
       <?php
       
          if($stmt){

              while($row = mysqli_fetch_array($stmt)){
                  
                    include ("components/firm-content.php");

              }

         }
             
       ?>

     <h1>Welcome to <?php echo htmlspecialchars($firm_name); ?></h1>
     <p>This is the Firm Admin dashboard. Here you can manage your firm's users, jobs, and other relevant information.</p>
     <br><br>
     <?php include ('components/footer.php');?>
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->         
</body>
</html>