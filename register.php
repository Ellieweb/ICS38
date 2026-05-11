<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['password']; // In production, use password_hash()
    $role = $_POST['role'];

    $sql = "INSERT INTO users (fullname, email, password, role) VALUES ('$name', '$email', '$pass', '$role')";
    if ($conn->query($sql)) { header("Location: login.php"); }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="MyCSS/style.css"><title>Register Tara</title></head>
<body>
    <div class="container" style="width: 400px;">
        <h2>Create Account</h2>
        <form method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Institutional Email" required>
            <input type="password" name="password" placeholder="Password" required>
            </select>
            <button type="submit">Sign up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>