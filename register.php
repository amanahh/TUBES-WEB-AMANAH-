<?php
session_start();
require_once 'config.php'; // File koneksi database

// Proses form saat tombol daftar diklik
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role     = 'user'; // Default role untuk akun baru

    // Validasi input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username dan Password harus diisi!";
        header("Location: register.php");
        exit();
    }

    // Cek apakah username sudah ada
    $query_check = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query_check);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $_SESSION['error'] = "Username sudah digunakan. Pilih username lain.";
        header("Location: register.php");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data ke database
    $query_insert = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query_insert);
    mysqli_stmt_bind_param($stmt, 'sss', $username, $hashed_password, $role);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Pendaftaran berhasil! Silakan login.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Pendaftaran gagal. Silakan coba lagi.";
        header("Location: register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <style>
        /* CSS sederhana untuk halaman daftar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f9;
        }

        .register-container {
            background-color: #007bff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            color: white;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .error-message, .success-message {
            color: #ffcccb;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.7);
        }

        button {
            background-color: #0056b3;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #00408f;
        }

        a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Daftar Akun</h2>

    <!-- Tampilkan pesan error atau sukses -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="success-message"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <!-- Form Daftar -->
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Daftar</button>
    </form>

    <a href="login.php">Sudah punya akun? Login di sini</a>
</div>

</body>
</html>
