<?php
// Include the database connection file to establish a connection to the database
include '../db_connection.php';

// Set the response content type to JSON
header('Content-Type: application/json');

try {
    // Check if the database connection is established
    if (!$conn) {
        throw new Exception("Database connection failed.");
    }

    // Prepare an SQL query to count the number of feedback entries submitted in the current year
    $query = "SELECT COUNT(*) AS annualCount 
              FROM feedback 
              WHERE YEAR(submitted_at) = YEAR(CURRENT_TIMESTAMP)";
    // Prepare the SQL statement for execution
    $stmt = $conn->prepare($query);
    // Execute the prepared statement
    $stmt->execute();
    // Get the result set from the executed statement
    $result = $stmt->get_result();
    // Fetch the result as an associative array
    $data = $result->fetch_assoc();
    // Encode the annual count as a JSON response and send it to the client
    echo json_encode(['annualCount' => $data['annualCount']]);

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    // If an error occurs, encode the error message as a JSON response and send it to the client
    echo json_encode(['error' => $e->getMessage()]);
}
?>
