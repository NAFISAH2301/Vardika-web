<?php include "backend/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk | PT. Vardika Utama Indonesia</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-green-800 text-white px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-semibold">PT. Vardika Utama Indonesia</h1>
    <div class="space-x-4">
      <a href="index.html" class="hover:underline">Beranda</a>
      <a href="produk.php" class="underline font-bold">Produk</a>
      <a href="layanan.html" class="hover:underline">Layanan</a>
      <a href="tentang.html" class="hover:underline">Tentang</a>
      <a href="kontak.html" class="hover:underline">Kontak</a>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="text-center py-12 bg-green-700 text-white">
    <h2 class="text-3xl font-bold mb-2">Produk Kami</h2>
    <p class="text-lg">Briket, Kopi, Lada, dan Sparepart Listrik Berkualitas</p>
  </header>

  <!-- Produk Section -->
  <section class="container mx-auto px-6 py-12">
    <div class="grid md:grid-cols-3 gap-8">
      <?php
      $query = "SELECT * FROM produk";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-xl transition">
          <img src="backend/upload/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>" class="rounded-lg h-48 w-full object-cover">
          <h3 class="text-xl font-semibold mt-3"><?php echo $row['nama_produk']; ?></h3>
          <p class="text-sm text-gray-600"><?php echo $row['deskripsi']; ?></p>
          <p class="text-green-700 font-bold mt-2">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
        </div>
      <?php
      }
      ?>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-green-800 text-white text-center py-4">
    <p>&copy; <?php echo date("Y"); ?> PT. Vardika Utama Indonesia. Semua Hak Dilindungi.</p>
  </footer>

</body>
</html>