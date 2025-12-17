<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once __DIR__ . "/../config/database.php";

// ================= REGISTER =================
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = "client";

    $query = "INSERT INTO users (name, email, password, role)
              VALUES ('$name', '$email', '$password', '$role')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../views/login.php");
        exit();
    } else {
        echo "Registration error: " . mysqli_error($conn);
    }
}

// ================= LOGIN =================
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../views/dashboard.php");
            exit();

        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}

// ================= LOGOUT =================
if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    header("Location: ../views/login.php");
    exit();
}
