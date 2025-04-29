<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

// Include database connection
include '../db_connection.php';

// Fetch all feedback details
$sql = "SELECT * FROM feedback ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/general.css">
  <link rel="stylesheet" href="../assets/css/main-staff.css">
  <link rel="stylesheet" href="../assets/css/feedback-details.css">
  <link rel="stylesheet" href="../assets/css/table.css">
  <title>Feedback Details</title>
</head>
<body class="main-staff-body">
    <div class="header">
        <div class="left-side-header">
            <img src="../assets/images/logo.png" alt="BES Logo" class="bes-logo">
            <p class="header-title">BES: Data Management System</p>
        </div>
    </div>

    <div class="content-display">
        <div class="feedback-details-container">
            <h1>Citizen Charter Questions</h1>
            <table class="styled-table" id="feedbackTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Citizen Charter Awareness</th>
                        <th>CC1</th>
                        <th>CC2</th>
                        <th>CC3</th>
                        <th>SQD1</th>
                        <th>SQD2</th>
                        <th>SQD3</th>
                        <th>SQD4</th>
                        <th>SQD5</th>
                        <th>SQD6</th>
                        <th>SQD7</th>
                        <th>SQD8</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="clickable-row" onclick="window.location.href='feedback_report.php?id=<?php echo $row['id']; ?>'">
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['citizen_charter_awareness']); ?></td>
                                <td><?php echo htmlspecialchars($row['cc1']); ?></td>
                                <td><?php echo htmlspecialchars($row['cc2']); ?></td>
                                <td><?php echo htmlspecialchars($row['cc3']); ?></td>
                                <td><?php echo htmlspecialchars($row['sqd1']); ?></td>
                                <td><?php echo htmlspecialchars($row['sqd2']); ?></td>
                                <td><?php echo htmlspecialchars($row['sqd3']); ?></td>
                                <td><?php echo htmlspecialchars($row['sqd4']); ?></td>
                                <td><?php echo htmlspecialchars($row['sqd5']); ?></td>
                                <td><?php echo htmlspecialchars($row['sqd6']); ?></td>
                                <td><?php echo htmlspecialchars($row['sqd7']); ?></td>
                                <td><?php echo htmlspecialchars($row['sqd8']); ?></td>
                                <td><?php echo htmlspecialchars($row['remarks']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="15">No feedback found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
