<?php
require_once 'koneksi.php';
$id_kategori_buku = mysqli_real_escape_string($conn, $_POST['id_kategori_buku']);
$judul_buku       = mysqli_real_escape_string($conn, $_POST['judul_buku']);
$penulis          = mysqli_real_escape_string($conn, $_POST['penulis']);
$penerbit         = mysqli_real_escape_string($conn, $_POST['penerbit']);

$nama_file_baru = time() . "_" . basename($_FILES['foto_cover']['name']);
$tmp_file       = $_FILES['foto_cover']['tmp_name'];
$folder         = "uploads/";

if (move_uploaded_file($tmp_file, $folder . $nama_file_baru)) {
    $sql = "INSERT INTO tb_buku (id_kategori_buku, judul_buku, penulis, penerbit, Foto_cover)
            VALUES ('$id_kategori_buku', '$judul_buku', '$penulis', '$penerbit', '$nama_file_baru')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Berhasil ditambahkan!'); window.location='buku-list.php';</script>";
    } else {
        echo "<script>alert('Gagal simpan database!'); window.location='buku-tambah.php';</script>";
    }
} else {
    echo "<script>alert('Gagal upload foto!'); window.location='buku-tambah.php';</script>";
}
?>