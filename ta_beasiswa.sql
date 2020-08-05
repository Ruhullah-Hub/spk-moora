-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jun 2020 pada 10.39
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_beasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Desa Tangun', 'rintodinaulawitia@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` float DEFAULT NULL,
  `tipe` enum('Cost','Benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `tipe`) VALUES
('C1', 'INDEKS PRESTASI KUMULATIF (IPK)', 0.3, 'Benefit'),
('C2', 'PROPOSAL PKM', 0.25, 'Benefit'),
('C3', 'ORGANISASI KEMAHASISWAAN', 0.2, 'Benefit'),
('C4', 'SURAT TIDAK MAMPU', 0.15, 'Cost'),
('C5', 'SERTIFIKAT LAMPIRAN', 0.1, 'Cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_kriteria` varchar(5) NOT NULL,
  `id_subkriteria` int(2) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `id_kriteria`, `id_subkriteria`, `nilai`) VALUES
(1, '1637001', 'C1', 4, 4),
(2, '1637001', 'C2', 5, 2),
(3, '1637001', 'C3', 7, 2),
(4, '1637001', 'C4', 10, 1),
(5, '1637001', 'C5', 11, 2),
(11, '1637002', 'C1', 3, 3),
(12, '1637002', 'C2', 5, 2),
(13, '1637002', 'C3', 8, 1),
(14, '1637002', 'C4', 10, 1),
(15, '1637002', 'C5', 11, 2),
(16, '1637018', 'C1', 2, 2),
(17, '1637018', 'C2', 6, 1),
(18, '1637018', 'C3', 7, 2),
(19, '1637018', 'C4', 9, 2),
(20, '1637018', 'C5', 12, 1),
(21, '1637027', 'C1', 3, 3),
(22, '1637027', 'C2', 5, 2),
(23, '1637027', 'C3', 7, 2),
(24, '1637027', 'C4', 9, 2),
(25, '1637027', 'C5', 12, 1),
(26, '1637056', 'C1', 2, 2),
(27, '1637056', 'C2', 5, 2),
(28, '1637056', 'C3', 8, 1),
(29, '1637056', 'C4', 9, 2),
(30, '1637056', 'C5', 11, 2),
(31, '1736001', 'C1', 2, 2),
(32, '1736001', 'C2', 5, 2),
(33, '1736001', 'C3', 8, 1),
(34, '1736001', 'C4', 10, 1),
(35, '1736001', 'C5', 12, 1),
(41, '1736054', 'C1', 4, 4),
(42, '1736054', 'C2', 5, 2),
(43, '1736054', 'C3', 8, 1),
(44, '1736054', 'C4', 10, 1),
(45, '1736054', 'C5', 11, 2),
(46, '1934002', 'C1', 3, 3),
(47, '1934002', 'C2', 5, 2),
(48, '1934002', 'C3', 8, 1),
(49, '1934002', 'C4', 9, 2),
(50, '1934002', 'C5', 11, 2),
(51, '1935002', 'C1', 4, 4),
(52, '1935002', 'C2', 6, 1),
(53, '1935002', 'C3', 7, 2),
(54, '1935002', 'C4', 10, 1),
(55, '1935002', 'C5', 11, 2),
(56, '1936021', 'C1', 1, 1),
(57, '1936021', 'C2', 5, 2),
(58, '1936021', 'C3', 7, 2),
(59, '1936021', 'C4', 9, 2),
(60, '1936021', 'C5', 11, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `nim` int(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `fakultas` varchar(65) NOT NULL,
  `prodi` varchar(65) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nilai_y` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`nim`, `nik`, `fakultas`, `prodi`, `jk`, `nama_peserta`, `alamat`, `nilai_y`) VALUES
(1637001, '123456', 'Fakultas Ilmu Komputer', 'Teknik Informatika', 'Laki Laki', 'Rudi Kurniawan', 'DU SKPA', 0.2277),
(1637002, '123457', 'Fakultas Ilmu Komputer', 'Teknik Informatika', 'Perempuan', 'Sri Mala Putri', 'Muara Rumbai', 0.1557),
(1637018, '123458', 'Fakultas Ilmu Komputer', 'Teknik Informatika ', 'Perempuan', 'Fitriani', 'Mahato KM 24', 0.1089),
(1637027, '123459', 'Fakultas Ilmu Komputer', 'Teknik Informatika', 'Perempuan', 'Suci Promadona', 'Pasir Putih', 0.1836),
(1637056, '123451', 'Fakultas Ilmu Komputer', 'Teknik Informatika', 'Perempuan', 'Munawaroh Sitorus', 'Dalu-dalu', 0.0938),
(1736001, '123452', 'Fakultas Ilmu Komputer', 'Sistem Informasi', 'Perempuan', 'Nelfianis', 'Tangun', 0.1417),
(1736054, '123453', 'Fakultas Ilmu Komputer', 'Sistem Informasi', 'Perempuan', 'Elza Nuria Santi', 'Desa Batas', 0.1877),
(1934002, '123454', 'Fakultas Ekonomi', 'Akuntansi', 'Laki Laki', 'Efriyanto', 'Tambusai Utara', 0.1257),
(1935002, '123455', 'Fakultas Ekonomi', 'Manajemen', 'Laki Laki', 'Muhammad Erlando', 'Bangun Purba', 0.1849),
(1936021, '1234534', 'Fakultas Ilmu Komputer', 'Sistem Informasi', 'Perempuan', 'Yeni Martha', 'Desa Tangun', 0.1018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(5) NOT NULL,
  `id_kriteria` varchar(5) NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `bobot` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `bobot`) VALUES
(1, 'C1', '< 2.5', 1),
(2, 'C1', '>= 2.5 - 3.00', 2),
(3, 'C1', '>= 3.00 - 3.5', 3),
(4, 'C1', '> 3.50', 4),
(5, 'C2', 'SUDAH UPLOAD', 2),
(6, 'C2', 'BELUM UPLOAD', 1),
(7, 'C3', 'MENGIKUTI ORGANISASI', 2),
(8, 'C3', 'TIDAK MENGIKUTI', 1),
(9, 'C4', 'ADA SURAT', 2),
(10, 'C4', 'TIDAK ADA SURAT', 1),
(11, 'C5', 'ADA SERTIFIKAT', 2),
(12, 'C5', 'TIDAK ADA SERTIFIKAT', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD UNIQUE KEY `kode_kriteria` (`id_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
