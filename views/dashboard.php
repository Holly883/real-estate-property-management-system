<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
<a href="client_properties.php">View Properties & Pay</a>

</head>
<body>

<div class="container">
<h2>Welcome, <?php echo $_SESSION['user_name']; ?></h2>

<p>Role: <?php echo $_SESSION['role']; ?></p>

<p>Login successful. Dashboard is working.</p>
 
  <!-- Admin-only link -->
    <?php if ($_SESSION['role'] === 'admin'): ?>
        <a href="add_property.php">Add Property</a><br>
        <a href="admin/view_payments.php">View Payments</a><br>

    <?php endif; ?>

    <!-- Visible to all users -->
    <a href="view_properties.php">View Properties</a>
    <br><br>

<a href="logout.php">Logout</a>
</div>
</body>
</html>
