<?php
include 'koneksi.php';

// Membuat Kelas
class Produk {

    // Properti Private
    private $conn;

    // Membuat konstruktor
    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->conn;
    }

    // Method
    public function createProduk($nama, $harga) {
        $query = "INSERT INTO tb_produk (nama, harga) VALUES ('$nama', '$harga')";
        return $this->conn->query($query);
    }

    // Method
    public function getProduk() {
        $query = "SELECT * FROM tb_produk";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Method
    public function getProdukById($id) {
        $query = "SELECT * FROM tb_produk WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    // Method
    public function updateProduk($id, $nama, $harga) {
        $query = "UPDATE tb_produk SET nama='$nama', harga='$harga' WHERE id=$id";
        return $this->conn->query($query);
    }

    // Method
    public function deleteProduk($id) {
        $query = "DELETE FROM tb_produk WHERE id=$id";
        return $this->conn->query($query);
    }
}
?>