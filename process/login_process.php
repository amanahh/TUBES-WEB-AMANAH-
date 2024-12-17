<?php
session_start();
require_once '../db/connection.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    header("Location: ../dashboard/{$user['role']}.php");
} else {
    echo "Username atau Password salah!";
    echo "<a href='../login.php'>Kembali</a>";
}
?>
