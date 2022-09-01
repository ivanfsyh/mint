-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 03:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mint2`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `id_basis_pengetahuan` int(255) NOT NULL,
  `id_penyakit` int(255) NOT NULL,
  `id_gejala` int(255) NOT NULL,
  `id_nilai_cf` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`id_basis_pengetahuan`, `id_penyakit`, `id_gejala`, `id_nilai_cf`) VALUES
(3, 1, 1, 5),
(5, 1, 5, 2),
(6, 10, 1, 2),
(8, 10, 4, 5),
(9, 10, 5, 4),
(10, 11, 1, 2),
(12, 11, 5, 2),
(13, 11, 6, 5),
(14, 12, 7, 6),
(15, 13, 1, 2),
(17, 13, 5, 4),
(18, 13, 8, 5),
(19, 6, 9, 6),
(20, 1, 10, 4),
(21, 10, 10, 2),
(22, 11, 10, 4),
(23, 13, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(255) NOT NULL,
  `kode_gejala` varchar(100) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `saran_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`, `saran_gejala`) VALUES
(1, 'G001', 'Batang bintik-bintik kuning', 'as'),
(4, 'G003', 'Daun rontok', 'as'),
(5, 'G004', 'Batang bintik-bintik coklat', 'a'),
(6, 'G005', 'Batang berjamur', 'a'),
(7, 'G006', 'Akar membusuk', 'a'),
(8, 'G007', 'Daun berlubang', 'a'),
(9, 'G008', 'Daun memutih', 'a'),
(10, 'G002', 'Daun menguning', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `nama_tanaman` varchar(100) NOT NULL,
  `tgl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_user`, `nama_tanaman`, `tgl`) VALUES
(1, 1, 'Mint 1', '12 April 2021'),
(4, 2, 'Mint coba1', '26 August 2021'),
(5, 1, 'Mint 2', '22 July 2021'),
(6, 1, 'Mint 3', '20 September 2021');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_nutrisi`
--

