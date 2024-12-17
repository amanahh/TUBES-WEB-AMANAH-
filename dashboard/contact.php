<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Sekolah</title>
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

        /* Kontak Sekolah */
        .contact-section {
            text-align: center;
            font-size: 18px;
            color: #555;
        }

        .contact-section h3 {
            color: #007bff;
            margin-bottom: 15px;
        }

        .contact-section p {
            line-height: 1.6;
            font-size: 16px;
        }

        .contact-form {
            margin-top: 30px;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .contact-form button {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .contact-form button:hover {
            background-color: #0056b3;
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
        <h2>Kontak Sekolah</h2>

        <!-- Kontak Sekolah -->
        <div class="contact-section">
            <h3>Hubungi Kami</h3>
            <p>Jika Anda memiliki pertanyaan atau ingin mengetahui lebih lanjut mengenai SMA Negeri 5 Bone, jangan ragu untuk menghubungi kami. Kami siap membantu Anda.</p>

            <h4>Alamat:</h4>
            <p>Jalan Raya No. 123, Bone, Sulawesi Selatan, Indonesia</p>

            <h4>Telepon:</h4>
            <p>(0411) 1234567</p>

            <h4>Email:</h4>
            <p>info@smane5bone.sch.id</p>

            <h4>Formulir Kontak</h4>
            <p>Silakan kirimkan pesan Anda melalui formulir kontak di bawah ini, dan kami akan segera merespons.</p>
        </div>

    </div>

</body>
</html>
