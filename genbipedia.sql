-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 09:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genbipedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_kegiatans`
--

CREATE TABLE `absensi_kegiatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kegiatan_id` int(10) UNSIGNED NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Ketua Umum Komisariat Universitas Bengkulu', '2024-01-15 23:52:28', '2024-01-15 23:52:28'),
(3, 'Tim IT UNIB', '2024-01-15 23:58:27', '2024-01-15 23:58:27'),
(4, 'Anggota Divisi Pubsos Komisariat Universitas Bengkulu', '2024-01-16 02:53:15', '2024-01-16 02:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_kegiatans`
--

CREATE TABLE `jabatan_kegiatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan_kegiatans`
--

INSERT INTO `jabatan_kegiatans` (`id`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Ketua Panitia', NULL, NULL),
(5, 'Sekretaris Panitia', '2024-01-12 11:09:46', '2024-01-12 11:38:49'),
(6, 'Bendahara Panitia', '2024-01-12 13:19:14', '2024-01-12 13:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `deskripsi_kegiatan` varchar(255) NOT NULL,
  `note_kegiatan` varchar(255) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komisariats`
--

CREATE TABLE `komisariats` (
  `id` int(10) UNSIGNED NOT NULL,
  `komisariat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komisariats`
--

INSERT INTO `komisariats` (`id`, `komisariat`, `created_at`, `updated_at`) VALUES
(1, 'Universitas Bengkulu', '2024-01-11 08:06:01', '2024-01-11 08:06:01'),
(55, 'Universitas Islam Negeri Fatmawati Soekarno', '2024-01-12 13:17:45', '2024-01-12 13:17:45'),
(56, 'Universitas Muhamadiyah Bengkulu', '2024-01-12 13:18:17', '2024-01-12 13:18:17'),
(57, 'Institut Agama Islam Negeri Rejang Lebong', '2024-01-12 13:18:42', '2024-01-12 13:18:42'),
(58, 'Pembina', '2024-01-15 00:44:22', '2024-01-15 00:44:22'),
(59, 'Operator', '2024-01-15 00:44:28', '2024-01-15 00:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `level_kegiatans`
--

CREATE TABLE `level_kegiatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL,
  `poin` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_kegiatans`
--

INSERT INTO `level_kegiatans` (`id`, `level`, `poin`, `created_at`, `updated_at`) VALUES
(1, 'Wilayah Bengkulu', 4, '2024-01-14 00:59:11', '2024-01-14 00:59:11'),
(2, 'Komisariat Universitas Bengkulu', 0, '2024-01-14 01:04:55', '2024-01-14 01:04:55'),
(4, 'Komisariat Universitas Muhamadiyah Bengkulu', 0, '2024-01-14 23:56:38', '2024-01-14 23:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2024_01_11_134047_create_komisariats_table', 1),
(6, '2024_01_11_134048_create_level_kegiatans_table', 1),
(7, '2024_01_11_134049_create_jabatan_kegiatans_table', 1),
(8, '2024_01_11_134203_create_beritas_table', 1),
(9, '2024_01_11_134357_create_kegiatans_table', 1),
(10, '2024_01_11_134419_create_panitia_kegiatans_table', 1),
(11, '2024_01_11_134507_create_peserta_kegiatans_table', 1),
(12, '2024_01_11_134537_create_absensi_kegiatans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panitia_kegiatans`
--

CREATE TABLE `panitia_kegiatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kegiatan_id` int(10) UNSIGNED NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kegiatans`
--

CREATE TABLE `peserta_kegiatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kegiatan_id` int(10) UNSIGNED NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `komisariat_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `angkatan` bigint(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `poin` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `komisariat_id`, `jabatan_id`, `nama`, `email`, `email_verified_at`, `no_hp`, `level`, `password`, `angkatan`, `tgl_lahir`, `poin`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 4, 'Muhammad Farchan Al Rahman', 'farchan937@gmail.com', NULL, '081368409245', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2020, '2002-05-21', 100, '1705645165.png', NULL, NULL, '2024-01-18 23:19:25'),
(5, 59, 3, 'Super Admin Farhan', 'superadmin@gmail.com', NULL, '081368409245', 'Super Admin', '$2y$10$cuLyZ6133tfQrhSQ5esQf.Z0ZCJVczaiz9I0tkQN08fMlTGLTLNGa', 2020, '2024-01-01', NULL, '1705563168.png', NULL, '2024-01-18 00:32:39', '2024-01-18 00:32:48'),
(6, 1, 3, 'aan', 'aan@gmail.com', NULL, '081368409245', 'Super Admin', '$2y$10$nhKdIO9.4yOURwbIJlNtPuw0L4Y4ph.9fPlrH9JkNXah/hGe0TNoG', 2020, '1987-10-22', NULL, '1705563213.jpg', NULL, '2024-01-18 00:33:33', '2024-01-18 00:33:33'),
(8, 1, 4, 'Do reprehenderit am', 'risyqy@mailinator.com', NULL, 'Est qui iure eos vo', 'Super Admin', '$2y$10$kOGEp0DJ3T3U13/hJDGEFu8xerhMYrSpXPaOdxXpt/B4fpBy4dex2', 0, '1991-04-03', 49, '1705563420.png', NULL, '2024-01-18 00:37:00', '2024-01-18 00:37:00'),
(9, 1, 4, 'Quam aute cupiditate', 'vakafegab@mailinator.com', NULL, 'Quo voluptas pariatu', 'Super Admin', '$2y$10$kE9M4xD6oBFhliMHoJuSA.SG15CHu57LXZWtaTEMFASTaxh.qbJNK', 0, '1974-06-05', 97, '1705645172.png', NULL, '2024-01-18 00:37:28', '2024-01-18 23:19:32'),
(10, 55, 3, 'Fugiat illo doloribu', 'fixesu@mailinator.com', NULL, 'Quo dolor in eum qui', 'Super Admin', '$2y$10$QZssEqzmmW7wGXoyc5Fh7uSJtubb89y.Xs0hoLxIRw1HYQU5tA7f6', 0, '2022-12-21', 33, '1705645128.png', NULL, '2024-01-18 00:37:32', '2024-01-18 23:18:48'),
(11, 57, 4, 'Laboris nostrum comm', 'nonyg@mailinator.com', NULL, 'Non ut ex exercitati', 'Admin', '$2y$10$h/aWnsV9eISjoejroxvp.eeZQsPmvMIu5KN6c7AEnjTqoSiMEjcJS', 0, '1972-06-10', 31, '1705645138.png', NULL, '2024-01-18 00:37:36', '2024-01-18 23:18:58'),
(12, 57, 3, 'Et eu tenetur ducimu', 'kivemofam@mailinator.com', NULL, 'Cumque quia ipsam ma', 'Super Admin', '$2y$10$/mUurb5E1D944WUiJsoev.uch6vz3Nu2DX3EZRemU75/78TGylroy', 0, '1984-10-12', 26, '1705645120.png', NULL, '2024-01-18 00:37:41', '2024-01-18 23:18:40'),
(13, 57, 4, 'Sint non consectetur', 'wopuk@mailinator.com', NULL, 'Aute enim in ut obca', 'Super Admin', '$2y$10$iDPdhFr7Cme4T1IkkvQsMOiwFjxOwZwg5wJCjNtlteCuu0Wf7.h/W', 0, '1986-06-23', 36, '1705645178.png', NULL, '2024-01-18 00:37:46', '2024-01-18 23:19:38'),
(14, 59, 1, 'Ut laborum ex culpa', 'jixu@mailinator.com', NULL, 'Consectetur non eos', 'Super Admin', '$2y$10$wOZvyoNhPRUVucSGlWNxDutmyp5pxRQnwM6AgMLL91OAgBMDgoD0u', 2021, '1987-07-15', 213, '1705645186.png', NULL, '2024-01-18 00:37:54', '2024-01-18 23:19:46'),
(15, 59, 3, 'Admin Farhan', 'admin@gmail.com', NULL, '08168409245', 'Super Admin', '$2y$10$Lh.0q//elkwBTwOeHub4B.4hoHzuVTIsfrjVQRI.ee/q3aK5XkWqq', 2020, '2002-05-21', 100, '1705578668.jpg', 'N0UZXL3yULK3qY4HbEckhudSeLD96DFtkZYPrzmItzx2MyKLDC7nOlDF4X4A', '2024-01-18 00:50:00', '2024-01-18 04:51:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_kegiatans`
--
ALTER TABLE `absensi_kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_kegiatans_user_id_foreign` (`user_id`),
  ADD KEY `absensi_kegiatans_kegiatan_id_foreign` (`kegiatan_id`),
  ADD KEY `absensi_kegiatans_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `absensi_kegiatans_level_id_foreign` (`level_id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beritas_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan_kegiatans`
--
ALTER TABLE `jabatan_kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatans_level_id_foreign` (`level_id`);

--
-- Indexes for table `komisariats`
--
ALTER TABLE `komisariats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_kegiatans`
--
ALTER TABLE `level_kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panitia_kegiatans`
--
ALTER TABLE `panitia_kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panitia_kegiatans_user_id_foreign` (`user_id`),
  ADD KEY `panitia_kegiatans_kegiatan_id_foreign` (`kegiatan_id`),
  ADD KEY `panitia_kegiatans_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `panitia_kegiatans_level_id_foreign` (`level_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peserta_kegiatans`
--
ALTER TABLE `peserta_kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_kegiatans_user_id_foreign` (`user_id`),
  ADD KEY `peserta_kegiatans_kegiatan_id_foreign` (`kegiatan_id`),
  ADD KEY `peserta_kegiatans_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `peserta_kegiatans_level_id_foreign` (`level_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_kegiatans`
--
ALTER TABLE `absensi_kegiatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan_kegiatans`
--
ALTER TABLE `jabatan_kegiatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komisariats`
--
ALTER TABLE `komisariats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `level_kegiatans`
--
ALTER TABLE `level_kegiatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `panitia_kegiatans`
--
ALTER TABLE `panitia_kegiatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta_kegiatans`
--
ALTER TABLE `peserta_kegiatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_kegiatans`
--
ALTER TABLE `absensi_kegiatans`
  ADD CONSTRAINT `absensi_kegiatans_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan_kegiatans` (`id`),
  ADD CONSTRAINT `absensi_kegiatans_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`),
  ADD CONSTRAINT `absensi_kegiatans_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level_kegiatans` (`id`),
  ADD CONSTRAINT `absensi_kegiatans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `beritas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level_kegiatans` (`id`);

--
-- Constraints for table `panitia_kegiatans`
--
ALTER TABLE `panitia_kegiatans`
  ADD CONSTRAINT `panitia_kegiatans_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan_kegiatans` (`id`),
  ADD CONSTRAINT `panitia_kegiatans_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`),
  ADD CONSTRAINT `panitia_kegiatans_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level_kegiatans` (`id`),
  ADD CONSTRAINT `panitia_kegiatans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `peserta_kegiatans`
--
ALTER TABLE `peserta_kegiatans`
  ADD CONSTRAINT `peserta_kegiatans_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan_kegiatans` (`id`),
  ADD CONSTRAINT `peserta_kegiatans_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`),
  ADD CONSTRAINT `peserta_kegiatans_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level_kegiatans` (`id`),
  ADD CONSTRAINT `peserta_kegiatans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
