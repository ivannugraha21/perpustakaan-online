-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 04:50 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE IF NOT EXISTS `data_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `jenis_buku` varchar(255) NOT NULL,
  `tanggal_input_buku` date NOT NULL,
  `sumber_buku` varchar(255) NOT NULL,
  `buku_lama` tinyint(1) NOT NULL,
  `rak_buku` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`id`, `judul_buku`, `penulis`, `tahun_terbit`, `penerbit`, `jenis_buku`, `tanggal_input_buku`, `sumber_buku`, `buku_lama`, `rak_buku`, `status`) VALUES
(2, 'Ada Lovelace', 'Ada Lovelace', '2021', 'Elex Media Computama', 'Dongeng', '2021-01-20', 'Koleksi', 0, 'Dongeng Anak', 1),
(4, 'asd', 'asdasd1', '2002', 'asdasdasd', 'Novel', '2006-07-05', 'asd', 1, 'Novel', 1),
(6, 'Buku 2 A', 'A', '2011', 'Buku  A', 'Novel', '2010-09-22', 'Pribadi', 1, 'Dongeng Anak', 1),
(7, 'Buku 3 A', 'A', '2011', 'Buku  A', 'Dongeng', '2010-11-18', 'Pribadi', 0, 'Dongeng Anak', 1),
(9, 'Buku 2 B', 'B', '2015', 'Buku B', 'Buku Ilmiah', '2015-09-16', 'Koleksi', 0, 'Umum', 1),
(10, 'Buku 3 B', 'B', '2014', 'Buku B', 'Novel', '2020-07-21', 'Koleksi', 1, 'Novel', 0),
(13, 'asd1', 'asd123', '1233', 'asd', 'Dongeng', '2006-07-25', 'asd', 1, 'Dongeng Anak', 0),
(14, 'CSS Tutorial', 'Entah', '2003', 'Entah Media Corp', 'Majalah', '0000-00-00', 'Google', 0, 'Umum', 1),
(15, 'JS Tutor', 'Ivan', '2005', 'Entah Media', 'Buku Ilmiah', '2015-08-11', 'Google', 1, 'Umum', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE IF NOT EXISTS `data_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `umur_peminjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `estimasi_pengembalian` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id`, `user_id`, `buku_id`, `nama_peminjam`, `umur_peminjam`, `tanggal_pinjam`, `estimasi_pengembalian`, `tanggal_kembali`) VALUES
(1, 12, 4, 'asdasd', 9, '2022-07-26', '2022-07-28', '2022-07-21'),
(2, 12, 10, 'Ivan', 25, '2022-07-27', '2022-07-30', NULL),
(3, 12, 6, 'Entah', 21, '2022-07-26', '2022-07-29', '2022-07-21'),
(4, 12, 13, 'Test', 40, '2022-09-15', '2022-09-29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_users`
--

CREATE TABLE IF NOT EXISTS `data_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `data_users`
--

INSERT INTO `data_users` (`id`, `nama`, `username`, `password`, `date_created`) VALUES
(12, 'Ivan', 'ivan@gmail.com', '$2y$10$ZE8M2O4K6Tt4Z5bYLIZzyenUjzBid3UqSgF/AaPIwvZoN9Wnfu7Yi', '0000-00-00'),
(13, 'Ivan Dwi', 'ivan.nugraha@gmail.com', '$2y$10$YdSyARDzZ/6zBHFCcIMT6OwvyKykzVbz8o6k9/FFXCnQEIn4fgEYy', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
