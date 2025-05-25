<?php
$artikelList = [
    [
        'id' => 'artikel1',
        'judul' => 'Melukis Pengalaman Secara Inovatif di Kampus Mengajar 8',
        'tanggal' => '2024-11-20',
        'deskripsi' => 'Pembelajaran yang tidak hanya tentang buku dan papan tulis, namun berasal dari pengalaman langsung di lapangan.',
        'gambar' => 'img/1.jpg',  
        'alt' => 'Inovatif di Kampus Mengajar 8',
        'sumber' => 'https://kumparan.com/dessyana-nursafitri/melukis-pengalaman-secara-inovatif-di-kampus-mengajar-8-24I1aBGbdPW',
        'sumber_nama' => 'kumparan.com'
    ],
    [
        'id' => 'artikel2',
        'judul' => 'Pohon Refleksi, Evaluasi Pembelajaran melalui Pandangan Siswa',
        'tanggal' => '2024-12-05',
        'deskripsi' => 'Pohon Refleksi adalah konsep sederhana namun efektif untuk mengumpulkan pendapat dan komentar siswa terhadap pengalaman belajar mereka.',
        'gambar' => 'img/2.jpg',
        'alt' => 'Evaluasi Pembelajaran melalui Pandangan Siswa',
        'sumber' => 'https://www.kompasiana.com/muhammadabirizky6280/66841000c925c425f279f502/pohon-refleksi-evaluasi-pembelajaran-melalui-pandangan-siswa-sdn-34-mataram',
        'sumber_nama' => 'kompasiana.com'
    ],
    [
        'id' => 'artikel3',
        'judul' => 'Refleksi atas Pengalaman dalam Kurikulum Merdeka',
        'tanggal' => '2025-01-10',
        'deskripsi' => 'Refleksi menjadi bagian penting dalam Kurikulum Merdeka karena membantu siswa memahami makna di balik pengalaman belajar.',
        'gambar' => 'img/3.jpg',
        'alt' => 'Refleksi atas Pengalaman dalam Kurikulum Merdeka',
        'sumber' => 'https://news.detik.com/kolom/d-6092684/refleksi-atas-pengalaman-dalam-kurikulum-merdeka',
        'sumber_nama' => 'news.detik.com'
    ]
];

$kutipanMotivasi = [
    '"We do not learn from experience, we learn from reflecting on experience." – John Dewey',
    '"Pendidikan adalah senjata paling ampuh untuk mengubah dunia." – Nelson Mandela',
    '"Belajar tanpa berpikir itu tidaklah berguna, tapi berpikir tanpa belajar itu sangatlah berbahaya." – Confucius',
    '"Refleksi adalah cermin tempat kita belajar dari masa lalu untuk masa depan."',
    '"Sebuah perjalanan pendidikan dimulai dengan rasa ingin tahu dan tumbuh melalui refleksi."'
];

function getArtikelById($id, $list) {
    foreach ($list as $item) {
        if ($item['id'] === $id) {
            return $item;
        }
    }
    return null;
}

$artikelId = isset($_GET['artikel']) ? $_GET['artikel'] : null;
$artikelDipilih = $artikelId ? getArtikelById($artikelId, $artikelList) : null;

$kutipan = $kutipanMotivasi[rand(0, count($kutipanMotivasi) - 1)];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blog Reflektif</title>
</head>
<body>
    <h1>Blog atau Catatan Pribadi</h1>
    <hr>
    <a href="Profil.php">Profil Interaktif</a> |
    <a href="Pengalaman.php">Pengalaman Kuliah</a>
    <hr>

    <h2>Daftar Artikel</h2>
    <ul>
        <?php foreach ($artikelList as $artikel): ?>
            <li><a href="?artikel=<?= htmlspecialchars($artikel['id']) ?>"><?= htmlspecialchars($artikel['judul']) ?></a></li>
        <?php endforeach; ?>
    </ul>

    <hr>

    <?php if ($artikelDipilih): ?>
        <article>
            <h2><?= htmlspecialchars($artikelDipilih['judul']) ?></h2>
            <p><strong>Tanggal Posting:</strong> <?= htmlspecialchars(date('d M Y', strtotime($artikelDipilih['tanggal']))) ?></p>
            <p><?= htmlspecialchars($artikelDipilih['deskripsi']) ?></p>

            <?php if (!empty($artikelDipilih['gambar'])): ?>
                <img src="<?= htmlspecialchars($artikelDipilih['gambar']) ?>" alt="<?= htmlspecialchars($artikelDipilih['alt']) ?>" width="300" />
            <?php else: ?>
                <p><em>Gambar tidak tersedia.</em></p>
            <?php endif; ?>

            <blockquote><em><?= $kutipan ?></em></blockquote>

            <p>Sumber: <a href="<?= htmlspecialchars($artikelDipilih['sumber']) ?>" target="_blank"><?= htmlspecialchars($artikelDipilih['sumber_nama']) ?></a></p>
        </article>
    <?php else: ?>
        <p><em>Silakan pilih artikel dari daftar di atas.</em></p>
    <?php endif; ?>
</body>
</html>
