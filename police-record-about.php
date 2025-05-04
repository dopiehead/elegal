<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Records Hub - About Us</title>
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
            color: #212529;
            background-color: white;
        }
        
        .navbar {
            padding: 0.75rem 2rem;
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

        .nav-link {
            padding: 0.75rem 1rem;
            color: #212529;
            position: relative;
        }

        .nav-link.active {
            color: var(--primary-purple);
            font-weight: 500;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background-color: var(--primary-purple);
        }
        
        /* About Section styles */
        .about-section {
            padding: 3rem 0;
        }
        
        .about-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .about-intro {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 90%;
        }
        
        .feature-item {
            margin-bottom: 2rem;
        }
        
        .feature-item h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }
        
        .feature-item p {
            color: #495057;
            line-height: 1.6;
            max-width: 90%;
        }
        
        .office-image {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .office-image img {
            width: 100%;
            height: auto;
        }
        .section-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 40px;
            margin-top: 30px;
        }
        
        .service-box {
            text-align: center;
            margin-bottom: 30px;
            padding: 15px;
        }
        
        .service-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .service-description {
            color: #666;
            font-size: 14px;
        }
        
        .benefits-section {
            margin-top: 60px;
            margin-bottom: 60px;
        }
        
        .benefit-item {
            margin-bottom: 15px;
        }
        
        .benefit-title {
            font-weight: bold;
            display: inline;
        }
        
        .benefit-description {
            display: inline;
        }
        
        .footer-divider {
            border-top: 1px solid #dee2e6;
            margin-top: 20px;
        }
        .footer-wrapper {
            background-color: #1e2129;
            color: white;
            padding-top: 2rem;
            padding-bottom: 1rem;
        }
        
        .newsletter-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .newsletter-section h5 {
            font-size: 1rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .newsletter-form {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        
        .email-input {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid #444;
            color: white;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            width: 250px;
            margin-right: -50px;
        }
        
        .email-input::placeholder {
            color: #aaa;
        }
        
        .subscribe-btn {
            background-color: #6c5ce7;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            z-index: 2;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .logo-icon {
            width: 32px;
            height: 32px;
            margin-right: 0.5rem;
            background-color: #6c5ce7;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-icon i {
            color: white;
        }
        
        .logo-text {
            font-size: 1.25rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            gap: 1.5rem;
            margin-left: 2rem;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .nav-links a:hover {
            text-decoration: underline;
        }
        
        .footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin: 1rem 0;
        }
        
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: #aaa;
        }
        
        .language-dropdown {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid #444;
            color: white;
            border-radius: 4px;
            padding: 0.3rem 0.5rem;
            font-size: 0.8rem;
        }
        
        .copyright-links {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .copyright-links a {
            color: #aaa;
            text-decoration: none;
        }
        
        .copyright-links .divider {
            font-size: 0.8rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-links a {
            color: #aaa;
            text-decoration: none;
        }
        
        .social-links a:hover {
            color: white;
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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="police-records.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="records.php">Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="police-record-about.php">About</a>
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

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>About us</h1>
                    <p class="about-intro">
                        At Legal Records Hub, we specialize in providing efficient and secure solutions for legal records management.
                    </p>
                    
                    <div class="feature-item">
                        <h3>Innovation</h3>
                        <p>
                            Our innovative approach ensures that legal professionals can access, manage, and store critical documents with ease and confidence.
                        </p>
                    </div>
                    
                    <div class="feature-item">
                        <h3>Customer-Centric</h3>
                        <p>
                            We are dedicated to building long-term relationships by prioritizing our clients' needs and maintaining exceptional service standards.
                        </p>
                    </div>
                    
                    <div class="feature-item">
                        <h3>Expertise</h3>
                        <p>
                            With a team of seasoned experts, we bring decades of experience in legal records management to every project.
                        </p>
                    </div>
                    
                    <div class="feature-item">
                        <h3>Integrity</h3>
                        <p>
                            Our core values of transparency, honesty, and integrity guide everything we do, ensuring trust and reliability in all our services.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="office-image">
                        <img src="assets/images/about-pic.png" alt="Modern office workspace with laptop and legal documents" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <!-- Services Section -->
        <h2 class="section-title">Our Services</h2>
        
        <div class="row">
            <!-- First Row of Services -->
            <div class="col-md-4">
                <div class="service-box">
                    <h4 class="service-title">Website Hosting</h4>
                    <p class="service-description">Reliable hosting solutions for your website.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="service-box">
                    <h4 class="service-title">SEO</h4>
                    <p class="service-description">Optimize your site for better search rankings.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="service-box">
                    <h4 class="service-title">Online Employment</h4>
                    <p class="service-description">Connect with employers and job seekers online.</p>
                </div>
            </div>
            
            <!-- Second Row of Services -->
            <div class="col-md-4">
                <div class="service-box">
                    <h4 class="service-title">Life Assistance</h4>
                    <p class="service-description">Personalized help for everyday challenges.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="service-box">
                    <h4 class="service-title">Charity</h4>
                    <p class="service-description">Support meaningful causes and make a difference.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="service-box">
                    <h4 class="service-title">Career Development</h4>
                    <p class="service-description">Grow your skills and advance your career.</p>
                </div>
            </div>
        </div>
        
        <!-- Benefits Section -->
        <div class="benefits-section">
            <h2 class="section-title">Benefits of Legal Records Management</h2>
            
            <div class="benefit-item">
                <p><span class="benefit-title">Simplified compliance:</span> Streamlines adherence to legal and regulatory requirements.</p>
            </div>
            
            <div class="benefit-item">
                <p><span class="benefit-title">Efficient time management:</span> Reduces time spent on document retrieval and case preparation.</p>
            </div>
            
            <div class="benefit-item">
                <p><span class="benefit-title">Enhanced security:</span> Protects sensitive legal information through secure storage and access controls.</p>
            </div>
            
            <div class="benefit-item">
                <p><span class="benefit-title">Improved collaboration:</span> Facilitates seamless teamwork among legal professionals.</p>
            </div>
            
            <div class="benefit-item">
                <p><span class="benefit-title">Cost-effectiveness:</span> Reduces overhead costs associated with physical document storage.</p>
            </div>
        </div>
    </div>
    
    <div class="footer-divider"></div>

    <div class="footer-wrapper">
        <div class="container">
            <!-- Newsletter Section -->
            <div class="newsletter-section">
                <h5>Subscribe to our newsletter</h5>
                <div class="newsletter-form">
                    <input type="email" class="email-input" placeholder="Input your email">
                    <button class="subscribe-btn">Subscribe</button>
                </div>
            </div>
            
            <!-- Footer Main -->
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo and Nav Links -->
                <div class="d-flex align-items-center">
                    <div class="logo-section">
                        <div class="logo-icon">
                            <i class="fas fa-folder"></i>
                        </div>
                        <a href="#" class="logo-text">Legal Records Hub</a>
                    </div>
                    
                    <div class="nav-links">
                        <a href="#">Pricing</a>
                        <a href="#">About us</a>
                        <a href="#">Features</a>
                        <a href="#">Help Center</a>
                        <a href="#">Contact us</a>
                        <a href="#">FAQs</a>
                        <a href="#">Careers</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-divider"></div>
            
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="d-flex align-items-center">
                    <select class="language-dropdown">
                        <option>English</option>
                    </select>
                </div>
                
                <div class="copyright-links">
                    <span>© 2024 Brand, Inc.</span>
                    <span class="divider">•</span>
                    <a href="#">Privacy</a>
                    <span class="divider">•</span>
                    <a href="#">Terms</a>
                    <span class="divider">•</span>
                    <a href="#">Sitemap</a>
                </div>
                
                <div class="social-links">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>