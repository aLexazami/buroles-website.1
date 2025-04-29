<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
include '../db_connection.php';

// Fetch feedback data from the database
$sql = "SELECT * FROM feedback ORDER BY id DESC"; // Adjust table name and columns as needed
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/general.css">
  <link rel="stylesheet" href="../assets/css/main-staff.css">
  <link rel="stylesheet" href="../assets/css/respondent-display.css">
  <link rel="stylesheet" href="../assets/css/feedback-report.css"> <!-- Updated CSS file reference -->
  <link rel="stylesheet" href="../assets/css/table.css">
  <link rel="stylesheet" href="../assets/css/button.css">
  <title>Feedback Report</title>
  <script src="/scripts/sort-table.js"></script> <!-- Include sorting script -->
</head>
<body class="main-staff-body">
     <!-- Header Section -->
     <?php include '../includes/header.php'; ?>


    <div class="side-navigation-bar">
        <!-- Side Navigation Bar -->
        <?php include '../includes/side_nav_bar.php';?>

        <div class="content-display">
            <div class="feedback-filter-container">
                <div class="feedback-filter-box">
                    <div class="feedback-filter-header">
                        <p>Submitted Feedback</p>
                    </div>
                        <div class="feedback-filter-table">
                            <div class="table-container">
                                <table class="styled-table" id="feedbackTable">
                                    <thead>
                                        <tr>
                                            <th>NO.
                                                    <button onclick="sortTable(0, 'number', 'asc')">▲</button>
                                                    <button onclick="sortTable(0, 'number', 'desc')">▼</button>
                                            </th>
                                            <th>Name
                                                <button onclick="sortTable(1, 'string', 'asc')">▲</button>
                                                <button onclick="sortTable(1, 'string', 'desc')">▼</button>
                                            </th>
                                            <th>Date
                                                <button onclick="sortTable(2, 'date', 'asc')">▲</button>
                                                <button onclick="sortTable(2, 'date', 'desc')">▼</button>
                                            </th>
                                            <th>Age
                                                <button onclick="sortTable(3, 'number', 'asc')">▲</button>
                                                <button onclick="sortTable(3, 'number', 'desc')">▼</button>
                                            </th>
                                            <th>Sex
                                                <button onclick="sortTable(4, 'string', 'asc')">▲</button>
                                                <button onclick="sortTable(4, 'string', 'desc')">▼</button>
                                            </th>
                                            <th>Customer Type
                                                <button onclick="sortTable(5, 'string', 'asc')">▲</button>
                                                <button onclick="sortTable(5, 'string', 'desc')">▼</button>
                                            </th>
                                            <th>Service Availed
                                                <button onclick="sortTable(6, 'string', 'asc')">▲</button>
                                                <button onclick="sortTable(6, 'string', 'desc')">▼</button>
                                            </th>
                                            <th>Region
                                                <button onclick="sortTable(7, 'string', 'asc')">▲</button>
                                                <button onclick="sortTable(7, 'string', 'desc')">▼</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result->num_rows > 0): ?>
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <tr class="clickable-row" data-id="<?php echo $row['id']; ?>">
                                                    <td class="data-no"><?php echo htmlspecialchars($row['id']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['sex']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['customer_type']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['service_availed']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['region']); ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8">No feedback submitted yet.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <?php include '../includes/footer.php' ?>

    <script src="../assets/js/date-time.js"></script>
    <script src="../assets/js/clickable-row.js"></script>
    <script src="../assets/js/sort-table.js"></script>
</body>
</html>
<?php $conn->close(); ?>