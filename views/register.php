<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<form method="POST" action="../controllers/AuthControllerHandler.php">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>

    <button type="submit" name="register">Register</button>
</form>

<p>Already have an account? <a href="login.php">Login</a></p>
