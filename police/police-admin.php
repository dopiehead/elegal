<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRESS Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f6f8fa;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        
        .sidebar {
            background-color: #ffffff;
            height: 100vh;
            width: 240px;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.05);
            z-index: 100;
        }
        
        .sidebar-logo {
            padding: 0 20px 20px;
            display: flex;
            align-items: center;
        }
        
        .sidebar-logo img {
            width: 26px;
            height: 26px;
            margin-right: 10px;
        }
        
        .sidebar-menu {
            padding: 0;
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        
        .sidebar-menu-item {
            padding: 10px 20px;
            display: flex;
            align-items: center;
            color: #555;
            text-decoration: none;
            border-radius: 0 20px 20px 0;
            transition: all 0.3s;
        }
        
        .sidebar-menu-item:hover {
            background-color: #f0f2f5;
        }
        
        .sidebar-menu-item.active {
            background-color: #0f172a;
            color: white;
        }
        
        .sidebar-menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .content-area {
            margin-left: 240px;
            padding: 20px;
        }
        
        .top-bar {
            background-color: #ffffff;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.05);
        }
        
        .search-box {
            background-color: #f0f2f5;
            border-radius: 8px;
            padding: 8px 15px;
            display: flex;
            align-items: center;
            width: 300px;
        }
        
        .search-box input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
            padding: 5px;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            margin-top: auto;
            padding: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            overflow: hidden;
        }
        
        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .task-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #f0f2f5;
        }
        
        .task-count {
            display: flex;
            gap: 40px;
        }
        
        .task-count-item {
            text-align: center;
        }
        
        .task-count-number {
            font-size: 2rem;
            font-weight: bold;
        }
        
        .task-count-label {
            font-size: 0.85rem;
            color: #777;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            font-weight: normal;
            color: #777;
            border-top: none;
            padding: 15px 20px;
        }
        
        .table td {
            padding: 15px 20px;
            vertical-align: middle;
        }
        
        .task-status {
            display: flex;
            align-items: center;
        }
        
        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 8px;
        }
        
        .status-done {
            background-color: #10b981;
        }
        
        .status-progress {
            background-color: #3b82f6;
        }
        
        .avatar-small {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            overflow: hidden;
        }
        
        .avatar-small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .notification-badge {
            background-color: #10b981;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            position: absolute;
            top: -5px;
            right: -5px;
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }
        
        .chart-container {
            height: 200px;
            position: relative;
        }
        
        .chart-line {
            position: absolute;
            height: 3px;
            background-color: #f0f2f5;
            width: 100%;
        }
        
        .chart-line-1 { top: 20%; }
        .chart-line-2 { top: 40%; }
        .chart-line-3 { top: 60%; }
        .chart-line-4 { top: 80%; }
        
        .chart-data-blue {
            position: absolute;
            height: 3px;
            background-color: #3b82f6;
            width: 100%;
            top: 50%;
            clip-path: polygon(
                0% 30%, 5% 40%, 10% 50%, 15% 60%, 20% 40%, 
                25% 20%, 30% 10%, 35% 20%, 40% 30%, 45% 10%, 
                50% 30%, 55% 40%, 60% 30%, 65% 10%, 70% 20%, 
                75% 30%, 80% 50%, 85% 60%, 90% 40%, 95% 30%, 100% 40%
            );
            transform: scaleY(20);
            transform-origin: center;
        }
        
        .chart-data-purple {
            position: absolute;
            height: 3px;
            background-color: #8b5cf6;
            width: 100%;
            top: 70%;
            clip-path: polygon(
                0% 50%, 5% 60%, 10% 70%, 15% 60%, 20% 50%, 
                25% 60%, 30% 70%, 35% 60%, 40% 50%, 45% 60%, 
                50% 70%, 55% 60%, 60% 50%, 65% 40%, 70% 50%, 
                75% 60%, 80% 50%, 85% 60%, 90% 70%, 95% 60%, 100% 50%
            );
            transform: scaleY(20);
            transform-origin: center;
        }
        
        .chart-days {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            color: #777;
            font-size: 0.85rem;
        }
        
        .project-card {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.05);
            position: relative;
        }
        
        .project-tag {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            margin-right: 5px;
        }
        
        .tag-feedback {
            background-color: #e6f7ff;
            color: #0ea5e9;
        }
        
        .tag-bug {
            background-color: #f2e5ff;
            color: #8b5cf6;
        }
        
        .tag-design {
            background-color: #f3e8ff;
            color: #a855f7;
        }
        
        .project-members {
            display: flex;
            margin-top: 15px;
        }
        
        .project-member {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            border: 2px solid white;
            margin-right: -10px;
            overflow: hidden;
        }
        
        .project-stats {
            display: flex;
            align-items: center;
            margin-top: 10px;
            font-size: 0.8rem;
            color: #777;
        }
        
        .project-stats div {
            margin-right: 15px;
            display: flex;
            align-items: center;
        }
        
        .project-stats i {
            margin-right: 5px;
        }
        
        .productivity-filters {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .filter-item {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }
        
        .filter-color {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }
        
        .filter-research {
            background-color: #3b82f6;
        }
        
        .filter-design {
            background-color: #8b5cf6;
        }
        
        .productivity-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: #777;
            margin-bottom: 5px;
        }
        
        .chart-tooltip {
            position: absolute;
            top: 25%;
            left: 50%;
            background-color: #0f172a;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            transform: translateX(-50%);
        }
        
        .card-header {
            background-color: transparent;
            border-bottom: none;
            padding: 20px 20px 0;
        }
        
        .carousel-indicators {
            position: absolute;
            right: 0;
            bottom: -10px;
            left: auto;
            z-index: 2;
            display: flex;
            justify-content: center;
            margin-right: 20px;
            margin-left: 0;
            list-style: none;
        }
        
        .carousel-indicators [data-bs-target] {
            box-sizing: content-box;
            flex: 0 1 auto;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #d1d5db;
            background-clip: padding-box;
            border: 0;
            opacity: .5;
            transition: opacity .6s ease;
        }
        
        .carousel-indicators .active {
            opacity: 1;
            background-color: #6366f1;
        }
        
        .carousel-control-next {
            right: -10px;
            width: 30px;
            height: 30px;
            background-color: white;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        
        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23333'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <div class="bg-dark rounded p-1">
                <i class="fas fa-cube text-white"></i>
            </div>
            <span class="fw-bold ms-2">BRESS</span>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-folder"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-item active">
                    <i class="fas fa-tasks"></i>
                    <span>Task list</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-cog"></i>
                    <span>Services</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-item position-relative">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                    <div class="notification-badge">2</div>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-item">
                    <i class="fas fa-comment"></i>
                    <span>Chat</span>
                </a>
            </li>
        </ul>
        
        <div class="user-profile">
            <div class="user-avatar">
                <img src="/api/placeholder/40/40" alt="Emily Jonson">
            </div>
            <div>
                <div class="fw-bold">Emily Jonson</div>
                <div class="text-muted small">jonson@bress.com</div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="content-area">
        <div class="top-bar">
            <div class="search-box">
                <input type="text" placeholder="Search">
                <i class="fas fa-search text-muted"></i>
            </div>
            
            <div class="d-flex align-items-center">
                <span class="text-muted me-3">Monday, 6th March</span>
                <div class="dropdown">
                    <button class="btn btn-dark rounded-circle" style="width: 36px; height: 36px;">
                        <i class="fas fa-user"></i>
                    </button>
                </div>
                <span class="ms-3">Grid</span>
                <span class="ms-3">List</span>
            </div>
        </div>
        
        <!-- Tasks Card -->
        <div class="card">
            <div class="task-list-header">
                <div>
                    <h4 class="mb-1">Last tasks</h4>
                    <p class="text-muted mb-0">117 total, expect to resolve them</p>
                </div>
                
                <div class="task-count">
                    <div class="task-count-item">
                        <div class="task-count-number">94</div>
                        <div class="task-count-label">Done</div>
                    </div>
                    <div class="task-count-item">
                        <div class="task-count-number">23</div>
                        <div class="task-count-label">In progress</div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Admin</th>
                            <th>Members</th>
                            <th>Status</th>
                            <th>Run time</th>
                            <th>Finish date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ClientOnboarding - Circle</td>
                            <td>
                                <div class="avatar-small">
                                    <img src="/api/placeholder/30/30" alt="Samanta J.">
                                </div>
                            </td>
                            <td>3</td>
                            <td>
                                <div class="task-status">
                                    <div class="status-indicator status-progress"></div>
                                    <span>In progress</span>
                                </div>
                            </td>
                            <td>6 hours</td>
                            <td>6 Mon</td>
                        </tr>
                        <tr>
                            <td>Meeting with Webflow & Notion</td>
                            <td>
                                <div class="avatar-small">
                                    <img src="/api/placeholder/30/30" alt="Bob P.">
                                </div>
                            </td>
                            <td>4</td>
                            <td>
                                <div class="task-status">
                                    <div class="status-indicator status-done"></div>
                                    <span>Done</span>
                                </div>
                            </td>
                            <td>2 hours</td>
                            <td>7 Tue</td>
                        </tr>
                        <tr>
                            <td>First Handoff with Engineers</td>
                            <td>
                                <div class="avatar-small">
                                    <img src="/api/placeholder/30/30" alt="Kate O.">
                                </div>
                            </td>
                            <td>10</td>
                            <td>
                                <div class="task-status">
                                    <div class="status-indicator status-progress"></div>
                                    <span>In progress</span>
                                </div>
                            </td>
                            <td>3 days</td>
                            <td>10 Fri</td>
                        </tr>
                        <tr>
                            <td>Client Drafting (3) with Lawrence</td>
                            <td>
                                <div class="avatar-small">
                                    <img src="/api/placeholder/30/30" alt="Jack F.">
                                </div>
                            </td>
                            <td>7</td>
                            <td>
                                <div class="task-status">
                                    <div class="status-indicator status-progress"></div>
                                    <span>In progress</span>
                                </div>
                            </td>
                            <td>1 week</td>
                            <td>19 Sun</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Bottom Cards Grid -->
        <div class="grid-container">
            <!-- Productivity Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Productivity</h5>
                        <span class="text-muted">01-07 May</span>
                    </div>
                    
                    <div class="productivity-filters">
                        <div class="filter-item">
                            <div class="filter-color filter-research"></div>
                            <span>Research</span>
                        </div>
                        <div class="filter-item">
                            <div class="filter-color filter-design"></div>
                            <span>Design</span>
                        </div>
                    </div>
                    
                    <div class="productivity-info">
                        <div>Data updates every 3 hours</div>
                    </div>
                    
                    <div class="chart-container">
                        <div class="chart-tooltip">
                            10 hrs
                        </div>
                        <div class="chart-line chart-line-1"></div>
                        <div class="chart-line chart-line-2"></div>
                        <div class="chart-line chart-line-3"></div>
                        <div class="chart-line chart-line-4"></div>
                        <div class="chart-data-blue"></div>
                        <div class="chart-data-purple"></div>
                    </div>
                    
                    <div class="chart-days">
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                        <div>Sun</div>
                    </div>
                </div>
            </div>
            
            <!-- Projects in Progress Card -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Projects in progress:</h5>
                </div>
                <div class="card-body position-relative">
                    <div id="projectsCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="project-card">
                                    <div class="mb-2">
                                        <span class="project-tag tag-feedback">Feedback</span>
                                        <span class="project-tag tag-bug">Bug</span>
                                        <span class="project-tag tag-design">Design System</span>
                                    </div>
                                    <h6>Improve cards readability</h6>
                                    <div class="text-muted small">15.03.22</div>
                                    
                                    <div class="project-members">
                                        <div class="project-member">
                                            <img src="/api/placeholder/25/25" alt="Member 1">
                                        </div>
                                        <div class="project-member">
                                            <img src="/api/placeholder/25/25" alt="Member 2">
                                        </div>
                                        <div class="project-member">
                                            <img src="/api/placeholder/25/25" alt="Member 3">
                                        </div>
                                    </div>
                                    
                                    <div class="project-stats">
                                        <div>
                                            <i class="far fa-comment"></i>
                                            12 comments
                                        </div>
                                        <div>
                                            <i class="far fa-clock"></i>
                                            8 files
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#projectsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#projectsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#projectsCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>