<?php
// PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor untuk kelas anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenisPrestasi, $tingkatPrestasi) {
        // Memanggil constructor dari kelas induk (Pendaftaran)
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Mengimplementasikan metode abstrak hitungTotalBiaya
    public function hitungTotalBiaya() {
        // Misalkan jalur prestasi mendapatkan potongan biaya pendaftaran sebesar 50.000
        $potongan = 50000;
        return $this->biayaPendaftaranDasar - $potongan;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoJalur
    public function tampilkanInfoJalur() {
        echo "Jalur Pendaftaran: Prestasi<br>";
        echo "Jenis Prestasi: " . $this->jenisPrestasi . "<br>";
        echo "Tingkat Prestasi: " . $this->tingkatPrestasi . "<br>";
    }

    // Metode Query Spesifik menggunakan OOP MySQLi
    public static function getDaftarPrestasi($dbConnection) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
                  
        $result = $dbConnection->query($query);
        return $result;
    }
}
?>