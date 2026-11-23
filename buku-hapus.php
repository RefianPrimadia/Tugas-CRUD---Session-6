<?php
require_once 'koneksi.php';
if (!isset($_GET['id']) || empty($_GET['id'])) { header("Location: buku-list.php"); exit; }
$id = mysqli_real_escape_string($conn, $_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Foto_cover FROM tb_buku WHERE id_buku = '$id'"));
if (!$data) { echo "<script>alert('Data tidak ditemukan!'); window.location='buku-list.php';</script>"; exit; }

$folder = "uploads/";
if (!empty($data['Foto_cover']) && file_exists($folder . $data['Foto_cover'])) {
    unlink($folder . $data['Foto_cover']);
}

if (mysqli_query($conn, "DELETE FROM tb_buku WHERE id_buku = '$id'")) {
    echo "<script>alert('Berhasil dihapus!'); window.location='buku-list.php';</script>";
} else {
    echo "<script>alert('Gagal dihapus!'); window.location='buku-list.php';</script>";
}
?>