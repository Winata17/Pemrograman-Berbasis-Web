<?php
$conn = mysqli_connect("localhost", "root", "", "newmahasiswa");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
