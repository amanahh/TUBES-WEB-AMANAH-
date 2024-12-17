<?php
session_start();
require_once '../db/connection.php';

// Cek role pengguna
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Proses Hapus Data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM students WHERE id = $id";
    mysqli_query($conn, $query);
    header("Location: admin.php");
    exit();
}

// Ambil Data Siswa
$result = mysqli_query($conn, "SELECT * FROM students");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kelola Data Siswa</title>
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

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #0056b3;
        }

        .logout-btn {
            background-color: #ff4d4d;
            display: inline-block;
            padding: 12px;
            text-align: center;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #e60000;
        }

        /* Main Content */
        .main-container {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
            background-color: #fff;
        }

        h2, h3 {
            margin-bottom: 10px;
            color: #007bff;
            font-size: 24px;
        }

        p {
            margin-bottom: 20px;
            color: #555;
        }

        /* Form Tambah Data */
        form {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 100%; /* Memastikan lebar form sama dengan tabel */
            width: 100%;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        form input, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }

        /* Tabel Data Siswa */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #fff;
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
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        table a {
            text-decoration: none;
            color: #007bff;
        }

        table a:hover {
            color: #0056b3;
        }

        /* Responsif */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-container {
                margin-left: 0;
            }

            form {
                max-width: 100%;
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
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="school_activities.php">Kegiatan Sekolah</a></li>
            <li><a href="manage_students.php">Data Siswa</a></li>
            <li><a href="../process/logout.php" class="logout-btn">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-container">
        <h2>Dashboard Admin - Kelola Data Siswa</h2>

        <!-- Form Tambah Data -->
        <h3>Tambah Data Siswa</h3>
        <form method="POST" action="../process/crud_process.php">
            <label>Nama Siswa:</label>
            <input type="text" name="name" required>
            <label>Umur:</label>
            <input type="number" name="age" required>
            <label>Kelas:</label>
            <input type="text" name="class" required>
            <button type="submit" name="add">Tambah</button>
        </form>

        <!-- Tabel Data Siswa -->
        <h3>Daftar Siswa</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                        <td><?php echo htmlspecialchars($row['class']); ?></td>
                        <td>
                            <a href="admin_edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="admin.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
