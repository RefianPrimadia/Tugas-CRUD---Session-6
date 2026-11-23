<?php
require_once 'koneksi.php';

$id = $_POST['id_kategori_buku'];
$kategori_buku = mysqli_real_escape_string($conn, $_POST['kategori_buku']);

$sql = "UPDATE tb_kategori_buku SET kategori_buku = '$kategori_buku' WHERE id_kategori_buku = '$id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
        alert('Kategori buku berhasil diperbarui!');
        window.location='kategori-buku-list.php';
    </script>";
} else {
    echo "<script>
        alert('Kategori buku gagal diperbarui!');
        window.location='kategori-buku-list.php';
    </script>";
}
?>