-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2019 pada 14.06
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `kd_meja` varchar(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `kd_meja`, `status`) VALUES
(1, 'A01', 'penuh'),
(7, 'A02', 'kosong'),
(8, 'A03', 'kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nm_menu` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar_menu` varchar(30) NOT NULL,
  `deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nm_menu`, `harga`, `gambar_menu`, `deskripsi`) VALUES
(5, 'Pizza', 80000, 'menu_56954.jpg', 'Pizza'),
(8, 'Burger', 25000, 'menu_87509.jpg', 'Burgerr'),
(10, 'menu3', 1000, 'menu_8049.jpg', 'tes'),
(11, 'Tes', 100000, 'menu_15537.jpg', 'tes'),
(12, 'Pizza', 100000, 'menu_87634.jpg', 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(8) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
('IP13264', 'Agus Jalaludin', 'pria', '0892130123', 'Lembursitu'),
('IP242760', 'Fajar', 'pria', '089679405117', 'Jl. Pelabuhan II'),
('IP36472', 'Agus Jalaludin', 'pria', '123', 'lbs'),
('IP396167', 'Agus Jalaludin', 'pria', '123', 'Lembursitu'),
('IP44687', 'Susilawati', 'wanita', '089679405117', 'Jl Pelabuhan II'),
('IP48067', 'Agus Jalaludin', 'pria', '089679405117', 'Lembursitu'),
('IP54119', 'Agus Jalaludin', 'pria', '089679405117', 'Jl Pelabuhan II'),
('IP541258', 'Susilawati', 'wanita', '089679405117', 'Lembursitu'),
('IP602811', 'Agus Jalaludin', 'pria', '089679405117', 'Jl. Pelabuhan II KM 7'),
('IP628458', 'Agus Jalaludin', 'pria', '0892130123', 'Lembursitu'),
('IP700498', 'Agus Jalaludin', 'pria', '089679405117', 'Jl. Pelabuhan II KM 7'),
('IP760099', 'Agus Jalaludin', 'pria', '089679405117', 'Jl. Pelabuhan II km 7 '),
('IP778488', 'Agus Jalaludin', 'pria', '089679405117', 'Lbs'),
('IP890886', 'Agus Jalaludin', 'pria', '123', 'lbs'),
('IP894687', 'Agus Jalaludin', 'pria', '089679405117', 'Jl. Pelabuhan II KM 7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` char(8) NOT NULL,
  `id_pelanggan` char(8) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `tgl`, `waktu`, `id_meja`, `status`, `id_user`, `total_pesanan`) VALUES
('IDP42086', 'IP778488', '06-02-2019', '08', 1, 'menunggu diantar', 0, 100000),
('IDP42774', 'IP242760', '04-02-2019', '12', 8, 'menunggu diantar', 0, 80000),
('IDP49455', 'IP541258', '07-02-2019', '19', 1, 'selesai', 2, 51000),
('IDP51032', 'IP44687', '01-02-2019', '22', 1, 'menunggu diantar', 0, 80000),
('IDP53796', 'IP396167', '01-02-2019', '21', 8, 'selesai', 2, 160000),
('IDP86442', 'IP700498', '07-02-2019', '19', 1, 'selesai', 2, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id_pesanan_detail` int(11) NOT NULL,
  `id_pesanan` char(8) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id_pesanan_detail`, `id_pesanan`, `id_menu`, `qty`, `total_harga`) VALUES
(4, 'IDP53796', 5, 1, 80000),
(6, 'IDP53796', 5, 1, 80000),
(7, 'IDP51032', 5, 1, 80000),
(9, 'IDP42774', 5, 1, 80000),
(10, 'IDP42086', 12, 1, 100000),
(11, 'IDP86442', 11, 1, 100000),
(12, 'IDP86442', 8, 2, 50000),
(13, 'IDP49455', 8, 2, 50000),
(14, 'IDP49455', 10, 1, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pesanan` char(8) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `tgl` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `total`, `bayar`, `waktu`, `tgl`) VALUES
(2, 'IDP53796', 160000, 175000, '21', '01-02-2019'),
(3, 'IDP49455', 51000, 100000, '19', '07-02-2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `gambar_user` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_user`, `gambar_user`, `level`) VALUES
(1, 'administrator', '123', 'Administrator', 'default_pria.png', 'administrator'),
(2, 'waiter', '123', 'Agus Jalaludin', 'user_489.jpg', 'waiter'),
(3, 'kasir', '123', 'Kasir', 'user_24722.png', 'kasir'),
(4, 'owner', '123', 'Owner', 'user_25927.jpg', 'owner'),
(5, 'waiter2', '123', 'waiter2', 'user_77356.jpg', 'waiter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id_pesanan_detail`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id_pesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
