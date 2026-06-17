<?php
// koneksi.php

class Koneksi {
    private $host = "localhost";
    private $username = "root"; // Sesuaikan dengan username MySQL Anda
    private $password = "";     // Sesuaikan dengan password MySQL Anda
    private $database = "db_simulasi_pbo_ti1c_fikaalifahriswanto";
    public $db;

    // Constructor otomatis berjalan saat objek dibuat
    public function __construct() {
        // Menginisialisasi koneksi menggunakan OOP basis MySQLi
        $this->db = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Memeriksa apakah koneksi gagal
        if ($this->db->connect_error) {
            die("Koneksi ke basis data gagal: " . $this->db->connect_error);
        } else {
            // Menampilkan pesan sukses jika berhasil terhubung
            echo "Koneksi berhasil! Sukses terhubung ke basis data: " . $this->database;
        }
    }
}

$koneksibaru = new Koneksi();
?>