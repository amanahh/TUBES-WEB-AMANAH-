<?php
session_start();
require_once '../db/connection.php';

// Cek jika pengguna belum login atau role bukan user
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['username'];
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$user_data = mysqli_fetch_assoc($user_query);

if (isset($_POST['update'])) {
    $new_username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $password_hashed = md5($password);
        $query = "UPDATE users SET username = '$new_username', password = '$password_hashed' WHERE username = '$username'";
    } else {
        $query = "UPDATE users SET username = '$new_username' WHERE username = '$username'";
    }

    if (mysqli_query($conn, $query)) {
        $_SESSION['username'] = $new_username;
        header("Location: user.php?status=success");
    } else {
        echo "Gagal memperbarui profil.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Edit Profil</h2>

<form method="POST" action="profile.php">
    <label>Username:</label>
    <input type="text" name="username" value="<?php echo $user_data['username']; ?>" required>

    <label>Password Baru:</label>
    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah">

    <button type="submit" name="update">Update Profil</button>
</form>

</body>
</html>
