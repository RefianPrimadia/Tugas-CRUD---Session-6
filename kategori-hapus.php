<?php
require_once 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: kategori-buku-list.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM tb_kategori_buku WHERE id_kategori_buku = '$id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
        alert('Kategori buku berhasil dihapus!');
        window.location='kategori-buku-list.php';
    </script>";
} else {
    echo "<script>
        alert('Kategori buku gagal dihapus!');
        window.location='kategori-buku-list.php';
    </script>";
}
?>