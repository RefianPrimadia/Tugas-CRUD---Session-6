<?php
$conn = mysqli_connect("localhost", "root", "", "db_phprefian"); 

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>