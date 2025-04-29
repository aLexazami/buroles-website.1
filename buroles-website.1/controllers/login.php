<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start a new session or resume the existing session
session_start();

// Include the database connection file
require_once '../db_connection.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
    $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';

    // Check if username and password are not empty
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = 'Username and password are required.';
        header("Location: ../index.php");
        exit();
    }

    try {
        // Prepare an SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM staffs_table WHERE username = ?");
        // Bind the username parameter to the prepared statement
        $stmt->bind_param("s", $username);
        // Execute the prepared statement
        $stmt->execute();
        // Get the result of the executed statement
        $result = $stmt->get_result();

        // Check if exactly one user was found with the provided username
        if ($result->num_rows === 1) {
            // Fetch the user's data as an associative array
            $user = $result->fetch_assoc();
            // Verify the provided password against the hashed password in the database
            if (password_verify($password, $user['password'])) {
                // Store the username and user details in the session
                $_SESSION['username'] = $username;
                $_SESSION['firstName'] = $user['firstName']; // Store the user's first name
                $_SESSION['lastName'] = $user['lastName'];   // Store the user's last name
                // Redirect the user to the main staff page
                header("Location: ../views/main_staff.php");
                exit();
            } else {
                // If the password is incorrect, set an error message in the session
                $_SESSION['error_message'] = 'Invalid username or password. Please try again.';
                header("Location: index.php");
                exit();
            }
        } else {
            // If no user or multiple users are found, set an error message in the session
            $_SESSION['error_message'] = 'Invalid username or password. Please try again.';
            header("Location: index.php");
            exit();
        }
    } catch (Exception $e) {
        // Log the error and set a generic error message
        error_log($e->getMessage());
        $_SESSION['error_message'] = 'An error occurred. Please try again later.';
        header("Location: index.php");
        exit();
    } finally {
        // Close the prepared statement and database connection
        if (isset($stmt)) {
            $stmt->close();
        }
        if (isset($conn)) {
            $conn->close();
        }
    }
}
?>
