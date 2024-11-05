<?php
session_start();
if (!isset($_SESSION['username'])) 

// Daftar gejala dengan kode dan deskripsi
$gejala_list = [
    "G01" => "Daun menguning atau coklat atau hijau gelap",
    "G02" => "Daun berlubang atau bercak hitam atau luka pada daun/batang",
    "G03" => "Lembar daun berkerut atau kering atau layu",
    "G04" => "Daun atau tunas layu dan busuk",
    "G05" => "Akar kering, berwarna coklat atau busuk",
    "G06" => "Pertumbuhan lambat, tidak menghasilkan daun baru",
    "G07" => "Adanya serbuk atau lapisan lengket",
    "G08" => "Tunas dan akar baru lemah",
    "G09" => "Daun hijau dan mengkilap",
    "G010" => "Akar sehat dan aktif tumbuh",
    "G011" => "Pembungaan yang rutin dan melimpah",
    "G012" => "Pemupukan garam di media tanam",
    "G013" => "Daun terlalu besar atau daun terlalu tipis",
    "G014" => "Batangnya kurus dan tipis",
    "G015" => "Batangnya pseudobulb lembek atau mengempis",
    "G016" => "Tidak berbunga atau sedikit berbunga",
    "G017" => "Media tanam terlalu lembab, basah, atau kering",
    "G018" => "Bahan media tanam sesuai (serat pakis, moss, sabut kelapa)",
    "G019" => "Media tidak mudah terurai",
    "G020" => "Tanaman anggrek bebas dari hama atau penyakit"
];

// Tentukan berapa banyak pertanyaan per halaman
$pertanyaan_per_halaman = 5;
$total_halaman = ceil(count($gejala_list) / $pertanyaan_per_halaman);

// Ambil halaman saat ini
$halaman = isset($_POST['halaman']) ? (int)$_POST['halaman'] : 1;

// Menyimpan jawaban dalam sesi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['gejala'] as $kode => $jawaban) {
        $_SESSION['gejala'][$kode] = $jawaban;
    }

    // Navigasi ke halaman berikutnya atau sebelumnya
    if (isset($_POST['next'])) {
        $halaman++;
    } elseif (isset($_POST['previous'])) {
        $halaman--;
    }
}

// Ambil subset gejala berdasarkan halaman
$gejala_halaman = array_slice($gejala_list, ($halaman - 1) * $pertanyaan_per_halaman, $pertanyaan_per_halaman, true);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar - Deteksi Gejala Hama pada Anggrek</title>
    <link rel="stylesheet" href="style3.css">
    </head>
    <!-- Sidebar -->
    <div class="sidebar">
        <h1>Perawata Tanaman Anggrek</h1>
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
    <style> 
        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-size: 16px;
            color: #333;
        }

        select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Deteksi Gejala Hama pada Anggrek - Halaman <?php echo $halaman; ?> dari <?php echo $total_halaman; ?></h2>
    <form method="POST" action="">
        <?php
        // Tampilkan pertanyaan per halaman
        foreach ($gejala_halaman as $kode => $deskripsi) {
            $selected = isset($_SESSION['gejala'][$kode]) ? $_SESSION['gejala'][$kode] : "Tidak";
            echo "<div class='form-group'>
                    <label>$deskripsi</label>
                    <select name='gejala[$kode]'>
                        <option value='Tidak'" . ($selected == "Tidak" ? "selected" : "") . ">Tidak</option>
                        <option value='Ya'" . ($selected == "Ya" ? "selected" : "") . ">Ya</option>
                    </select>
                  </div>";
        }
        ?>
        <input type="hidden" name="halaman" value="<?php echo $halaman; ?>">
        <div>
            <?php if ($halaman > 1): ?>
                <button type="submit" name="previous">Previous</button>
            <?php endif; ?>
            <?php if ($halaman < $total_halaman): ?>
                <button type="submit" name="next">Next</button>
            <?php else: ?>
                <button type="submit" name="submit">Diagnosa</button>
            <?php endif; ?>
        </div>
    </form>

    <?php
    // Tampilkan hasil diagnostik setelah semua pertanyaan dijawab
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $gejala = $_SESSION['gejala'];

        // Aturan diagnosis
        if ($gejala['G01'] === 'Ya' && $gejala['G02'] === 'Ya' && $gejala['G03'] === 'Ya' && $gejala['G04'] === 'Ya' && $gejala['G05'] === 'Ya' && $gejala['G06'] === 'Ya' && $gejala['G07'] === 'Ya') {
            $diagnosis = "Anggrek terkena hama";
        } elseif ($gejala['G01'] === 'Ya' && $gejala['G02'] === 'Ya' && $gejala['G03'] === 'Ya' && $gejala['G016'] === 'Ya') {
            $diagnosis = "Anggrek kelebihan cahaya";
        } elseif ($gejala['G01'] === 'Ya' && $gejala['G02'] === 'Ya' && $gejala['G04'] === 'Ya' && $gejala['G05'] === 'Ya' && $gejala['G06'] === 'Ya' && $gejala['G016'] === 'Ya' && $gejala['G017'] === 'Ya') {
            $diagnosis = "Anggrek tidak subur";
        } elseif ($gejala['G01'] === 'Ya' && $gejala['G05'] === 'Ya' && $gejala['G06'] === 'Ya' && $gejala['G012'] === 'Ya' && $gejala['G013'] === 'Ya') {
            $diagnosis = "Anggrek kelebihan pupuk";
        } elseif ($gejala['G01'] === 'Ya' && $gejala['G05'] === 'Ya' && $gejala['G06'] === 'Ya' && $gejala['G08'] === 'Ya' && $gejala['G013'] === 'Ya' && $gejala['G016'] === 'Ya') {
            $diagnosis = "Anggrek kekurangan cahaya";
        } elseif ($gejala['G01'] === 'Ya' && $gejala['G03'] === 'Ya' && $gejala['G05'] === 'Ya' && $gejala['G06'] === 'Ya' && $gejala['G015'] === 'Ya' && $gejala['G017'] === 'Ya') {
            $diagnosis = "Anggrek kelebihan air";
        } elseif ($gejala['G09'] === 'Ya' && $gejala['G010'] === 'Ya' && $gejala['G011'] === 'Ya') {
            $diagnosis = "Anggrek subur";
        } elseif ($gejala['G018'] === 'Ya' && $gejala['G019'] === 'Ya' && $gejala['G020'] === 'Ya') {
            $diagnosis = "Media tanam yang baik";
        } else {
            $diagnosis = "Tidak ada diagnosis yang sesuai";
        }

        echo "<div class='result'>Hasil Diagnosa: $diagnosis</div>";

        // Hapus sesi setelah diagnosis ditampilkan
        session_unset();
        session_destroy();
    }
    ?>
</div>
</body>
</html>