-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2025 pada 17.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ansi_krs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `prodi` varchar(100) NOT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `email`, `alamat`, `nidn`, `prodi`, `fakultas`, `nomor_hp`, `user_id`) VALUES
(10, 'Teguh Ansyor Lorosae M.Kom', 'teguh123@gmail.com', 'Sadia ', '0818119501', 'Ilmu Komputer', 'Teknik & Ilmu Komputer', '085639278761', 36),
(11, 'Siti Mutmainnah M.Kom', 'mutmainnah23@gmail.com', 'Wera', '0818119202', 'Ilmu Komputer', 'Teknik & Ilmu Komputer', '082536817920', 37),
(12, 'Zumhur Alamin M.Kom', 'zumhur99@gmail.com', 'Ranggo', '0818119703', 'Ilmu Komputer', 'Teknik & Ilmu Komputer', '081777625389', 38),
(13, 'Miftahul Jannah M.Kom', 'mifta@gmail.com', 'Ngali', '0818119707', 'Ilmu Komputer', 'Teknik & Ilmu Komputer', '087524333879', 39),
(14, 'A Latief Fashihullisan', 'latif66@gmail.com', 'Penatoi', '0818119916', 'Ilmu Komputer', 'Teknik & Ilmu Komputer', '082555739800', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `matakuliah_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `ruang` varchar(10) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `waktu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `matakuliah_id`, `dosen_id`, `kelas`, `ruang`, `hari`, `waktu`) VALUES
(25, 50, 12, 'P1', 'KF1', 'Selasa', '08.00 - 10.00'),
(26, 51, 13, 'P1', 'KF1', 'Rabu', '08.00 - 10.00'),
(27, 52, 14, 'P1', 'KF1', 'Kamis', '08.00 - 10.00'),
(28, 49, 10, 'P1', 'KF1', 'Selasa', '08.00 - 10.00'),
(29, 53, 11, 'DS', 'KF2', 'Senin', '10.00 - 12.00'),
(30, 49, 10, 'P2', 'KF2', 'Selasa', '10.00 - 12.30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `semester` enum('ganjil','genap') DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id`, `mahasiswa_id`, `jadwal_id`, `matakuliah_id`, `tahun_ajaran`, `semester`, `approved_by`, `approved_at`, `is_approved`) VALUES
(73, 12, 25, 50, '2025/2026', 'genap', NULL, NULL, 0),
(74, 12, 26, 51, '2025/2026', 'genap', NULL, NULL, 1),
(75, 12, 27, 52, '2025/2026', 'genap', NULL, NULL, 1),
(76, 12, 28, 49, '2025/2026', 'genap', NULL, NULL, 1),
(78, 13, 25, 50, '2025/2026', 'genap', NULL, NULL, 0),
(79, 13, 28, 49, '2025/2026', 'genap', NULL, NULL, 1),
(80, 13, 29, 53, '2025/2026', 'genap', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `angkatan` year(4) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `user_id`, `nim`, `prodi`, `nomor_hp`, `alamat`, `angkatan`, `created_at`, `updated_at`) VALUES
(12, 'Rizki Fikriansyah', 33, 'B02220117', 'Ilmu Komputer', '082145412816', 'BTN Panggi', '2022', '2025-06-17 12:25:47', '2025-06-17 12:25:47'),
(13, 'Fera Febrianti', 34, 'B02220125', 'Ilmu Komputer', '081339618123', 'Rabangodu Utara', '2022', '2025-06-17 12:26:30', '2025-06-17 12:26:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode`, `nama`, `sks`, `semester`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(49, 'IKP1', 'Sistem Pakar', 4, 'genap', '2025/2026', '2025-06-17 13:29:25', NULL),
(50, 'IKP2', 'Analisis dan Perancangan Sistem', 4, 'genap', '2025/2026', '2025-06-17 13:30:54', NULL),
(51, 'IKP3', 'Manajemen Proyek', 4, 'genap', '2025/2026', '2025-06-17 13:31:29', NULL),
(52, 'IKP4', 'Pemrograman Mobile', 4, 'genap', '2025/2026', '2025-06-17 13:31:55', NULL),
(53, 'IKP5', 'Natural Language Processing', 4, 'genap', '2025/2026', '2025-06-17 13:32:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `tahun_ajaran`, `semester`, `updated_at`) VALUES
(1, '2025/2026', 'genap', '2025-06-01 04:18:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` enum('mahasiswa','dosen','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `created_at`, `updated_at`) VALUES
(8, 'admin', '0192023a7bbd73250516f069df18b500', 'ADMIN UM BIMA', 'admin', '2025-05-22 09:03:46', NULL),
(33, 'rizki', '656ead03af397857bdcd84292e6a3bbd', 'Rizki Fikriansyah', 'mahasiswa', '2025-06-17 12:25:47', NULL),
(34, 'fera', '7ab4ea3cd3dd515430aaa268f3548ecf', 'Fera Febrianti', 'mahasiswa', '2025-06-17 12:26:30', NULL),
(36, 'teguh', '261a794363c16c2a9969c2ee093673d6', 'Teguh Ansyor Lorosae M.Kom', 'dosen', '2025-06-17 13:14:33', NULL),
(37, 'mutmainnah', '433f78ed6ae676380fc3ef71d8ab6be4', 'Siti Mutmainnah M.Kom', 'dosen', '2025-06-17 13:19:28', NULL),
(38, 'zumhur', 'f66d0b7c05fd1fac5c6c4161c2a6a589', 'Zumhur Alamin M.Kom', 'dosen', '2025-06-17 13:21:10', NULL),
(39, 'mifta', '1867740d5236b1cff6ed7d97be36f629', 'Miftahul Jannah M.Kom', 'dosen', '2025-06-17 13:34:15', NULL),
(40, 'latif', '374d6ca342e76095a4fb516b7b46cd69', 'A Latief Fashihullisan', 'dosen', '2025-06-17 13:35:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`),
  ADD KEY `approved_by` (`approved_by`),
  ADD KEY `krs_ibfk_1` (`mahasiswa_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `fk_mahasiswa_user` (`user_id`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id`),
  ADD CONSTRAINT `krs_ibfk_3` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
