<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);error_reporting(E_ALL);

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/general.css">
    <link rel="stylesheet" href="../assets/css/main-staff.css">
    <link rel="stylesheet" href="../assets/css/respondent-display.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Dashboard</title>

</head>
<body class="main-staff-body">
    
    <!-- Header Section -->
    <?php include '../includes/header.php'; ?>

    <div class="side-navigation-bar">
        <!-- Side Navigation Bar -->
        <?php include '../includes/side_nav_bar.php';?>

        <div class="content-display">
                <div class="respondents-container">
                    <div class="header-respondents">
                        <p>Respondents</p>
                    </div>
                    <div class="respondents-box">
                        <div class="new-respondents">
                            <span class="new-text">
                                <p>New</p>
                            </span>
                            <span class="new-cricle">
                                <span class="new-counts-respondents" data-refresh="true">0</span>
                                <img src="../assets/images/icons/respondents.png" class="respondents-icon">
                            </span>
                        </div>
                        <div class="weekly-respondents">
                            <span class="weekly-text">
                                <p>Weekly</p>
                            </span>
                            <span class="weekly-cricle">
                                <span class="weekly-counts-respondents" data-refresh="true">0</span>
                                <img src="../assets/images/icons/respondents.png" class="respondents-icon">
                            </span>
                        </div>
                        <div class="total-respondents">
                            <span class="total-text">
                                <p>Total</p>
                            </span>
                            <span class="total-cricle">
                                <span class="total-counts-respondents" data-refresh="true">0</span>
                                <img src="../assets/images/icons/respondents.png" class="respondents-icon">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </div>



 

    <!-- Footer Section -->
    <?php include '../includes/footer.php'; ?>

    <script src="../assets/js/date-time.js"></script>
    <script src="../assets/js/daily-update.js"></script>
    <script src="../assets/js/weekly-update.js"></script>
    <script src="../assets/js/annual-update.js"></script>
</body>
</html>
