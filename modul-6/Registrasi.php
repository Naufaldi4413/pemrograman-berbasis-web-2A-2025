<?php
require "Db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
    header("Location: Login.php");
    exit; 
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
<body  class="bg-gradient-to-br from-red-500 via-purple-500 to-white min-h-screen flex items-center justify-center">
    <div class="backdrop-blur-md p-8 rounded-xl shadow-2xl w-[90%] max-w-sm text-white">
        <h2 class="text-3xl font-semibold text-center mb-6 drop-shadow">
            Registrasi
        </h2>
  <form method="POST" class="max-w-sm mx-auto mt-10 space-y-4">
    <input 
      name="username" 
      placeholder="Username" 
      class="w-full p-3 bg-white/10 text-white placeholder-white-300 border border-white/20 rounded focus:outline-none focus:ring-2 focus:ring-white-400 transition" required>
    <input 
      name="password" 
      type="password" 
      placeholder="Password" 
      class="w-full p-3 bg-white/10 text-white placeholder-white-300 border border-white/20 rounded focus:outline-none focus:ring-2 focus:ring-white-400 transition" required>
    <button class="w-full bg-black hover:bg-blue-600 text-white font-semibold py-3 rounded transition duration-300">Register</button>
  </form>
</body>
</html>