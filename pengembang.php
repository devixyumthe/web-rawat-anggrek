<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembang</title>
    <link rel="stylesheet" href="coba.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3; /* Latar belakang halaman */
            color: #333; /* Warna teks */
        }

        .developer-gallery {
            display: grid;
            grid-template-columns: repeat(1, 1fr); /* Satu kolom untuk pengembang pertama */
            gap: 20px; /* Jarak antar pengembang */
            margin-top: 20px;
        }

        .developer {
            background-color: #fff; /* Latar belakang kotak pengembang */
            border-radius: 8px; /* Sudut melengkung */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan */
            text-align: center; /* Rata tengah */
            padding: 20px; /* Padding di dalam kotak */
        }

        .developer img {
            width: 150px; /* Lebar gambar */
            height: 150px; /* Tinggi gambar */
            object-fit: cover; /* Memastikan gambar terpotong dengan baik */
            border-radius: 50%; /* Membuat gambar menjadi bulat */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); /* Bayangan gambar */
            margin-bottom: 10px; /* Jarak di bawah gambar */
        }

        .developer h3 {
            font-size: 1.2em; /* Ukuran teks untuk nama pengembang */
            margin: 10px 0; /* Margin atas dan bawah */
            color: #4CAF50; /* Warna teks */
        }

        .developer p {
            font-size: 0.9em; /* Ukuran teks untuk deskripsi */
            color: #555; /* Warna teks deskripsi */
            margin: 0; /* Menghapus margin */
        }

        /* Pengaturan untuk baris kedua pengembang */
        .developer-gallery-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Tiga kolom untuk pengembang */
            gap: 20px; /* Jarak antar pengembang */
        }

        /* Responsif untuk tampilan di perangkat yang lebih besar */
        @media (min-width: 600px) {
            .developer-gallery {
                grid-template-columns: repeat(1, 1fr); /* Tetap satu kolom untuk pengembang pertama */
            }

            .developer-gallery-row {
                grid-template-columns: repeat(3, 1fr); /* Tiga kolom untuk pengembang 2, 3, dan 4 */
            }
        }

        @media (max-width: 599px) {
            .developer-gallery {
                grid-template-columns: repeat(1, 1fr); /* Satu kolom untuk perangkat kecil */
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h1>Perawatan Tanaman Anggrek</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="petunjuk.php">Petunjuk</a></li>
                <li><a href="tentang.php">Tentang</a></li>
                <li><a href="pengembang.php">Pengembang</a></li>
                <li><a href="solusi.php">Gejala Dan Solusi</a></li>
                <li><a href="index.php">Keluar</a></li>
            </ul>
        </nav>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Pengembang</h2>
        <p>Berikut adalah daftar pengembang yang berkontribusi dalam pembuatan website tanaman anggrek ini:</p>
        
        <div class="developer-gallery">
            <div class="developer">
                <img src="dosen.jpeg" alt="Foto Pengembang 1">
                <h3>Dosen Pengampu</h3>
                <p>Yumarlin MZ, S.Kom., M.Pd., M.Kom.</p>
            </div>
        </div>
        
        <div class="developer-gallery-row">
            <div class="developer">
                <img src="ina.jpg" alt="Foto Pengembang 2">
                <h3>Pengembang 1</h3>
                <p>Sarina Labok_21330002.</p>
            </div>
            <div class="developer">
                <img src="alinda.jpg" alt="Foto Pengembang 3">
                <h3>Pengembang 2</h3>
                <p>Alinda M. N. Naitboho_21330048</p>
            </div>
            <div class="developer">
                <img src="devi.jpg" alt="Foto Pengembang 4">
                <h3>Pengembang 3</h3>
                <p>Devianti F. Jumthe_21330019</p>
            </div>
        </div>
    </div>
</body>
</html>
