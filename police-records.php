<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Records Hub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/police-records.css">

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" stroke="#6f42c1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 22V12h6v10" stroke="#6f42c1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                eLegal Records Hub
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="police-records.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="records.php">Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="police-record-about.php">About</a>
                    </li>
                </ul>
                <div class="ms-auto d-flex align-items-center">
                    <button class="btn btn-sign-in">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                    </button>
                    <button class="btn btn-help">
                        <i class="bi bi-question-circle me-1"></i> Help
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Your Legal Records, Simplified</h1>
            <p>Access, manage, and protect your legal documents effortlessly.</p>
            <button class="btn btn-get-started">Get Started</button>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <h3>Subscribe to our newsletter</h3>
            <form class="newsletter-form">
                <input type="email" placeholder="Input your email" class="form-control">
                <button type="submit" class="btn">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <a href="#" class="footer-logo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" stroke="#6f42c1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 22V12h6v10" stroke="#6f42c1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Legal Records Hub
            </a>
            
            <div class="footer-links">
                <a href="#">Pricing</a>
                <a href="#">About us</a>
                <a href="#">Features</a>
                <a href="#">Help Center</a>
                <a href="#">Contact us</a>
                <a href="#">FAQs</a>
                <a href="#">Careers</a>
            </div>
            
            <div class="footer-bottom">
                <div>
                    <select class="form-select form-select-sm">
                        <option>English</option>

                    </select>
                </div>
                
                <p>© 2025 Elegal, Inc • Privacy • Terms • Sitemap</p>
                
                <div class="social-icons">
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>