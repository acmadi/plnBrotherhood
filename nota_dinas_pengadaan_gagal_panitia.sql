-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2013 at 07:48 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipengadaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pengadaan_gagal_panitia`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pengadaan_gagal_panitia` (
  `id_dokumen` bigint(255) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_pengadaan_gagal_panitia`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `nota_dinas_pengadaan_gagal_panitia`
--
ALTER TABLE `nota_dinas_pengadaan_gagal_panitia`
  ADD CONSTRAINT `nota_dinas_pengadaan_gagal_panitia_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;
