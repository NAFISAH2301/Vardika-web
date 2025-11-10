<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM produk");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Produk</title>
</head>
<body>
  <h2>Daftar Produk</h2>
  <a href="tambah_produk_form.html">Tambah Produk</a>
  <table border="1" cellpadding="8">
    <tr>
      <th>ID</th><th>Nama Produk</th><th>Kategori</th><th>Deskripsi</th><th>Harga</th><th>Gambar</th><th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['nama_produk'] ?></td>
      <td><?= $row['kategori'] ?></td>
      <td><?= $row['deskripsi'] ?></td>
      <td><?= $row['harga'] ?></td>
      <td><img src="upload/<?= $row['gambar'] ?>" width="80"></td>
      <td>
        <a href="edit_produk.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="hapus_produk.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>