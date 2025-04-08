<?php session_start();  

if(isset($_SESSION['id']) || isset($_SESSION['firm_id']) || isset($_SESSION['lawyer_id'])){         
     
     $status = $_SESSION['payment_status'];
 }

 else{

      $_SESSION['payment_status'] = null;
 }


require("engine/config.php");

$condition = "
    SELECT  
        
        lawyer_firm.firm_name AS firm_name,
        lawyer_firm.firm_email AS firm_email,
        lawyer_firm.firm_about AS firm_about,
        lawyer_firm.certification_and_accreditation AS certification_and_accreditation,
        lawyer_firm.date_found AS date_found,
        lawyer_firm.nooflawyers AS nooflawyers,
        lawyer_firm.firm_phone_number AS firm_phone_number,
        lawyer_firm.location AS location,
        lawyer_firm.practice_areas AS firm_practice_areas,
        lawyer_firm.verified AS firm_verified,
        lawyer_profile.id AS lawyer_id,
         lawyer_profile.lawyer_img AS lawyer_img,
        lawyer_profile.lawyer_email AS lawyer_email,
        lawyer_profile.lawyer_name AS lawyer_name,
        lawyer_profile.lawyer_firm AS lawyer_firm,
        lawyer_profile.lawyer_bio AS lawyer_bio,
        lawyer_profile.lawyer_education AS lawyer_education,
        lawyer_profile.lawyer_dob AS lawyer_dob,
        lawyer_profile.lawyer_experience AS lawyer_experience,
        lawyer_profile.lawyer_rating AS lawyer_rating,
        lawyer_profile.lawyer_location AS lawyer_location,
        lawyer_profile.current_position AS current_position,
        lawyer_profile.lawyer_phone_no AS lawyer_phone_no,
        lawyer_profile.practice_areas AS lawyer_practice_areas,
        lawyer_profile.practice_location AS practice_location,
        lawyer_profile.published_articles AS published_articles,
        lawyer_profile.supreme_court_number AS supreme_court_number,
        lawyer_profile.status AS status,
        lawyer_profile.currently_engaged AS currently_engaged,
        lawyer_profile.verified AS lawyer_verified

    FROM lawyer_firm
    JOIN lawyer_profile ON lawyer_profile.lawyer_firm = lawyer_firm.firm_name
    WHERE lawyer_firm.verified = 1 AND lawyer_profile.verified = 1
";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("components/links.php");?>
    <link rel="stylesheet" href="assets/css/search-process.css">
    <!-- Bootstrap 5 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS and Popper.js (required for modal functionality) -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <title>Search result</title>
</head>
<body class='bg-light'>
    <?php include ("components/nav.php");?>
    <br><br><br> 
    <div class="px-3 mt-4">

<?php
// If there's a search query
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_terms = explode(" ", mysqli_escape_string($conn, $_GET['search']));
    $search_conditions = [];
    
    // Loop through each search term and add a LIKE condition
    foreach ($search_terms as $text) {
        $text = htmlspecialchars($text); // Sanitize each search term
        $search_conditions[] = "
            `firm_name` LIKE '%$text%' OR
            `firm_email` LIKE '%$text%' OR
            `firm_about` LIKE '%$text%' OR
            `certification_and_accreditation` LIKE '%$text%' OR
            `date_found` LIKE '%$text%' OR
            `nooflawyers` LIKE '%$text%' OR
            `firm_phone_number` LIKE '%$text%' OR
            `location` LIKE '%$text%' OR
         
          
            `lawyer_email` LIKE '%$text%' OR
            `lawyer_name` LIKE '%$text%' OR
            `lawyer_bio` LIKE '%$text%' OR
            `lawyer_education` LIKE '%$text%' OR
            `lawyer_dob` LIKE '%$text%' OR
            `lawyer_experience` LIKE '%$text%' OR
            `lawyer_rating` LIKE '%$text%' OR
            `lawyer_location` LIKE '%$text%' OR
            `current_position` LIKE '%$text%' OR
            `lawyer_phone_no` LIKE '%$text%' OR
        
            `practice_location` LIKE '%$text%' OR
            `published_articles` LIKE '%$text%' OR
            `supreme_court_number` LIKE '%$text%' OR
            `status` LIKE '%$text%' OR
            `currently_engaged` LIKE '%$text%' OR
            `created_at` LIKE '%$text%' 
    
        ";
    }

    // Join all conditions with OR
    $condition .= " AND (" . implode(' OR ', $search_conditions) . ")";
}

// Pagination
$num_per_page = 20;
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$initial_page = ($page - 1) * $num_per_page;
$condition .= " LIMIT $initial_page, $num_per_page";

