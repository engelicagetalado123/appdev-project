<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barangay Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1B4v5l9O+...etc"
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/home.css" />
    <link rel="stylesheet" href="assets/css/global.css" />
</head>
<body>
    <div class="mobile-container container-fluid container-md">
        <header>
            <div class="overlay" id="overlay" onclick="closeMenu()"></div>

            <aside class="drawer" id="drawer">
                <div class="drawer-header">
                    <button class="close-btn" onclick="closeMenu()" aria-label="Close menu"> <i class="fas fa-times"></i> </button>
                    <div class="menu-hero">
                        <img src="./icons/logo1.png" alt="Barangay Logo" class="app-logo" />
                        <div class="main-logo">
                            <span>BARANGAY</span><br />
                            <strong>INFORMATION SYSTEM</strong>
                        </div>
                        <a href="logout.php" class="btn btn-danger">Logout</a><br>
                        <strong>ADMIN</strong>
                    </div>
                </div>

                <nav class="menu-list-container">
                    <ul class="menu-links">
                        <li onclick="window.location.href='admin_dashboard.php'"> <i class="fas fa-bullhorn"></i> Announcements & Events </li>
                        <li onclick="window.location.href='officials.html'"> <i class="fas fa-users"></i> Officials Directory </li>
                        <li><i class="fas fa-comments"></i> Residence Feedback</li> 
                        <li onclick="window.location.href='barangay_dashboard.php'"> <i class="fas fa-university"></i> Barangay Dashboard </li>
                        <li onclick="window.location.href='settings.html'"> <i class="fas fa-cog"></i> Settings </li> 
                    </ul>
                </nav>
            </aside>

            <div class="logo-container">
                <img src="./icons/logo1.png" alt="Barangay Logo" class="app-logo" />
                <div class="logo-text">
                    <span>BARANGAY</span><br />
                    <strong>INFORMATION SYSTEM</strong>
                </div>
            </div>
            
 <!-- Notification Wrapper -->
<div class="notif-wrapper">
  <div class="notification-icon" onclick="openNotifications()">
    <i class="fas fa-bell"></i>
    <span id="notif-count" class="notif-count">0</span>
  </div>

  <!-- Dropdown container -->
  <div id="notif-dropdown" class="notif-dropdown" style="display:none;">
    <!-- notifications will be loaded here -->
  </div>
</div>




            <div class="menu-icon" onclick="openMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

        <section class="hero">
            <h1>Connect With Your Community In One Click</h1>
            <p>Seamless Communication, United Community</p>
        </section>

        <div class="view-all-container">
            <span></span> <a href="#" class="view-all">View All</a>
        </div>
        <div class="carousel">
            <button class="nav-btn prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="main-card">
                <img src="assets/images/event1.png" alt="Event 1" />
                <div class="card-overlay">
                    <strong>Barangay Assembly</strong> 
                    <small>Barangay residence & officials assembly</small>
                </div>
            </div>
                <div class="main-card">
                    <img src="assets/images/event2.png" alt="Event 2" />
                    <div class="card-overlay">
                        <strong>BUSLAK:</strong> BUlig eSkweLA sa Kabataan
                        <small>Sangguniang Kabataan Event</small>
                    </div>
                </div>

                <div class="main-card">
                    <img src="assets/images/event3.png" alt="Event 3" />
                    <div class="card-overlay">
                        <strong>KK Assembly:</strong> Katipunan ng Kabataan
                        <small>Katipunan ng Kabataan Children's Right Talk</small>
                    </div>
                </div>
            <button class="nav-btn next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <section class="announcements">
            <div class="section-header">
                <h2>Latest Announcements</h2>
                <a href="announcement.html"
                   style="font-size: 10px; color: #999; text-decoration: none">View All</a>
            </div>
            <div class="grid">
                <div class="announce-card">
                    <i class="fas fa-house-chimney"></i>
                    <div>
                        <h3>Barangay General Cleaning</h3>
                        <span>November 10, 2025</span>
                    </div>
                </div>
                <div class="announce-card">
                    <i class="fas fa-syringe"></i>
                    <div>
                        <h3>Barangay Health Immunization</h3>
                        <span>November 10, 2025</span>
                    </div>
                </div>
                <div class="announce-card">
                    <i class="fas fa-dog"></i>
                    <div>
                        <h3>Libreng Kapon at Bakuna para Alaga</h3>
                        <span>November 10, 2025</span>
                    </div>
                </div>
                <div class="announce-card">
                    <i class="fas fa-basketball"></i>
                    <div>
                        <h3>Inter-Barangay League</h3>
                        <span>November 10, 2025</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="official">
            <div class="section-header">
                <h2>Official</h2>
                <a href="officials.html" style="font-size: 10px; color: #999; text-decoration: none">View All</a>
            </div>
            <div class="official-card">
                <img class="bg-image" src="assets/images/bg.png" alt="Background" /> 
                <img class="profile-image" src="assets/images/victorino.png" alt="Victorino" /> 
                
                    <div class="official-info">
                        <h3>Victorino M. Alojipan Jr.</h3>
                        <p>Barangay Captain</p>
                    </div>
                </div>
        </section>

        <footer>
            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
            </div>
            <div class="contact">
                <i class="fas fa-phone"></i>
                <div>
                    <strong>+639123456789</strong>
                    <span>Call Us</span>
                </div>
            </div>
        </footer>
    </div>
    </div>
    

    <script defer src="assets/js/notifications.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/menu.js"></script>
</body>
</html>