<?php include "Auth.php"; include "Db.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM karyawan_absensi WHERE id = $id");
header("Location: Index.php");
?>