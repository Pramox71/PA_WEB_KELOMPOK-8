-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 03:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_travel`
--

CREATE TABLE `akun_travel` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Jenis_akun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_travel`
--

INSERT INTO `akun_travel` (`ID`, `username`, `email`, `password`, `Jenis_akun`) VALUES
(4, 'ADMIN', 'admin@gmail.com', '$2y$10$oBmnVTl1A1lliFz.ZPXtBuYo5DbucKLshdK0ncnLKn5coFcb1J5W2', 'ADMIN'),
(15, 'user', 'user@gmail.com', '$2y$10$YpFw16UsaawfrgrBUVLSEev8fbcWXzhr06aLwimS9GmKLIcg/QMKm', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `ID_User` int(11) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Umur` int(3) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `No_Hp` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`ID_User`, `Nama`, `Umur`, `Alamat`, `No_Hp`) VALUES
(15, 'Nusantara', 100, 'Disini', 81210938);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `ID_Bus` int(11) NOT NULL,
  `Nama_Bus` varchar(30) NOT NULL,
  `Daerah_Terminal` varchar(30) NOT NULL,
  `Tujuan` varchar(30) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`ID_Bus`, `Nama_Bus`, `Daerah_Terminal`, `Tujuan`, `Harga`, `Gambar`) VALUES
(5, 'Bus Telolet', 'Samarinda', 'Tanah Grogot', 80000, 'Bus Telolet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `ID_Hotel` int(11) NOT NULL,
  `Nama_Hotel` varchar(30) NOT NULL,
  `Alamat_Hotel` varchar(30) NOT NULL,
  `Daerah_Hotel` varchar(15) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`ID_Hotel`, `Nama_Hotel`, `Alamat_Hotel`, `Daerah_Hotel`, `Harga`, `Gambar`) VALUES
(8, 'Hotel Biawan', 'Jl. Paser', 'Samarinda', 120000, 'Hotel Biawan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` int(30) NOT NULL,
  `ID_User` int(30) NOT NULL,
  `ID_Hotel` int(30) DEFAULT NULL,
  `ID_Bus` int(30) DEFAULT NULL,
  `Biaya` int(11) DEFAULT NULL,
  `Status_Pesan` varchar(25) DEFAULT NULL,
  `Waktu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Transaksi`, `ID_User`, `ID_Hotel`, `ID_Bus`, `Biaya`, `Status_Pesan`, `Waktu`) VALUES
(7, 15, 0, 5, 80000, 'Lunas', 'Monday 14-11-22 - 22:14:39'),
(8, 15, 8, 0, 120000, 'Belum Lunas', 'Monday 14-11-22 - 22:14:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_travel`
--
ALTER TABLE `akun_travel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`ID_Bus`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID_Hotel`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`),
  ADD KEY `ID_User` (`ID_User`),
  ADD KEY `ID_Hotel` (`ID_Hotel`,`ID_Bus`),
  ADD KEY `ID_Bus` (`ID_Bus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_travel`
--
ALTER TABLE `akun_travel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `ID_Bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ID_Hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Transaksi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `akun_travel` (`ID`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `biodata` (`ID_User`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_Hotel`) REFERENCES `hotel` (`ID_Hotel`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`ID_Bus`) REFERENCES `bus` (`ID_Bus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
