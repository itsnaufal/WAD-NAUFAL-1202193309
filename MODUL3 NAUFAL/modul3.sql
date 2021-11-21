-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 05:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modul3`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_table`
--

CREATE TABLE `buku_table` (
  `id_buku` int(100) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `tahun_terbit` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `bahasa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku_table`
--

INSERT INTO `buku_table` (`id_buku`, `judul_buku`, `penulis_buku`, `tahun_terbit`, `deskripsi`, `gambar`, `tag`, `bahasa`) VALUES
(31, 'Tauhid dan Fisika', 'Naufal_1202193309', 2000, 'Buku ini berisi penjelasan tentang cara berbisnis kambing', '154messageImage_1637508334453.jpg', 'Pemograman,Website,', 'Indonesia'),
(32, 'Kupas Tuntas Beternak Kambing', 'Naufal_1202193309', 2001, 'Berisi tentang cara beternak kambing', '8914messageImage_1637507400208.jpg', 'Pemograman,Website,Java,', 'Indonesia'),
(33, 'Belajar Cepat Membaca Tanpa Mengeja', 'Naufal_1202193309', 20002, 'Cara membaca cepat!', '6309messageImage_1637507455801.jpg', 'Lainnya,', 'Indonesia'),
(34, 'Kalkulus', 'Naufal_1202193309', 2005, 'Berisi tentang perkalkulusan duniawi', '9989messageImage_1637508300602.jpg', 'Pemograman,Website,Java,OOP,MVC,Lainnya,', 'Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_table`
--
ALTER TABLE `buku_table`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_table`
--
ALTER TABLE `buku_table`
  MODIFY `id_buku` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
