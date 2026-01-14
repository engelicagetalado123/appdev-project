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
                        <div class="main-logo">
                            <i class="fas fa-shield-halved"></i>
                            <h1>
                                BARANGAY <br />
                                INFORMATION SYSTEM
                            </h1>
                        </div>
                        <button class="btn-login" onclick="openLoginModal()">Login/Register</button>
                    </div>
                </div>

                <nav class="menu-list-container">
                    <ul class="menu-links">
                        <li onclick="window.location.href='index.php'"> <i class="fas fa-bullhorn"></i> Announcements & Events </li>
                        <li onclick="window.location.href='officials.html'"> <i class="fas fa-users"></i> Officials Directory </li>
                        <li onclick="window.location.href='settings.html'"> <i class="fas fa-cog"></i> Settings </li>
                    </ul>
                </nav>
            </aside>

            <div class="logo">
                <i class="fas fa-shield-halved"></i>
                <img src="" />
                <div class="logo-text">
                    <strong>BARANGAY INFORMATION</strong>
                    <span>SYSTEM</span>
                </div>
            </div>
            <div class="menu-icon" onclick="openMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

        <section class="hero text-center py-4 py-md-5">
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
                <img src="https://via.placeholder.com/400x200" alt="Event" />
                <div class="card-overlay">
                    <strong>BUSLAK:</strong> BUlig eSkweLA sa Kabataan
                    <small>Sangguniang Kabataan Event</small>
                </div>
            </div>
            <button class="nav-btn next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <section class="announcements">
            <div class="section-header">
                <h2>Latest Announcements</h2>
                <a href="#" class="view-all">View All</a>
            </div>
            <div class="grid row g-3">
                <div class="announce-card col-12 col-md-6 col-lg-3">
                    <i class="fas fa-house-chimney"></i>
                    <div>
                        <h3>Barangay General Cleaning</h3>
                        <span>November 10, 2025</span>
                    </div>
                </div>
                <div class="announce-card col-12 col-md-6 col-lg-3">
                    <i class="fas fa-syringe"></i>
                    <div>
                        <h3>Barangay Health Immunization</h3>
                        <span>November 10, 2025</span>
                    </div>
                </div>
                <div class="announce-card col-12 col-md-6 col-lg-3">
                    <i class="fas fa-dog"></i>
                    <div>
                        <h3>Libreng Kapon at Bakuna para Alaga</h3>
                        <span>November 10, 2025</span>
                    </div>
                </div>
                <div class="announce-card col-12 col-md-6 col-lg-3">
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
                <a href="officials.html"
                   style="font-size: 10px; color: #999; text-decoration: none">View All</a>
            </div>
            <div class="official-card d-flex align-items-center gap-3">
                <div class="official-info">
                    <h3>Victorino M. Alojipan Jr.</h3>
                    <p>Barangay Captain</p>
                </div>
                <img src="" />
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
    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <button type="button" class="btn-close ms-auto" aria-label="Close" onclick="closeLoginModal()"></button>
                <h2 class="mb-3">Login</h2>
                <form action="login.php" method="POST">
                    <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="mt-3 text-center">Not registered? <a href="register.php">Register as Migrant</a></p>
            </div>
        </div>
    </div>
    


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/menu.js"></script>
</body>
</html>
