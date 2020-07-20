-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2020 at 04:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siplkd`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_artikel` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `judul`, `isi_artikel`, `tgl_artikel`, `created_at`, `updated_at`) VALUES
(1, 'Sholat dhuha', 'kasjdksajdddddddddddddddddddddddddddalsdsalkdklsandlksanlkdsalk\r\nkasjdksajdddddddddddddddddddddddddddalsdsalkdklsandlksanlkdsalk\r\nkasjdksajdddddddddddddddddddddddddddalsdsalkdklsandlksanlkdsalkkasjdksajdddddddddddddddddddddddddddalsdsalkdklsandlksanlkdsalkkasjdksajdddddddddddddddddddddddddddalsdsalkdklsandlksanlkdsalkkasjdksajdddddddddddddddddddddddddddalsdsalkdklsandlksanlkdsalkkasjdksajdddddddddddddddddddddddddddalsdsalkdklsandlksanlkdsalkkasjdksajdddddddddddddddddddddddddddalsdsalkdklsandlksanlkdsalk', '2020-07-22', '2020-07-17 00:00:05', '2020-07-17 00:00:05'),
(2, 'asdsa', '<p><b><small>Halo semua nya kepada teman-teman yang baik hati dan tidak sombong</small></b></p>', '0002-02-22', '2020-07-20 09:49:12', '2020-07-20 09:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `bahanmateris`
--

CREATE TABLE `bahanmateris` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_dosen` int(11) UNSIGNED NOT NULL,
  `judul_materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahanmateris`
--

INSERT INTO `bahanmateris` (`id`, `id_dosen`, `judul_materi`, `file`, `created_at`, `updated_at`) VALUES
(1, 7, 'Materi 1', 'datatablebootstrap_1594993044.rar', '2020-07-17 06:37:24', '2020-07-17 06:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasiibadahs`
--

CREATE TABLE `evaluasiibadahs` (
  `id_evaluasi` int(10) UNSIGNED NOT NULL,
  `id_peserta` int(10) UNSIGNED NOT NULL,
  `tgl_evaluasi` date NOT NULL,
  `shalat_berjamaah` int(11) NOT NULL,
  `shalat_dhuha` int(11) NOT NULL,
  `tilawah_quran` int(11) NOT NULL,
  `qiyamul_lail` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_event` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_event` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_event` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nama_event`, `deskripsi_event`, `foto_event`, `created_at`, `updated_at`) VALUES
(2, 'Lomba Foto Kajian Dhuha', 'lomba foto mengenai kajian dhuha inspirasi bagi umat islam', 'Android-11 (2)_1594969573.jpg', '2020-07-17 00:06:13', '2020-07-17 00:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(10) UNSIGNED NOT NULL,
  `nama_fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Fakultas Keguruan', '2020-07-16 19:28:22', '2020-07-16 19:28:22'),
(2, 'Fakulas Ekonomi', '2020-07-16 19:28:39', '2020-07-16 19:28:39'),
(3, 'Fakultas Psikologi', '2020-07-16 19:28:51', '2020-07-16 19:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `instrukturs`
--

CREATE TABLE `instrukturs` (
  `id_instruktur` int(10) UNSIGNED NOT NULL,
  `nama_instruktur` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_instruktur` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kajiandhuhas`
--

CREATE TABLE `kajiandhuhas` (
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `hari_kajian` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_kajian` time NOT NULL,
  `akhir_kajian` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kajiandhuhas`
--

INSERT INTO `kajiandhuhas` (`id_jadwal`, `hari_kajian`, `jam_kajian`, `akhir_kajian`, `created_at`, `updated_at`) VALUES
(1, 'Senin', '10:10:00', '12:00:00', '2020-07-16 23:57:40', '2020-07-16 23:57:40'),
(2, 'Selasa', '13:00:00', '15:00:00', '2020-07-17 05:47:40', '2020-07-17 05:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `kodeseksipesertas`
--

CREATE TABLE `kodeseksipesertas` (
  `id` int(20) UNSIGNED NOT NULL,
  `kode_seksi_peserta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kodeseksipesertas`
--

INSERT INTO `kodeseksipesertas` (`id`, `kode_seksi_peserta`, `created_at`, `updated_at`) VALUES
(1, 'K001', '2020-07-16 19:25:29', '2020-07-16 19:25:29'),
(2, 'K002', '2020-07-16 19:26:16', '2020-07-16 19:26:16'),
(3, 'K005', '2020-07-16 19:26:27', '2020-07-16 19:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `laporankajians`
--

CREATE TABLE `laporankajians` (
  `id_laporankajian` int(10) UNSIGNED NOT NULL,
  `judul_laporan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_laporan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporankajians`
--

INSERT INTO `laporankajians` (`id_laporankajian`, `judul_laporan`, `file_laporan`, `created_at`, `updated_at`) VALUES
(2, 'Laporan 1', 'tugas meluik_1594990176.docx', '2020-07-17 05:49:36', '2020-07-17 05:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_layanan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanans`
--

INSERT INTO `layanans` (`id`, `foto_layanan`, `judul_layanan`, `created_at`, `updated_at`) VALUES
(1, 'grandopenin_1595263182.jpg', 'Grand opening ceremony kajian Dhuha', '2020-07-20 09:34:26', '2020-07-20 09:39:42'),
(2, 'pelatihanislam_1595263203.jpg', 'Pelatihan wawasan Islam', '2020-07-20 09:40:03', '2020-07-20 09:40:03'),
(3, 'jenzah_1595263218.jpg', 'Pelatihan penyelenggaraan jenazah', '2020-07-20 09:40:18', '2020-07-20 09:40:18'),
(4, 'pelatihaninstruktur_1595263229.jpg', 'Pelatihan instruktur', '2020-07-20 09:40:29', '2020-07-20 09:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2020_07_03_235223_create_seksipais_table', 1),
(24, '2020_07_04_000118_create_instrukturs_table', 1),
(25, '2020_07_04_000254_create_fakultas_table', 1),
(26, '2020_07_04_000406_create_kajiandhuhas_table', 1),
(27, '2020_07_04_003347_create_seksikajiandhuhas_table', 2),
(28, '2020_07_04_012218_create_seksiinstrukturs_table', 3),
(29, '2020_07_04_051616_create_pesertas_table', 4),
(30, '2020_07_04_001553_create_pesertakajiandhuhas_table', 5),
(31, '2020_07_04_011624_create_evaluasiibadahs_table', 6),
(32, '2020_07_04_012614_create_nilaikajiandhuhas_table', 7),
(33, '2020_07_05_064839_create_pengumumen_table', 8),
(34, '2020_07_07_030957_create_kodeseksipesertas_table', 9),
(35, '2020_07_08_112733_create_bahanmateris_table', 10),
(36, '2020_07_09_055331_create_laporankajians_table', 11),
(37, '2020_07_15_161130_create_layanans_table', 12),
(38, '2020_07_15_161642_create_events_table', 12),
(39, '2020_07_15_161708_create_articles_table', 12),
(40, '2020_07_20_161251_create_layanans_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `nilaikajiandhuhas`
--

CREATE TABLE `nilaikajiandhuhas` (
  `id_nilai` int(10) UNSIGNED NOT NULL,
  `id_pesertakajian` int(10) UNSIGNED NOT NULL,
  `id_instruktur` int(10) UNSIGNED NOT NULL,
  `nilai_kehadiran` double(8,2) NOT NULL,
  `huruf_kehadiran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_keaktifan` double(8,2) NOT NULL,
  `praktik_ibadah` double(8,2) NOT NULL,
  `nilai_ujian` double(8,2) NOT NULL,
  `huruf_keaktifan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `huruf_praktikibadah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `huruf_ujianakhir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumumen`
--

CREATE TABLE `pengumumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumumen`
--

INSERT INTO `pengumumen` (`id`, `judul`, `isi_pengumuman`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'Kepada seluruh user harap entrikan data pribadi masing-masin terima kasih', '2020-07-16 19:29:25', '2020-07-16 19:29:25'),
(4, 'Admin', 'Kepada seluruh peserta harap memilih jadwal sesuai dengan apa yg dianjurkan oleh dosen PAI masing-masing', '2020-07-16 19:30:01', '2020-07-16 19:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `pesertakajiandhuhas`
--

CREATE TABLE `pesertakajiandhuhas` (
  `id_pesertakajian` int(10) UNSIGNED NOT NULL,
  `id_peserta` int(10) UNSIGNED NOT NULL,
  `id_seksi_kajian_dhuha` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesertas`
--

CREATE TABLE `pesertas` (
  `id_peserta` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progamstudi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosenpai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kodeseksipeserta` int(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesertas`
--

INSERT INTO `pesertas` (`id_peserta`, `username`, `password`, `nama_lengkap`, `email`, `nama_panggilan`, `kontak`, `jk`, `fakultas`, `nim`, `tempat_lahir`, `tgl_lahir`, `alamat`, `tahun_masuk`, `progamstudi`, `dosenpai`, `foto`, `id_kodeseksipeserta`, `created_at`, `updated_at`) VALUES
(1, 'nurmayan', '$2y$10$gFPshEUDAI5aMq.uE6Ajx.gJJu0tdoL/K5ZCJEhmi1LRc5EATBIN6', 'nurmayan', 'nurmayan@gmail.com', 'nurmayan', 'nurmayan', 'Perempuan', 'Fakulas Ekonomi', '21321321321', 'adsd', '0222-02-22', 'Padang', '2020', 'sdasds', 'asdasdas', '', 1, '2020-07-17 00:13:28', '2020-07-17 00:13:28'),
(2, 'hanafi', '$2y$10$X72zdi1VtVpiMfIkNIsRIeYsagIEc6dTGhGWmJo5uRlylO2KPoMgm', 'hanafi', 'hanafi@gmail.com', 'hanafi', '21321321', 'Laki -laki', 'Fakultas Keguruan', '213123123', 'Padan', '0222-02-22', 'Padang', '2020', 'asdas', 'sdsad', 'handika_1594991891.png', 1, '2020-07-17 00:14:18', '2020-07-17 06:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `seksikajiandhuhas`
--

CREATE TABLE `seksikajiandhuhas` (
  `id_seksi_kajian_dhuha` int(10) UNSIGNED NOT NULL,
  `seksi_kajian_dhuha` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instruktur` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seksikajians`
--

CREATE TABLE `seksikajians` (
  `id_seksi_instruktur` int(10) UNSIGNED NOT NULL,
  `seksi_instruktur` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instruktur` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seksipais`
--

CREATE TABLE `seksipais` (
  `id_seksi_pai` int(10) UNSIGNED NOT NULL,
  `kode_seksi_pai` int(11) NOT NULL,
  `dosen_pai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_lengkap_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap_user`, `username`, `password`, `email_user`, `level`, `jk_user`, `kontak_user`, `foto_user`, `created_at`, `updated_at`) VALUES
(5, 'Admin Sistem', 'admin', '$2y$10$o.Ly1BRUxcEb0DZoHgNsa.XXOU90DIqrPX5URK.OEIa/FNO6gcU8m', 'admin@gmail.com', 'Admin', 'Laki - Laki', '123123', 'ktpkeluarga_1595220567.jpg', NULL, '2020-07-19 21:49:28'),
(6, 'Hanny Eka Putri212', 'hanny', '$2y$10$np8I83t1PigRTivJv9owjOZaAZ4ECZafpDwJFdI/c4eMDdIIg9JDy', 'hannyeka@gmail.com', 'Instruktur', 'Perempuan', '081233323232', 'Gambar_1594991933.png', '2020-07-16 19:34:10', '2020-07-20 08:48:38'),
(7, 'Mela Sintia', 'mela', '$2y$10$ur.qYliYA6Ks6JIgemlFWeFdaKKchx8NriqoM4pI26dQ5anNg9Rni', 'mela@gmail.com', 'Dosen', 'Perempuan', '1232131123', '', '2020-07-16 19:37:28', '2020-07-16 19:37:28'),
(8, 'Akbar Maulana', 'akbar', '$2y$10$mxdCFX8W82RT24M4SWgKqugVGJhq2kLkrKqAqGNrmlVeAu02XwDyS', 'akbar@gmail.com', 'Sekretaris Umum Lembaga Dakwah Kampus', 'Laki - Laki', '123123213', '', '2020-07-16 19:38:27', '2020-07-16 19:38:27'),
(9, 'Hendra', 'hendra', '$2y$10$kDbQiOMHd0.pcnP7PziTp.6k8xPVc3dsis/hTjMosCPcfke1SwMDS', 'hendra@gmail.com', 'Sekretaris Umum Qatulistiwa Islam', 'Laki - Laki', '12312312321', '', '2020-07-16 19:39:07', '2020-07-16 19:39:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahanmateris`
--
ALTER TABLE `bahanmateris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `evaluasiibadahs`
--
ALTER TABLE `evaluasiibadahs`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `evaluasiibadahs_id_peserta_foreign` (`id_peserta`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `instrukturs`
--
ALTER TABLE `instrukturs`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `kajiandhuhas`
--
ALTER TABLE `kajiandhuhas`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kodeseksipesertas`
--
ALTER TABLE `kodeseksipesertas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporankajians`
--
ALTER TABLE `laporankajians`
  ADD PRIMARY KEY (`id_laporankajian`);

--
-- Indexes for table `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaikajiandhuhas`
--
ALTER TABLE `nilaikajiandhuhas`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nilaikajiandhuhas_id_peserta_foreign` (`id_pesertakajian`),
  ADD KEY `id_instruktur` (`id_instruktur`);

--
-- Indexes for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesertakajiandhuhas`
--
ALTER TABLE `pesertakajiandhuhas`
  ADD PRIMARY KEY (`id_pesertakajian`),
  ADD KEY `id_seksi_kajian_dhuha` (`id_seksi_kajian_dhuha`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_kodeseksipeserta` (`id_kodeseksipeserta`);

--
-- Indexes for table `seksikajiandhuhas`
--
ALTER TABLE `seksikajiandhuhas`
  ADD PRIMARY KEY (`id_seksi_kajian_dhuha`),
  ADD KEY `id_instruktur` (`id_instruktur`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `seksikajians`
--
ALTER TABLE `seksikajians`
  ADD PRIMARY KEY (`id_seksi_instruktur`),
  ADD KEY `seksiinstrukturs_id_instruktur_foreign` (`id_instruktur`),
  ADD KEY `seksiinstrukturs_id_jadwal_foreign` (`id_jadwal`);

--
-- Indexes for table `seksipais`
--
ALTER TABLE `seksipais`
  ADD PRIMARY KEY (`id_seksi_pai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bahanmateris`
--
ALTER TABLE `bahanmateris`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluasiibadahs`
--
ALTER TABLE `evaluasiibadahs`
  MODIFY `id_evaluasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instrukturs`
--
ALTER TABLE `instrukturs`
  MODIFY `id_instruktur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kajiandhuhas`
--
ALTER TABLE `kajiandhuhas`
  MODIFY `id_jadwal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kodeseksipesertas`
--
ALTER TABLE `kodeseksipesertas`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporankajians`
--
ALTER TABLE `laporankajians`
  MODIFY `id_laporankajian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `nilaikajiandhuhas`
--
ALTER TABLE `nilaikajiandhuhas`
  MODIFY `id_nilai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesertakajiandhuhas`
--
ALTER TABLE `pesertakajiandhuhas`
  MODIFY `id_pesertakajian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id_peserta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seksikajiandhuhas`
--
ALTER TABLE `seksikajiandhuhas`
  MODIFY `id_seksi_kajian_dhuha` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seksikajians`
--
ALTER TABLE `seksikajians`
  MODIFY `id_seksi_instruktur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seksipais`
--
ALTER TABLE `seksipais`
  MODIFY `id_seksi_pai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahanmateris`
--
ALTER TABLE `bahanmateris`
  ADD CONSTRAINT `bahanmateris_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `users` (`id`);

--
-- Constraints for table `evaluasiibadahs`
--
ALTER TABLE `evaluasiibadahs`
  ADD CONSTRAINT `evaluasiibadahs_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id_peserta`);

--
-- Constraints for table `nilaikajiandhuhas`
--
ALTER TABLE `nilaikajiandhuhas`
  ADD CONSTRAINT `nilaikajiandhuhas_ibfk_1` FOREIGN KEY (`id_instruktur`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nilaikajiandhuhas_id_peserta_foreign` FOREIGN KEY (`id_pesertakajian`) REFERENCES `pesertakajiandhuhas` (`id_pesertakajian`);

--
-- Constraints for table `pesertakajiandhuhas`
--
ALTER TABLE `pesertakajiandhuhas`
  ADD CONSTRAINT `pesertakajiandhuhas_ibfk_1` FOREIGN KEY (`id_seksi_kajian_dhuha`) REFERENCES `seksikajiandhuhas` (`id_seksi_kajian_dhuha`),
  ADD CONSTRAINT `pesertakajiandhuhas_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id_peserta`);

--
-- Constraints for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD CONSTRAINT `pesertas_ibfk_1` FOREIGN KEY (`id_kodeseksipeserta`) REFERENCES `kodeseksipesertas` (`id`);

--
-- Constraints for table `seksikajiandhuhas`
--
ALTER TABLE `seksikajiandhuhas`
  ADD CONSTRAINT `seksikajiandhuhas_ibfk_1` FOREIGN KEY (`id_instruktur`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seksikajiandhuhas_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `kajiandhuhas` (`id_jadwal`);

--
-- Constraints for table `seksikajians`
--
ALTER TABLE `seksikajians`
  ADD CONSTRAINT `seksiinstrukturs_id_instruktur_foreign` FOREIGN KEY (`id_instruktur`) REFERENCES `instrukturs` (`id_instruktur`),
  ADD CONSTRAINT `seksiinstrukturs_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `kajiandhuhas` (`id_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
