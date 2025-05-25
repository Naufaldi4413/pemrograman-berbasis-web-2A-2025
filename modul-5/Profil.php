<?php
$hasil = '';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bahasaPemrograman = isset($_POST['bahasa-pemrograman']) ? trim($_POST['bahasa-pemrograman']) : '';
    $pengalaman = isset($_POST['pengalaman']) ? trim($_POST['pengalaman']) : '';
    $perangkatLunak = isset($_POST['perangkat-lunak']) ? $_POST['perangkat-lunak'] : [];
    $sistemOperasi = isset($_POST['sistem-operasi']) ? $_POST['sistem-operasi'] : '';
    $tingkatPHP = isset($_POST['tingkat_php']) ? $_POST['tingkat_php'] : '';

    if (empty($bahasaPemrograman)) $errors[] = "Bahasa pemrograman wajib diisi.";
    if (empty($pengalaman)) $errors[] = "Pengalaman wajib diisi.";
    if (empty($perangkatLunak)) $errors[] = "Pilih minimal satu perangkat lunak.";
    if (empty($sistemOperasi)) $errors[] = "Sistem operasi wajib dipilih.";
    if (empty($tingkatPHP)) $errors[] = "Tingkat penguasaan PHP wajib dipilih.";

    if (empty($errors)) {
        $bahasaArray = array_map('trim', explode(',', $bahasaPemrograman));
        $perangkatLunakList = is_array($perangkatLunak) ? implode(', ', $perangkatLunak) : $perangkatLunak;

        $hasil = "<h2>Hasil Input</h2>";
        $hasil .= "<table border='1' cellpadding='5'>
            <tr><td>Bahasa Pemrograman</td><td>{$bahasaPemrograman}</td></tr>
            <tr><td>Pengalaman Proyek</td><td>{$pengalaman}</td></tr>
            <tr><td>Perangkat Lunak</td><td>{$perangkatLunakList}</td></tr>
            <tr><td>Sistem Operasi</td><td>{$sistemOperasi}</td></tr>
            <tr><td>Tingkat Penguasaan PHP</td><td>{$tingkatPHP}</td></tr>
        </table>";

        $hasil .= "<p>Anda menguasai bahasa pemrograman: <strong>{$bahasaPemrograman}</strong></p>";
        $hasil .= "<p>Pengalaman proyek Anda: <strong>{$pengalaman}</strong></p>";
        $hasil .= "<p>Perangkat lunak yang sering digunakan: <strong>{$perangkatLunakList}</strong></p>";
        $hasil .= "<p>Sistem operasi pilihan Anda: <strong>{$sistemOperasi}</strong></p>";
        $hasil .= "<p>Tingkat penguasaan PHP: <strong>{$tingkatPHP}</strong></p>";

        if (count($bahasaArray) > 2) {
            $hasil .= "<p style='color:green'><strong>Anda cukup berpengalaman dalam pemrograman!</strong></p>";
        }
        if (count($perangkatLunak) > 3) {
            $errors[] = "boleh memilih tiga perangkat lunak.";
}

    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Interaktif</title>
</head>
<body>
<h1>Profil Interaktif</h1>
<hr>
<a href="Pengalaman.php">Pengalaman Kuliah</a> |
<a href="Blog.php">Blog Reflektif</a>
<hr>

<h2>Biodata Diri</h2>
<table border="1">
    <tr><td>Nama</td><td>: Muhammad Naufaldi Arzaki</td></tr>
    <tr><td>Alamat</td><td>: Perum Graha Asri Sukodono Sidoarjo</td></tr>
    <tr><td>Tempat, Tanggal Lahir</td><td>: Sumenep, 13 Februari 2006</td></tr>
    <tr><td>Nomor HP</td><td>: 085231599263</td></tr>
    <tr><td>Email</td><td>: MuhammadNaufaldi160@Gmail.com</td></tr>
</table>

<form method="post" action="">
    <h2>Formulir Pengisian</h2>

    <label for="bahasa-pemrograman">Bahasa Pemrograman yang Dikuasai:</label><br>
    <input type="text" id="bahasa-pemrograman" name="bahasa-pemrograman" placeholder="contoh: JavaScript, Python"><br><br>

    <label>Pengalaman Membuat Proyek:<br>
        <textarea name="pengalaman" rows="4" cols="40" required></textarea>
    </label><br><br>

    <label>Software yang sering digunakan:</label><br>
    <input type="checkbox" name="perangkat-lunak[]" value="VSCode">VSCode<br>
    <input type="checkbox" name="perangkat-lunak[]" value="Sublime">Sublime<br>
    <input type="checkbox" name="perangkat-lunak[]" value="Docker">Docker<br>
    <input type="checkbox" name="perangkat-lunak[]" value="Git">Git<br>
    <input type="checkbox" name="perangkat-lunak[]" value="XAMPP">XAMPP<br><br>

    <label>Sistem Operasi yang Biasa Digunakan:</label><br>
    <input type="radio" name="sistem-operasi" value="Windows">Windows<br>
    <input type="radio" name="sistem-operasi" value="Linux">Linux<br>
    <input type="radio" name="sistem-operasi" value="MacOS">MacOS<br><br>

    <label>Tingkat Penguasaan PHP:<br>
        <select name="tingkat_php" required>
            <option value="">-- Pilih --</option>
            <option value="Pemula">Pemula</option>
            <option value="Menengah">Menengah</option>
            <option value="Mahir">Mahir</option>
        </select>
    </label><br><br>

    <button type="submit">Kirim</button>
</form>

<?php
if (!empty($errors)) {
    echo "<div style='color:red'><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul></div>";
}

echo $hasil;
?>

</body>
</html>
