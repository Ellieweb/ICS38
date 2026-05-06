<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $uid = $_SESSION['user_id']; // The ID of the logged-in user

    // Only delete if the resource ID belongs to the current user
    $sql = "DELETE FROM resources WHERE resource_id = $id AND user_id = $uid";
    
    if ($conn->query($sql)) {
        header("Location: dashboard.php?msg=success");
    } else {
        header("Location: dashboard.php?msg=error");
    }
}
?>