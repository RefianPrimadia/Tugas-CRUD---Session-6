<?php
require_once 'koneksi.php';
$sql = "SELECT b.*, k.kategori_buku 
        FROM tb_buku b 
        LEFT JOIN tb_kategori_buku k ON b.id_kategori_buku = k.id_kategori_buku 
        ORDER BY b.id_buku DESC";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Data Buku</title></head>
<body>
    <h2>Daftar Buku</h2>
    <a href="buku-tambah.php">+ Tambah Buku</a><br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th><th>Kategori</th><th>Judul Buku</th><th>Penulis</th><th>Foto Cover</th><th>Penerbit</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($data['kategori_buku'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($data['judul_buku']); ?></td>
                <td><?= htmlspecialchars($data['penulis']); ?></td>
                <td>
                    <?php if (!empty($data['Foto_cover'])) { ?>
                        <img src="uploads/<?= htmlspecialchars($data['Foto_cover']); ?>" width="80">
                    <?php } else { echo "-"; } ?>
                </td>
                <td><?= htmlspecialchars($data['penerbit']); ?></td>
                <td>
                    <a href="buku-edit.php?id=<?= $data['id_buku']; ?>">Edit</a> |
                    <a href="buku-hapus.php?id=<?= $data['id_buku']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } } else { ?>
            <tr><td colspan="7">Belum ada data buku.</td></tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>