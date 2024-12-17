<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan Sekolah</title>
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
        /* Main Content */
        .main-container {
            padding: 20px;
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

        /* Deskripsi Kegiatan */
        .activities-description {
            margin-bottom: 20px;
        }

        /* Galeri Foto */
        .activities-gallery {
            display: flex;
            flex-direction: column;
        }

        .gallery {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .gallery-item {
            width: 30%;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item p {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        /* Responsif */
        @media screen and (max-width: 768px) {
            .gallery {
                flex-direction: column;
                align-items: center;
            }

            .gallery-item {
                width: 80%;
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
        <h2>Kegiatan Ekstrakurikuler dan Lomba-Lomba Sekolah</h2>

        <!-- Deskripsi Kegiatan Sekolah -->
        <div class="activities-description">
            <p>Berikut adalah beberapa kegiatan ekstrakurikuler dan lomba-lomba yang diadakan di sekolah kami:</p>
        </div>

        <!-- Galeri Foto Kegiatan Sekolah -->
        <div class="activities-gallery">
            <h3>Ekstrakurikuler</h3>
            <div class="gallery">
                <div class="gallery-item">
                    <img src="../assets/images/basket.jpeg" alt="Ekstrakurikuler 1">
                    <p>Basket</p>
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/pmr.jpeg" alt="Ekstrakurikuler 2">
                    <p>Palang Merah Remaja</p>
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/pramuka.jpeg" alt="Ekstrakurikuler 3">
                    <p>Pramuka</p>
                </div>
            </div>

            <h3>Lomba-Lomba</h3>
            <div class="gallery">
                <div class="gallery-item">
                    <img src="../assets/images/cerdascermat.jpeg" alt="Lomba 1">
                    <p>Lomba Cerdas Cermat</p>
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/menari.jpeg" alt="Lomba 2">
                    <p>Lomba Seni Tari</p>
                </div>
                <div class="gallery-item">
                    <img src="../assets/images/lari.jpeg" alt="Lomba 3">
                    <p>Lomba Lari</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
