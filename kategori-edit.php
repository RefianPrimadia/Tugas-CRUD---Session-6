<?php
require_once 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: kategori-buku-list.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM tb_kategori_buku WHERE id_kategori_buku = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: kategori-buku-list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori Buku</title>
</head>
<body>
    <h2>Edit Kategori Buku</h2>
    <form method="POST" action="kategori-update.php">
        <input type="hidden" name="id_kategori_buku" value="<?= $data['id_kategori_buku']; ?>">

        <label for="kategori_buku">Kategori Buku</label><br>
        <input type="text" id="kategori_buku" name="kategori_buku" value="<?= htmlspecialchars($data['kategori_buku']); ?>" required>
        <br><br>
        <button type="submit" name="update">Update</button>
        <a href="kategori-buku-list.php">Kembali</a>
    </form>
</body>
</html>