CREATE TABLE `konsultasi_nutrisi` (
  `id_kn` int(255) NOT NULL,
  `id_jadwal` int(255) NOT NULL,
  `id_nutrisi` int(255) NOT NULL,
  `pekan` int(10) NOT NULL,
  `ke` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsultasi_nutrisi`
--

INSERT INTO `konsultasi_nutrisi` (`id_kn`, `id_jadwal`, `id_nutrisi`, `pekan`, `ke`) VALUES
(1, 1, 1, 2, 1),
(2, 1, 3, 2, 1),
(3, 1, 5, 2, 1),
(7, 1, 2, 4, 1),
(8, 1, 10, 4, 1),
(9, 1, 11, 4, 1),
(13, 1, 1, 6, 1),
(14, 1, 15, 6, 1),
(15, 1, 17, 6, 1),
(43, 1, 1, 2, 2),
(44, 1, 3, 2, 2),
(45, 1, 5, 2, 2),
(46, 1, 2, 2, 3),
(47, 1, 4, 2, 3),
(48, 1, 6, 2, 3),
(52, 1, 2, 6, 2),
(53, 1, 16, 6, 2),
(54, 1, 18, 6, 2),
(55, 1, 1, 4, 2),
(56, 1, 9, 4, 2),
(57, 1, 11, 4, 2),
(58, 1, 2, 4, 3),
(59, 1, 10, 4, 3),
(60, 1, 12, 4, 3),
(61, 1, 1, 4, 4),
(62, 1, 9, 4, 4),
(63, 1, 11, 4, 4),
(64, 1, 2, 4, 5),
(65, 1, 9, 4, 5),
(66, 1, 11, 4, 5),
(67, 1, 2, 4, 6),
(68, 1, 10, 4, 6),
(69, 1, 12, 4, 6),
(70, 5, 1, 2, 1),
(71, 5, 3, 2, 1),
(72, 5, 5, 2, 1),
(73, 5, 2, 2, 2),
(74, 5, 4, 2, 2),
(75, 5, 6, 2, 2),
(76, 6, 1, 2, 1),
(77, 6, 3, 2, 1),
(78, 6, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_penyakit`
--

CREATE TABLE `konsultasi_penyakit` (
  `id_kp` int(255) NOT NULL,
  `id_jadwal` int(255) NOT NULL,
  `id_penyakit` int(255) NOT NULL,
  `id_gejala` int(255) NOT NULL,
  `id_nilai_cf` int(255) NOT NULL,
  `perkalian` double NOT NULL,
  `hasil` double NOT NULL,
  `pekan` int(50) NOT NULL,
  `ke` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsultasi_penyakit`
--

INSERT INTO `konsultasi_penyakit` (`id_kp`, `id_jadwal`, `id_penyakit`, `id_gejala`, `id_nilai_cf`, `perkalian`, `hasil`, `pekan`, `ke`) VALUES
(1, 1, 1, 10, 3, 0.24, 0.49, 2, 1),
(2, 1, 10, 10, 3, 0.08, 0.73, 2, 1),
(3, 1, 11, 10, 3, 0.24, 0.93, 2, 1),
(4, 1, 13, 10, 3, 0.08, 0.68, 2, 1),
(5, 1, 12, 7, 6, 1, 0.96, 2, 1),
(6, 1, 1, 1, 2, 0.16, 0.49, 4, 1),
(7, 1, 10, 1, 2, 0.04, 0.73, 4, 1),
(8, 1, 11, 1, 2, 0.04, 0.93, 4, 1),
(9, 1, 13, 1, 2, 0.04, 0.68, 4, 1),
(10, 1, 1, 10, 3, 0.24, 0.49, 4, 1),
(11, 1, 10, 10, 3, 0.08, 0.73, 4, 1),
(12, 1, 11, 10, 3, 0.24, 0.93, 4, 1),
(13, 1, 13, 10, 3, 0.08, 0.68, 4, 1),
(14, 1, 10, 4, 3, 0.32, 0.73, 4, 1),
(15, 1, 1, 5, 2, 0.04, 0.49, 4, 1),
(16, 1, 10, 5, 2, 0.12, 0.73, 4, 1),
(17, 1, 11, 5, 2, 0.04, 0.93, 4, 1),
(18, 1, 13, 5, 2, 0.12, 0.68, 4, 1),
(19, 1, 11, 6, 4, 0.48, 0.93, 4, 1),
(20, 1, 12, 7, 5, 0.8, 0.96, 4, 1),
(21, 1, 13, 8, 4, 0.48, 0.68, 4, 1),
(22, 1, 6, 9, 5, 0.8, 0.88, 4, 1),
(33, 1, 1, 1, 4, 0.48, 0.49, 6, 1),
(34, 1, 10, 1, 4, 0.12, 0.73, 6, 1),
(35, 1, 11, 1, 4, 0.12, 0.93, 6, 1),
(36, 1, 13, 1, 4, 0.12, 0.68, 6, 1),
(37, 1, 13, 8, 3, 0.32, 0.68, 6, 1),
(109, 1, 12, 7, 2, 0.2, 0.96, 2, 2),
(110, 1, 6, 9, 3, 0.4, 0.88, 2, 3),
(112, 1, 11, 6, 6, 0.8, 0.93, 6, 2),
(113, 1, 12, 7, 5, 0.8, 0.96, 4, 2),
(114, 1, 1, 1, 2, 0.16, 0.49, 4, 3),
(115, 1, 10, 1, 2, 0.04, 0.73, 4, 3),
(116, 1, 11, 1, 2, 0.04, 0.93, 4, 3),
(117, 1, 13, 1, 2, 0.04, 0.68, 4, 3),
(118, 1, 10, 4, 4, 0.48, 0.73, 4, 4),
(119, 1, 11, 6, 6, 0.8, 0.93, 4, 5),
(120, 1, 13, 8, 2, 0.16, 0.68, 4, 6),
(121, 1, 6, 9, 3, 0.4, 0.88, 4, 6),
(122, 5, 1, 1, 3, 0.32, 0.4, 2, 1),
(123, 5, 10, 1, 3, 0.08, 0.41, 2, 1),
(124, 5, 11, 1, 3, 0.08, 0.19, 2, 1),
(125, 5, 13, 1, 3, 0.08, 0.41, 2, 1),
(126, 5, 1, 5, 4, 0.12, 0.4, 2, 1),
(127, 5, 10, 5, 4, 0.36, 0.41, 2, 1),
(128, 5, 11, 5, 4, 0.12, 0.19, 2, 1),
(129, 5, 13, 5, 4, 0.36, 0.41, 2, 1),
(130, 5, 12, 7, 5, 0.8, 0.8, 2, 2),
(131, 6, 1, 1, 3, 0.32, 0.32, 2, 1),
(132, 6, 10, 1, 3, 0.08, 0.08, 2, 1),
(133, 6, 11, 1, 3, 0.08, 0.08, 2, 1),
(134, 6, 13, 1, 3, 0.08, 0.08, 2, 1),
(135, 6, 6, 9, 2, 0.2, 0.2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_cf`
--

CREATE TABLE `nilai_cf` (
  `id_nilai_cf` int(255) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_cf`
--

INSERT INTO `nilai_cf` (`id_nilai_cf`, `nilai`, `keterangan`) VALUES
(2, '0.2', 'Tidak tahu'),
(3, '0.4', 'Mungkin'),
(4, '0.6', 'Cukup yakin'),
(5, '0.8', 'Yakin'),
(6, '1', 'Sangat yakin');

-- --------------------------------------------------------

--
-- Table structure for table `nutrisi`
--

CREATE TABLE `nutrisi` (
  `id_nutrisi` int(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `minggu` int(10) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutrisi`
--

INSERT INTO `nutrisi` (`id_nutrisi`, `pertanyaan`, `minggu`, `kondisi`, `keterangan`) VALUES
(1, 'Apakah daun warna hijau?', 2, 'YA', 'good s'),
(2, 'Apakah daun warna hijau?', 2, 'TIDAK', 'bad'),
(3, 'Apakah jumlah daun/tunas 2 pasang?', 2, 'YA', 'good'),
(4, 'Apakah jumlah daun/tunas 2 pasang?', 2, 'TIDAK', 'bad'),
(5, 'Apakah panjang batang 6 cm?', 2, 'YA', 'good'),
(6, 'Apakah panjang batang 6 cm?', 2, 'TIDAK', 'bad'),
(7, 'Apakah daun warna hijau?', 4, 'YA', 'good'),
(8, 'Apakah daun warna hijau?', 4, 'TIDAK', 'bad'),
(9, 'Apakah jumlah daun/tunas 4 pasang?', 4, 'YA', 'good'),
(10, 'Apakah jumlah daun/tunas 4 pasang?', 4, 'TIDAK', 'bad'),
(11, 'Apakah panjang batang 12 cm?', 4, 'YA', 'good'),
(12, 'Apakah panjang batang 12 cm?', 4, 'TIDAK', 'bad'),
(13, 'Apakah daun warna hijau?', 6, 'YA', 'good'),
(14, 'Apakah daun warna hijau?', 6, 'TIDAK', 'bad'),
(15, 'Apakah jumlah daun/tunas 6 pasang?', 6, 'YA', 'good'),
(16, 'Apakah jumlah daun/tunas 6 pasang?', 6, 'TIDAK', 'bad'),
(17, 'Apakah panjang batang 18 cm?', 6, 'YA', 'good'),
(18, 'Apakah panjang batang 18 cm?', 6, 'TIDAK', 'bad');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(255) NOT NULL,
  `kode_penyakit` varchar(100) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `info_penyakit` varchar(255) NOT NULL,
  `saran_penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `info_penyakit`, `saran_penyakit`) VALUES
(1, 'P001', 'Karat Mint', 'add', 'a'),
(6, 'P002', 'Jamur', 'ds', 'sds'),
(10, 'P003', 'Septoria mint', 'a', 'a'),
(11, 'P004', 'Verticillium', 'a', 'a'),
(12, 'P005', 'Rhizoctonia', 'a', 'a'),
(13, 'P006', 'Antraknosa', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`) VALUES
(1, 'dian', 'admin@gmail.com', '$2y$10$eAK1cdlXkSSHe/CIKo3QGexR6LKDzdufNNGPkn93iqcojsN925S3y', 'user'),
(2, 'user', 'asd@gmail.com', '$2y$10$YL10QIrJA92Ob1t60dw/4uwFtdwtgw5odo4Jl/mMSPPKqcmSeQoee', 'user'),
(3, 'pakar', 'pakar@gmail.com', '$2y$10$GEmOg3Crnd8BDnEj1uB1besx/6jLLCP0HlXELYM2A.Hv/rY91Rj5W', 'pakar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`id_basis_pengetahuan`),
  ADD KEY `relasi_penyakit` (`id_penyakit`),
  ADD KEY `relasi_gejala` (`id_gejala`),
  ADD KEY `relasi_nilai_cf` (`id_nilai_cf`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `relasi_user` (`id_user`);

--
-- Indexes for table `konsultasi_nutrisi`
--
ALTER TABLE `konsultasi_nutrisi`
  ADD PRIMARY KEY (`id_kn`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_nutrisi` (`id_nutrisi`);

--
-- Indexes for table `konsultasi_penyakit`
--
ALTER TABLE `konsultasi_penyakit`
  ADD PRIMARY KEY (`id_kp`),
  ADD KEY `relasi_jadwal` (`id_jadwal`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_nilai_cf` (`id_nilai_cf`);

--
-- Indexes for table `nilai_cf`
--
ALTER TABLE `nilai_cf`
  ADD PRIMARY KEY (`id_nilai_cf`);

--
-- Indexes for table `nutrisi`
--
ALTER TABLE `nutrisi`
  ADD PRIMARY KEY (`id_nutrisi`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `id_basis_pengetahuan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konsultasi_nutrisi`
--
ALTER TABLE `konsultasi_nutrisi`
  MODIFY `id_kn` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `konsultasi_penyakit`
--
ALTER TABLE `konsultasi_penyakit`
  MODIFY `id_kp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `nilai_cf`
--
ALTER TABLE `nilai_cf`
  MODIFY `id_nilai_cf` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nutrisi`
--
ALTER TABLE `nutrisi`
  MODIFY `id_nutrisi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD CONSTRAINT `relasi_gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_nilai_cf` FOREIGN KEY (`id_nilai_cf`) REFERENCES `nilai_cf` (`id_nilai_cf`),
  ADD CONSTRAINT `relasi_penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `relasi_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konsultasi_nutrisi`
--
ALTER TABLE `konsultasi_nutrisi`
  ADD CONSTRAINT `konsultasi_nutrisi_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasi_nutrisi_ibfk_2` FOREIGN KEY (`id_nutrisi`) REFERENCES `nutrisi` (`id_nutrisi`);

--
-- Constraints for table `konsultasi_penyakit`
--
ALTER TABLE `konsultasi_penyakit`
  ADD CONSTRAINT `konsultasi_penyakit_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasi_penyakit_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `konsultasi_penyakit_ibfk_3` FOREIGN KEY (`id_nilai_cf`) REFERENCES `nilai_cf` (`id_nilai_cf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
