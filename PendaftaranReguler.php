<?php
// PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor untuk kelas anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $pilihanProdi, $lokasiKampus) {
        // Memanggil constructor dari kelas induk (Pendaftaran)
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Mengimplementasikan metode abstrak hitungTotalBiaya
    public function hitungTotalBiaya() {
        // Misalkan jalur reguler tidak ada biaya tambahan, total biaya = biaya dasar
        return $this->biayaPendaftaranDasar;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoJalur
    public function tampilkanInfoJalur() {
        echo "Jalur Pendaftaran: Reguler<br>";
        echo "Pilihan Prodi: " . $this->pilihanProdi . "<br>";
        echo "Lokasi Kampus: " . $this->lokasiKampus . "<br>";
    }

    // Metode Query Spesifik menggunakan OOP MySQLi (berdasarkan file koneksi.php sebelumnya)
    public static function getDaftarReguler($dbConnection) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
        
        $result = $dbConnection->query($query);
        return $result;
    }
}
?>