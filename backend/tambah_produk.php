<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "upload/" . $gambar);

    $sql = "INSERT INTO produk (nama_produk, kategori, deskripsi, harga, gambar)
            VALUES ('$nama', '$kategori', '$deskripsi', '$harga', '$gambar')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Produk berhasil ditambahkan!'); window.location='tampil_produk.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>