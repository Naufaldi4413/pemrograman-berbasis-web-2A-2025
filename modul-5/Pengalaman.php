<?php
$pengalaman_kuliah = [
    ["tahun" => "03-08-2024", "kegiatan" => "Hari pertama kuliah.", "deskripsi" => "Ketika pertama kali masuk universitas, aku merasa jiwa-jiwa antusiasku keluar dan bersemangat. Aku bertemu banyak teman baru, suasana baru serta dosen yang inspiratif. Suasana akademik yang kondusif bikin aku semakin termotivasi untuk belajar terus menerus tanpa kenal lelah"],
    ["tahun" => "29-08-2024", "kegiatan" => "Masuk UKM Fakultas yaitu UKM-ITC.", "deskripsi" => "Aku mengikuti UKM-ITC. Mengapa? karena aku bener-bener baru masuk ke dalam dunia IT/percodingan. Sekolahku dulu Madrasah Aliyah yang sangat minim tentang IT. Meskipun itu pertama kali bagi saya dan saya juga memulai dari nol untuk belajar,saya tidak akan pantang menyerah untuk belajar lebih giat."],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Timeline Pengalaman Kuliah</title>
    <style>
        .timeline {
            position: relative;
            padding: 20px;
        }
        .event {
            margin: 20px 0;
            padding-left: 20px;
            border-left: 2px solid #000;
        }
    </style>
</head>
<body>
<h1>Timeline Pengalaman Kuliah</h1>
<hr>
<a href="Profil.php">Profil Interaktif</a> |
<a href="Blog.php">Blog Reflektif</a>
<hr>
<br>
    <h2>Timeline Pengalaman Kuliah</h2>
    <div class="timeline">
        <?php foreach ($pengalaman_kuliah as $event): ?>
            <div class="event">
                <strong><?php echo $event['tahun']; ?></strong>: <?php echo $event['kegiatan']; ?> <br> <?php echo $event['deskripsi']; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>