<?php
session_start();
require_once "../config/database.php";

// Only admin can add property
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Unauthorized access";
    exit();
}

if (isset($_POST['add_property'])) {

    $title = $_POST['title'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $query = "INSERT INTO properties (title, location, type, price, status)
              VALUES ('$title', '$location', '$type', '$price', '$status')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../views/view_properties.php");
        exit();
    } else {
        echo "Error adding property";
    }
}
