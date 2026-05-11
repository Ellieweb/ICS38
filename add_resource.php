<?php
session_start();
include('db.php');
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_SESSION['user_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $cat = mysqli_real_escape_string($conn, $_POST['category']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    
    $sql = "INSERT INTO resources (user_id, title, category, description, status) 
            VALUES ('$uid', '$title', '$cat', '$desc', 'Available')";
    
    if ($conn->query($sql)) { header("Location: dashboard.php"); exit(); }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="MyCSS/style.css"><title>Post Resource</title></head>
<body>
    <div class="container">
        <h2>Post a New Resource</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Resource Title (e.g. Calculus Textbook)" required>
            <select name="category">
                <option value="Textbooks">Textbooks</option>
                <option value="Computer Parts">Computer Parts</option>
                <option value="Notes">Notes</option>
                <option value="Coloring Materials">Coloring Materials</option>
            </select>
            <textarea name="description" placeholder="Short description..." rows="4"></textarea>
            <button type="submit">List Item</button>
            <a href="dashboard.php" style="margin-left: 15px; color: gray; text-decoration: none;">Cancel</a>
        </form>
    </div>
</body>
</html>