// Execute query
$data = mysqli_query($conn, $condition);
if ($data) {
    $datafound = $data->num_rows;
 
    if($datafound>0){

        echo "<div class='text-center float-right'>Found ". $datafound. " results.</div>";

        while ($lawyer = mysqli_fetch_assoc($data)) {
            $id = $lawyer['lawyer_id'];

            echo"<div class='shadow search-package my-4'>";  
            echo "<img src=". $lawyer['lawyer_img']. "><br>";
           
            echo"<div class='px-2 text-secondary'>";
            echo "<span class='text-center text-dark fw-bold text-capitalize'>". $lawyer['lawyer_name']. "</span><br>";

            echo "". $lawyer['lawyer_practice_areas']. "<br>";
            echo "<span>". $lawyer['lawyer_location']. "</span><br>";
            echo "". $lawyer['lawyer_experience']. " years experience<br>";
            echo"</div>"; ?>

            <div class='d-flex justify-content-between mt-4 px-2 text-sm'>
               
               <?php if($status==1){ ?>

                     <a id='openModalBtn' class='btn border-success border-2 text-sm text-success ' data-bs-toggle="modal" data-bs-target="#myModal">Send message</a>

               <?php } else {?>

                      <a class='btn border-success border-2 text-sm text-success  text-decoration-none text-white' href='pricing-list.php'>Send message</a>

                <?php  } ?>

               <a href='profile.php?id=<?php echo htmlspecialchars($id);?>&&user_type=lawyer' class='btn btn-success text-sm text-white '>View profile </a>
               

            </div>

             <?php 

            echo"</div>";
             
            
        }
        
    }

} else {
    echo "Error: " . mysqli_error($conn);
}
?>
<br><br>


</div>


<!-- The Modal -->

<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <!-- Modal content -->
    <div class="modal-content">
      <!-- Close button -->
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      
      <!-- Modal Header -->
      <div class="modal-header text-center">
        <h3 class="fw-bold text-primary w-100">Hire a Lawyer</h3>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body">
        <form id="message-form">
          <div class="mb-3">
            <label for="sentby" class="form-label fw-bold text-secondary">Email</label>
            <input type="email" name="sentby" id="sentby" class="form-control" placeholder="Enter your email" required>
          </div>
          
          <div class="mb-3">
            <label for="subject" class="form-label fw-bold text-secondary">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter subject" required>
          </div>
          
          <div class="mb-3">
            <label for="message" class="form-label fw-bold text-secondary">Body</label>
            <textarea name="message" id="message" class="form-control" rows="5" placeholder="Write your message..." required></textarea>
          </div>

          <input type="hidden" name="sentto" value="<?php echo htmlspecialchars($lawyer_email); ?>">

          <div class="text-center">
            <button type="submit" class="btn btn-primary w-100" id="submit-message">
              <span class="send-button">Send</span>
              <span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true" style="display: none;"></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include ("components/footer.php");?>
<script>
 
  $(document).ready(function() {

    $("#openModalBtn").click(function() {
      $("#myModal").fadeIn(); 
    });

 
    $(".close").click(function() {
      $("#myModal").fadeOut(); // Hide the modal with fade effect
    });

    // When the user clicks on the "Close Modal" button, close the modal
    $("#closeModalBtn").click(function() {
      $("#myModal").fadeOut(); // Hide the modal with fade effect
    });

    // Close the modal if the user clicks anywhere outside the modal content
    $(window).click(function(event) {
      if ($(event.target).is("#myModal")) {
        $("#myModal").fadeOut(); // Hide the modal if clicked outside
      }
    });
  });
</script>

<script type="text/javascript">

     $('.spinner-border').hide();
   $('#submit-message').on('click',function(e){
        e.preventDefault();
        $(".spinner-border").show();
              $.ajax({
                 type: "POST",
                 url: "engine/message-process.php",
                 data:  $("#message-form").serialize(),
                 cache:false,
                 contentType: "application/x-www-form-urlencoded",
                 success: function(response) {
                     $(".spinner-border").hide();
                     if (response==1) {
                          swal({

                      title:"Success",                  
                      text:"Message sent",
                      icon:"success",
            });
                
             $("#myModal").hide(1000);
             $("#message-form")[0].reset(); 
             $("#message-form").find('input:text').val('');
             $("#message-form").find('textarea').val('');
         
                                                        }    
            else{
            
                  swal({ 

                     title: "Notice",
                     icon:"error",
              	     text:response

                 });
           

           }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });
</script>

</body>
</html>
