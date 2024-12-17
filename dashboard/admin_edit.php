<?php
session_start();
require_once '../db/connection.php';

// Cek role pengguna
if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Ambil data siswa berdasarkan ID
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$student = mysqli_fetch_assoc($result);

// Proses Edit Data
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];

    mysqli_query($conn, "UPDATE students SET name = '$name', age = $age, class = '$class' WHERE id = $id");
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    <form method="POST">
        <label>Nama Siswa:</label>
        <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
        <label>Umur:</label>
        <input type="number" name="age" value="<?php echo $student['age']; ?>" required>
        <label>Kelas:</label>
        <input type="text" name="class" value="<?php echo $student['class']; ?>" required>
        <button type="submit" name="update">Update</button>
    </form>
    <a href="admin.php">Kembali</a>
</body>
</html>
