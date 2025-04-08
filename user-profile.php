
<?php  session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
 require("engine/config.php");
 $stmt = mysqli_query($conn, "SELECT * FROM user_profile WHERE id = '".$id."' ");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>
    <?php include ("components/links.php"); ?>
    <link rel="stylesheet" href="assets/css/user-profile.css">

</head>
<body class='bg-light'>    
     <?php include ("components/nav.php");?>
    <br><br>

     <?php if($stmt){

         while($user = mysqli_fetch_array($stmt)){

             include ("components/user-content.php");

             $extension = strtolower(pathinfo($user['user_img'],PATHINFO_EXTENSION));

             $image_extension  = array('jpg','jpeg','png'); 

        }
     }

     ?>

      <div class='px-3 mt-5 d-flex justify-content-center w-100'>   

          <div class='d-flex flex-row flex-column card g-3 py-2'>

             <div>
                
             <?php 
                         
                 if (!in_array($extension , $image_extension)) {

                      echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($user_name,0,2)."</span></div>";                  

                  } else { ?>               

                      <img class='user_img' src="<?php echo htmlspecialchars($user_img); ?>" alt="elegal">

             <?php      }   ?>

             </div>

             <h6 class='fw-bold text-capitalize'><?php echo htmlspecialchars($user_name); ?></h6>
            
             <div>
                  <a class='btn border border-2 border-secondary get_in_touch' href="">Get in touch</a>
             </div>

             <span>Email :     &nbsp; <span class='text-secondary'><?php echo htmlspecialchars($user_email); ?></span></span>

             <span>Occupation :    &nbsp;<span class='text-secondary'><?php echo htmlspecialchars($user_occupation); ?></span> </span>

             <div>
                <span>Bio :     &nbsp;<span class='text-secondary'><?php echo htmlspecialchars($user_bio); ?> </span></span>
            </div>

          </div>




      </div>

    <br><br>
    <?php include ("components/footer.php"); ?>
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->
</body>
</html>