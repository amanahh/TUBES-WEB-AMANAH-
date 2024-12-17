<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deskripsi Sekolah</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
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
            margin-bottom: 30px;
        }

        /* Deskripsi Sekolah */
        .description-section {
            text-align: center;
            margin-top: 40px;
            font-size: 18px;
            color: #555;
        }

        .description-section h3 {
            color: #007bff;
            margin-bottom: 15px;
        }

        .description-section p {
            line-height: 1.6;
            font-size: 16px;
        }

        /* Tombol Logout dan Profile */
        .action-buttons {
            margin-top: 20px;
            text-align: center;
        }

        .action-buttons a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .action-buttons a:hover {
            background-color:rgb(179, 0, 0);
        }

        /* Responsif */
        @media screen and (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
                align-items: center;
            }

            .main-container {
                width: 90%;
                padding: 20px;
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
        <h2>Deskripsi Sekolah</h2>
        <img src="../assets/images/sekolah.png" alt="Sekolah">
        <!-- Deskripsi Sekolah -->
        <div class="description-section">
            <h3>SELAMAT DATANG DI SMA NEGERI 5 BONE</h3>
            <p>Selamat datang di SMA Negeri 5 Bone, sekolah yang aman, sejahtera, nyaman, bersih, dan disiplin. Kami berkomitmen untuk menciptakan lingkungan belajar yang mendukung perkembangan setiap siswa, baik secara akademis maupun pribadi.</p>
            <p>Di SMA Negeri 5 Bone, kami tidak hanya fokus pada prestasi akademik, tetapi juga pada pengembangan karakter dan keterampilan siswa melalui berbagai kegiatan ekstrakurikuler yang bermanfaat. Dengan fasilitas yang lengkap dan lingkungan yang kondusif, kami berusaha untuk memberikan pengalaman belajar yang terbaik bagi setiap siswa kami.</p>
        </div>

        <!-- Tombol Logout dan Profile -->
        <div class="action-buttons">
            <a href="profile.php">Profile</a>
            <a href="../process/logout.php">Logout</a>
        </div>
    </div>

</body>
</html>
