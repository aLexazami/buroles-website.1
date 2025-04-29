<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);error_reporting(E_ALL);

// Include database connection
include '../db_connection.php';

// Start session
session_start();

// Handle form submission for feedback form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? null;
    $date = $_POST['date'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $customerType = $_POST['customer-type'];
    $serviceAvailed = $_POST['service-availed'];
    $region = $_POST['region'];

    // Handle form submission for Citizen Charter data
    $citizenCharterAwareness = $_POST['yes_no'] ?? null;
    $cc1 = $_POST['cc-1'] ?? null;
    $cc2 = $_POST['cc-2'] ?? null;
    $cc3 = $_POST['cc-3'] ?? null;

    // Handle form submission for Client Satisfaction data
    $sqd1 = $_POST['SQD1'] ?? null;
    $sqd2 = $_POST['SQD2'] ?? null;
    $sqd3 = $_POST['SQD3'] ?? null;
    $sqd4 = $_POST['SQD4'] ?? null;
    $sqd5 = $_POST['SQD5'] ?? null;
    $sqd6 = $_POST['SQD6'] ?? null;
    $sqd7 = $_POST['SQD7'] ?? null;
    $sqd8 = $_POST['SQD8'] ?? null;
    $remarks = $_POST['remarks'] ?? null;

    /*Upon creating this SQL this also  serves as to ensures that the data is safely inserted into the database while protecting against SQL injection attacks*/
    // Prepare and bind parameters to prevent SQL injection for feedback table
    $stmt = $conn->prepare("INSERT INTO feedback (name, date, age, sex, customer_type, service_availed, region, citizen_charter_awareness, cc1, cc2, cc3, sqd1, sqd2, sqd3, sqd4, sqd5, sqd6, sqd7, sqd8, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssssssssssssssss",
        $name,
        $date,
        $age,
        $sex,
        $customerType,
        $serviceAvailed,
        $region,
        $citizenCharterAwareness,
        $cc1,
        $cc2,
        $cc3,
        $sqd1,
        $sqd2,
        $sqd3,
        $sqd4,
        $sqd5,
        $sqd6,
        $sqd7,
        $sqd8,
        $remarks
    );

    // Execute the statement for feedback table
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        header("Location: ../controllers/thank-you.php");
        exit();
    } else {
        echo "<script>alert('Error submitting feedback.');</script>";
    }

    // Close the statement
    $stmt->close();

}

// Close the database connection
$conn->close();
?>
