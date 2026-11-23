<?php
require_once 'koneksi.php';
if (!isset($_GET['id']) || empty($_GET['id'])) { header("Location: buku-list.php"); exit; }
$id = (int) $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM tb_buku WHERE id_buku = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$data) { header("Location: buku-list.php"); exit; }
$kat_query = mysqli_query($conn, "SELECT * FROM tb_kategori_buku ORDER BY kategori_buku ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Edit Buku</title></head>
<body>
    <h2>Edit Buku</h2>
    <form method="POST" action="buku-update.php" enctype="multipart/form-data">
        <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>">
        <label>Pilihan Kategori Buku</label><br>
        <select name="id_kategori_buku" required>
            <?php while ($kat = mysqli_fetch_assoc($kat_query)) { ?>
                <option value="<?= $kat['id_kategori_buku']; ?>" <?= ($kat['id_kategori_buku'] == $data['id_kategori_buku']) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($kat['kategori_buku']); ?>
                </option>
            <?php } ?>
        </select><br><br>
        <label>Judul Buku</label><br><input type="text" name="judul_buku" value="<?= htmlspecialchars($data['judul_buku']); ?>" required><br><br>
        <label>Penulis</label><br><input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']); ?>" required><br><br>
        <label>Penerbit</label><br><input type="text" name="penerbit" value="<?= htmlspecialchars($data['penerbit']); ?>" required><br><br>
        <label>Foto Cover Saat Ini</label><br>
        <?php if (!empty($data['Foto_cover'])) { ?>
            <img src="uploads/<?= htmlspecialchars($data['Foto_cover']); ?>" width="80"><br>
        <?php } ?><br>
        <label>Ganti Foto Cover (Opsional)</label><br><input type="file" name="foto_cover" accept="image/*"><br><br>
        <button type="submit" name="update">Update</button>
        <a href="buku-list.php">Kembali</a>
    </form>
</body>
</html>