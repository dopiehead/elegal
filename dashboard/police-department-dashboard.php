<?php session_start();
   require("../engine/config.php");
   if(!isset($_SESSION['department_id'])){
    header("location:../login.php");
    exit();
} 
else {
    include ("content/police-department-content.php");
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
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-th-large"></i> Dashboard</a></li>
            
            <li>
                <a href="#" class="sidebar-menu-item collapsible-menu">
                    <div><i class="fas fa-store"></i><?= htmlspecialchars($Police_department) ?></div>
                    <i class="fas fa-plus small"></i>
                </a>
            </li>
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-exchange-alt"></i> Transactions</a></li>
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-chart-bar"></i> Reports</a></li>
            <li>
                <a href="#" class="sidebar-menu-item collapsible-menu">
                    <div><i class="fas fa-boxes"></i> Vendor Management</div>
                    <i class="fas fa-plus small"></i>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-item collapsible-menu">
                    <div><i class="fas fa-percent"></i> Promotions</div>
                    <i class="fas fa-plus small"></i>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-item collapsible-menu">
                    <div><i class="fas fa-bicycle"></i> Riders Management</div>
                    <i class="fas fa-plus small"></i>
                </a>
            </li>
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-file-alt"></i> Pages</a></li>
            <li><a href="#" class="sidebar-menu-item"><i class="fas fa-envelope"></i> Contact</a></li>
            <li>
                <a href="#" class="sidebar-menu-item collapsible-menu">
                    <div><i class="fas fa-info-circle"></i> About</div>
                    <i class="fas fa-plus small"></i>
                </a>
            </li>
        </ul>
        <div class="user-menu-section">
            <div class="d-flex align-items-center mb-3">
                <div class="position-relative me-2">
                    <img src="/api/placeholder/40/40" alt="User" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                </div>
                <div class="small">
                    <div class="fw-bold"><?= htmlspecialchars($police_department) ?></div>
                    <div class="text-muted small"><?= htmlspecialchars($department_email) ?></div>
                </div>
            </div>
            <div class="small">
                <a href="#" class="text-decoration-none text-dark d-block py-1">My Profile</a>
            
                <a href="#" class="text-decoration-none text-dark d-block py-1">My Bank</a>
                <a href="#" class="text-decoration-none text-dark d-block py-1">Change Password</a>
            </div>
            <div class="d-flex align-items-center mt-3 bg-warning bg-opacity-10 p-2 rounded">
                <div class="position-relative me-2">
                    <img src="/api/placeholder/30/30" alt="Premium" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                </div>
                <div class="small">
                    <div class="d-flex align-items-center">
                        <span class="fw-bold">Natashia Premium</span>
                        <span class="premium-badge ms-1">PREMIUM</span>
                    </div>
                    <div class="text-muted small"><?= htmlspecialchars($department_email)?></div>
                </div>
                <div class="ms-auto">
                    <i class="fas fa-plus text-warning"></i>
                </div>
            </div>
        </div>
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
                        <i class="fas fa-shopping-cart text-muted"></i>
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
                    <img src="/api/placeholder/80/80" alt="Profile" class="profile-pic">
                    <div class="user-profile-badge">
                        <i class="fas fa-camera text-muted small"></i>
                    </div>
                </div>
                <div>
                    <h5><?= htmlspecialchars($police_department)?></h5>
                    <p class="text-muted mb-1"><span class='text-capitalize'><?= htmlspecialchars($user_type)?></span></p>
                    <p class="mb-0 small"><?= htmlspecialchars($lga).", Nigeria";?></p>
                </div>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="info-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Information</h5>
                <button class="edit-btn">Edit</button>
            </div>

            <div class="row">
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Department Name</div>
                    <div><?= htmlspecialchars($police_department)?></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Department Head</div>
                    <div><?= htmlspecialchars($department_head)?></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Zonal Head</div>
                    <div><?= htmlspecialchars($zonal_head)?></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Email Address</div>
                    <div><?= htmlspecialchars($department_email)?></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Phone Number</div>
                    <div><?= htmlspecialchars($department_phone_number)?></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">User Role</div>
                    <div><span class='text-capitalize'><?= htmlspecialchars($user_type)?></span></div>
                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="info-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Address</h5>
                <button class="btn p-0">
                    <i class="fas fa-pencil-alt edit-icon"></i>
                </button>
            </div>

            <div class="row">
                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Country</div>
                    <div class='text-secondary'>Nigeria</div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">State</div>
                    <div><?= htmlspecialchars($department_location)?></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">City</div>
                    <div><?= htmlspecialchars($lga)?></div>
                </div>

                <div class="col-md-4 profile-info-section">
                    <div class="text-muted small">Full Address</div>
                    <div><?= htmlspecialchars($full_address)?>/div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>