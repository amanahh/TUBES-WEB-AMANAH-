<?php
session_start();
require_once '../db/connection.php';

// Cek role pengguna
if ($_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

// Ambil data siswa (read-only)
$students = mysqli_query($conn, "SELECT * FROM students");

// Ambil data profil user saat ini
$username = $_SESSION['username'];
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$user_data = mysqli_fetch_assoc($user_query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        
        /* Navbar */
        .navbar {
            width: 100%;
            background-color: #007bff;
            padding: 15px 0;
            text-align: center;
        }

        .navbar ul {
            list-style: none;
            display: inline-flex;
            gap: 20px;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #0056b3;
        }

        /* Main Container */
        .main-container {
            width: 80%;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Table Styling */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table td {
            background-color: #f8f9fa;
        }

        /* Responsif */
        @media screen and (max-width: 768px) {
            .main-container {
                width: 95%;
                padding: 15px;
            }

            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <ul>
            <li><a href="user.php">Deskripsi</a></li>
            <li><a href="students.php">Data Siswa</a></li>
            <li><a href="school_activities2.php">Kegiatan Sekolah</a></li>
            <li><a href="contact.php">Kontak</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Data Siswa -->
        <h3>Data Siswa Sekolah</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($students)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>
