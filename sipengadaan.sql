-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2013 at 02:17 PM
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
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `username` varchar(20) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `kode_panitia` varchar(10) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `NIP` (`NIP`,`email`),
  KEY `kode_panitia` (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`username`, `NIP`, `email`, `kode_panitia`) VALUES
('gilanglaksana', '123456786', 'gilang@gmail.com', 'A'),
('haniferidaputra', '123456788', 'he.23292@gmail.com', 'A'),
('irvanaditya', '123456785', 'irvan@gmail.com', 'B'),
('johannesridho', '123456787', 'johan@gmail.com', 'B'),
('kevinindra', '123456784', 'kevin@gmail.com', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_evaluasi_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_evaluasi_penawaran` (
  `id_dokumen` varchar(20) NOT NULL,
  `no_RKS` varchar(20) NOT NULL,
  `kode_panitia` varchar(10) NOT NULL,
  `nama_pengadaan` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `hari/tanggal` date NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `no_RKS` (`no_RKS`),
  KEY `nama_pengadaan` (`nama_pengadaan`),
  KEY `kode_panitia` (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_evaluasi_penawaran`
--

INSERT INTO `berita_acara_evaluasi_penawaran` (`id_dokumen`, `no_RKS`, `kode_panitia`, `nama_pengadaan`, `nomor`, `hari/tanggal`) VALUES
('987654332', '37/A/31/2013', 'A', 'Pengadaan mobil dinas', '38/A/31/2013', '2013-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `berita_acara_negosiasi_klarifikasi` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `klarifikasi_administrasi` varchar(100) NOT NULL,
  `klarifikasi_teknis` varchar(100) NOT NULL,
  `harga_awal` bigint(20) NOT NULL,
  `harga_akhir` bigint(20) NOT NULL,
  `kode_panitia` varchar(10) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `kode_panitia` (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_negosiasi_klarifikasi`
--

INSERT INTO `berita_acara_negosiasi_klarifikasi` (`id_dokumen`, `nomor`, `klarifikasi_administrasi`, `klarifikasi_teknis`, `harga_awal`, `harga_akhir`, `kode_panitia`) VALUES
('987654321', '31/A/32/2013', 'administrasi', 'teknis', 10000000000, 10000000000, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pembukaan_penawaran` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `jumlah_penyedia_diundang` int(10) NOT NULL,
  `jumlah_penyedia_dokumen_sah` int(10) NOT NULL,
  `jumlah_penyedia_dokumen_tidak_sah` int(10) NOT NULL,
  `status_metode` varchar(10) NOT NULL,
  `kode_panitia` varchar(10) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `kode_panitia` (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_pembukaan_penawaran`
--

INSERT INTO `berita_acara_pembukaan_penawaran` (`id_dokumen`, `nomor`, `jumlah_penyedia_diundang`, `jumlah_penyedia_dokumen_sah`, `jumlah_penyedia_dokumen_tidak_sah`, `status_metode`, `kode_panitia`) VALUES
('987654322', '32/A/33/2013', 4, 3, 1, 'apa ini', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pengadaan_gagal`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pengadaan_gagal` (
  `id_dokumen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_dokumen` (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_pengadaan_gagal`
--


-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_penjelasan`
--

CREATE TABLE IF NOT EXISTS `berita_acara_penjelasan` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `kode_panitia` varchar(10) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `kode_panitia` (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_penjelasan`
--

INSERT INTO `berita_acara_penjelasan` (`id_dokumen`, `nomor`, `kode_panitia`) VALUES
('987654323', '33/A/34/2013', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hadir`
--

CREATE TABLE IF NOT EXISTS `daftar_hadir` (
  `id_dokumen` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `tempat_hadir` varchar(50) NOT NULL,
  `acara` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_hadir`
--

INSERT INTO `daftar_hadir` (`id_dokumen`, `jam`, `tempat_hadir`, `acara`) VALUES
('987654324', '14.00', 'Ruang rapat gedung I lantai 5', 'Negoisasi harga');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--


-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `id_dokumen` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `id_pengadaan` varchar(32) NOT NULL,
  `status_upload` varchar(10) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_dokumen` (`id_dokumen`),
  KEY `tanggal` (`tanggal`),
  KEY `tempat` (`tempat`),
  KEY `id_pengadaan` (`id_pengadaan`),
  KEY `status_upload` (`status_upload`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `tanggal`, `tempat`, `id_pengadaan`, `status_upload`) VALUES
('987654321', '2013-06-02', 'Jakarta', '987654321', 'Selesai'),
('987654322', '2013-06-03', 'Jakarta', '987654321', 'Selesai'),
('987654323', '2013-06-04', 'Jakarta', '987654321', 'Selesai'),
('987654324', '2013-06-05', 'Jakarta', '987654321', 'Selesai'),
('987654325', '2013-06-06', 'Jakarta', '987654321', 'Selesai'),
('987654326', '2013-06-07', 'Jakarta', '987654321', 'Selesai'),
('987654327', '2013-06-08', 'Jakarta', '987654321', 'Selesai'),
('987654328', '2013-06-09', 'Jakarta', '987654321', 'Selesai'),
('987654329', '2013-06-10', 'Jakarta', '987654321', 'Selesai'),
('987654330', '2013-06-11', 'Jakarta', '987654321', 'Selesai'),
('987654331', '2013-06-12', 'Jakarta', '987654321', 'Selesai'),
('987654332', '2013-06-13', 'Jakarta', '987654321', 'Selesai'),
('987654333', '2013-06-14', 'Jakarta', '987654321', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_penawaran`
--

CREATE TABLE IF NOT EXISTS `dokumen_penawaran` (
  `id_dokumen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen_penawaran`
--


-- --------------------------------------------------------

--
-- Table structure for table `form_isian_kualifikasi`
--

CREATE TABLE IF NOT EXISTS `form_isian_kualifikasi` (
  `id_dokumen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_isian_kualifikasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pemberitahuan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pemberitahuan_pemenang` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `nama_penyedia` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_penyedia` (`nama_penyedia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_pemberitahuan_pemenang`
--

INSERT INTO `nota_dinas_pemberitahuan_pemenang` (`id_dokumen`, `nomor`, `dari`, `sifat`, `nama_penyedia`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`) VALUES
('987654325', '35/A/31/2013', 'Ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Mercedes Benz', 'Jl.mobilbagus No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-13', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_penetapan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_penetapan_pemenang` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `kepada` varchar(20) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `nama_penyedia` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(20) NOT NULL,
  `sumber_dana` varchar(20) NOT NULL,
  `jangka_waktu_berlaku` varchar(20) NOT NULL,
  `jangka_waktu_deadline` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_penyedia` (`nama_penyedia`),
  KEY `kepada` (`kepada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_penetapan_pemenang`
--

INSERT INTO `nota_dinas_penetapan_pemenang` (`id_dokumen`, `nomor`, `kepada`, `sifat`, `nama_penyedia`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`, `sumber_dana`, `jangka_waktu_berlaku`, `jangka_waktu_deadline`) VALUES
('987654326', '34/A/31/2013', 'Mercedes Benz', 'Biasa', 'Mercedes Benz', 'Jl.mobilbagus No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-14', 'Jakarta', 'Uang Kas PLN', '7', '14');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_perintah_pengadaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_perintah_pengadaan` (
  `id_dokumen` varchar(20) NOT NULL,
  `nota_dinas_permintaan` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `perilhal` varchar(50) NOT NULL,
  `RAB` bigint(20) NOT NULL,
  `targetSPK/kontrak` varchar(20) NOT NULL,
  `sumber_dana` varchar(20) NOT NULL,
  `pagu_anggaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nota_dinas_permintaan` (`nota_dinas_permintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_perintah_pengadaan`
--

INSERT INTO `nota_dinas_perintah_pengadaan` (`id_dokumen`, `nota_dinas_permintaan`, `nomor`, `dari`, `kepada`, `perilhal`, `RAB`, `targetSPK/kontrak`, `sumber_dana`, `pagu_anggaran`) VALUES
('987654329', '40/A/31/2013', '35/A/32/2013', 'Kdivum', 'Ketua panitia Pengadaan barang dan jasa', 'Perintah pengadaan Mobil dinas PLN', 10000000000, 'Mobil', 'Kas PLN', 'xxx');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_permintaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_permintaan` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_permintaan`
--

INSERT INTO `nota_dinas_permintaan` (`id_dokumen`, `nomor`) VALUES
('987654328', '40/A/31/2013');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_usulan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_usulan_pemenang` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `nama_penyedia` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_penyedia` (`nama_penyedia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_usulan_pemenang`
--

INSERT INTO `nota_dinas_usulan_pemenang` (`id_dokumen`, `nomor`, `dari`, `sifat`, `nama_penyedia`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`) VALUES
('987654330', '35/A/32/2013', 'ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Mercedes Benz', 'Jl.mobilbagus No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-13', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_panitia_1`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_panitia_1` (
  `id_dokumen` varchar(20) NOT NULL,
  `kode_panitia` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `kode_panitia` (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakta_integritas_panitia_1`
--

INSERT INTO `pakta_integritas_panitia_1` (`id_dokumen`, `kode_panitia`) VALUES
('987654327', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_penyedia`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_penyedia` (
  `id_dokumen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_dokumen` (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakta_integritas_penyedia`
--


-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `kode_panitia` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`kode_panitia`) VALUES
('A'),
('B');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` varchar(32) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  `nama_penyedia` varchar(32) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `kode_panitia` varchar(10) DEFAULT NULL,
  `metode_pengadaan` varchar(32) NOT NULL,
  `metode_penawaran` varchar(32) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pengadaan`),
  KEY `nama_penyedia` (`nama_penyedia`),
  KEY `tanggal_masuk` (`tanggal_masuk`),
  KEY `tanggal_selesai` (`tanggal_selesai`),
  KEY `status` (`status`),
  KEY `biaya` (`biaya`),
  KEY `kodepanitia` (`kode_panitia`),
  KEY `metode_pengadaan` (`metode_pengadaan`),
  KEY `metode_penawaran` (`metode_penawaran`),
  KEY `deskripsi` (`deskripsi`),
  KEY `nama_pengadaan` (`nama_pengadaan`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `nama_pengadaan`, `nama_penyedia`, `tanggal_masuk`, `tanggal_selesai`, `status`, `biaya`, `nama`, `kode_panitia`, `metode_pengadaan`, `metode_penawaran`, `deskripsi`) VALUES
('987654321', 'Pengadaan mobil dinas', 'Mercedes Benz', '2013-06-01', '2013-06-15', 'Selesai', 10000000000, NULL, 'A', 'Tunjuk langsung', 'Satu sampul', 'Pengadaan mobil untuk pegawai PLN');

-- --------------------------------------------------------

--
-- Table structure for table `rks`
--

CREATE TABLE IF NOT EXISTS `rks` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rks`
--

INSERT INTO `rks` (`id_dokumen`, `nomor`) VALUES
('987654331', '37/A/31/2013');

-- --------------------------------------------------------

--
-- Table structure for table `sekretaris`
--

CREATE TABLE IF NOT EXISTS `sekretaris` (
  `username` varchar(20) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `NIP` (`NIP`),
  UNIQUE KEY `NIP_2` (`NIP`),
  KEY `username` (`username`,`NIP`),
  KEY `username_2` (`username`,`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekretaris`
--

INSERT INTO `sekretaris` (`username`, `NIP`, `email`) VALUES
('aidilsyaputra', '123456789', 'aidil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pemberitahuan_pengadaan`
--

CREATE TABLE IF NOT EXISTS `surat_pemberitahuan_pengadaan` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `perihal` varchar(20) NOT NULL,
  `lingkup_kerja` varchar(20) NOT NULL,
  `waktu_kerja` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pemberitahuan_pengadaan`
--


-- --------------------------------------------------------

--
-- Table structure for table `surat_pernyataan_minat`
--

CREATE TABLE IF NOT EXISTS `surat_pernyataan_minat` (
  `id_dokumen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pernyataan_minat`
--


-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_negosiasi_klarifikasi` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `perihal` varchar(20) NOT NULL,
  `kepada` varchar(20) NOT NULL,
  `hari/tanggal` varchar(20) NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_negosiasi_klarifikasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pembukaan_penawaran` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `kepada` varchar(20) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `lampiran` varchar(20) NOT NULL,
  `perihal` varchar(20) NOT NULL,
  `hari/tanggal` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_pembukaan_penawaran`
--


-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pengambilan_dokumen_pengadaan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pengambilan_dokumen_pengadaan` (
  `id_dokumen` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `sifat` varchar(32) NOT NULL,
  `perihal` varchar(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_pengambilan_dokumen_pengadaan`
--


-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_penjelasan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_penjelasan` (
  `id_dokumen` varchar(20) NOT NULL,
  `kepada` varchar(20) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `perihal` varchar(20) NOT NULL,
  `hari/tanggal` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `agenda` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_penjelasan`
--


-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_prakualifikasi` (
  `id_dokumen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_prakualifikasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `password` varchar(24) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`) VALUES
('aidilsyaputra', 'Aidil Syaputra', 'aidil'),
('gilanglaksana', 'Gilang Laksana', 'gilang'),
('haniferidaputra', 'Hanif Eridaputra', 'hanif'),
('irvanaditya', 'Irvan Aditya', 'irvan'),
('johannesridho', 'Johannes Ridho', 'johan'),
('kevinindra', 'Kevin Indra', 'kevin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`kode_panitia`) REFERENCES `panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_evaluasi_penawaran`
--
ALTER TABLE `berita_acara_evaluasi_penawaran`
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_2` FOREIGN KEY (`no_RKS`) REFERENCES `rks` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_3` FOREIGN KEY (`kode_panitia`) REFERENCES `panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_4` FOREIGN KEY (`nama_pengadaan`) REFERENCES `pengadaan` (`nama_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_negosiasi_klarifikasi`
--
ALTER TABLE `berita_acara_negosiasi_klarifikasi`
  ADD CONSTRAINT `berita_acara_negosiasi_klarifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_negosiasi_klarifikasi_ibfk_2` FOREIGN KEY (`kode_panitia`) REFERENCES `anggota` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_pembukaan_penawaran`
--
ALTER TABLE `berita_acara_pembukaan_penawaran`
  ADD CONSTRAINT `berita_acara_pembukaan_penawaran_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_pembukaan_penawaran_ibfk_2` FOREIGN KEY (`kode_panitia`) REFERENCES `anggota` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_pengadaan_gagal`
--
ALTER TABLE `berita_acara_pengadaan_gagal`
  ADD CONSTRAINT `berita_acara_pengadaan_gagal_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_penjelasan`
--
ALTER TABLE `berita_acara_penjelasan`
  ADD CONSTRAINT `berita_acara_penjelasan_ibfk_2` FOREIGN KEY (`kode_panitia`) REFERENCES `anggota` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_penjelasan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_hadir`
--
ALTER TABLE `daftar_hadir`
  ADD CONSTRAINT `daftar_hadir_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `divisi`
--
ALTER TABLE `divisi`
  ADD CONSTRAINT `divisi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan` (`id_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokumen_penawaran`
--
ALTER TABLE `dokumen_penawaran`
  ADD CONSTRAINT `dokumen_penawaran_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_isian_kualifikasi`
--
ALTER TABLE `form_isian_kualifikasi`
  ADD CONSTRAINT `form_isian_kualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_pemberitahuan_pemenang`
--
ALTER TABLE `nota_dinas_pemberitahuan_pemenang`
  ADD CONSTRAINT `nota_dinas_pemberitahuan_pemenang_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_pemberitahuan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_penetapan_pemenang`
--
ALTER TABLE `nota_dinas_penetapan_pemenang`
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_3` FOREIGN KEY (`kepada`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_perintah_pengadaan`
--
ALTER TABLE `nota_dinas_perintah_pengadaan`
  ADD CONSTRAINT `nota_dinas_perintah_pengadaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_perintah_pengadaan_ibfk_2` FOREIGN KEY (`nota_dinas_permintaan`) REFERENCES `nota_dinas_permintaan` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_permintaan`
--
ALTER TABLE `nota_dinas_permintaan`
  ADD CONSTRAINT `nota_dinas_permintaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_usulan_pemenang`
--
ALTER TABLE `nota_dinas_usulan_pemenang`
  ADD CONSTRAINT `nota_dinas_usulan_pemenang_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_usulan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_panitia_1`
--
ALTER TABLE `pakta_integritas_panitia_1`
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_2` FOREIGN KEY (`kode_panitia`) REFERENCES `anggota` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_penyedia`
--
ALTER TABLE `pakta_integritas_penyedia`
  ADD CONSTRAINT `pakta_integritas_penyedia_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `user` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`kode_panitia`) REFERENCES `panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rks`
--
ALTER TABLE `rks`
  ADD CONSTRAINT `rks_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sekretaris`
--
ALTER TABLE `sekretaris`
  ADD CONSTRAINT `sekretaris_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pemberitahuan_pengadaan`
--
ALTER TABLE `surat_pemberitahuan_pengadaan`
  ADD CONSTRAINT `surat_pemberitahuan_pengadaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pernyataan_minat`
--
ALTER TABLE `surat_pernyataan_minat`
  ADD CONSTRAINT `surat_pernyataan_minat_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_negosiasi_klarifikasi`
--
ALTER TABLE `surat_undangan_negosiasi_klarifikasi`
  ADD CONSTRAINT `surat_undangan_negosiasi_klarifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_pembukaan_penawaran`
--
ALTER TABLE `surat_undangan_pembukaan_penawaran`
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_pengambilan_dokumen_pengadaan`
--
ALTER TABLE `surat_undangan_pengambilan_dokumen_pengadaan`
  ADD CONSTRAINT `surat_undangan_pengambilan_dokumen_pengadaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_penjelasan`
--
ALTER TABLE `surat_undangan_penjelasan`
  ADD CONSTRAINT `surat_undangan_penjelasan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_prakualifikasi`
--
ALTER TABLE `surat_undangan_prakualifikasi`
  ADD CONSTRAINT `surat_undangan_prakualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;
