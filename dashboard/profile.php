<?php
session_start();

// Lokasi file untuk menyimpan data profil
$file = 'profile_data.json';

// Fungsi untuk membaca data dari file JSON
function getProfileData() {
    global $file;
    if (file_exists($file)) {
        $data = file_get_contents($file);
        return json_decode($data, true);
    } else {
        return null;
    }
}

// Fungsi untuk menyimpan data ke file JSON
function saveProfileData($data) {
    global $file;
    file_put_contents($file, json_encode($data));
}

// Jika form disubmit, proses penyimpanan atau pembaruan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    // Membaca data yang sudah ada dari file
    $profileData = getProfileData();
    
    // Jika data profil belum ada, buat data baru
    if (!$profileData) {
        $profileData = [];
    }

    // Menambahkan data baru atau memperbarui data yang ada
    $profileData['name'] = $name;
    $profileData['email'] = $email;
    $profileData['phone'] = $phone;
    $profileData['address'] = $address;

    // Simpan data yang diperbarui ke file
    saveProfileData($profileData);
}

$profile = getProfileData(); // Ambil data profil
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <style>
        /* Styling untuk halaman profil */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .profile-info {
            margin-top: 30px;
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
        }

        .back-button:hover {
            background-color: #218838;
        }

        /* Responsive design */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Profil Pengguna</h2>
        
        <!-- Form untuk mengedit profil -->
        <form method="POST" action="">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="<?php echo $profile['name'] ?? ''; ?>" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $profile['email'] ?? ''; ?>" required>

            <label for="phone">Nomor Telepon</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $profile['phone'] ?? ''; ?>" required>

            <label for="address">Alamat</label>
            <input type="text" name="address" id="address" value="<?php echo $profile['address'] ?? ''; ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>

        <!-- Menampilkan informasi profil yang telah diupdate -->
        <?php if ($profile): ?>
            <div class="profile-info">
                <h3>Informasi Profil</h3>
                <p><strong>Nama:</strong> <?php echo $profile['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $profile['email']; ?></p>
                <p><strong>Nomor Telepon:</strong> <?php echo $profile['phone']; ?></p>
                <p><strong>Alamat:</strong> <?php echo $profile['address']; ?></p>
            </div>
        <?php endif; ?>

        <!-- Tombol kembali ke user.php (Dashboard) -->
        <a href="user.php" class="back-button">Kembali ke Dashboard</a>
    </div>

</body>
</html>
