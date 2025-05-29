<?php
session_start();
require "Db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($query);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: Index.php");
        exit;
    } else {
        $error = "<p class='text-red-500'>Login gagal!</p>";
    }
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
<body class="bg-gradient-to-br from-red-500 via-purple-500 to-white min-h-screen flex items-center justify-center">
    <div class="backdrop-blur-md p-8 rounded-xl shadow-2xl w-[90%] max-w-sm text-white">
        <h2 class="text-3xl font-semibold text-center mb-6 drop-shadow">
            Log In
        </h2>

        <?php if(isset($error)) : ?>
        <p class="mb-4 text-red-600"><?= $error ?></p>
        <?php endif; ?> 

        <form method="POST" class="max-w-sm mx-auto mt-10 space-y-4">
            <input 
                name="username" 
                placeholder="Username" 
                class="w-full p-3 bg-white/10 text-gray placeholder-white-300 border border-white/20 rounded focus:outline-none focus:ring-2 focus:ring-white-400 transition" required>
            <input 
                name="password" 
                type="password" 
                placeholder="Password" 
                class="w-full p-3 bg-white/10 text-gray placeholder-white-300 border border-white/20 rounded focus:outline-none focus:ring-2 focus:ring-white-400 transition" required>
            <button class="w-full bg-black hover:bg-blue-600 text-white font-semibold py-3 rounded transition duration-300">Login</button>
            <p><a href="Registrasi.php">Created an account</a>  </p>
        </form>
        </div>
</body>
</html>