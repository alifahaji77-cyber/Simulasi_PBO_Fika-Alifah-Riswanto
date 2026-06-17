-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 02:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1c_fikaalifahriswanto`
--

-- ------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Aditya Pratama', 'SMAN 1 Jakarta', '85.50', '250000.00', 'Reguler', 'TRPL', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Bagus Setiawan', 'SMKN 2 Bandung', '82.00', '250000.00', 'Reguler', 'Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMAN 3 Yogyakarta', '88.25', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Barat', NULL, NULL, NULL, NULL),
(4, 'Dina Mariana', 'SMAN 1 Surabaya', '79.00', '250000.00', 'Reguler', 'TRPL', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMKN 1 Semarang', '84.75', '250000.00', 'Reguler', 'Informatika', 'Kampus Barat', NULL, NULL, NULL, NULL),
(6, 'Fajar Nugroho', 'SMAN 5 Malang', '81.50', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 2 Surakarta', '86.00', '250000.00', 'Reguler', 'TRPL', 'Kampus Barat', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 1 Medan', '90.00', '150000.00', 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Cahyani', 'SMAN 8 Jakarta', '92.50', '150000.00', 'Prestasi', NULL, NULL, 'Futsal', 'Provinsi', NULL, NULL),
(10, 'Joko Susilo', 'SMKN 4 Bandung', '89.00', '150000.00', 'Prestasi', NULL, NULL, 'LKS Web Technologies', 'Nasional', NULL, NULL),
(11, 'Kartika Sari', 'SMAN 1 Denpasar', '91.25', '150000.00', 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Internasional', NULL, NULL),
(12, 'Laksana Tri', 'SMAN 3 Semarang', '87.50', '150000.00', 'Prestasi', NULL, NULL, 'Pebalap Sepeda', 'Provinsi', NULL, NULL),
(13, 'Mega Utami', 'SMAN 2 Padang', '93.00', '150000.00', 'Prestasi', NULL, NULL, 'Olimpiade Fisika', 'Nasional', NULL, NULL),
(14, 'Naufal Abdi', 'SMKN 1 Balikpapan', '88.80', '150000.00', 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Regional', NULL, NULL),
(15, 'Oki Setiawan', 'SMAN 1 Makassar', '83.40', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-990/KD/2026', 'Kementerian Perhubungan'),
(16, 'Putri Rahayu', 'SMAN 7 Yogyakarta', '85.20', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-112/KD/2026', 'Badan Siber dan Sandi Negara'),
(17, 'Qomaruddin', 'SMKN 1 Palembang', '81.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-405/KD/2026', 'Kementerian Kominfo'),
(18, 'Rina Marlina', 'SMAN 1 Pontianak', '86.70', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-204/KD/2026', 'Pemerintah Provinsi Jateng'),
(19, 'Sultan Bahtiar', 'SMAN 3 Kota Bekasi', '84.10', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-771/KD/2026', 'Kementerian Keuangan'),
(20, 'Tari Handayani', 'SMKN 2 Surabaya', '87.90', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-883/KD/2026', 'Kementerian Perindustrian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
