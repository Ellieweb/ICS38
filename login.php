<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // In a real app, use password_verify(). For simple school projects:
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['fullname'] = $user['fullname'];
            header("Location: dashboard.php");
        } else { echo "Invalid Password"; }
    } else { echo "User not found"; }
}
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="MyCSS/style.css">
    <title>Login - Resource Hub</title>
</head>
<body>
    <div class="container" style="width: 300px; margin-top: 100px;">
        <h2>Campus Login</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Institutional Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>New here? <a href="register.php">Register</a></p>
    </div>
</body>
</html> -->