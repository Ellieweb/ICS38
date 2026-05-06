<?php
1. Force error reporting (helps identify the cause of the white screen)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include('db.php');

// 2. Check Database Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Security: Check if user is logged in
if (!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit(); 
}

// 4. Validate ID
// if (!isset($_GET['id'])) {
//     header("Location: dashboard.php");
//     exit();
// }

// $id = (int)$_GET['id'];
// $uid = $_SESSION['user_id'];

// /**
//  * AUTHORIZATION CHECK
//  * We fetch the resource ONLY if it belongs to the logged-in user.
//  */
// $check_sql = "SELECT * FROM resources WHERE resource_id = $id AND user_id = $uid";
// $res_query = $conn->query($check_sql);

// if (!$res_query || $res_query->num_rows == 0) {
//     // If resource doesn't exist OR doesn't belong to the user, redirect
//     header("Location: dashboard.php?msg=unauthorized");
//     exit();
// }

// $res = $res_query->fetch_assoc();

// // 5. Handle Form Submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Sanitize inputs
//     $title = mysqli_real_escape_string($conn, $_POST['title']);
//     $status = mysqli_real_escape_string($conn, $_POST['status']);
    
//     // Security: Update only if user_id matches to prevent unauthorized tampering
//     $update_query = "UPDATE resources SET title='$title', status='$status' 
//                      WHERE resource_id=$id AND user_id=$uid";
    
//     if ($conn->query($update_query)) {
//         header("Location: dashboard.php?msg=updated");
//         exit();
//     } else {
//         // If the update fails, show the error instead of a white screen
//         die("Update failed: " . $conn->error);
//     }
// }
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="MyCSS/style.css">
    <title>Edit Resource</title>
</head>
<body>
    <nav>
        <span>Student Resource Hub</span>
        <a href="dashboard.php" style="color:white; float:right;">Back to Dashboard</a>
    </nav>

    <div class="container">
        <h2>Edit Your Resource</h2>
        <form method="POST">
            <label>Resource Title</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($res['title']); ?>" required>
            
            <label>Update Status</label>
            <select name="status">
                <option value="Available" <?php echo ($res['status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                <option value="Exchanged" <?php echo ($res['status'] == 'Exchanged') ? 'selected' : ''; ?>>Exchanged</option>
            </select>
            
            <div style="margin-top: 20px;">
                <button type="submit">Update Item</button>
                <a href="dashboard.php" style="margin-left: 10px; color: gray; text-decoration: none;">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html> -->