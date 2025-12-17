<?php
session_start();
require_once "../../config/database.php";

// Security check
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied");
}

// Fetch payments with user & property info
$query = "
SELECT 
    payments.id,
    users.name AS client_name,
    properties.title AS property_title,
    payments.amount,
    payments.payment_status,
    payments.created_at
FROM payments
JOIN users ON payments.user_id = users.id
JOIN properties ON payments.property_id = properties.id
ORDER BY payments.created_at DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Payments</title>
</head>
<body>

<h2>All Client Payments</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Property</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['client_name']; ?></td>
            <td><?php echo $row['property_title']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['payment_status']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
    <?php } ?>

</table>

<br>
<a href="../dashboard.php">Back to Dashboard</a>

</body>
</html>
