-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2021 pada 11.42
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_elektronik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(30) NOT NULL,
  `katasandi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`username`, `katasandi`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kodebarang` varchar(5) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `satuan` varchar(5) NOT NULL,
  `hargajual` float NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `satuan`, `hargajual`, `gambar`, `merek`, `kategori`) VALUES
('B.001', 'TV LED 24 inchi', 'PCS', 2750000, 'ndCDMLe.jpg', 'Sharp', 'Televisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_detail`
--

CREATE TABLE `cart_detail` (
  `email` varchar(50) NOT NULL,
  `kodebarang` varchar(5) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `email` varchar(50) NOT NULL,
  `namacust` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `katasandi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`email`, `namacust`, `alamat`, `kota`, `nohp`, `katasandi`) VALUES
('theo@gmail.com', 'Theo', '-', 'Medan', '081361654698', 'abc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `kodebarang` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `nofaktur` varchar(20) NOT NULL,
  `nominal` float NOT NULL,
  `struk` varchar(255) NOT NULL,
  `verifikasi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `nofaktur` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kodecust` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`nofaktur`, `tanggal`, `kodecust`, `status`) VALUES
('FJ.202106-000001', '2021-06-13', 'theo@gmail.com', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `nofaktur` varchar(20) NOT NULL,
  `kodebarang` varchar(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`nofaktur`, `kodebarang`, `qty`, `harga`) VALUES
('FJ.202106-000001', 'B.001', 2, 2750000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promosi`
--

CREATE TABLE `promosi` (
  `nonota` varchar(20) NOT NULL,
  `periode` date NOT NULL,
  `judulpromosi` varchar(255) NOT NULL,
  `isirincian` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promosi`
--

INSERT INTO `promosi` (`nonota`, `periode`, `judulpromosi`, `isirincian`, `gambar`) VALUES
('NP.202106-000001', '2021-06-30', 'Promosi Bulan Juni', 'Dapatkan diskon sebesar 10 % untuk pembelian AC Merek Haier', '10062162-8007-470c-8b3d-cbd68877968d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`nofaktur`);

--
-- Indeks untuk tabel `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`nonota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
