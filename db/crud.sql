-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jun 2022 pada 16.07
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` SERIAL NOT NULL PRIMARY KEY,
  `nama` varchar(50),
  `tempat_lahir` varchar(70),
  `tanggal_lahir` date,
  `gender` varchar(10),
  `agama` varchar(20),
  `alamat` text,
  `nomor_telepon` varchar(15),
  `created_at` timestamp current_timestamp

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Seeder data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`nama`,`tempat_lahir`,`tanggal_lahir`,`gender`,`agama`, `alamat`, `nomor_telepon`) VALUES
( 'Fathur karym', 'Tangerang', '10/09/2000', 'Laki-laki', 'ISLAM', 'Jalan jalan raya nomor 78, Kota Tangerang', '085123478262' ),
( 'Muhlis', 'Padalarang', '10/03/1998', 'Laki-laki', 'ISLAM', 'Jalan raya Blok 78, Kota Jakarta Barat', '08519387452');


