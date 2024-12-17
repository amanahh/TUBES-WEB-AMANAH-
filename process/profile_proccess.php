<?php
session_start();
require_once '../db/connection.php';

if (isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $password = $_POST['password'];

    // Jika password tidak diubah, gunakan yang lama
    if (!empty($password)) {
        $password_hashed = md5($password);
        mysqli_query($conn, "UPDATE users SET password = '$password_hashed' WHERE username = '$username'");
    }

    header("Location: ../dashboard/user.php");
    exit();
}
?>
