<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "perpustakaan";
$port = 3300;

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>