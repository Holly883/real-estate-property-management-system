<?php
session_start();
include "../config/database.php";

if (isset($_POST['pay'])) {

    $user_id = $_SESSION['user_id'];
    $property_id = $_POST['property_id'];
    $amount = $_POST['amount'];

    $query = "INSERT INTO payments (user_id, property_id, amount, payment_status, created_at)
              VALUES ('$user_id', '$property_id', '$amount', 'Paid', NOW())";

    if (mysqli_query($conn, $query)) {

        // Mark property as sold
        $update = "UPDATE properties SET status = 'Sold' WHERE id = '$property_id'";
        mysqli_query($conn, $update);

        header("Location: ../views/payment_success.php");
        exit();
    } else {
        echo "Payment failed";
    }
}
