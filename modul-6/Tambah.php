<?php include "Auth.php"; include "Db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<main class="flex-1 flex flex-col">
    <header class="bg-white shadow p-4 flex justify-between items-center">
      <h2 class="text-gray-700 font-semibold">Tambah Karyawan</h2>
      <a href="index.php" class="bg-purple-600 text-white px-4 py-1 rounded hover:bg-purple-700">Kembali</a>
    </header>
  </main>

  <form method="POST" class="max-w-2xl mx-auto mt-1 0 space-y-4">
    <input name="nip" placeholder="NIP" class="w-full border p-2 rounded" required>
    <input name="nama" placeholder="Nama" class="w-full border p-2 rounded" required>
    <input name="umur" type="number" placeholder="Umur" class="w-full border p-2 rounded" required>
    <select name="jenis_kelamin" class="w-full border p-2 rounded">
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
    <input name="departemen" placeholder="Departemen" class="w-full border p-2 rounded">
    <input name="jabatan" placeholder="Jabatan" class="w-full border p-2 rounded">
    <input name="kota_asal" placeholder="Kota Asal" class="w-full border p-2 rounded">
    <input name="tanggal_absensi" type="date" class="w-full border p-2 rounded" required>
    <input name="jam_masuk" type="time" class="w-full border p-2 rounded" required>
    <input name="jam_pulang" type="time" class="w-full border p-2 rounded" required>
    <button name="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
  </form>

  <?php
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang)
                VALUES ('$_POST[nip]', '$_POST[nama]', '$_POST[umur]', '$_POST[jenis_kelamin]', '$_POST[departemen]',
                        '$_POST[jabatan]', '$_POST[kota_asal]', '$_POST[tanggal_absensi]', '$_POST[jam_masuk]', '$_POST[jam_pulang]')";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }
  ?>
</body>
</html>