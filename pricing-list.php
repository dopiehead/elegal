<?php  session_start();

if(isset($_SESSION['id'])){
      $user_email = $_SESSION['email'];
      $user_id = $_SESSION['id'];
      $user_contact = $_SESSION['phone'];
      $user_type = "user";
}

elseif(isset($_SESSION['firm_id'])){
      $user_email = $_SESSION['firm_email'];
      $user_id = $_SESSION['firm_id'];
      $user_contact = $_SESSION['firm_phone_number'];
      $user_type = "firm";
}

elseif(isset($_SESSION['lawyer_id'])){
      $user_email = $_SESSION['lawyer_email'];
      $user_contact = $_SESSION['lawyer_contact'];
      $user_id = $_SESSION['lawyer_id'];
      $user_type = "lawyer";
}


else{

      $user_email = null;
      $user_id = null;
      $user_contact = null;
      $user_type = null;
}

$txn_ref = time();

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <?php include ('components/links.php');?>
     <link rel="stylesheet" href="assets/css/pricing-list.css">
     <title>Pricing List</title>
     <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- FontAwesome for icons -->
</head>
<body class='bg-light'>
     <div class="container py-5">

          <!-- Header Section -->
          <div class="text-center mb-5">
               <h4 class="fw-bold">Consult a Lawyer</h4>
               <p class="text-muted">Choose a package that suits your needs.</p>
          </div>

          <!-- Pricing Plans Section -->
          <div class="row row-cols-1 row-cols-md-3 g-4">
               
               <!-- Basic Package -->
               <div class="col">
                    <div class="card border-light shadow-sm rounded p-4">
                         <h5 class="card-title text-center text-primary">Basic Package</h5>
                         <div class="text-center mb-3">
                              <span class="fw-bold fs-3">NGN 1000</span><br>
                              <span class="text-secondary">per day</span>
                         </div>
                         <ul class="list-unstyled">
                              <li><i class="fa fa-circle text-success"></i> Chat with your choice of lawyer</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all lawyers</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all features</li>
                              <li><i class="fa fa-circle text-success"></i> Consult with experts</li>
                              <li><i class="fa fa-circle text-success"></i> Renew daily</li>
                         </ul>
                         <div class="text-center mt-4">
                              <button id='1000' class="btn btn-outline-dark rounded-pill py-2 px-4 btn-basic">Pay</button>
                         </div>
                    </div>
               </div>

               <!-- Gold Package -->
               <div class="col">
                    <div class="card border-warning shadow-sm rounded p-4">
                         <h5 class="card-title text-center text-warning">Gold Package</h5>
                         <div class="text-center mb-3">
                              <span class="fw-bold fs-3">NGN 2500</span><br>
                              <span class="text-muted">weekly</span>
                         </div>
                         <ul class="list-unstyled">
                              <li><i class="fa fa-circle text-success"></i> Chat with your choice of lawyer</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all lawyers</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all features</li>
                              <li><i class="fa fa-circle text-success"></i> Consult with experts</li>
                              <li><i class="fa fa-circle text-success"></i> Renew weekly</li>
                              <li><span class="text-success fw-bold">Save NGN 21,000</span></li>
                         </ul>
                         <div class="text-center">
                              <button id='2500' class="btn btn-warning text-white rounded-pill py-2 px-4 btn-gold">Pay</button>
                         </div>
                    </div>
               </div>

               <!-- Platinum Package -->
               <div class="col">
                    <div class="card border-light shadow-sm rounded p-4">
                         <h5 class="card-title text-center text-info">Platinum Package</h5>
                         <div class="text-center mb-3">
                              <span class="fw-bold fs-3">NGN 4000</span><br>
                              <span class="text-secondary">monthly</span>
                         </div>
                         <ul class="list-unstyled">
                              <li><i class="fa fa-circle text-success"></i> Chat with your choice of lawyer</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all lawyers</li>
                              <li><i class="fa fa-circle text-success"></i> Access to all features</li>
                              <li><i class="fa fa-circle text-success"></i> Consult with experts</li>
                              <li><i class="fa fa-circle text-success"></i> Renew daily</li>
                              <li><span class="text-success fw-bold">Save NGN 27,000</span></li>
                         </ul>
                         <div class="text-center">
                              <button id='4000' class="btn btn-info text-white rounded-pill py-2 px-4 btn-platinum">Pay</button>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Expert Consultation Offer -->
          <div class="text-center mt-5">
               <p class="text-muted">Consult an expert from <b class="text-success">Essential Nigeria</b> for just NGN 3000 monthly</p>
          </div>

     </div>

     <!-- Bootstrap JS and Popper.js -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
     <!------------------------------------------btn-scroll--------------------------------------------------->

     <a class="btn-down" onclick="topFunction()">&#8593;</a>

     <!------------------------------------------Footer--------------------------------------------------->

  <input type="hidden" value="<?php if(!$user_contact) { echo htmlspecial($user_contact);} ?>"  id='phone_number' >
  <input type="text" value = "<?php if(!$user_type) { echo htmlspecial($user_type);} ?>" id='user_type'>

<?php $txn_ref = time();
?>


<script src="https://js.paystack.co/v2/inline.js"></script>

    <script>
        // Global variable to store selected amount
        let amount;

        // Button click event listeners
        $(".btn-basic").on("click", function() {
            amount = $(this).attr("id");
            paywithPaystack();
        });

        $(".btn-gold").on("click", function() {
            amount = $(this).attr("id");
            paywithPaystack();
        });

        $(".btn-platinum").on("click", function() {
            amount = $(this).attr("id");
            paywithPaystack();
        });

        // Paystack Payment function
        function paywithPaystack() {
          
            if (!amount) {
                alert("Please select a package first!");

                return ;
            }

            var id = "<?php echo htmlspecialchars($user_id); ?>"; 
            var user_type = "<?php echo htmlspecialchars($user_type); ?>";
            const paystack = new PaystackPop();

            // Paystack options
            var options = {
                key: "pk_test_7580449c6abedcd79dae9c1c08ff9058c6618351", // Replace with your Paystack public key
                email: "<?php echo htmlspecialchars($user_email); ?>", // PHP to get user email
                amount: (amount * 100), // Amount in kobo (multiply by 100)
                currency: "NGN",
                ref: "<?php echo $txn_ref ?>", // PHP to generate unique transaction reference
                metadata: {

                    custom_fields: [
                        {
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                            value: document.getElementById('phone_number').value // User's phone number
                        }

                    ]
                },
                onSuccess: function(response) {
                    // Handle success response
                    if (response.status === "success") {
                        var ref = response.reference; // Retrieve payment reference
                        window.location.href = "verify-pay.php?status=success&id="+id+"&reference="+ref+"&user_type="+user_type+"&amount="+amount;
                    } 
                    
                    else if(response.status === "failure") {
                    
                    }
                    else {
                        console.log("Payment not successful");
                    }
                },
                onCancel: function() {
                    // Handle payment cancellation
                    console.log("Payment canceled");
                }
            };

            // Initialize Paystack payment
            paystack.newTransaction(options);
        }
    </script>
</body>
</html>

</body>
</html>
