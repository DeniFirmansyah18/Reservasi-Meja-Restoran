-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2023 pada 04.53
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi-meja-restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(10, 'Operator Pelanggan', 'opm-pelanggan', 'pelanggan@gmail.com', '$2y$10$nwhbT.jbxyvu/CwqEj6j1.9lxVUiYJ5DcA8L82K5TKKU8tJAJr0ui', '3'),
(11, 'Operator Pemesanan', 'opm-pemesanan', 'pemesanan@gmail.com', '$2y$10$EyWkgDhX8YrVE53OMk4yOeMC0Yo/eZxSUEPNUvpT6cbpRhDaSRXOW', '2'),
(12, 'admin', 'admin', 'admin@gmail.com', '$2y$10$Fa.X4Eh0gDt1vGC8.d0XKuSaubv7uDopo1izsNxfjx.LktotXpHiW', '1'),
(14, 'test', 'test', 'test@gmail.com', '$2y$10$JZ9r0NAfJ5CSXtWntBx7gOyDNgMUutS/hCFdEAC3yOl4CdppDd1mi', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi_makanan` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama`, `foto`, `deskripsi_makanan`, `harga`) VALUES
(3, 'Pizza', '656c6d99889f7.jpg', 'Pizza Italia', '100000'),
(4, 'Burger', '656c6f8be878f.jpg', 'Burger mcd', '50000'),
(5, 'Ramen', '656c710e4e6dc.jpg', 'Ramen Shoyu', '50000'),
(6, 'Steak', '656c719165d58.jpeg', 'Steak medium rare', '200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama`, `email`, `jumlah`, `tanggal`) VALUES
(1, 'Rangga', 'rangga@gmail.com', '5', '2023-12-02'),
(2, 'anton', 'anton@gmail.com', '5', '2023-12-02'),
(4, 'andre', 'andre@gmail.com', '6', '2023-12-02'),
(5, 'Muhammad Deni Firmansyah', 'denifirmansyah181003@gmail.com', '8', '2024-01-06'),
(9, 'guest', 'guest@gmail.com', '5', '2023-12-08'),
(11, 'guest', 'admin@gmail.com', '7', '2023-12-29'),
(12, 'anton', 'anton@gmail.com', '12', '2023-12-30'),
(13, 'guest10', 'guest@gmail.com', '10', '2023-12-19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
