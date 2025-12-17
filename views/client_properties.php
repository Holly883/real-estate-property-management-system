<?php
session_start();
include "../config/database.php";

// Only clients allowed
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'client') {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM properties WHERE status = 'Available'";
$result = mysqli_query($conn, $query);
?>

<h2>Available Properties</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['location']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td>
            <form method="POST" action="../controllers/PaymentController.php">
                <input type="hidden" name="property_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
                <button type="submit" name="pay">Pay</button>
            </form>
        </td>
    </tr>
<?php } ?>
</table>
