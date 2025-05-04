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
    <style>
        /* Custom styles */
        :root {
            --primary-purple: #6f42c1;
            --dark-navy: #1e2331;
            --light-gray: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            padding: 1rem 2rem;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .navbar-brand img {
            margin-right: 0.5rem;
        }
        
        .btn-sign-in {
            border: 1px solid #dee2e6;
            padding: 0.375rem 1rem;
            border-radius: 50px;
            background-color: transparent;
            color: #212529;
        }
        
        .btn-help {
            background-color: var(--primary-purple);
            color: white;
            padding: 0.375rem 1.5rem;
            border-radius: 50px;
            margin-left: 10px;
        }
        
        .hero {
            background-image:linear-gradient(to right, rgba(0,0,0,0.6),rgba(0,0,0,0.8)), url('assets/images/library-with-books.jpg');
            background-size: cover;
            background-position: center;
            padding: 8rem 2rem;
            position: relative;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            text-shadow:0px 0px 4px rgba(0,0,0,0.9);
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        .btn-get-started {
            background-color: var(--primary-purple);
            color: white;
            padding: 0.5rem 2rem;
            border-radius: 5px;
            font-weight: 500;
            border: none;
        }
        
        .footer {
            background-color: var(--dark-navy);
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: white;
            text-decoration: none;
        }
        
        .footer-logo img {
            margin-right: 0.5rem;
        }
        
        .footer-links a {
            color: white;
            text-decoration: none;
            margin-right: 1.5rem;
            font-size: 0.9rem;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            margin-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .footer-bottom select {
            background-color: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            padding: 0.25rem 1rem;
        }
        
        .footer-bottom p {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .social-icons a {
            color: white;
            margin-left: 1rem;
            font-size: 1.2rem;
        }
        
        .newsletter-section {
            padding: 2rem 0;
            background-color: var(--dark-navy);
            text-align: center;
        }
        
        .newsletter-section h3 {
            color: white;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
        
        .newsletter-form {
            max-width: 450px;
            margin: 0 auto;
            display: flex;
        }
        
        .newsletter-form input {
            flex-grow: 1;
            border-radius: 50px 0 0 50px;
            border: none;
            padding: 0.5rem 1.5rem;
        }
        
        .newsletter-form button {
            background-color: var(--primary-purple);
            color: white;
            border: none;
            border-radius: 0 50px 50px 0;
            padding: 0.5rem 1.5rem;
        }
    </style>
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
                        <option>Español</option>
                        <option>Français</option>
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