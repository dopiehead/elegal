<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giwa-Osagie & Co. - Barristers, Solicitors & Notaries Public</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: white !important;
            padding: 15px 0;
        }
        .navbar-brand img {
            max-height: 60px;
        }
        .navbar .nav-link {
            color: #555 !important;
            font-weight: 500;
            padding: 0 15px;
        }
        .navbar .active .nav-link {
            border-bottom: 2px solid #1a237e;
        }
        .hero-section {
            position: relative;
            height: 500px;
            background-image: url('https://via.placeholder.com/1920x500');
            background-size: cover;
            background-position: center;
            color: white;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 1;
            padding-top: 150px;
        }
        .hero-content h1 {
            font-size: 48px;
            font-weight: bold;
            color: #1a237e;
        }
        .hero-content h2 {
            font-size: 36px;
            color: #1a237e;
        }
        .hero-content h3 {
            font-size: 20px;
            color: #1a237e;
        }
        .btn-find-lawyer {
            background-color: #ffc107;
            color: white;
            padding: 10px 30px;
            font-weight: bold;
            border: none;
            font-size: 18px;
        }
        .btn-find-lawyer:hover {
            background-color: #e6b000;
            color: white;
        }
        .bottom-section {
            background-color: #1a237e;
            padding: 50px 0;
            text-align: center;
        }
        .carousel-control-prev, .carousel-control-next {
            width: 5%;
        }
        .carousel-indicators {
            bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/120x60/1a237e/ffffff?text=GO%26Co" alt="Giwa-Osagie & Co.">
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
                        <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <li><a class="dropdown-item" href="#">Our History</a></li>
                            <li><a class="dropdown-item" href="#">Vision & Mission</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="practiceDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Practice Areas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="practiceDropdown">
                            <li><a class="dropdown-item" href="#">Corporate Law</a></li>
                            <li><a class="dropdown-item" href="#">Real Estate</a></li>
                            <li><a class="dropdown-item" href="#">Litigation</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News & Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Publications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
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
                <div class="hero-section" style="background-image: url('background/bg-1.jpg');">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Left side empty for image -->
                            </div>
                            <div class="col-md-5 hero-content text-end">
                                <h1>BAND 1</h1>
                                <h2>General Business Law</h2>
                                <h3>- Chamber & Partners</h3>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-find-lawyer">FIND A LAWYER</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-section" style="background-image: url('background/bg-2.jpg');">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Left side empty for image -->
                            </div>
                            <div class="col-md-5 hero-content text-end">
                                <h1>LEGAL EXCELLENCE</h1>
                                <h2>Corporate Advisory</h2>
                                <h3>- Trusted Advisors</h3>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-find-lawyer">FIND A LAWYER</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-section" style="background-image: url('background/bg-3.jpg');">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Left side empty for image -->
                            </div>
                            <div class="col-md-5 hero-content text-end">
                                <h1>EXPERIENCED TEAM</h1>
                                <h2>Litigation & Arbitration</h2>
                                <h3>- Decades of Experience</h3>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-find-lawyer">FIND A LAWYER</a>
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>