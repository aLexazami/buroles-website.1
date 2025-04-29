<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../db_connection.php';

    $customer_type = $_POST['customer_type'];
    $service_availed = $_POST['service_availed'];
    $citizen_charter_awareness = $_POST['citizen_charter_awareness'];
    $cc1 = $_POST['cc1'];
    $cc2 = $_POST['cc2'];
    $cc3 = $_POST['cc3'];
    $sqd1 = $_POST['sqd1'];
    $sqd2 = $_POST['sqd2'];
    $sqd3 = $_POST['sqd3'];
    $sqd4 = $_POST['sqd4'];
    $sqd5 = $_POST['sqd5'];
    $sqd6 = $_POST['sqd6'];
    $sqd7 = $_POST['sqd7'];
    $sqd8 = $_POST['sqd8'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO feedback (customer_type, service_availed, citizen_charter_awareness, cc1, cc2, cc3, sqd1, sqd2, sqd3, sqd4, sqd5, sqd6, sqd7, sqd8, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssss", $customer_type, $service_availed, $citizen_charter_awareness, $cc1, $cc2, $cc3, $sqd1, $sqd2, $sqd3, $sqd4, $sqd5, $sqd6, $sqd7, $sqd8, $remarks);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Feedback saved successfully!";
    } else {
        echo "Error saving feedback.";
    }

    $stmt->close();
    $conn->close();
}
?>