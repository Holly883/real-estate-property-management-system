<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">

<h2>Login</h2>

<form method="POST" action="../controllers/AuthController.php">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>
</div>

<p>
    No account?
    <a href="register.php">Register here</a>
</p>

</body>
</html>
