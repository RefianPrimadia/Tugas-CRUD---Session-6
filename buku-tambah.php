<?php
require_once 'koneksi.php';
$kat_query = mysqli_query($conn, "SELECT * FROM tb_kategori_buku ORDER BY kategori_buku ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Tambah Buku</title></head>
<body>
    <h2>Tambah Buku</h2>
    <form method="POST" action="buku-simpan.php" enctype="multipart/form-data">
        <label>Pilih Kategori Buku</label><br>
        <select name="id_kategori_buku" required>
            <option value="">-- Pilih Kategori --</option>
            <?php while ($kat = mysqli_fetch_assoc($kat_query)) { ?>
                <option value="<?= $kat['id_kategori_buku']; ?>"><?= htmlspecialchars($kat['kategori_buku']); ?></option>
            <?php } ?>
        </select><br><br>
        <label>Judul Buku</label><br><input type="text" name="judul_buku" required><br><br>
        <label>Penulis</label><br><input type="text" name="penulis" required><br><br>
        <label>Penerbit</label><br><input type="text" name="penerbit" required><br><br>
        <label>Foto Cover</label><br><input type="file" name="foto_cover" accept="image/*" required><br><br>
        <button type="submit" name="simpan">Simpan</button>
        <a href="buku-list.php">Kembali</a>
    </form>
</body>
</html>