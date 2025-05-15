<?php session_start();
   require("../engine/config.php");
   if(!isset($_SESSION['officer_id'])){
    header("location:../login.php");
    exit();
} 
else {
    include ("content/police-content.php");
    $extension = strtolower(pathinfo($user_img,PATHINFO_EXTENSION));
    $image_extension  = array('jpg','jpeg','png'); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard/police-dashboard.css">
       
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <div class="text-warning fw-bold fs-4">ele<span class="text-dark">gal</span></div>
        </div>
        <ul class="sidebar-menu list-unstyled">
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-th-large"></i> Dashboard</a></li>
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-user"></i> My profile</a></li>   
            <li><a style="cursor:pointer;" class="sidebar-menu-item dropdown-btn"><i class="fas fa-gear"></i> Settings</a></li>  
             <ul style='display:none;' class='dropdown-content d-flex flex-column flex-row gap-3 ms-2 bg-light p-2 text-secondary list-unstyled d-none'>
                   <li class='ps-4 cursor-pointer'><a class='show-popup text-decoration-none text-secondary'><i class='fas fa-key'></i> Change Password</a></li>
                   <li class="ps-4 cursor-pointer"><a class='show-delete text-decoration-none text-secondary'><i class='fas fa-trash'></i> Delete account</a></li>
             </ul>    
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-sign-out"></i> Log out</a></li>
        </ul>
       
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn text-white me-3">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="search-box">
                    <input type="text" placeholder="Search...">
                    <button class="btn p-0">
                        <i class="fas fa-search text-muted"></i>
                    </button>
                </div>
                <div class="ms-3 text-white"><?= htmlspecialchars($dateToday);?></div>
            </div>
            <div class="d-flex align-items-center">
                <div class="badge-notification me-3">
                    <button class="btn bg-white rounded-circle p-1" style="width: 36px; height: 36px;">
                        <i class="fas fa-envelope text-muted"></i>
                    </button>
                    <span class="badge">2</span>
                </div>
                <div class="badge-notification">
                    <button class="btn bg-white rounded-circle p-1" style="width: 36px; height: 36px;">
                        <i class="fas fa-bell text-muted"></i>
                    </button>
                    <span class="badge">1</span>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <h4 class="mb-4">My Profile</h4>

        <!-- Profile Card -->
        <div class="profile-card">
            <div class="d-flex align-items-center">
                <div class="position-relative me-4">
                <?Php if (!in_array($extension , $image_extension)) {
                     echo"<div class='text-center'><span class='text-secondary text-uppercase' style='font-size:120px;'>".substr($police_name,0,2)."</span></div>";                  
                 } else { ?> 
                    <img src="/api/placeholder/80/80" alt="<?= htmlspecialchars($police_name) ?>" class="profile-pic">
                <?php } ?>
                    <div class="user-profile-badge"> 
                        <i class="fas fa-camera text-muted small"></i>
                    </div>
                </div>
                <div>
                    <h5><?= htmlspecialchars($police_name)?></h5>
                    <p class="text-muted mb-1"><?= htmlspecialchars(preg_replace("/_/"," ",$user_type))?></p>
                    <p class="mb-0 small"><?= htmlspecialchars($lga).", Nigeria";?></p>
                </div>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="info-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Personal Information</h5>
                <button class="edit-btn edit-button">Edit</button>
            </div>

            <div class="row">
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Full Name</div>
                    <div class="field"><span><?= htmlspecialchars($police_name)?></span></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Date of Birth</div>
                    <div class="field"><span><?= htmlspecialchars($police_dob)?></span></div>
                </div>
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Email Address</div>
                    <div class="field"><span><?= htmlspecialchars($_SESSION['email'])?></span></div>
                </div>
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Phone Number</div>
                    <div class="field"><span><?= htmlspecialchars($police_phone_number)?></span></div>
                </div>
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">User Role</div>
                    <div class="field"><span class='text-capitalize'><?= htmlspecialchars(preg_replace("/_/"," ",$user_type))?></span></div>
                </div>
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Rank name</div>
                    <div class="field"><span class='text-capitalize'><?= htmlspecialchars(preg_replace("/_/"," ",$rank_name))?></span></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Team</div>
                    <div class="field"><span class='text-capitalize' ><?= htmlspecialchars(preg_replace("/_/"," ",$team))?></span></div>
                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="info-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Address</h5>
                <button class="btn p-0 edit-address">
                    <i class="fas fa-pencil-alt edit-icon"></i>
                </button>
            </div>
            
            <div class="row">
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Country</div>
                    <div class='text-secondary'>Nigeria</div>
                </div>
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">City</div>
                    <div><span class='field-address capitalize'><?= htmlspecialchars($lga)?></span></div>
                </div>
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Full Address</div>
                    <div><span class='field-address'><?= htmlspecialchars($full_address)?></span></div>
                </div>
            </div>
        </div>

         <!-- official information -->
          
        <div class="info-card">

           <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Next of Kin</h5>
                <button class="btn p-0 edit-nextofKin">
                    <i class="fas fa-pencil-alt edit-icon"></i>
                </button>
            </div>
          

            <div class="row">
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Next of Kin</div>
                    <div class='text-secondary capitalize'><span class='nextofKin'><?= htmlspecialchars($next_of_kin) ?></span></div>
                </div>
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Relationship</div>
                    <div><span class='nextofKin text-capitalize'><?= htmlspecialchars($relationship)?></span></div>
                </div>
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Phone number</div>
                    <div><span class='nextofKin'><?= htmlspecialchars($next_of_kin_telephone)?></span></div>
                </div>
            </div>

        </div>






    </div>

<!-- modal for password change -->
<div class="popup-password d-none">
    <a href="#" class="close-popup"><i class="fas fa-close"></i></a>
    <div class="popup-content">
        <h2>Reset Password</h2>
        <form>
            <label for="email">Email Address</label>
            <input type="email" id="email" placeholder="Enter your email" required>
            
            <label for="password">New Password</label>
            <input type="password" id="password" placeholder="Enter new password" required>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</div>


<!-- Delete Confirmation Popup -->
<div class="popup-delete d-none">
    <a href="#" class="close-delete"><i class="fas fa-close"></i></a>
    
    <div class="delete-content">
        <h2><i class="fas fa-exclamation-triangle"></i> Confirm Deletion</h2>
        <p>Are you sure you want to delete this item?</p>
        
        <ul class="delete-notes">
            <li>This action <strong>cannot</strong> be undone.</li>
            <li>The item will be permanently removed from the database.</li>
            <li>All associated data will be lost.</li>
        </ul>
        
        <div class="delete-buttons">
            <button class="btn-confirm">Yes, Delete</button>
            <button class="btn-cancel">Cancel</button>
        </div>
    </div>
</div>



</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).on("click", ".dropdown-btn", function (e) {
        e.preventDefault();
        var $dropdown = $(".dropdown-content");

        if ($dropdown.hasClass("d-none")) {
            $dropdown.removeClass("d-none").hide().slideDown(200);
        } else {
            $dropdown.slideUp(200, function () {
                $dropdown.addClass("d-none");
            });
        }
    });
