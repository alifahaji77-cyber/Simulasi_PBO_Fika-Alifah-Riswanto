<?php
// Pendaftaran.php

abstract class Pendaftaran {
    // Properti Terenkapsulasi (Protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor untuk memetakan nilai dari kolom tabel database
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // Getter (Opsional, berguna untuk mengambil nilai properti di luar kelas jika diperlukan)
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }

    // =========================================================================
    // 4. Metode Abstrak (Wajib di-override oleh kelas anak)
    // =========================================================================
    
    /**
     * Menghitung total biaya pendaftaran berdasarkan formula spesifik tiap jalur.
     * @return float
     */
    abstract public function hitungTotalBiaya();

    /**
     * Menampilkan informasi spesifik mengenai jalur pendaftaran yang dipilih.
     * @return void
     */
    abstract public function tampilkanInfoJalur();
}
?>