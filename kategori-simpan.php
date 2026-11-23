<?php
require_once 'koneksi.php';

$kategori_buku = mysqli_real_escape_string($conn, $_POST['kategori_buku']);

$sql = "INSERT INTO tb_kategori_buku (kategori_buku) VALUES ('$kategori_buku')";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
        alert('Kategori buku berhasil ditambahkan!');
        window.location='kategori-buku-list.php';
    </script>";
} else {
    echo "<script>
        alert('Kategori buku gagal ditambahkan!');
        window.location='kategori-buku-list.php';
    </script>";
}
?>