</script>
<script>
    // Show the popup
    $(document).on("click", ".show-popup", function(e) {
        e.preventDefault();
        $(".popup-password")
            .removeClass("d-none")
            .addClass("show");
    });

    // Hide the popup
    $(document).on("click", ".close-popup", function(e) {
        e.preventDefault();
        $(".popup-password")
            .removeClass("show")
            .delay(300) // Wait for animation to complete
            .queue(function(next){
                $(this).addClass("d-none");
                next();
            });
    });
</script>

<script>
    // Show the delete popup
    $(document).on("click", ".show-delete", function(e) {
        e.preventDefault();
        $(".popup-delete")
            .removeClass("d-none")
            .addClass("show");
    });

    // Hide the delete popup
    $(document).on("click", ".close-delete, .btn-cancel", function(e) {
        e.preventDefault();
        $(".popup-delete")
            .removeClass("show")
            .delay(300)
            .queue(function(next){
                $(this).addClass("d-none");
                next();
            });
    });

    // Confirm delete
    $(document).on("click", ".btn-confirm", function(e) {
        e.preventDefault();
        alert("Item deleted!");
        // You can trigger actual deletion here

        $(".popup-delete")
            .removeClass("show")
            .delay(300)
            .queue(function(next){
                $(this).addClass("d-none");
                next();
            });
    });
</script>
<script>
   $(document).on("click", ".edit-button", function () {
      $(".field").each(function () {
         const isEditable = $(this).attr("contenteditable") === "true";

         // Toggle contenteditable
         $(this).attr("contenteditable", !isEditable);

         // Toggle border style
         $(this).toggleClass("border-bottom border-1 border-danger border-dotted");

         // Optional: focus when entering edit mode
         if (!isEditable) {
            $(this).focus();
         }
      });
   });
</script>
<script>
   $(document).on("click", ".edit-address", function () {
      $(".field-address").each(function () {
         const isEditable = $(this).attr("contenteditable") === "true";

         // Toggle contenteditable
         $(this).attr("contenteditable", !isEditable);

         // Toggle border style to indicate edit mode
         $(this).toggleClass("border-bottom border-1 border-danger border-dotted");

         // Optional: focus the field if entering edit mode
         if (!isEditable) {
            $(this).focus();
         }
      });
   });
</script>

<script>
   $(document).on("click", ".edit-nextofKin", function () {
      $(".nextofKin").each(function () {
         const isEditable = $(this).attr("contenteditable") === "true";

         // Toggle contenteditable
         $(this).attr("contenteditable", !isEditable);

         // Toggle border style to indicate edit mode
         $(this).toggleClass("border-bottom border-1 border-danger border-dotted");

         // Optional: focus the field if entering edit mode
         if (!isEditable) {
            $(this).focus();
         }
      });
   });
</script>



