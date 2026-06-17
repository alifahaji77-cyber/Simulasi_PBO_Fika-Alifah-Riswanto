<?php
// index.php

// 1. Import file koneksi dan semua subclass jalur pendaftaran
require_once 'koneksi.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// Membuat objek koneksi untuk mendapatkan properti database murni ($koneksi->db)
$koneksi = new Koneksi();
$db = $koneksi->db;
echo "<hr>"; // Pembatas setelah pesan sukses koneksi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pendaftaran Mahasiswa Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }
        h1 { text-align: center; color: #333; }
        h2 { color: #2c3e50; margin-top: 40px; border-bottom: 2px solid #2c3e50; padding-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .nominal { text-align: right; font-weight: bold; }
    </style>
</head>
<body>

    <h1>SISTEM INFORMASI PENDAFTARAN MAHASISWA BARU</h1>

    <h2>1. Daftar Calon Mahasiswa - Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Memanggil metode query spesifik dari Tahap 4 secara statis
            $dataReguler = PendaftaranReguler::getDaftarReguler($db);

            if ($dataReguler->num_rows > 0) {
                while ($row = $dataReguler->fetch_assoc()) {
                    // Instansiasi objek secara polimorfik menggunakan data dari database
                    $objReguler = new PendaftaranReguler(
                        $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'],
                        $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'],
                        $row['pilihan_prodi'], $row['lokasi_kampus']
                    );
                    ?>
                    <tr>
                        <td><?= $objReguler->getIdPendaftaran(); ?></td>
                        <td><?= $objReguler->getNamaCalon(); ?></td>
                        <td><?= $objReguler->getAsalSekolah(); ?></td>
                        <td><?= $objReguler->getNilaiUjian(); ?></td>
                        <td>
                            <?php $objReguler->tampilkanInfoJalur(); // Polimorfisme info unik ?>
                        </td>
                        <td>Rp <?= number_format($objReguler->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                        <td class="nominal">Rp <?= number_format($objReguler->hitungTotalBiaya(), 2, ',', '.'); // Polimorfisme kalkulasi biaya ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data jalur Reguler.</td></tr>";
            }
            ?>
        </tbody>
    </table>


    <h2>2. Daftar Calon Mahasiswa - Jalur Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);

            if ($dataPrestasi->num_rows > 0) {
                while ($row = $dataPrestasi->fetch_assoc()) {
                    $objPrestasi = new PendaftaranPrestasi(
                        $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'],
                        $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'],
                        $row['jenis_prestasi'], $row['tingkat_prestasi']
                    );
                    ?>
                    <tr>
                        <td><?= $objPrestasi->getIdPendaftaran(); ?></td>
                        <td><?= $objPrestasi->getNamaCalon(); ?></td>
                        <td><?= $objPrestasi->getAsalSekolah(); ?></td>
                        <td><?= $objPrestasi->getNilaiUjian(); ?></td>
                        <td>
                            <?php $objPrestasi->tampilkanInfoJalur(); ?>
                        </td>
                        <td>Rp <?= number_format($objPrestasi->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                        <td class="nominal" style="color: green;">Rp <?= number_format($objPrestasi->hitungTotalBiaya(), 2, ',', '.'); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data jalur Prestasi.</td></tr>";
            }
            ?>
        </tbody>
    </table>


    <h2>3. Daftar Calon Mahasiswa - Jalur Kedinasan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

            if ($dataKedinasan->num_rows > 0) {
                while ($row = $dataKedinasan->fetch_assoc()) {
                    $objKedinasan = new PendaftaranKedinasan(
                        $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'],
                        $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'],
                        $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                    );
                    ?>
                    <tr>
                        <td><?= $objKedinasan->getIdPendaftaran(); ?></td>
                        <td><?= $objKedinasan->getNamaCalon(); ?></td>
                        <td><?= $objKedinasan->getAsalSekolah(); ?></td>
                        <td><?= $objKedinasan->getNilaiUjian(); ?></td>
                        <td>
                            <?php $objKedinasan->tampilkanInfoJalur(); ?>
                        </td>
                        <td>Rp <?= number_format($objKedinasan->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                        <td class="nominal" style="color: red;">Rp <?= number_format($objKedinasan->hitungTotalBiaya(), 2, ',', '.'); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data jalur Kedinasan.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>