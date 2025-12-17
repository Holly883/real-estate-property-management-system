<?php
session_start();

// Only admin can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Access denied. Admins only.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Property</title>
</head>
<body>

<h2>Add New Property</h2>

<form method="POST" action="../controllers/PropertyController.php">
    <label>Property Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Location:</label><br>
    <input type="text" name="location" required><br><br>

    <label>Type:</label><br>
    <select name="type">
        <option>House</option>
        <option>Apartment</option>
        <option>Land</option>
    </select><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option>Available</option>
        <option>Sold</option>
    </select><br><br>

    <button type="submit" name="add_property">Add Property</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
