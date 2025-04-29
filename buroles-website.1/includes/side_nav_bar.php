<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);error_reporting(E_ALL);
?>
<head>
  <!-- Link the CSS file -->
  <link rel="stylesheet" href="../assets/css/side-nav-bar.css">
</head>
<!-- Side Navigation Bar -->
        <div class="side-navigation-group">
            <div class="profile">
                <img src="../assets/images/icons/profile_main.png" class="profile-icon">
                <h1 class="profile-name">
                    <?php echo htmlspecialchars($_SESSION['firstName'] . ' ' . $_SESSION['lastName']); ?>
                </h1>
            </div>
            <div class="dashboard-nav">
            <a href="../views/main_staff.php" class="dashboard-link <?php echo basename($_SERVER['PHP_SELF']) == 'main_staff.php' ? 'active' : ''; ?>">
                    <img src="../assets/images/icons/home.png" class="home-icons">
                    <span class="dashboard-text">Dashboard</span>
                </a>
            </div>
            <div class="feedback-nav">
                <a href="../views/feedback_report.php" class="feedback-link <?php echo basename($_SERVER['PHP_SELF']) == 'feedback_report.php' ? 'active' : ''; ?>">
                    <img src="../assets/images/icons/feedback.png" class="feedback-icons">
                    <span class="feedback-text">Feedback Reports</span>
                </a>
            </div>
            <div class="logout-nav">
                <a href="../controllers/logout.php" class="logout-link">
                    <img src="../assets/images/icons/logout.png" class="logout-icons">
                    <span class="logout-text">Logout</span>
                </a>
            </div>
        </div>