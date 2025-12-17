<?php
session_start();
require_once "../config/database.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Properties</title>
</head>
<body>

<h2>Available Properties</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Type</th>
        <th>Price</th>
        <th>Status</th>
    </tr>

<?php
$query = "SELECT * FROM properties";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['title']}</td>";
    echo "<td>{$row['location']}</td>";
    echo "<td>{$row['type']}</td>";
    echo "<td>{$row['price']}</td>";
    echo "<td>{$row['status']}</td>";
    echo "</tr>";
}
?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
