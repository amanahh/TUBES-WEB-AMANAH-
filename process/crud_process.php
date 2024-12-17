<?php
require_once '../db/connection.php';

// Proses Tambah Data
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];

    $query = "INSERT INTO students (name, age, class) VALUES ('$name', $age, '$class')";
    mysqli_query($conn, $query);
    header("Location: ../dashboard/admin.php");
}
?>
