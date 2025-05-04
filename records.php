<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Records Hub - Records</title>
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
        
        .records-table {
            margin-top: 2rem;
            margin-bottom: 3rem;
        }

        .records-table th {
            font-weight: 600;
            padding: 1rem;
        }

        .records-table td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
        }

        .records-table tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
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
        
        .app-menu {
            position: fixed;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 0.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .app-menu button {
            width: 2rem;
            height: 2rem;
            border-radius: 5px;
            border: none;
            background-color: #f8f9fa;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .app-menu button:hover {
            background-color: #e9ecef;
        }

          /* case case_details */

                /* Custom styles */
        :root {
            --primary-purple: #6f42c1;
            --dark-navy: #1e2331;
            --light-gray: #f8f9fa;
            --border-color: #dee2e6;
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
        
        /* Case Overview styles */
        .case-overview {
            padding: 2rem 0;
        }
        
        .case-overview h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
        }
        
        .case-details {
            max-width: 700px;
            margin: 0 auto;
        }
        
        .case-item {
            display: flex;
            margin-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 0.5rem;
        }
        
        .case-label {
            width: 30%;
            font-weight: 500;
        }
        
        .case-value {
            width: 70%;
        }
        
        .case-number {
            background-color: rgba(111, 66, 193, 0.1);
            padding: 0 0.5rem;
        }
        
        /* Terms of Settlement styles */




        .terms-settlement {
            padding: 2rem 0;
        }
        
        .terms-settlement h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
        }
        
        .terms-content {
            max-width: 700px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
        }
        
        .terms-left {
            width: 48%;
        }
        
        .terms-right {
            width: 48%;
        }
        
        .terms-item {
            margin-bottom: 1.5rem;
        }
        
        .app-menu {
            position: fixed;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 0.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .app-menu button {
            width: 2rem;
            height: 2rem;
            border-radius: 5px;
            border: none;
            background-color: #f8f9fa;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .app-menu button:hover {
            background-color: #e9ecef;
        }

           /* Custom styles */
           :root {
            --primary-purple: #6f42c1;
            --light-purple: #9a77d8;
            --border-color: #dee2e6;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #212529;
            background-color: white;
        }
        
        /* Timeline styles */
        .timeline-section {
            padding: 2rem 0;
        }
        
        .timeline-item {
            margin-bottom: 1.5rem;
        }
        
        .timeline-date {
            color: var(--light-purple);
            font-weight: 500;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }
        
        .timeline-content {
            margin-left: 0.5rem;
        }
        
        /* Notes styles */
        .notes-section {
            padding: 2rem 0;
            border-top: 1px solid var(--border-color);
        }
        
        .notes-section h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
        }
        
        .note-item {
            margin-bottom: 1.25rem;
        }
        
        .container {
            max-width: 800px;
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
                        <a class="nav-link active" href="records.php">Records</a>
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

    <!-- Records Table -->
    <div class="container records-table">
        <h2 class="mb-4">Name</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Offense</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bryan Burgess</td>
                    <td>10/27/2022</td>
                    <td>Possession of Controlled Substance</td>
                </tr>
                <tr>
                    <td>Elijah Johnson</td>
                    <td>01/03/2022</td>
                    <td>Assault, resisting arrest</td>
                </tr>
                <tr>
                    <td>Savannah Smith</td>
                    <td>09/05/2023</td>
                    <td>Robbery, driving without license</td>
                </tr>
                <tr>
                    <td>Kelly Owens</td>
                    <td>05/15/2023</td>
                    <td>Theft, possession of stolen property</td>
                </tr>
                <tr>
                    <td>Aiden Murphy</td>
                    <td>07/22/2023</td>
                    <td>Fraud</td>
                </tr>
                <tr>
                    <td>Jason Taylor</td>
                    <td>11/23/2022</td>
                    <td>Possession of Marijuana</td>
                </tr>
                <tr>
                    <td>Jennifer Lopez</td>
                    <td>04/26/2022</td>
                    <td>Assault</td>
                </tr>
                <tr>
                    <td>Diana Ross</td>
                    <td>07/06/2023</td>
                    <td>Vandalism, theft</td>
                </tr>
                <tr>
                    <td>Ashley Edwards</td>
                    <td>08/18/2023</td>
                    <td>Domestic violence, DUI</td>
                </tr>
                <tr>
                    <td>George Harris</td>
                    <td>10/04/2023</td>
                    <td>Sexual Offense</td>
                </tr>
                <tr>
                    <td>Patricia King</td>
                    <td>01/20/2022</td>
                    <td>Theft</td>
                </tr>
                <tr>
                    <td>Franklin Allen</td>
                    <td>05/28/2023</td>
                    <td>Possession of Stolen Property</td>
                </tr>
            </tbody>
        </table>
    </div>

     <!-- Case Overview Section -->
     <section class="case-overview">
        <div class="container">
            <h2>Case Overview</h2>
            <div class="case-details">
                <div class="case-item">
                    <div class="case-label">Case Title:</div>
                    <div class="case-value">Withdrawal of Commerciality</div>
                </div>
                <div class="case-item">
                    <div class="case-label">Case Number:</div>
                    <div class="case-value"><span class="case-number">PN-2023-BCA</span></div>
                </div>
                <div class="case-item">
                    <div class="case-label">Filing Date:</div>
                    <div class="case-value">Mar 24, 2023</div>
                </div>
                <div class="case-item">
                    <div class="case-label">Resolution Date:</div>
                    <div class="case-value">Mar 28, 2023</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms of Settlement Section -->
    <section class="terms-settlement">
        <div class="container">
            <h2>Terms of Settlement</h2>
            <div class="terms-content">
                <div class="terms-left">
                    <div class="terms-item">
                        <p><strong>1. Stipulations:</strong> The parties hereto agree to the following stipulations:</p>
                    </div>
                    <div class="terms-item">
                        <p><strong>2. Obligations of the Parties:</strong></p>
                    </div>
                </div>
                <div class="terms-right">
                    <div class="terms-item">
                        <p><strong>Explanations for Terms:</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- App Menu (Left Side) -->
    <!-- <div class="app-menu">
        <button><i class="bi bi-grid"></i></button>
        <button><i class="bi bi-three-dots"></i></button>
    </div>

   App Menu (Left Side) -->
    <!-- <div class="app-menu"> -->
        <!-- <button><i class="bi bi-grid"></i></button> -->
        <!-- <button><i class="bi bi-three-dots"></i></button> -->
    <!-- </div>  -->

        <!-- Timeline Section -->
        <section class="timeline-section">
        <div class="container">
            <div class="timeline-item">
                <div class="timeline-date">09/11/2023</div>
                <div class="timeline-content">
                    Initial Hearing on the matter.
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-date">10/25/2023</div>
                <div class="timeline-content">
                    Defendant's Motion to Dismiss.
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-date">11/15/2023</div>
                <div class="timeline-content">
                    Plaintiff's Motion for Summary Judgement.
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-date">12/22/2023</div>
                <div class="timeline-content">
                    Court Ruling on Motion to Dismiss - Granted.
                </div>
            </div>
        </div>
    </section>
    
    <!-- Relevant Notes Section -->
    <section class="notes-section">
        <div class="container">
            <h2>Relevant Notes</h2>
            
            <div class="note-item">
                <p>- Legal Counsel's Comment: These documents are pivotal as they not only provide insight into the client's current standing but also illuminate the long-term implications for the client's future legal positioning.</p>
            </div>
            
            <div class="note-item">
                <p>- Case Implication: The case's outcome could set a significant legal precedent, influencing future court decisions and shaping the interpretation of key legal principles.</p>
            </div>
            
            <div class="note-item">
                <p>- Additional Context: The significantly more affordable legal costs associated with one option could be a decisive factor in the client's choice, making it a compelling reason for their preference.</p>
            </div>
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
                
                <p>© 2024 Brand, Inc • Privacy • Terms • Sitemap</p>
                
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