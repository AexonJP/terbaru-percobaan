-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2022 pada 12.35
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aexonjpx`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `priv`) VALUES
(1, 'user', '$2y$10$zFd.493a/.1rrheMopkPZeswkRG55MJL7cfTNaRe.wBoys890V1p.', 'user'),
(3, 'aexon', '$2y$10$53Xq3/A649QYId59oNy/2OEjoJ4MXFTzYgHI1b7KGd.AJHps/MkH.', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `completed`
--

CREATE TABLE `completed` (
  `id` int(11) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `waktu` datetime NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `completed`
--

INSERT INTO `completed` (`id`, `judul`, `gambar`, `waktu`, `section`) VALUES
(1, 'Isekai-Meikyuu-de-Harem-wo', 'Isekai-Meikyuu-de-Harem-wo-640x360.jpg.webp', '2022-10-27 04:20:52', 'completed'),
(2, 'Jashin-chan-Dropkick-S3', 'Jashin-chan-Dropkick-S3-640x360.jpg.webp', '2022-10-27 04:21:01', 'completed'),
(3, 'Kinsou-no-Vermeil', 'Kinsou-no-Vermeil-640x360.png.webp', '2022-10-27 04:21:11', 'completed'),
(4, 'Mamahaha-no-Tsurego-ga-Motokano-datta', 'Mamahaha-no-Tsurego-ga-Motokano-datta-640x360.png.webp', '2022-10-27 04:21:18', 'completed'),
(5, 'Pacar-Sewaan-S2', 'Pacar-Sewaan-S2-640x360.png.webp', '2022-10-27 04:21:25', 'completed'),
(6, 'Tokyo-Mew-Mew-New', 'Tokyo-Mew-Mew-New-640x360.png.webp', '2022-10-27 04:21:32', 'completed'),
(7, 'KAGUYA SAMA LOVE IS WAR', '634f53f392360.images (1) (1).jpeg', '2022-10-27 04:21:39', 'completed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `waktu` datetime NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `movie`
--

INSERT INTO `movie` (`id`, `judul`, `gambar`, `waktu`, `section`) VALUES
(1, 'Ame-wo-Tsugeru-Hyouryuu-Danchi', 'Ame-wo-Tsugeru-Hyouryuu-Danchi-640x360.jpg.webp', '2022-10-27 04:14:51', 'movie'),
(2, 'Blue-Thermal', 'Blue-Thermal-640x360.jpg.webp', '2022-10-27 04:15:16', 'movie'),
(3, 'Bubble', 'Bubble-640x360.jpg.webp', '2022-10-27 04:15:28', 'movie'),
(4, 'Jujutsu-Kaisen-0', 'Jujutsu-Kaisen-0-640x360.jpg.webp', '2022-10-27 04:15:50', 'movie'),
(5, 'Kiniro-Mosaic-Thank-You', 'Kiniro-Mosaic-Thank-You-640x360.jpg.webp', '2022-10-27 04:16:05', 'movie'),
(12, 'Sword-Art-Online-the-Movie-Progressive-Aria-of-a-Starless-Night', '634e4655a32f7.Sword-Art-Online-the-Movie-Progressive-Aria-of-a-Starless-Night-640x360.png.webp', '2022-10-27 04:16:12', 'movie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongoing`
--

CREATE TABLE `ongoing` (
  `id` int(11) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `waktu` datetime NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongoing`
--

INSERT INTO `ongoing` (`id`, `judul`, `gambar`, `waktu`, `section`) VALUES
(27, 'Chainsaw Man', '635e0b619a9fa.4045709-chainsawman_16x9.webp', '2022-10-30 13:28:01', 'ongoing'),
(28, 'Spy x Family', '635e0d550a85d.spy-x-family-2.webp', '2022-10-30 13:36:21', 'ongoing'),
(29, 'Overlord IV', '635f703b23c36.ezgif.com-gif-maker.webp', '2022-10-31 14:50:35', 'ongoing'),
(30, 'EVANGELION', '635f70bfa1693.ezgif.com-gif-maker (1).webp', '2022-10-31 14:52:47', 'ongoing'),
(31, 'BERSERK MEMORIAL', '635f713c4f889.ezgif.com-gif-maker (2).webp', '2022-10-31 14:54:52', 'ongoing'),
(32, 'Gotoubun No Hanayome', '635f72536a434.ezgif.com-gif-maker (3).webp', '2022-10-31 14:59:31', 'ongoing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `episode` int(255) NOT NULL,
  `rating` float NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`username`);

--
-- Indeks untuk tabel `completed`
--
ALTER TABLE `completed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `completed`
--
ALTER TABLE `completed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
