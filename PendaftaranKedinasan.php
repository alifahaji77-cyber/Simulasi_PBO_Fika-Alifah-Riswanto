<?php
// PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor untuk kelas anak
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $skIkatanDinas, $instansiSponsor) {
        // Memanggil constructor dari kelas induk (Pendaftaran)
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Mengimplementasikan metode abstrak hitungTotalBiaya
    public function hitungTotalBiaya() {
    // Dikenakan surcharge administrasi khusus sebesar 25% dari biaya dasar
    return $this->biayaPendaftaranDasar * 1.25;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoJalur
    public function tampilkanInfoJalur() {
        echo "Jalur Pendaftaran: Kedinasan<br>";
        echo "SK Ikatan Dinas: " . $this->skIkatanDinas . "<br>";
        echo "Instansi Sponsor: " . $this->instansiSponsor . "<br>";
    }

    // Metode Query Spesifik menggunakan OOP MySQLi
    public static function getDaftarKedinasan($dbConnection) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
                  
        $result = $dbConnection->query($query);
        return $result;
    }
}
?>