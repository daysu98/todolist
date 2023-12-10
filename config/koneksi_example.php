<?php
$koneksi = mysqli_connect("localhost", "root", "", "todolist");
if (!$koneksi) {
   die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>