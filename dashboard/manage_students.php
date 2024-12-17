<?php
session_start();
require_once '../db/connection.php';

// Cek apakah pengguna sudah login dan memiliki role 'admin'
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Ambil Data Siswa dari Database
$result = mysqli_query($conn, "SELECT * FROM students");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Siswa</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: white;
            padding-top: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar nav ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin: 10px 0;
        }

        .sidebar nav ul li a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            transition: background 0.3s;
        }

        .sidebar nav ul li a:hover {
            background-color: #0056b3;
        }

        /* Tombol Logout */
        .logout-btn {
            display: block;
            text-align: center;
            padding: 12px 20px;
            color: white;
            background-color: #ff4d4d; /* Warna merah */
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #e60000; /* Warna merah lebih gelap saat hover */
        }

        /* Main Content */
        .main-content {
            margin-left: 250px; /* Menyesuaikan sidebar */
            padding: 20px;
            width: 100%;
            background-color: #fff;
        }

        h2 {
            margin-bottom: 10px;
            color: #007bff;
            font-size: 28px;
        }

        p {
            margin-bottom: 20px;
            color: #555;
        }

        /* Tabel Siswa */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #fdfdfd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }

            table th, table td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav>
            <ul>
                <li><a href="admin.php">Dashboard</a></li>
                <li><a href="school_activities.php">Kegiatan Sekolah</a></li>
                <li><a href="manage_students.php">Data Siswa</a></li>
                <li><a href="../process/logout.php" class="logout-btn">Logout</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Daftar Siswa</h2>
        <p>Berikut adalah daftar siswa yang telah terdaftar di sistem.</p>

        <!-- Tabel Daftar Siswa -->
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
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                        <td><?php echo htmlspecialchars($row['class']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
