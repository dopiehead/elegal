<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("engine/config.php");

$host = $_SERVER['HTTP_HOST'];

$base_domain = "elegal.ng";

if ($host !== $base_domain && strpos($host, '.' . $base_domain) !== false) {

    $username = str_replace('.' . $base_domain, '', $host);  
    $username = preg_replace("/-/", " ", $username); 

    // First check if it's a lawyer
    $stmt = $conn->prepare("SELECT * FROM lawyer_profile WHERE lawyer_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $lawyer_found = $result->num_rows; 
    if ($lawyer_found > 0) {
        $row = $result->fetch_assoc();
        include("contents/lawyer-content.php");
       
    } else {
        // Then check if it's a firm
        $stmt = $conn->prepare("SELECT * FROM lawyer_firm WHERE firm_name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $firm_found = $result->num_rows;
        if ( $firm_found > 0) {
            $row = $result->fetch_assoc();
            include("contents/firm-content.php");
        } else {
            // Neither lawyer nor firm found — redirect
            header("Location: https://elegal.ng/index.php");
            exit;
        }
    }

    // Optional: Handle image extension if $user_img is set
    if (!empty($user_img)) {
        $extension = strtolower(pathinfo($user_img, PATHINFO_EXTENSION));
        $image_extension = ['jpg', 'jpeg', 'png'];
    }

} else {
    // If it's not a valid subdomain of your base domain
    header("Location: https://elegal.ng/index.php");
    exit;
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class='text-capitalize'> <?=htmlspecialchars($user_name)?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Playwrite+IT+Moderna:wght@100..400&family=Playwrite+MX+Guides&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://elegal.ng/assets/css/home.css">
    <style>
        
        .text-logo {
              font-family: "Bungee Spice", sans-serif;
              font-weight: 400;
              font-style: normal;
              letter-spacing:-1px;
             
         }
        
        title{
            text-transform:capitalize;
        }
        
      #overlay {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(0, 0, 0, 0.75); /* semi-transparent black */
          z-index: 9999;
         display: none; 
}

.overlay-content {
       position: absolute;
       top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      text-align: center;
}
    </style>
    
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand d-flex flex-column flex-row text-center" href="#">
                <span class="fs-1 text-danger text-logo"><?= htmlspecialchars(substr($user_name, 0, 2))?></span>
                <span style='font-size:14px;line-height:5px' class='text-uppercase'><?= htmlspecialchars($user_name) ?></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#about">
                            About
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="practiceDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Practice Areas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="practiceDropdown">
                            
                     <?php 

                          $areas = explode(",",$practice_areas);
                          foreach($areas as $lawyer_practice_areas){?>
                         
                            <li style="cursor:pointer" class='mt-1'><a id="showOverlay" class="dropdown-item"><?= htmlspecialchars($lawyer_practice_areas); ?></a></li>
                             
                     <?php         }     ?>
                     
                        </ul>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="#">Our Team</a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="#">News & Events</a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="#articles">Publications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Carousel -->
                     
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="hero-section" style="background-image: url('https://elegal.ng/background/bg-1.jpg');">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Left side empty for image -->
                            </div>
                            <div class="col-md-5 hero-content text-end">
                                 <h1 class='text-light text-uppercase'><?= htmlspecialchars($user_name)?></h1>
                                 <h2><?= htmlspecialchars($practice_areas)?></h2>
                                 <?php if($lawyer_found > 0): ?>
                                 <h3>- <?= htmlspecialchars($current_position)?></h3>
                                 <?php else: ?>
                                  <h3>- <?= htmlspecialchars($certification_and_accreditation)?></h3>
                                <?php endif; ?>
                                
                                <div class="mt-4">
                                    <a href="#lawyers" class="btn btn-find-lawyer">FIND A LAWYER</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-section" style="background-image: url('https://elegal.ng/background/bg-2.jpg');">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Left side empty for image -->
                            </div>
                            <div class="col-md-5 hero-content text-end">
                                <h1 class='text-light'>LEGAL EXCELLENCE</h1>
                                <h2>Corporate Advisory</h2>
                                <h3>- Trusted Advisors</h3>
                                <div class="mt-4">
                                    <a href="#lawyers" class="btn btn-find-lawyer">FIND A LAWYER</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-section" style="background-image: url('https://elegal.ng/background/bg-3.jpg');">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Left side empty for image -->
                            </div>
                            <div class="col-md-5 hero-content text-end">
                                <h1 class='text-light'>EXPERIENCED TEAM</h1>
                                <h2>Litigation & Arbitration</h2>
                                <h3>- Decades of Experience</h3>
                                <div class="mt-4">
                                    <a href="#lawyers" class="btn btn-find-lawyer">FIND A LAWYER</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Bottom CTA Section -->
    <section class="bottom-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <a href="#" class="btn btn-find-lawyer">Find a Lawyer</a>
                </div>
            </div>
        </div>
    </section>

    <!-- about section -->

    <div class="container about-section">
        <div class="row">
            <div class="col-lg-7">
                <h2 id="about" class="about-title">About us...</h2>
                
                <p class="about-text">
                     <?php 
                         $user_bio_parts = explode(" \\n ", $user_bio);
                             foreach ($user_bio_parts as $bio): ?>
                                  <p><?= htmlspecialchars(trim($bio)); ?></p>
                                      <?php endforeach; ?>
                    
              </p>
                
                <p class="about-text">
                    The strength of the firm lies in the depth of experience of its lawyers who 
                    maintain a high level of professionalism in their transactions with various clients.
                </p>
                
                <a href="#" class="more-btn">MORE</a>
            </div>
            
            <div class="col-lg-5">
                <div class="logo-container">
                    <div class="logo-img">
                        <!-- Replace with actual logo -->
                     <?php if (in_array($extension, $image_extension)) { ?>
                          <img src="<?= "https://elegal.ng/../" . htmlspecialchars($user_img) ?>" alt="<?= htmlspecialchars($user_name) ?>" class="img-fluid">
                     <?php } else { ?>
                           <span class="img-fluid fs-1 text-uppercase text-secondary"><?= htmlspecialchars(substr($user_name, 0, 2))?></span>
                     <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
 <!--end of about section-->
 
 <!--start  for list of lawyers in the firms -->
 
<div class='bg-light my-3'>

<br>
    
<div id="lawyers" class='container list_of_lawyers mb-5'>
    
    <h2 class='text-dark text-capitalize fw-bold mt-4 mb-2'>Lawyers at <?= htmlspecialchars($user_name) ?></h2><br>

    <?php
    
    if ($lawyer_found > 0):
          
          echo "no user found";
          
          else:
     
        $condition = "SELECT * FROM lawyer_profile WHERE lawyer_firm_id = ?";
        $getlawyers = $conn->prepare($condition);
        $getlawyers->bind_param("i", $userId);

        if ($getlawyers->execute()):
            $datalawyers = $getlawyers->get_result();

            if ($datalawyers->num_rows > 0):
                ?>
                <div class="mt-4 mb-5">
                   
                    <div class="row">
                        <?php while ($row = $datalawyers->fetch_assoc()):
                               $lawyer_id = $row['id'];
                              $lawyer_name = $row['lawyer_name'];
                              $lawyer_img = $row['lawyer_img'];
                              $lawyer_experience = $row['lawyer_experience'];
                              $lawyer_location = $row['lawyer_location'];
                              $lawyer_speciality = $row['practice_areas'];
                            ?>
                            <div class="col-md-3">
                                <div class="lawyer-card shadow">
                                    <img style='height:250px;object-fit:cover' src="<?= "https://elegal.ng/../" . htmlspecialchars($lawyer_img) ?>" alt="<?= htmlspecialchars($lawyer_name) ?>" class="lawyer-img w-100">
                                    
                                    <div class="lawyer-info mt-2 px-2 pb-3">
                                        <div class="lawyer-name fs-4 fw-bold text-capitalize"><?= htmlspecialchars($lawyer_name) ?></div>
                                         <div class="lawyer-location text-dark"><?= "Associate at ". htmlspecialchars($user_name) ?></div>
                                        <div class="lawyer-experience text-secondary"><?= htmlspecialchars($lawyer_experience) ?> years experience</div>
                                        <div class="lawyer-location text-secondary"><?= htmlspecialchars($lawyer_location) ?></div>
                                        <div class="lawyer-speciality text-secondary"><?= htmlspecialchars($lawyer_speciality) ?></div>
                                        <div class="rating text-secondary">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="d-flex gap-2 mt-3">
                                            <a class="btn btn-message btn-success text-white text-decoration-none">Send a message</a>
                                            <a href="http://<?=htmlspecialchars($host."/profile.php");?>" class="btn btn-profile border border-3 border-success text-success text-decoration-none">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php
            else:
                echo "<p>No lawyers found for this firm.</p>";
            endif;
        else:
            echo "Error in executing statement: " . $conn->error;
        endif;
    endif;
   
    ?>
</div>
<br>
</div>

 <!--start of publication section for lawyers in firms -->
 
 <div class='container publications mb-5'>
     
     <h2 id="articles" class='text-dark text-capitalize fw-bold mt-4 mb-2'>News & Articles</h2><br>
      
      <?php
      
      if($lawyer_found > 0):
          $getarticles = $conn->prepare("SELECT * FROM articles WHERE lawyer_id = ?");
         $getarticles->bind_param("i",$userId);
      else:
          $getarticles = $conn->prepare("SELECT * FROM articles WHERE firm_id = ?");
          $getarticles->bind_param("i",$userId);
      endif;
          
      if($getarticles->execute()){
          
          $result = $getarticles->get_result();
          
          $datafound = $result->num_rows;
          
          if($datafound>0){ 
              
             echo "<div class = 'd-flex justify-content-center justify-content-md-start align-items-center gap-4'>";
             
             while($article = $result->fetch_assoc()):
 
                 include("components/article-content.php"); ?>
          
                     <div style='width:250px;' class='d-flex flex-row flex-column flex-wrap'>

                          <a href="article-details.php?id=<?=htmlspecialchars($article_id); ?>"> 
                                 <img class='w-100 mb-2' src="<?= "https://elegal.ng/../".htmlspecialchars($article_img); ?>" alt="elegal">
                          </a>
             
                           <h6 class='text-dark'><a class='text-dark text-decoration-none mt-2' href="article-details.php?id=<?= htmlspecialchars($id); ?>"><?=htmlspecialchars($title); ?></a></h6>

                           <span class='text-secondary text-sm text-uppercase'><?=htmlspecialchars($created_at); ?> / <?=htmlspecialchars($author_name); ?></span>

                     </div>
          
          
    <?php
              endwhile;
      
      }
      
          echo"</div>";
      
      }
      else{ ?>
         
         <div>
             <span><?= htmlspecialchars("No publications has been posted by this firm yet.") ?></span>
             
         </div> 
          
     <?php  }
      
      
      ?>
     
 </div>


<!-- highlight section -->
<div class="bg-light mb-5">
<div class="container highlights-section">
        <h2 class="highlights-title">Highlights</h2>
        
        <div class="row">
            <!-- Nigeria and AfCFTA Card -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://elegal.ng/background/nigerian-flag.jpg" class="card-img-top" alt="Nigeria flag">
                    <div class="card-body">
                        <h5 class="card-title">Nigeria and the impact of AfCFTA: Two years after</h5>
                    </div>
                </div>
            </div>
            
            <!-- Business Guide Card -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://elegal.ng/background/Business.jpg" class="card-img-top" alt="Business icons and charts">
                    <div class="card-body">
                        <h5 class="card-title">A Guide to Doing Business in Nigeria</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-left">
            <a href="#" class="more-btn">MORE</a>
        </div>
    </div>

    </div>

    <br>
    

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact us</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          <div class='d-flex flex-row flex-column'>
              <input type="hidden" value="<?= htmlspecialchars($userId) ?>">
          <div class='d-flex justify-content-center gap-2'>
               <span class='text-secondary'>From: <input type="text" class="border border-2 border-muted mb-2" placeholder="Enter email address"></span>
               <span class='text-secondary'><input type="text" class="border border-2 border-muted mb-2" placeholder="Enter Name"></span>
           </div>
          <textarea placeholder="....Write a message" class='border border-2 border-muted' cols="40" rows="8" wrap="physical"></textarea>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

 <!--practice areas-->
 
<!--<button id="hideOverlay">Hide Overlay</button>-->

<div id="overlay">
    <div class="overlay-content">
        <h2>Loading... Please wait</h2>
    </div>
</div>


    <!-- footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="footer-links">
                        <a id="showOverlay" href="#">Practice Areas</a>
                        <a href="#">Our Team</a>
                        <a href="#">News & Events</a>
                        <a href="#">Publications</a>
                        <a href="tel:+234<?=htmlspecialchars($user_contact)?>">Contact Us</a>
                    </div>
                    
                    <div>
                        <a href="#" class="text-decoration-none">Cookies & Privacy Policy</a>
                    </div>
                    
                    <div class="social-icons">
                        <h4>FOLLOW US ON:</h4>
                        <a href="#" class="social-icon">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4 partner-logos d-flex justify-content-end align-items-center gap-2">
                    <div class="partner-logo">
                        <span class='text-logo fs-2'> <?= htmlspecialchars(substr($user_name, 0, 2)) ?></span>
                    </div>
                    <div>
                         <span class='text-light text-uppercase'> <?= htmlspecialchars($user_name) ?></span>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <script>
        $(document).ready(function() {
    $('#showOverlay').click(function() {
        $('#overlay').fadeIn();
    });

    $('#hideOverlay').click(function() {
        $('#overlay').fadeOut();
    });
});

setTimeout(function() {
    $('#overlay').fadeOut();
}, 3000); // hides after 3 seconds

    </script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>