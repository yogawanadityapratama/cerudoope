<?php
include 'koneksi.php';

class Produk {
    private $conn;

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->conn;
    }

    public function createProduk($nama, $harga) {
        $query = "INSERT INTO tb_produk (nama, harga) VALUES ('$nama', '$harga')";
        return $this->conn->query($query);
    }

    public function getProduk() {
        $query = "SELECT * FROM tb_produk";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProdukById($id) {
        $query = "SELECT * FROM tb_produk WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function updateProduk($id, $nama, $harga) {
        $query = "UPDATE tb_produk SET nama='$nama', harga='$harga' WHERE id=$id";
        return $this->conn->query($query);
    }

    public function deleteProduk($id) {
        $query = "DELETE FROM tb_produk WHERE id=$id";
        return $this->conn->query($query);
    }
}
?>