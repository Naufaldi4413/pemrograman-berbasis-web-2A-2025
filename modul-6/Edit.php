<?php include "Auth.php"; include "Db.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM karyawan_absensi WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $sql = "UPDATE karyawan_absensi SET
        nip='$_POST[nip]', nama='$_POST[nama]', umur='$_POST[umur]', jenis_kelamin='$_POST[jenis_kelamin]',
        departemen='$_POST[departemen]', jabatan='$_POST[jabatan]', kota_asal='$_POST[kota_asal]',
        tanggal_absensi='$_POST[tanggal_absensi]', jam_masuk='$_POST[jam_masuk]', jam_pulang='$_POST[jam_pulang]'
        WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: Index.php");
}
?>

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
      <h2 class="text-gray-700 font-semibold">Edit Karyawan</h2>
      <a href="index.php" class="bg-purple-600 text-white px-4 py-1 rounded hover:bg-purple-700">Kembali</a>
    </header>
  </main>

  <form method="POST" class="max-w-2xl mx-auto mt-10 space-y-4">
    <input name="nip" value="<?= $data['nip'] ?>" class="w-full border p-2 rounded">
    <input name="nama" value="<?= $data['nama'] ?>" class="w-full border p-2 rounded">
    <input name="umur" type="number" value="<?= $data['umur'] ?>" class="w-full border p-2 rounded">
      <select name="jenis_kelamin" class="w-full border p-2 rounded">
        <option <?= $data['jenis_kelamin']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
        <option <?= $data['jenis_kelamin']=='Perempuan'?'selected':'' ?>>Perempuan</option>
      </select>
    <input name="departemen" value="<?= $data['departemen'] ?>" class="w-full border p-2 rounded">
    <input name="jabatan" value="<?= $data['jabatan'] ?>" class="w-full border p-2 rounded">
    <input name="kota_asal" value="<?= $data['kota_asal'] ?>" class="w-full border p-2 rounded">
    <input name="tanggal_absensi" type="date" value="<?= $data['tanggal_absensi'] ?>" class="w-full border p-2 rounded">
    <input name="jam_masuk" type="time" value="<?= $data['jam_masuk'] ?>" class="w-full border p-2 rounded">
    <input name="jam_pulang" type="time" value="<?= $data['jam_pulang'] ?>" class="w-full border p-2 rounded">
    <button name="update" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
  </form>
</body>
</html>