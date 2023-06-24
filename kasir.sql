-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jun 2023 pada 05.54
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_stok_keluar` int NOT NULL,
  `no_faktur` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `jml_barang` int DEFAULT NULL,
  `id_pegawai` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_produk` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga_jual` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_stok_masuk` int NOT NULL,
  `no_faktur` int DEFAULT NULL,
  `id_supplier` int DEFAULT NULL,
  `id_produk` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `jml_barang` int DEFAULT NULL,
  `id_pegawai` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga_beli` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_stok_masuk`, `no_faktur`, `id_supplier`, `id_produk`, `tgl_masuk`, `jml_barang`, `id_pegawai`, `harga_beli`) VALUES
(2, 47294, 1, 'PRO-01', '2023-06-23', 10, 'PEG-01', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nm_customer` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `email` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nm_customer`, `alamat`, `email`, `no_telp`) VALUES
('COS-01', 'Ariq azmi', 'jl sintanala raya no 02', 'Ariqq@gmai.com', '0999881'),
('COS-02', 'andika semanan', 'semanan raya no 3', 'andika@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_produk`
--

CREATE TABLE `kat_produk` (
  `id_kategori` int NOT NULL,
  `nm_kategori` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kat_produk`
--

INSERT INTO `kat_produk` (`id_kategori`, `nm_kategori`, `keterangan`) VALUES
(1, 'Sabun cair', 'semua jenis sabun cair'),
(2, 'detergen', 'semua detergen bubuk'),
(3, 'minyak goreng ', 'semua minyak goreng kemasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `nm_pegawai` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `no_telp` varchar(13) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jsn_kelamin` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nm_pegawai`, `email`, `alamat`, `no_telp`, `jsn_kelamin`, `tgl_lahir`, `tmp_lahir`) VALUES
('PEG-01', 'Pungky', 'pungky.hwa@gmail.com', 'jl disana', '089637587329', 'p', '2023-05-16', 'disitu'),
('PEG-02', 'Harsya', 'harsyah@gmail.com', 'di situ', '089637587888', 'p', '2008-08-09', 'tangerang'),
('PEG-03', 'Arizal Rahman', 'Arizal@gmail.com', 'jl cempaka putih raya no 109', '099988881', 'l', '1998-05-26', 'Semarang'),
('PEG-04', 'acumalaka', 'acumalaka@gmail.com', 'asdasd', '091283013', 'l', '2023-06-12', 'asdka'),
('PEG-05', 'acumalaka', 'acumalaka@gmail.com', 'ansdaskdh', '02193723', 'l', '2023-06-14', 'sadads');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `nm_produk` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_supplier` int DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `stok` int DEFAULT NULL,
  `id_satuan` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nm_produk`, `id_supplier`, `deskripsi`, `stok`, `id_satuan`, `id_kategori`, `harga_beli`, `harga_jual`) VALUES
('PRO-01', 'eonomi', 1, 'adhaosdodh', 10, 1, 1, 4000, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int NOT NULL,
  `nm_satuan` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nm_satuan`, `keterangan`) VALUES
(1, 'PCS', 'PICIS untuk satuan picis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int NOT NULL,
  `nm_supplier` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `no_telp` varchar(13) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nm_supplier`, `alamat`, `no_telp`, `email`) VALUES
(1, 'PT Susah rugi', 'jl daan mogot raya nomor sekian\r\n', '9999991', 'ptsusahrugi@gmail.com'),
(2, 'ano ne', '1', '1', 'ekomoni 1000g ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `id_pegawai` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `roles` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `id_pegawai`, `username`, `password`, `roles`) VALUES
(1, 'PEG-01', 'admin', '$2y$10$nhcH9Abd/JkwEhuZWdLwn.ndcURXjbqPD3LzOWuTUhWYZ8W83wncm', 1),
(2, 'PEG-02', 'harsya', 'harsya', 2),
(3, 'PEG-03', 'PEG-03', 'cobasaja', 2),
(4, 'PEG-05', 'acumalaka', 'cepatganti', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_stok_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_stok_masuk`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `kat_produk`
--
ALTER TABLE `kat_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_stok_keluar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_stok_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kat_produk`
--
ALTER TABLE `kat_produk`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
