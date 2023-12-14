<?php
include 'produk.php';

$produk = new Produk();

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $produk->createProduk($nama, $harga);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $produk->updateProduk($id, $nama, $harga);
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $produk->deleteProduk($id);
}

$data_produk = $produk->getProduk();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/pehapeoope/styles/style.css">
    <title>Create, Read, Update and Delete</title>
</head>
<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="/pehapeoope/index.html">Overview</a>
            </li>
            <li>
                <a href="/pehapeoope/pages/01/index.html">Apa itu PHP OOP?</a>
            </li>
            <li>
                <a href="/pehapeoope/pages/02/index.html">Konsep dasar OOP</a>
            </li>
            <li>
                <a href="/pehapeoope/pages/03/index.html">4 Pilar OOP</a>
            </li>
            <li>
                <a href="/pehapeoope/pages/04/index.html">Contoh webiste yang di develop menggunakan php OOP</a>
            </li>
            <li>
                <a class="active" href="/pehapeoope/public/index.php">Bagaimana Implementasi OOP pada bahasa pemrograman PHP?</a>
            </li>
            <li>
                <a href="/pehapeoope/pages/05/index.html">Terima kasih, ada pertanyaan?</a>
            </li>
        </ul>
    </nav>
    <h1 style="margin-left: 16px;">CRUD dengan PHP OOP</h1>
    <div class="container">
        <?php foreach ($data_produk as $produk) : ?>
        <div class="card">
            <h1><?= $produk['nama']; ?></h1>
            <p>Rp. <?= $produk['harga']; ?></p>
            <div class="button">
                <a style="background-color: blue; color: white;" href="update.php?id=<?= $produk['id']; ?>">Edit</a>
                <a style="background-color: red; color: white;" href="?hapus=<?= $produk['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <form action="index.php" method="post">
        <h2>Tambah Produk</h2>
        <label>Nama:</label>
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <br><br>
        <label>Harga:</label>
        <input type="text" name="harga" placeholder="Harga Produk" required>
        <br><br>
        <button style="background-color: blue; color: white;" type="submit" name="tambah">Tambah</button>
    </form>
</body>
</html>