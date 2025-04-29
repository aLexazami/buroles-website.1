<?php
// Database connection
include '../db_connection.php'; // Includes the database connection file to establish a connection with the database.

header('Content-Type: application/json'); // Sets the response content type to JSON.

try {
    // Check if the database connection is established
    if (!$conn) {
        throw new Exception("Database connection failed.");
    }

    $query = "SELECT COUNT(*) AS weeklyCount
              FROM feedback
              WHERE DATE(submitted_at) BETWEEN DATE(CURRENT_DATE - INTERVAL (DAYOFWEEK(CURRENT_DATE) + 5) % 7 DAY) 
              AND DATE(CURRENT_DATE + INTERVAL (7 - (DAYOFWEEK(CURRENT_DATE) + 5) % 7) DAY)";

    $stmt = $conn->prepare($query); // Prepares the SQL query for execution.
    $stmt->execute(); // Executes the prepared query.
    $result = $stmt->get_result(); // Retrieves the result set from the executed query.
    $data = $result->fetch_assoc(); // Fetches the result as an associative array.
    
    // Encodes the weekly count as a JSON response and sends it to the client.
    echo json_encode(['weeklyCount' => $data['weeklyCount']]);

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    // If an error occurs, encodes the error message as a JSON response and sends it to the client.
    echo json_encode(['error' => $e->getMessage()]);
}
?>
