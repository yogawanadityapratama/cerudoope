<?php
include 'produk.php';

$produk = new Produk();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $produk->updateProduk($id, $nama, $harga);
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_produk = $produk->getProdukById($id);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cerudoope/styles/style.css">
    <title>Create, Read, Update and Delete</title>
</head>
<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="/cerudoope/index.html">Overview</a>
            </li>
            <li>
                <a href="/cerudoope/pages/01/index.html">Apa itu OOP?</a>
            </li>
            <li>
                <a href="/cerudoope/pages/02/index.html">Konsep dasar OOP</a>
            </li>
            <li>
                <a href="/cerudoope/pages/03/index.html">4 Pilar OOP</a>
            </li>
            <li>
                <a href="/cerudoope/pages/04/index.html">Jadi, php OOP itu apa sih?</a>
            </li>
            <li>
                <a href="/cerudoope/pages/05/index.html">Contoh webiste yang di develop menggunakan php OOP</a>
            </li>
            <li>
                <a class="active" href="/cerudoope/public/index.php">Bagaimana implementasi OOP dalam php?</a>
            </li>
        </ul>
    </nav>
    <form action="update.php" method="post">
        <h2>Edit Produk</h2>
        <input type="hidden" name="id" value="<?= $data_produk['id']; ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $data_produk['nama']; ?>" required>
        <br><br>
        <label>Harga:</label>
        <input type="text" name="harga" value="<?= $data_produk['harga']; ?>" required>
        <br><br>
        <button style="background-color: blue; color: white;" type="submit" name="update">Update</button>
        <a style="border: none; text-decoration: underline; color: blue;" href="/cerudoope/public/index.php">Create</a>
    </form>
</body>
</html>