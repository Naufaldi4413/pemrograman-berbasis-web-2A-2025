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
      <h2 class="text-gray-700 font-semibold">Manajemen Absensi Karyawan</h2>
      <a href="logout.php" class="bg-purple-600 text-white px-4 py-1 rounded hover:bg-purple-700">Log Out</a>
    </header>
  </main>

  <section class="p-6 overflow-auto">
    <div class="bg-white shadow rounded p-4">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Absensi Karyawan</h2>
        <a href="tambah.php" class="bg-purple-600 text-white px-4 py-1 rounded hover:bg-purple-700">+ Tambah Data</a>
      </div>
  <table class="w-full table-auto text-left border border-gray-200">
    <thead class="bg-gray-100">
      <tr class="bg-gray-200">
        <th class="border p-2">NIP</th>
        <th class="border p-2">Nama</th>
        <th class="border p-2">Umur</th>
        <th class="border p-2">Jenis Kelamin</th>
        <th class="border p-2">Departemen</th>
        <th class="border p-2">Jabatan</th>
        <th class="border p-2">Kota Asal</th>
        <th class="border p-2">Tanggal</th>
        <th class="border p-2">Jam Masuk</th>
        <th class="border p-2">Jam Pulang</th>
        <th class="border p-2">Aksi</th>
      </tr>
    </thead>
  <tbody>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM karyawan_absensi");
      while ($row = mysqli_fetch_assoc($data)) {
          echo "<tr>
            <td class='border p-2'>{$row['nip']}</td>
            <td class='border p-2'>{$row['nama']}</td>
            <td class='border p-2'>{$row['umur']}</td>
            <td class='border p-2'>{$row['jenis_kelamin']}</td>
            <td class='border p-2'>{$row['departemen']}</td>
            <td class='border p-2'>{$row['jabatan']}</td>
            <td class='border p-2'>{$row['kota_asal']}</td>
            <td class='border p-2'>{$row['tanggal_absensi']}</td>
            <td class='border p-2'>{$row['jam_masuk']}</td>
            <td class='border p-2'>{$row['jam_pulang']}</td>
            <td class='border p-2'>
              <a href='edit.php?id={$row['id']}' class='bg-blue-500 text-white px-2 py-1 rounded'>Edit</a>
              <a href='hapus.php?id={$row['id']}' class='bg-red-500 text-white px-2 py-1 rounded' onclick='return confirm(\'Yakin?\')'>Hapus</a>
            </td>
          </tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>