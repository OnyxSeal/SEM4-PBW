-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `begalsepeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` int(11) NOT NULL,
  `mahasiswa_npm` char(13) DEFAULT NULL,
  `matakuliah_kodemk` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `mahasiswa_npm`, `matakuliah_kodemk`) VALUES
(3, '2210631170136', '003'),
(4, '2210631170137', '004'),
(5, '2210631170138', '005'),
(6, '2210631170139', '006'),
(7, '2210631170140', '005'),
(8, '2210631170141', '006'),
(9, '2210631170142', '009'),
(10, '2210631170143', '008'),
(11, '2210631170144', '007'),
(12, '2210631170145', '009'),
(13, '2210631170133', '002'),
(14, '2210631170134', '003'),
(16, '2210631170135', '003');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` char(13) NOT NULL,
  `namaM` varchar(50) NOT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `namaM`, `jurusan`, `alamat`) VALUES
('2210631170133', 'Kamen Rider', 'Teknik Informatika', 'Karedok leunca'),
('2210631170134', 'Ahmad Syarifudin', 'Teknik Informatika', 'Karedok leunca'),
('2210631170135', 'Yuji Itadorii', 'Sistem Informasi', 'Jl. Shibuya Blok CF No. 8'),
('2210631170136', 'Budi Santoso', 'Teknik Informatika', 'Kerajaan simamaung, blok A No. 69'),
('2210631170137', 'Citra Kirana', 'Sistem Informasi', 'Kota tanah ujung berung, pinggir alfamart amegakure'),
('2210631170138', 'Dewi Ayu', 'Sistem Informasi', 'Uranus, Jl. Jend. Starlord No.78'),
('2210631170139', 'Eko Sulistyo', 'Sistem Informasi', 'San Andreas, Groove Street No. 82'),
('2210631170140', 'Fajar Nugraha', 'Teknik Informatika', 'Elmanuk, es amigos gunadir ohoho'),
('2210631170141', 'Gina Melati', 'Sistem Informasi', '192.1.2.3'),
('2210631170142', 'Hari Subagja', 'Teknik Informatika', 'Jl. Cindayeuh, Rt 08 Rw 067 No. 32'),
('2210631170143', 'Intan Permata', 'Sistem Informasi', 'Badarawuhi Residence, Belok kanan deket Haji Sholeh'),
('2210631170144', 'Joko Tingkir', 'Sistem Informasi', 'Jalan Jalan No. 45'),
('2210631170145', 'Raival Ganteng', 'Teknik Informatika', 'Jalan Uranus Jupiter Galaxy Exynos');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kodemk` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_sks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kodemk`, `nama`, `jumlah_sks`) VALUES
('001', 'Basis Data', 3),
('002', 'Pemrograman Berbasis Web', 3),
('003', 'Sistem Operasi', 3),
('004', 'Analisis Desain dan Algoritma', 3),
('005', 'Embedded Intelligent System', 3),
('006', 'Statistika dan Probabilitas', 3),
('007', 'Rekayasa Perangkat Lunak', 3),
('008', 'Artificial Intelligence', 3),
('009', 'Web Development', 3),
('010', 'Software Engineer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_npm` (`mahasiswa_npm`),
  ADD KEY `matakuliah_kodemk` (`matakuliah_kodemk`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kodemk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
