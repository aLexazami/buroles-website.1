<?php
// Include the database connection file to establish a connection to the database
include '../db_connection.php'; // Adjusted path to ensure correct inclusion

// Set the response content type to JSON
header('Content-Type: application/json');

try {
    // Prepare an SQL query to count the number of feedback entries submitted today
    $query = "SELECT COUNT(*) AS dailyCount
              FROM feedback
              WHERE DATE(submitted_at) = DATE(CURRENT_TIMESTAMP)";
    // Prepare the SQL statement for execution
    $stmt = $conn->prepare($query);
    // Execute the prepared statement
    $stmt->execute();
    // Bind the result to a variable
    $stmt->bind_result($dailyCount);
    // Fetch the result
    $stmt->fetch();
    // Encode the daily count as a JSON response and send it to the client
    echo json_encode(['dailyCount' => $dailyCount]);
    // Close the statement
    $stmt->close();
} catch (Exception $e) {
    // If an error occurs, encode the error message as a JSON response and send it to the client
    echo json_encode(['error' => $e->getMessage()]);
}
?>
