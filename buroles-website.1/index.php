<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/general.css">
  <link rel="stylesheet" href="assets/css/login-form.css">
  <link rel="stylesheet" href="assets/css/side-options.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <title>BES Feedbacking Platform</title>
</head>
<body class="login-form-body ">

  <!-- Login Section -->
  <div class="login-form-container">
    <div class="login-form">
      <form action="controllers/login.php" method="POST" class="login-form">
          <div class="login-header">
            <img class="bes-logo" src="assets/images/logo.png" alt="BES Logo">
            <h1>BES: Data Management System</h1>
          </div>
          <div class="error-message">
            <?php
            session_start();
            if (isset($_SESSION['error_message'])) {
                echo '<div class="error-alert">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            }
            ?>
          </div>
          <label>SIGN-IN</label>
            <div class="username-container">
              <img class="user-icon" src="assets/images/icons/user.png">
              <input type="text" id="username" name="username" required placeholder="Username">
            </div>
            <br>
            <div class="password-container">
              <img class="pass-icon" src="assets/images/icons/padlock.png">
              <input type="password" id="password" name="password" required placeholder="Password">
            </div>
            <br>
          <button type="submit" value="login" name="login">Login</button>
      </form>
      <div class="reset-password-container">
        <a href="reset.php">Forget password/Reset Password</a>
      </div>
    </div>
  </div>
  
  <!-- Side Options Section -->
  <div class="side-options-container">
    <div class="side-feedback-options">
      <a href="http://localhost:3000/views/feedback-form.php" target="_blank" class="feedback-link">
        <img src="assets/images/icons/contract.png" class="feedback-icons"> <h1>Feedback Form</h1>
      </a>
    </div>
    <div class="side-faqs-options">
    <a href="http://localhost:3000/views/faqs.php"  target="_blank" class="faqs-link">
        <img src="assets/images/icons/chat.png" class="faqs-icons">
        <h1>FAQs</h1>
    </a>
    </div>
  </div>

  <!-- Footer Section -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>