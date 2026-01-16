<?php
session_start();
include 'db.php'; // adjust path as needed

// Fetch logged-in user info
$user_id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($query);

// Auto-generate date
$application_date = date("Y-m-d");
?>

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
    <link rel="stylesheet" href="assets/css/cert-request-modal.css" />
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
                        <strong>MIGRANT</strong>
                    </div>
                </div>

                <nav class="menu-list-container">
                    <ul class="menu-links">
                        <li onclick="window.location.href='index.html'"> <i class="fas fa-bullhorn"></i> Announcements & Events </li>
                        <li onclick="window.location.href='officials.html'"> <i class="fas fa-users"></i> Officials Directory </li>
                        <li onclick="closeMenu(); openCertRequestModal()"><i class="fas fa-file-contract"></i> Request Certificate</li> 
                        <li><i class="fas fa-comments"></i> Residence Feedback</li> 
                        <li><i class="fas fa-handshake"></i> Meeting Request</li> 
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
    <!-- Certificate Request Modal -->
<div id="certRequestModal" class="cert-modal">
  <div class="cert-modal-content">
    <span class="close">&times;</span>
    <h2>Request Certificate</h2>
    <form action="cert-request.php" method="POST">
      <!-- Autofilled Migrant Info -->
      <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
      
      <label>First Name</label>
      <input type="text" name="first_name" value="<?= $user['first_name'] ?>" required>

      <label>Middle Name</label>
      <input type="text" name="middle_name" value="<?= $user['middle_name'] ?>" required>

      <label>Last Name</label>
      <input type="text" name="last_name" value="<?= $user['last_name'] ?>" required>


      <label>Address</label>
      <input type="text" name="address" value="<?= $user['address'] ?>" required>

      <label>Application Date</label>
      <input type="text" name="application_date" value="<?= $application_date ?>" readonly>

      <label>Type of Certificate</label>
      <select name="cert_type" required>
        <option value="">-- Select Certificate --</option>
        <option value="Barangay Clearance">Barangay Clearance</option>
        <option value="Certificate of Residency">Certificate of Residency</option>
        <option value="Certificate of Indigency">Certificate of Indigency</option>
        <option value="Other">Other</option>
      </select>

      <label>Purpose</label>
      <textarea name="purpose" rows="3" placeholder="State your purpose..." required></textarea>

      <button type="submit" name="submit">Submit Request</button>
    </form>
  </div>
</div>

<script>
    function openCertRequestModal() {
    document.getElementById("certRequestModal").style.display = "block";
}
function closeCertRequestModal() {
    document.getElementById("certRequestModal").style.display = "none";
}

// Close when clicking the "×" button
document.querySelector("#certRequestModal .close").onclick = closeCertRequestModal;

// Optional: Close when clicking outside the modal
window.onclick = function (event) {
    const modal = document.getElementById("certRequestModal");
    if (event.target === modal) {
        closeCertRequestModal();
    }
};
  </script>
    <script defer src="assets/js/notifications.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/menu.js"></script>
</body>
</html>