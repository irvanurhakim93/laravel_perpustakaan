-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Apr 2023 pada 06.55
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status_aktif` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `telepon`, `email`, `status_aktif`, `created_at`, `updated_at`) VALUES
(1, 'anggota1', 'ala anggota1', '1242142353254', 'anggota1@gmail.com', 1, '2023-04-09 10:17:22', '0000-00-00 00:00:00'),
(2, 'test1', 'Jaksel', '2321312321432432', 'anggota3@gmail.com', 1, '2023-04-09 10:19:42', '2023-04-09 03:19:42'),
(3, 'Sari', 'Jakarta', '0821', 'saricantik@gmail.com', 1, '2023-04-09 04:46:52', '2023-04-09 04:46:52'),
(4, 'Nergal Darski', 'Norwegia', '021666', 'behemoth@gmail.com', 1, '2023-04-10 01:35:25', '2023-04-10 01:35:25'),
(5, 'Rere Reza', 'Bandung', '022', 'reregrass@gmail.com', 1, '2023-04-15 19:17:06', '2023-04-15 19:17:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `id_penulis` int(11) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `nama`, `tahun_terbit`, `id_penulis`, `id_penerbit`, `id_kategori`, `sinopsis`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Apa aja', 2018, 3, 2, 2, 'Buku tentang kahlil gibran', '3824sayappatah.jpg', '2023-04-18 04:48:49', '2023-04-17 21:48:49'),
(2, 'Si Kancil', 2000, 1, 2, 3, 'SI kancil yang hobi mencuri,namun kali ini mencurinya agak kerenan dikit seperti mencuri motor sport', '4633kancil.jpg', '2023-04-18 04:49:58', '2023-04-17 21:49:58'),
(3, 'Buku Pemrograman HTML 5', 2018, 3, 1, 2, 'Buku pemrograman html terkini', NULL, '2023-04-17 06:15:32', '2023-04-16 23:15:32'),
(4, 'Buku Chord Gitar', 2001, 1, 2, 2, 'Buku tentang mengajarkan chord gitar dengan lagu - lagu indonesia terpopuler', '7139chordbuku.jpg', '2023-04-18 04:51:59', '2023-04-17 21:51:59'),
(5, 'Komik Siksa Neraka', 1990, 3, 2, 1, 'Komik yang menceritakaan siksaan kepada manusia di neraka atas perbuatan dosa selama di dunia. Dijamin siapa yang membacanya akan auto tobat', '1440siksa_neraka.jpg', '2023-04-18 04:54:35', '2023-04-17 21:54:35'),
(6, 'Buku Biografi Sulfikar Hartono', 2018, 3, 2, 1, 'Biografi tentang sulfikar hartono,si pembalap yang gugur pada saat acara balapan di malam takbiran', NULL, '2023-04-17 06:31:11', '2023-04-16 23:29:26'),
(7, 'Kisah Inspiratif Jack Ma', 2020, 1, 2, 2, 'Biografi tentang pengusaha sukses Jack Ma yang mendirikan perusahaan Alibaba', NULL, '2023-04-16 23:33:28', '2023-04-16 23:33:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Agama'),
(2, 'Pendidikan'),
(3, 'Cerpen'),
(4, 'Puisi'),
(5, 'Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_buku`, `id_anggota`, `tanggal_pinjam`, `tanggal_kembali`, `created_at`, `updated_at`) VALUES
(3, 3, 9, '2018-07-23', '2018-07-30', '2023-04-10 09:29:33', '0000-00-00 00:00:00'),
(4, 2, 8, '2018-07-23', '2019-01-11', '2023-04-10 09:34:10', '2023-04-10 02:34:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `email` varchar(2555) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'Polindra', 'Jl. Kebenaran 104', '087733195026', 'polindra@gmail.com'),
(2, 'PT.Mencerdaskan Bangsa', 'Jl. Kebenaran 303', '087733195025', 'pt.syahrul@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`id`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'Syahrul', 'Jl. Kebenaran 101', '087733195029', 'syahrul@gmail.com'),
(2, 'Samsul', 'Jl. Kebenaran 102', '087733195028', 'samsul@gmail.com'),
(3, 'Maul', 'Jl. Kebenaran 103', '087733195027', 'maul@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'petugas1', 'ala petugas1', '2312321321321', 'petugas1@gmail.com'),
(2, 'petugas2', 'ala petugas2', '1232134243254', 'petugas2@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'anggota'),
(3, 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `id_user_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_user_role`) VALUES
(1, 'Admin', 'Admin', 1),
(2, 'anggota1', 'anggota1', 2),
(3, 'anggota2', 'anggota2', 2),
(4, 'petugas1', 'petugas1', 3),
(5, 'petugas2', 'petugas2', 3),
(6, 'test1', 'test12345', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
