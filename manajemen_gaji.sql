-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 07:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$2PS1o.NJd3vdOsl8O3jE6uPnQnqdjpqpDRydyvHmMh7skZrAmIi1C');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Founder'),
(2, 'Chief Executive Officer'),
(3, 'Chief Technology Officer'),
(4, 'Chief Operational Officer'),
(5, 'Chief Finance Officer'),
(6, 'Frontend Programmer'),
(7, 'Backend Programmer'),
(8, 'Business Analyst'),
(9, 'Technical Project Manager'),
(10, 'Fullstack Programmer');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_jabatan`, `nik`, `nama_karyawan`, `jenis_kelamin`, `alamat`, `tanggal_lahir`) VALUES
(1, 7, '3305847586732229', 'Ikhsan Kurniawan', 'laki-laki', 'Kebumen', '2003-05-11'),
(2, 5, '3304758695867112', 'Rian Kusdiono', 'laki-laki', 'Sokaraja', '2002-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `master_gaji_pokok`
--

CREATE TABLE `master_gaji_pokok` (
  `id_master` int(11) NOT NULL,
  `nama_master` varchar(200) NOT NULL,
  `gaji_master` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_gaji_pokok`
--

INSERT INTO `master_gaji_pokok` (`id_master`, `nama_master`, `gaji_master`) VALUES
(6, 'Master Gaji Backend Programmer', 5000000),
(7, 'Master Gaji Fullstrack Programmer', 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_gaji`
--

CREATE TABLE `transaksi_gaji` (
  `id_transaksi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `waktu_gaji` varchar(200) NOT NULL,
  `bonus_gaji` int(11) NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_gaji`
--

INSERT INTO `transaksi_gaji` (`id_transaksi`, `id_karyawan`, `id_master`, `waktu_gaji`, `bonus_gaji`, `nominal_gaji`, `keterangan`) VALUES
(14, 1, 6, '2022-11', 1000000, 5000000, 'Gaji bulan november 2022'),
(15, 1, 6, '2022-12', 1500000, 5000000, 'Gaji bulan desember 2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `master_gaji_pokok`
--
ALTER TABLE `master_gaji_pokok`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_karyawan` (`id_karyawan`,`id_master`),
  ADD KEY `id_master` (`id_master`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_gaji_pokok`
--
ALTER TABLE `master_gaji_pokok`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  ADD CONSTRAINT `transaksi_gaji_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_gaji_ibfk_2` FOREIGN KEY (`id_master`) REFERENCES `master_gaji_pokok` (`id_master`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
